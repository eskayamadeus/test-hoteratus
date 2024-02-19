<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\MyChannel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class MyChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $channel = Channel::all();
        $get_mychannel = MyChannel::all();

        return view('frontend.my-channel', compact(['get_mychannel', 'channel']));
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
            'c_name' => ['required', 'string', 'max:255'],
            'h_id' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:5048'],
            'close_room' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],

        ]);

        $insert_data = MyChannel::create([
            'c_name' => $request->c_name,
            'h_id' => $request->h_id,
            'close_' => $request->live,
            'status' => $request->status,

        ]);

        event(new Registered($insert_data));

        return redirect()->route('channel-list');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MyChannel $myChannel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyChannel $myChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyChannel $myChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyChannel $myChannel)
    {
        //
    }
}
