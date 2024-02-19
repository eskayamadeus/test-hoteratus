<?php

namespace App\Scraper\Scrapers;

use App\Models\ScrapedHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class AirbnbDriver extends ScraperDriver
{
    public function view(): string
    {
        return 'frontend.business-intelligence.config.scrapers.airbnb';
    }

    public function saveConfig(Request $request): void
    {
        $validated = $request->validate([
            // TODO: also consider the hotel id (the users assigned hotel) when updating properties
            // TODO: 'hotel_id' => ['nullable']
            'properties' => ['nullable', 'array'],
            'properties.*.id' => ['nullable', 'string', 'max:255'],
            'properties.*.name' => ['required', 'string', 'max:255'],
            'properties.*.url_id' => ['required', 'string', 'max:255'],
            'properties.*.minimum_stay' => ['required', 'int', 'min:1'],
        ], [], [
            'properties.*.name' => 'properties #:position name',
            'properties.*.url_id' => 'properties #:position id',
            'properties.*.minimum_stay' => 'properties #:position minimum stay',
        ]);

        $this->saveHotels($validated['properties']);
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
        return 'airbnb';
    }

    public function constructUrl(array $params): string
    {
        return "https://www.airbnb.com/rooms/{$params['url_id']}?check_in={$params['start_date']->format('Y-m-d')}&check_out={$params['end_date']->format('Y-m-d')}";
    }

    protected function formatData(array $data): Collection
    {
        return collect($data);
    }
}
