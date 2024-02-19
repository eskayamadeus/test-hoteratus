<?php

namespace App\Http\Controllers\BusinessIntelligence\CSA;

use App\Enums\RevenueStrategyApproach;
use App\Enums\RevenueStrategyIncrementType;
use App\Enums\RevenueStrategyValueType;
use App\Http\Controllers\Controller;
use App\Models\RevenueStrategy;
use App\Scraper\Scraper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\Enum;
use InvalidArgumentException;

class RevenueStrategyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $platform)
    {
        try {
            Scraper::driver($platform);

            $validated = $request->validate([
                'strategies' => ['required', 'array', 'size:' . count(RevenueStrategyApproach::cases())],
                'strategies.*.approach' => ['required', 'string', 'distinct', new Enum(RevenueStrategyApproach::class)],
                'strategies.*.increment_type' => ['required', 'string', new Enum(RevenueStrategyIncrementType::class)],
                'strategies.*.value_type' => ['required', 'string', new Enum(RevenueStrategyValueType::class)],
                'strategies.*.value' => ['required', 'numeric', 'gt:0'],
            ], [], [
                'strategies.*.approach' => 'strategy approach #:position',
                'strategies.*.increment_type' => 'strategy increment type #:position',
                'strategies.*.value_type' => 'strategy value type #:position',
                'strategies.*.value' => 'strategy value #:position',
            ]);

            foreach ($validated['strategies'] as $strategy) {
                RevenueStrategy::query()->updateOrCreate([
                    'channel' => $platform,
                    'approach' => $strategy['approach'],
                ], Arr::except($strategy, ['approach']));
            }

            return redirect()->route('csa.revenue-strategy.show', $platform)
                ->with([
                    'message' => "Revenue strategies for $platform saved successfully",
                ]);
        } catch (InvalidArgumentException) {
            abort(404, 'Channel not available.');
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
            Scraper::driver($platform);

            $strategies = RevenueStrategy::query()
                // TODO: also consider current hotel
                ->where('channel', $platform)
                ->get()
                ->whenEmpty(function () {
                    return collect(RevenueStrategyApproach::cases())->map(fn ($approach) => new RevenueStrategy(['approach' => $approach->value]));
                });

            $config = config("scraper.channels.{$platform}");

            return view('frontend.business-intelligence.revenue-strategy.index', compact('config', 'platform', 'strategies'));
        } catch (InvalidArgumentException) {
            abort(404, 'Channel not available.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Something went wrong and we are fixing it.');
        }
    }
}
