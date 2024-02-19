<?php

namespace App\Http\Controllers;

use App\Models\CreateReservation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class CreateReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $reservations = CreateReservation::all();
        return view("frontend.create-reservation");
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
        $request->validate([
        'f_name'=>['required','string','max:255'],
        'l_name'=>['required','string','max:255'],
        'phone_number'=>['required','string','max:255'],
        'email'=>['required','string','max:255'],
        'send_mail'=>['nullable','string','max:255'],
        'g_fname'=>['nullable','string','max:255'],
        'g_lname'=>['nullable','string','max:255'],
        'address'=>['required','string','max:255'],
        'city'=>['required','string','max:255'],
        'state'=>['required','string','max:255'],
        'country'=>['required','string','max:255'],
        'language'=>['required','string','max:255'],
        'arrival'=>['nullable','string','max:255'],
        'payment_method'=>['required','string','max:255'],
        'cardholder_name'=>['nullable','string','max:255'],
        'card_type'=>['nullable','string','max:255'],
        'date'=>['nullable','string','max:255'],
        'cvc_code'=>['nullable','string','max:255']


        ]);

        $insert_data= CreateReservation::create([
            'f_name'=>$request->f_name,
        'l_name'=>$request->l_name,
        'phone_number'=>$request->phone_number,
        'email'=>$request->email,
        'send_mail'=>$request->send_mail,
        'g_fname'=>$request->g_fname,
        'g_lname'=>$request->g_lname,
        'address'=>$request->address,
        'city'=>$request->city,
        'state'=>$request->state,
        'country'=>$request->country,
        'language'=>$request->language,
        'arrival'=>$request->arrival,
        'payment_method'=>$request->payment_method,
        'cardholder_name'=>$request->cardholder_name,
        'card_type'=>$request->card_type,
        'date'=>$request->date,
        'cvc_code'=>$request->cvc_code


        ]);

        event(new Registered($insert_data));
        return redirect()->route('add-reservations')->with('toast_success','Reservation Successfully Created');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CreateReservation $createReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreateReservation $createReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CreateReservation $createReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreateReservation $createReservation)
    {
        //
    }
}
