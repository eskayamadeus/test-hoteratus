<?php

namespace App\Http\Controllers;

use App\Models\CreateReservation;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = CreateReservation::all();
        return view("frontend.reservation-list", compact(['reservations']));
    }

    public function create_reservations()
    {
        $reservations = CreateReservation::all();
        return view("frontend.create-reservation");
    }

    public function make_reservation()
    {
        // try {
        $rooms = Room::all();
        // $search=request()->input('search');
        $request = request()->all();
        // dd($request);
        // $checkin = $request['checkin'];
        // $checkout = $request['checkout'];
        // $adults = $request['adults'];
        // $children = $request['children'];
        // $rooms = $request['rooms'];

        // $data = [  $children, $rooms];

        // $rooms = Room::where('adult_capacity', 1)
        //     ->orWhere('child_capacity', 1)
        //     ->orWhere('quantity', 2);

        return view('frontend.make-reservations', compact('rooms'));

    // }
    //     catch (\Exception $e) {
    //     // Handle other exceptions if needed
    //     return redirect()->back()->with('toast_error', 'An error occurred. Please try again...: '.$e);
    //     }

    }

    public function search_reservation()
    {
        try{
        // $search=request()->input('search');
        $request = request()->all();
        // dd($request);
        $checkin = $request['checkin'];
        $checkout = $request['checkout'];
        $adults = $request['adults'];
        $children = $request['children'];
        $rooms = $request['rooms'];

        $data = [$checkin, $checkout, $adults, $children, $rooms];

        $rooms = Room::where('adult_capacity', $adults)
            ->orWhere('child_capacity', $children)
            ->orWhere('quantity', $rooms);

        return view('frontend.make-reservations', compact('rooms'));
        }
        catch (\Exception $e) {
        // Handle other exceptions if needed
        return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }

    public function tax_setup()
    {
        return view('frontend.taxes-setup');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
