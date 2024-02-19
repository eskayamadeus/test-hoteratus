<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $get_channel = Channel::all();

        return view('frontend.channel-list', compact(['get_channel']));

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
        try {
            $request->validate([
                'c_name' => ['required', 'string', 'max:255'],
                'c_logo' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:5048'],
                'live' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:255'],

            ]);

            $image_ext1 = $request->c_logo->getClientOriginalExtension();
            //  $image_ext2 = $request->hotel_image_1->getClientOriginalExtension();
            //  $image_ext3 = $request->hotel_image_2->getClientOriginalExtension();
            //  $image_ext4 = $request->hotel_image_3->getClientOriginalExtension();
            //  $image_ext5 = $request->hotel_image_4->getClientOriginalExtension();
            //  //get current date
            $date = date('Y-m-d');
            $c_icon = $date . '_' . rand(0, 999) . '.' . $image_ext1;
            //  $hotel_image_1 = $date. '_'. rand(0,999). '.' . $image_ext2;
            //  $hotel_image_2 = $date. '_'. rand(0,999). '.' . $image_ext3;
            //  $hotel_image_3 = $date. '_'. rand(0,999). '.' . $image_ext4;
            //  $hotel_image_4 = $date. '_'. rand(0,999). '.' . $image_ext5;
            //save image to public/images folder
            $request->c_logo->move(public_path('images/channel_icon'), $c_icon);

            $insert_data = Channel::create([
                'c_name' => $request->c_name,
                'c_logo' => $c_icon,
                'live' => $request->live,
                'status' => $request->status,

            ]);

            event(new Registered($insert_data));

            return redirect()->route('channel-list')->with('toast_success', 'Channel Created Successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->with('toast_error', $e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
