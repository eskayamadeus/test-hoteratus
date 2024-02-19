<?php

namespace App\Scraper\Commands;

use App\Models\ScrapedHotel;
use App\Scraper\Jobs\ScrapeHotelRoomsData;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ScrapeHotelDataCommand extends Command implements Isolatable
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrape-hotel-data
        {channels?* : The channels you want to scrape data from. Default is all.}
        {--starting-date= : The date you want to start the scraping from. Default is today. Format should be "Y-m-d"}
        {--days= : Number of days worth of scraping you want to do. Default is 1. Must be between 1 and 10}
        {--hotel-ids= : The ids of the hotels to scrape data for.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape hotel data from the specified channel.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $scrapedHotels = $this->getHotelsToBeScraped();
        } catch (Exception $e) {
            $this->error('Some of the channels you submitted are not supported.');

            return Command::FAILURE;
        }

        $date = Carbon::today();

        if ($this->option('starting-date')) {
            try {
                $date = Carbon::createFromFormat('Y-m-d', $this->option('starting-date'));
            } catch (Exception) {
                $this->error("We couldn't format your date. Please make sure the format is 'Y-m-d'");

                return Command::FAILURE;
            }
        }

        $days = $this->option('days') ?? 1;

        if (!is_numeric($days) || $days < 1 || $days > 10) {
            $this->error('Please ensure days option is a number and is between 1 and 10');

            return Command::FAILURE;
        }

        $progressBar = $this->output->createProgressBar($scrapedHotels->count());

        $scrapedHotels->each(function (ScrapedHotel $scrapedHotel) use ($progressBar, $date, $days) {
            //            TODO: get timezone from the hotels timezone information
            //            $timeZone = explode(',',$Hotel['utc'])[0];

            for ($dayIndex = 0; $dayIndex < $days; $dayIndex++) {
                ScrapeHotelRoomsData::dispatch(
                    $scrapedHotel,
                    //                  TODO: use timezone from hotel model
                    $date->copy()->setTimezone('Etc/GMT')->addDays($dayIndex)
                );
            }

            $progressBar->advance();
        });

        $progressBar->finish();

        $this->newLine(2);

        $this->info('Data scraping jobs dispatched!');

        return Command::SUCCESS;
    }

    /**
     * Get the isolatable ID for the command.
     */
    public function isolatableId(): string
    {
        return $this->argument('channel');
    }

    /**
     * @throws Exception
     */
    public function getHotelsToBeScraped(): Collection
    {
        $query = ScrapedHotel::query();

        $channels = $this->getChannels();

        if (count($channels) > 0) {
            $query->whereIn('channel', $channels);
        }

        $ids = array_filter($this->getHotelIds());

        if (count($ids) > 0) {
            $query->whereIn('id', $ids);
        }

        //        TODO: add timezone consideration
        return $query->get();
    }

    /**
     * @throws Exception
     */
    protected function getChannels(): array
    {
        $defaultChannels = collect(config('scraper.channels'))->keys()->all();

        $submittedChannels = $this->argument('channels');

        if (collect($submittedChannels)->diff($defaultChannels)->isNotEmpty()) {
            throw new Exception('Invalid channels submitted.');
        }

        return count($submittedChannels) > 0
            ? $submittedChannels
            : $defaultChannels;
    }

    protected function getHotelIds(): array
    {
        $ids = $this->option('hotel-ids');

        if (!is_array($ids)) {
            $ids = explode(',', (string) $ids);
        }

        if (count($ids) === 1 && Str::contains((string) $ids[0], ',')) {
            $ids = explode(',', (string) $ids[0]);
        }

        return $ids;
    }
}
