<?php

namespace App\Scraper;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ScraperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ScraperManager::class, fn (Application $app) => new ScraperManager($app));
    }
}
