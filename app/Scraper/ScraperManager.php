<?php

namespace App\Scraper;

use App\Scraper\Scrapers\AirbnbDriver;
use App\Scraper\Scrapers\BookingDriver;
use App\Scraper\Scrapers\ExpediaHotelDriver;
use App\Scraper\Scrapers\ExpediaPackagesDriver;
use App\Scraper\Scrapers\ScraperDriver;
use Exception;
use Illuminate\Support\Manager;

class ScraperManager extends Manager
{
    public function createAirbnbDriver(): ScraperDriver
    {
        return new AirbnbDriver();
    }

    public function createBookingDriver(): ScraperDriver
    {
        return new BookingDriver();
    }

    public function createExpediaHotelDriver(): ScraperDriver
    {
        return new ExpediaHotelDriver();
    }

    public function createExpediaPackagesDriver(): ScraperDriver
    {
        return new ExpediaPackagesDriver();
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        throw new Exception('This does not have a default driver');
    }
}
