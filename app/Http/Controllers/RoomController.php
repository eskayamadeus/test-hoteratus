<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Amenitys;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Helpers\AmenitiesHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $room_id;

    public function index()
    {
        $rooms = Room::all();
        $roomset = Room::all();

        return view('frontend.room_setup.room-setup', compact('rooms'));
        // return view('frontend.make', compact('roomset'));
    }

    public function test(Request $request)
    {
        dd($request);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function show($id)
    {
        try {
            $get_room_data = Room::findOrFail($id);

            // Retrieve all active amenities grouped by their type
            $active_amenities = DB::table('rooms')
                ->join('amenitys', 'rooms.id', '=', 'amenitys.room_id')
                ->select('amenitys.description', 'amenitys.amenity_type_id')
                ->where('rooms.id', $id)
                ->where('amenitys.status', 1)
                ->get()
                ->groupBy('amenity_type_id');

            // Define arrays to store active amenities based on their type
            $active_general_options = $active_amenities->get(1, []);
            $active_bed_types = $active_amenities->get(2, []);
            $active_room_compositions = $active_amenities->get(3, []);
            $active_views = $active_amenities->get(4, []);
            $active_air_conditioning = $active_amenities->get(5, []);
            $active_domestic_appliances = $active_amenities->get(6, []);
            $active_electronics = $active_amenities->get(7, []);

            // Retrieve all available options
            $general_options = AmenitiesHelper::getGeneralOptions();
            $bed_types = AmenitiesHelper::getBedTypes();
            $room_view = AmenitiesHelper::getRoomView();
            $room_composition = AmenitiesHelper::getRoomComposition();
            $electronics = AmenitiesHelper::getElectronics();
            $air_conditioning = AmenitiesHelper::getAirConditioning();
            $domestic_appliances = AmenitiesHelper::getDomesticAppliances();

            return view('frontend.room_setup.show-room', compact(
                'get_room_data',
                'general_options',
                'bed_types',
                'room_view',
                'room_composition',
                'electronics',
                'air_conditioning',
                'domestic_appliances',
                'active_general_options',
                'active_bed_types',
                'active_room_compositions',
                'active_views',
                'active_air_conditioning',
                'active_domestic_appliances',
                'active_electronics'
            ));
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.' );
        }
    }




    // public function show($id)
    // {
    //     $get_room_data = Room::findOrFail($id);

    //     $general_options = AmenitiesHelper::getGeneralOptions();
    //     $bed_types = AmenitiesHelper::getBedTypes();
    //     $room_view = AmenitiesHelper::getRoomView();
    //     $room_composition = AmenitiesHelper::getRoomComposition();
    //     $electronics = AmenitiesHelper::getElectronics();
    //     $air_conditioning = AmenitiesHelper::getAirConditioning();
    //     $domestic_appliances = AmenitiesHelper::getDomesticAppliances();

    //     //get active general options for room
    //     $rooms_with_active_general_options = Room::with(['amenities' => function ($query) {
    //         $query->where('amenity_type_id', 1)
    //             ->where('status', 1);
    //     }])->get()->toArray();

    //     $active_general_options = [];

    //     foreach ($rooms_with_active_general_options as $room) {
    //     foreach ($room['amenities'] as $amenity) {
    //     $active_general_options[] = $amenity['description'];
    //     }
    //     }

    //     //get active bed types for room
    //     $rooms_with_active_bed_types = Room::with(['amenities' => function ($query) {
    //     $query->where('amenity_type_id', 2)
    //     ->where('status', 1);
    //     }])->get()->toArray();

    //     $active_bed_types = [];

    //     foreach ($rooms_with_active_bed_types as $room) {
    //     foreach ($room['amenities'] as $amenity) {
    //     $active_bed_types[] = $amenity['description'];
    //     }
    //     }

    //     //get active room compositions for room
    //     $rooms_with_active_room_compositions = Room::with(['amenities' => function ($query) {
    //     $query->where('amenity_type_id', 3)
    //     ->where('status', 1);
    //     }])->get()->toArray();

    //     $active_room_compositions = [];

    //     foreach ($rooms_with_active_room_compositions as $room) {
    //     foreach ($room['amenities'] as $amenity) {
    //     $active_room_compositions[] = $amenity['description'];
    //     }
    //     }

    //      //get active views for room
    //      $rooms_with_active_views = Room::with(['amenities' => function ($query) {
    //      $query->where('amenity_type_id', 4)
    //      ->where('status', 1);
    //      }])->get()->toArray();

    //      $active_views = [];

    //      foreach ($rooms_with_active_views as $room) {
    //      foreach ($room['amenities'] as $amenity) {
    //      $active_views[] = $amenity['description'];
    //      }
    //      }

    //      //get active air conditioning for room
    //      $rooms_with_active_air_conditioning = Room::with(['amenities' => function ($query) {
    //      $query->where('amenity_type_id', 5)
    //      ->where('status', 1);
    //      }])->get()->toArray();

    //      $active_air_conditioning = [];

    //      foreach ($rooms_with_active_air_conditioning as $room) {
    //      foreach ($room['amenities'] as $amenity) {
    //      $active_air_conditioning[] = $amenity['description'];
    //      }
    //      }


    //      //get active domestic appliances for room
    //      $rooms_with_active_domestic_appliances = Room::with(['amenities' => function ($query) {
    //      $query->where('amenity_type_id', 6)
    //      ->where('status', 1);
    //      }])->get()->toArray();

    //      $active_domestic_appliances = [];

    //      foreach ($rooms_with_active_domestic_appliances as $room) {
    //      foreach ($room['amenities'] as $amenity) {
    //      $active_domestic_appliances[] = $amenity['description'];
    //      }
    //      }

    //      //get active electronics for room
    //      $rooms_with_active_electronics = Room::with(['amenities' => function ($query) {
    //      $query->where('amenity_type_id', 7)
    //      ->where('status', 1);
    //      }])->get()->toArray();

    //      $active_electronics = [];

    //      foreach ($rooms_with_active_domestic_appliances as $room) {
    //      foreach ($room['amenities'] as $amenity) {
    //      $active_electronics[] = $amenity['description'];
    //      }
    //      }


    //     return view('frontend.room_setup.show-room', compact(
    //         'get_room_data',
    //         'general_options',
    //         'bed_types',
    //         'room_view',
    //         'room_composition',
    //         'electronics',
    //         'air_conditioning',
    //         'domestic_appliances',
    //         'active_general_options',
    //         'active_bed_types',
    //         'active_room_compositions',
    //         'active_views',
    //         'active_air_conditioning',
    //         'active_domestic_appliances',
    //         'active_electronics'
    //     ));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'room_name' => ['required', 'string', 'unique:' . Room::class],
            'room_quantity' => ['required', 'integer'],
            'maximum_occupancy' => ['required', 'integer'],
            'adult_capacity' => ['required', 'integer'],
            'children_capacity' => ['nullable', 'integer'],
            'status' => ['required', 'string', 'max:225'],
            'number_of_bathrooms' => ['required', 'integer'],
            'room_size' => ['required', 'integer'],
            'selling_period' => ['required', 'string', 'max:225'],
            'description' => ['nullable', 'string'],
        ]);

        $code = 'rm' . $this->generateRoomCode();

        $user = User::findOrFail( Auth::user()->id);

        //TODO: make rooms link to a property

        $property_id = $user->properties()->first();



        $room = Room::create([
            'code' => $code,
            'properties_id' => 1,
            'room_name' => $request->room_name,
            'room_quantity' => $request->room_quantity,
            'maximum_occupancy' => $request->maximum_occupancy,
            'adult_capacity' => $request->adult_capacity,
            'children_capacity' => $request->children_capacity,
            'status' => $request->status,
            'number_of_bathrooms' => $request->number_of_bathrooms,
            'room_size' => $request->room_size,
            'selling_period' => $request->selling_period,
            'description' => $request->description,
        ]);

        event(new  Registered($room));

        return redirect()->back()->with('toast_success', 'Room Created Successfully' );
        } catch(\Exception $e){
            // Handle the exception
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.'. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */

    public function add_room_amenity(Request $request)
    {
        // dd($request);
        $request->validate([
            'amenity_type' => ['required'],
            'room_id' => ['required'],
            'room_amenities' => ['required', 'array'],
            'room_amenities.*' => ['string']
        ]);

        // dd($request);

        foreach ($request->room_amenities as $key => $amenity_description) {
            $room_amenity = Amenitys::create([
                'room_id' => $request->room_id,
                'amenity_type_id' => $request->amenity_type,
                'description' => $amenity_description,
                'status' => 1,
            ]);
        }

        //    dd($room_amenity);

        event(new Registered($room_amenity));

        return redirect()->back()->with('toast_success', 'Room Amenity Added Successfully');
    }

    public function generateRoomCode()
    {
        do {
            $uid = random_int(100, 999);
        } while (Room::where('code', '=', $uid)->first());

        return $uid;
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
