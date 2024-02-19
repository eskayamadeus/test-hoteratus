<?php

namespace App\Scraper\Jobs;

use App\Models\ScrapedHotel;
use App\Models\ScrapedRoom;
use App\Models\ScrapedRoomPriceLog;
use App\Scraper\Exceptions\RateLimitException;
use App\Scraper\Scraper;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class ScrapeHotelRoomsData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public ScrapedHotel $scrapedHotel,
        public Carbon $startDate
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $timestamp = Cache::get("{$this->scrapedHotel->channel}-limit");

        if ($timestamp !== null) {
            $this->release($timestamp - time());
            return;
        }

        //                TODO: use timezone from hotel model
        $minimumStay = $this->scrapedHotel->minimum_stay;
        $endDate = $this->startDate->copy()->addDays($this->scrapedHotel->minimum_stay);

        $driver = Scraper::driver($this->scrapedHotel->channel);

        try {
            $response = $driver->scrape([
                'url_id' => $this->scrapedHotel->url_id,
                'start_date' => $this->startDate,
                'end_date' => $endDate
            ]);

            $response->each(function ($room) use ($minimumStay) {
                $room['price'] = $room['price'] ?? 0 / $minimumStay;

                $scrapedRoom = ScrapedRoom::query()->updateOrCreate([
                    'scraped_hotel_id' => $this->scrapedHotel->id,
                    'name' => $room['name'],
                ], Arr::except($room, ['price', 'refundable', 'name']));

                $pricingLogs = collect([]);

                for ($minIndex = 0; $minIndex < $minimumStay; $minIndex++) {
                    $pricingLogs->push([
                        'scraped_room_id' => $scrapedRoom->id,
                        'stay_date' => $this->startDate->copy()->addDays($minIndex)->startOfDay(),
                        'price' => $room['price'] ?? 0,
                        'refundable' => $room['refundable'] ?? false,
                    ]);
                }

                ScrapedRoomPriceLog::query()->upsert($pricingLogs->all(), ['scraped_room_id', 'stay_date'], ['price', 'refundable']);
            });
        } catch (RateLimitException $th) {
            $secondsRemaining = now()->addSeconds(60);
            Cache::put("{$this->scrapedHotel->channel}-limit", $secondsRemaining->timestamp, $secondsRemaining);

            $this->release($secondsRemaining);

            return;
        }
    }
}
