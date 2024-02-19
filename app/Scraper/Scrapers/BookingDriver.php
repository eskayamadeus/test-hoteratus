<?php

namespace App\Scraper\Scrapers;

use App\Models\ScrapedHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BookingDriver extends ScraperDriver
{
    public function view(): string
    {
        return 'frontend.business-intelligence.config.scrapers.booking';
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
            'properties.*.url_id' => 'properties #:position url',
            'properties.*.minimum_stay' => 'properties #:position minimum stay',
        ]);

        $this->saveHotels($validated['properties']);
    }

    /**
     * @return Collection<int, ScrapedHotel>
     */
    public function getConfig(): Collection
    {
        return ScrapedHotel::query()
            ->where('channel', $this->getChannel())
            ->get();
    }

    public function getChannel(): string
    {
        return 'booking';
    }

    protected function constructUrl(array $params): string
    {
        return "https://www.booking.com/hotel/{$params['url_id']}.en-gb.html?checkin={$params['start_date']->format('Y-m-d')}&checkout={$params['end_date']->format('Y-m-d')}";
    }

    protected function formatData(array $data): Collection
    {
        return collect($data)
            ->reject(fn ($room) => empty($room['name']))
            ->map(function ($item) {
                $item['bed_types'] = array_map(function ($type) {
                    return trim(Str::of($type)->explode(':', 2)->last());
                }, $item['bed_types']);

                return $item;
            });
    }
}
