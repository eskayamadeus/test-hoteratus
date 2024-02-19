<?php

namespace App\Http\Controllers\BusinessIntelligence\CSA;

use App\Http\Controllers\Controller;
use App\Scraper\Exceptions\RateLimitException;
use App\Scraper\Scraper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

class ExpediaPackageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $timestamp = Cache::get('expedia-packages-rate-limit');

        if ($timestamp !== null) {
            abort(400, 'Sorry this service is unavailable at the moment. Please try again in a minute.');
        }

        $validated = $request->validate([
            'destination' => ['required', 'string'],
            'origin' => ['required', 'string'],
            'date_from' => ['required', 'date'],
            'date_to' => ['required', 'date', 'after_or_equal:date_from'],
        ]);

        if ($request->date('date_from')->diffInDays($request->date('date_to')) > 29) {
            throw ValidationException::withMessages(['date_from' => 'Dates must be no more than 29 days apart']);
        }

        try {
            $response = Scraper::driver('expedia-packages')->scrape([
                ...$validated,
                'start_date' => $request->date('date_from'),
                'end_date' => $request->date('date_to'),
            ]);

            return response()->json($response);
        } catch (RateLimitException $th) {
            $secondsRemaining = now()->addSeconds(60);
            Cache::put('expedia-packages-rate-limit', $secondsRemaining->timestamp, $secondsRemaining);
            abort(400, 'Sorry this service is unavailable at the moment. Please try again in a minute.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {
            $view = Scraper::driver('expedia-packages')->view();

            $config = config("scraper.channels.expedia-packages");

            return view($view, compact('config'));
        } catch (InvalidArgumentException) {
            abort(404, 'Channel not available.');
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
