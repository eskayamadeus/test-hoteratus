<?php

namespace App\Scraper;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Scraper\Scrapers\ScraperDriver driver(string $driver = null)
 * @method static string view()
 * @method static string saveConfig(\Illuminate\Http\Request $request)
 * @method static \Illuminate\Support\Collection getConfig()
 * @method static string scrapingScriptPath()
 * @method static string constructUrl(string|int $urlId)
 *
 * @see \App\Scraper\ScraperManager
 */
class Scraper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ScraperManager::class;
    }
}
