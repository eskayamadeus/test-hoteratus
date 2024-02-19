<?php

namespace App\Http\Controllers\BusinessIntelligence\CSA;

use App\Http\Controllers\Controller;
use App\Scraper\Scraper;
use Exception;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ConfigurationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $platform)
    {
        try {
            Scraper::driver($platform)->saveConfig($request);

            return redirect()->route('csa.config.show', $platform)
                ->with([
                    'message' => "Configuration for $platform saved successfully",
                ]);
        } catch (InvalidArgumentException) {
            abort(404, 'Scraper Channel not available.');
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $platform)
    {
        try {
            $view = Scraper::driver($platform)->view();

            $hotels = Scraper::driver($platform)->getConfig()->toArray();

            $config = config("scraper.channels.{$platform}");

            if ($platform == 'expedia-packages') {
                return view($view, compact('platform', 'config'));
            }

            return view('frontend.business-intelligence.config.index', compact('platform', 'view', 'config', 'hotels'));
        } catch (InvalidArgumentException) {
            abort(404, 'Channel not available.');
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
