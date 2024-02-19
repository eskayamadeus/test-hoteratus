<?php

namespace App\Scraper\Scrapers;

use App\Models\ScrapedHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ExpediaHotelDriver extends ScraperDriver
{
    public function view(): string
    {
        return 'frontend.business-intelligence.config.scrapers.expedia-hotel';
    }

    public function saveConfig(Request $request): void
    {
        $validated = $request->validate([
            // TODO: also consider the hotel id (the users assigned hotel) when updating properties
            // TODO:
            'hotel_id' => ['nullable'],
            'properties' => ['nullable', 'array'],
            'properties.*.id' => ['nullable', 'string', 'max:255'],
            'properties.*.name' => ['required', 'string', 'max:255'],
            'properties.*.url_id' => ['required', 'string', 'max:255'],
            'properties.*.minimum_stay' => ['required', 'int', 'min:1'],
        ], [], [
            'properties.*.name' => 'properties #:position name',
            'properties.*.url_id' => 'properties #:position url',
            'properties.*.minimum_stay' => 'properties #:position minimum stay',
        ]);

        // $this->saveHotels($validated['properties']);

        // Log or dump the $validated array to check its structure
        Log::info('Validated array:', $validated);

        // Check if 'properties' key exists in the validated array
        if (isset($validated['properties'])) {
            $this->saveHotels($validated['properties']);
        } else {
            // Handle case where 'properties' key is missing
            Log::error('The "properties" key is missing from the validated array.');
            // Optionally, you can throw an exception or return a response to indicate the error.
        }
    }

    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\ScrapedHotel>
     */
    public function getConfig(): Collection
    {
        return ScrapedHotel::query()
            ->where('channel', $this->getChannel())
            ->get();
    }

    public function getChannel(): string
    {
        return 'expedia-hotel';
    }

    public function constructUrl(array $params): string
    {
        return "https://www.expedia.com/{$params['url_id']}.Hotel-Information?chkin={$params['start_date']->format('Y-m-d')}&chkout={$params['end_date']->format('Y-m-d')}";
    }

    protected function formatData(array $data): Collection
    {
        return collect($data);
    }
}
