<?php

namespace App\Scraper\Scrapers;

use App\Models\ScrapedHotel;
use App\Scraper\Exceptions\RateLimitException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
use JsonException;

abstract class ScraperDriver
{
    abstract public function view(): string;

    abstract public function saveConfig(Request $request): void;

    abstract public function getConfig(): Collection;

    abstract protected function getChannel(): string;

    abstract protected function constructUrl(array $params): string;

    abstract protected function formatData(array $data): Collection;

    protected function saveHotels($properties): void
    {
        [$existingIds, $updatedIds] = collect($properties)
            ->reduceSpread(function (array $existingIds, array $updatedIds, $property) {
                if (isset($property['id'])) {
//                    TODO: consider current hotel
                    $scrapedHotel = ScrapedHotel::query()
                        ->where('id', $property['id'])
                        ->where('channel', $this->getChannel())
                        ->first();

                    $scrapedHotel->update(Arr::except($property, ['id']));

                    $existingIds[] = $scrapedHotel->id;
                } else {
                    //                    TODO: consider current hotel
                    $scrapedHotel = ScrapedHotel::query()->updateOrCreate([
                        'url_id' => $property['url_id'],
                        'channel' => $this->getChannel(),
                    ], [
                        ...Arr::except($property, ['id', ]),
                    ]);

                    $existingIds[] = $scrapedHotel->id;
                }

                if ($scrapedHotel->wasChanged(['url_id'])) {
                    $updatedIds[] = $scrapedHotel->id;
                }

                return [$existingIds, $updatedIds];
            }, [], []);

        ScrapedHotel::query()
            ->whereNotIn('id', $existingIds)
            ->where('channel', $this->getChannel())
            ->delete();

        // TODO: consider adding the hotel id to all future queries

        Artisan::queue('app:scrape-hotel-data', [
            'channels' => [$this->getChannel()], '--hotel-ids' => $updatedIds, '--days' => '10',
        ]);
    }

    public function scrapingScriptPath(): string
    {
        return app_path('Scraper/scripts/' . $this->getChannel() . '.js');
    }

    /**
     * @throws RateLimitException
     * @throws JsonException
     */
    public function scrape(array $params): Collection
    {
        $url = $this->constructUrl($params);

        try {
            $process = Process::timeout(4000)
                ->command([config('scraper.node.path'), $this->scrapingScriptPath(), $url, app()->environment(), config('scraper.chrome.path')])
                ->run()
                ->throw();

            Log::alert("Scraping successful", [
                'channel' => $this->getChannel(),
                'url' => $url,
                ...$params,
                'response' => $process->output(),
            ]);

            // Output the result
            $response = json_decode(
                json: $process->output(),
                associative: true,
                flags: JSON_THROW_ON_ERROR
            );

            if ($response['status'] !== 'SUCCESS' && $response['code'] === 429) {
                throw new RateLimitException();
            }

            if ($response['status'] !== 'SUCCESS') {
                throw new Exception('Something went wrong processing data.');
            }

            return $this->formatData($response['data']);
        } catch (Exception $exception) {
            if ($exception instanceof JsonException) {
                return collect();
            }

            throw $exception;
        }
    }
}
