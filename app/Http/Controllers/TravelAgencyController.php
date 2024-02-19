<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\TravelAgency;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class TravelAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $get_all_travel_agency = Category::all();
        $get_all_subcategory = SubCategory::all();
        $get_all_agency = TravelAgency::all();

        return view('frontend.travel-agency', compact(['get_all_travel_agency', 'get_all_subcategory', 'get_all_agency']));
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
    public function create_travel_agency(Request $request)
    {
        $request->validate([
            'tname' => ['required', 'string', 'max:255'],
            'categories' => ['required', 'string', 'max:255'],
            'subcategories' => ['required', 'string', 'max:255'],
            'dchannel' => ['required', 'string', 'max:255'],
            'commission' => ['required', 'string', 'max:255'],
            'value' => ['required', 'integer', 'max:255'],
            'description' => ['required', 'string', 'max:255'],

        ]);

        $insert_data = TravelAgency::create([
            'tname' => $request->tname,
            'categories' => $request->categories,
            'subcategories' => $request->subcategories,
            'dchannel' => $request->dchannel,
            'commission' => $request->commission,
            'value' => $request->value,
            'description' => $request->description,
        ]);

        event(new Registered($insert_data));

        return redirect()->route('travel-agency');
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelAgency $travelAgency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelAgency $travelAgency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TravelAgency $travelAgency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelAgency $travelAgency)
    {
        //
    }
}
