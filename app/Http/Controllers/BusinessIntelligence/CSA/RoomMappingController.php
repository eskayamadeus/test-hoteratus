<?php

namespace App\Http\Controllers\BusinessIntelligence\CSA;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\ScrapedHotel;
use App\Models\ScrapedRoom;
use App\Models\ScrapedRoomMapping;
use App\Scraper\Scraper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use InvalidArgumentException;

class RoomMappingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $platform)
    {
        try {
            Scraper::driver($platform);

            $scrapedRooms = ScrapedRoom::query()
                ->withWhereHas('scrapedHotel', fn ($query) => $query->where('channel', $platform))
                ->orderBy('scraped_hotel_id')
                ->get();

            $roomsIds = Room::query()->get()->modelKeys();

            [$rules, $attributes] = $scrapedRooms->reduceSpread(function (array $rules, array $attributes, ScrapedRoom $scrapedRoom) use ($roomsIds) {
                $rules["mapping.{$scrapedRoom->id}"] = ['nullable', Rule::in($roomsIds)];
                $attributes["mapping.{$scrapedRoom->id}"] = "mapping for {$scrapedRoom->name}";

                return [$rules, $attributes];
            }, [], []);

            $validated = $request->validate([
                'mapping' => ['nullable', 'array', 'max:' . $scrapedRooms->count()],
                ...$rules,
            ], [], $attributes);

            collect($validated['mapping'] ?? [])->filter()->each(function ($localRoomId, $scrapedRoomId) use ($scrapedRooms) {
                $scrapedRoom = $scrapedRooms->firstWhere('id', $scrapedRoomId);

                if (!$scrapedRoom) {
                    return;
                }

                ScrapedRoomMapping::query()->updateOrCreate([
                    'scraped_room_id' => $scrapedRoom->id,
                ], [
                    'room_id' => $localRoomId,
                ]);
            });

            return redirect()->route('csa.room-mapping.show', $platform)
                ->with([
                    'message' => "Room mapping for $platform saved successfully",
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

            $scrapedHotels = ScrapedHotel::query()
                ->where('channel', $platform)
                ->with(['scrapedRooms' => ['roomMapping']])
                ->orderBy('id')
                ->get();

            // Potentially restrict query to users hotel
            $rooms = Room::query()->get();

            $config = config("scraper.channels.{$platform}");

            return view('frontend.business-intelligence.mapping.index', compact('config', 'platform', 'scrapedHotels', 'rooms'));
        } catch (InvalidArgumentException) {
            abort(404, 'Scraper Channel not available.');
        } catch (Exception $exception) {
            report($exception);
            abort(500, 'Something went wrong and we are fixing it.');
        }
    }
}
