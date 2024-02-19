<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function right_side_nav(){

        $user = User::findOrFail(Auth::user()->id);

        $all_properties = $user->properties();

        // dd($all_properties);

        return view('layouts.right-side-nav', compact('all_properties'));
    }

    public function top_header(){
        $all_properties = Property::all();
        return view('layouts.top-header', compact(''));
    }

}
