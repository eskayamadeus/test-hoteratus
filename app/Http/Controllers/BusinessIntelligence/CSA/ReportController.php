<?php

namespace App\Http\Controllers\BusinessIntelligence\CSA;

use App\Enums\RevenueStrategyApproach;
use App\Http\Controllers\Controller;
use App\Models\RevenueStrategy;
use App\Models\Room;
use App\Models\ScrapedHotel;
use App\Models\ScrapedRoom;
use App\Models\ScrapedRoomPriceLog;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_from' => ['required', 'date'],
            'date_to' => ['required', 'date', 'after_or_equal:date_from'],
            'rooms' => ['required', 'array', 'min:1'],
            'channels' => ['required', 'array', 'min:1'],
            'hotels' => ['required', 'array', 'min:1'],
        ]);

        $startDate = $request->date('date_from');
        $endDate = $request->date('date_to');

        $rooms = Room::query()
            ->whereIn('id', $validated['rooms'])
            ->get();

        $scrapedRooms = ScrapedRoom::query()
            ->with(['scrapedHotel', 'roomMapping' => ['room']])
            ->has('roomMapping')
            ->whereIn('scraped_hotel_id', $validated['hotels'])
            ->get();

        $channels = collect(config('scraper.channels'))->filter(fn ($channel, $key) => in_array($key, $validated['channels']));

        $revenueStrategies = RevenueStrategy::query()
            ->whereIn('channel', $validated['channels'])
            ->get()
            ->mapToGroups(fn (RevenueStrategy $strategy) => [$strategy->channel => $strategy]);

        $pricingLogs = ScrapedRoomPriceLog::query()
            ->join('scraped_rooms', 'scraped_rooms.id', 'scraped_room_price_logs.scraped_room_id')
            ->join('scraped_hotels', 'scraped_hotels.id', 'scraped_rooms.scraped_hotel_id')
            ->join('scraped_room_mappings', 'scraped_room_mappings.scraped_room_id', 'scraped_room_price_logs.scraped_room_id')
            ->join('rooms', 'rooms.id', 'scraped_room_mappings.room_id')
            ->whereBetween('stay_date', [$validated['date_from'], $validated['date_to']])
            ->whereIn('scraped_rooms.scraped_hotel_id', $validated['hotels'])
            ->whereIn('scraped_hotels.channel', $validated['channels'])
            ->whereIn('rooms.id', $validated['rooms'])
            ->where('scraped_room_price_logs.price', '>', 5)
            ->get();

        $dates = CarbonPeriod::create($startDate, $endDate, '1 day')->toArray();

        // Add pricing data to scraped rooms and group them into their various channels
        $groupedScrapedRooms = $scrapedRooms->map(function (ScrapedRoom $scrapedRoom) use ($dates, $pricingLogs) {
            $data = [
                'channel' => $scrapedRoom->scrapedHotel->channel,
                'scraped_hotel_name' => $scrapedRoom->scrapedHotel->name,
                'scraped_hotel_id' => $scrapedRoom->scrapedHotel->id,
                'minimum_stay' => $scrapedRoom->scrapedHotel->minimum_stay,
                'room_name' => $scrapedRoom->name,
                'capacity' => $scrapedRoom->capacity,
                'id' => $scrapedRoom->id,
                'mapped_room_id' => $scrapedRoom->roomMapping->room_id,
            ];

            $data['data'] = collect($dates)->mapWithKeys(function (Carbon $carbon) use ($scrapedRoom, $pricingLogs) {
                $price = $pricingLogs
                    ->first(fn ($log) => $carbon->isSameDay($log->stay_date) && $log->scraped_room_id == $scrapedRoom->id)
                    ?->price;

                return [$carbon->format('Y-m-d') => $price];
            })->all();

            return $data;
        })->mapToGroups(fn (array $scrapedRoom) => [$scrapedRoom['channel'] => $scrapedRoom]);

        $data = [];
        foreach ($channels as $channelKey => $channel) {
            $channel['id'] = $channelKey;
            $channel['dates'] = collect($dates)->map->format('Y-m-d');

            $scrapedRooms = $groupedScrapedRooms->get($channelKey) ?? collect();

            $strategies = $revenueStrategies->get($channelKey) ?? collect();

            $moderateApproach = $strategies->first(fn ($strategy) => $strategy->approach == RevenueStrategyApproach::Moderate);
            $aggressiveApproach = $strategies->first(fn ($strategy) => $strategy->approach == RevenueStrategyApproach::Aggresive);

            $scrapedRoomsGroupedByRoomId = $scrapedRooms->mapToGroups(fn (array $scrapedRoom) => [$scrapedRoom['mapped_room_id'] => $scrapedRoom]);

            // get rooms mapped to scraped rooms in this channel
            $channel['data'] = $rooms->reduce(function ($rooms, Room $room) use ($scrapedRoomsGroupedByRoomId, $moderateApproach, $aggressiveApproach) {
                $roomArr = $room->toArray();

                $data = $scrapedRoomsGroupedByRoomId->get($room->id);
                if (is_null($data)) {
                    return $rooms;
                }

                [$min, $avg, $moderate, $aggressive] = $data->pluck('data')
                    ->reduce(fn ($data, $item) => $data->mergeRecursive($item), collect())
                    ->reduceSpread(function ($min, $avg, $moderate, $aggressive, $item) use ($moderateApproach, $aggressiveApproach) {
                        $filteredItems = array_filter(is_array($item) ? $item : [$item]);

                        $minimumValue = count($filteredItems) > 0 ? min($filteredItems) : null;
                        $averageValue = count($filteredItems) > 0 ? array_sum($filteredItems) / count($filteredItems) : null;

                        $moderate->push($averageValue !== null ? $moderateApproach?->calculateNewRate($averageValue) : null);
                        $aggressive->push($minimumValue !== null ? $aggressiveApproach?->calculateNewRate($minimumValue) : null);

                        $min->push($minimumValue);
                        $avg->push($averageValue);

                        return [$min, $avg, $moderate, $aggressive];
                    }, collect(), collect(), collect(), collect());

                $roomArr['data'] = $data->all();
                $roomArr['min'] = $min;
                $roomArr['avg'] = $avg;
                $roomArr['moderate'] = $moderate;
                $roomArr['aggressive'] = $aggressive;

                return $rooms->push($roomArr);
            }, collect());

            $data[] = $channel;
        }

        return view('frontend.business-intelligence.report.report', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $rooms = Room::query()->get(['id', 'room_name']);
        $channels = config('scraper.channels');
        $scrapedHotels = ScrapedHotel::query()->get();

        return view('frontend.business-intelligence.report.index', compact('rooms', 'channels', 'scrapedHotels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
