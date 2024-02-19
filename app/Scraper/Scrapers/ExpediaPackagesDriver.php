<?php

namespace App\Scraper\Scrapers;

use App\Models\ScrapedHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class ExpediaPackagesDriver extends ScraperDriver
{
    public function view(): string
    {
        return 'frontend.business-intelligence.config.scrapers.expedia-packages';
    }

    public function saveConfig(Request $request): void
    {
    }

    public function saveHotels($properties): void
    {
    }

    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\ScrapedHotel>
     */
    public function getConfig(): Collection
    {
        return collect();
    }

    public function constructUrl(array $params): string
    {
        return "https://www.expedia.com/Hotel-Search?airlineCode=&searchProduct=hotel&sort=recommended&startDate={$params['start_date']->format('Y-m-d')}&endDate={$params['end_date']->format('Y-m-d')}&destination={$params['destination']}&origin={$params['origin']}&theme=&tripType=ROUND_TRIP&useRewards=false&userIntent=";
    }

    protected function formatData(array $data): Collection
    {
        return collect($data);
    }

    public function getChannel(): string
    {
        return 'expedia-packages';
    }
}
