<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        return view('auth.auth-login');
    }

    public function super_admin()
    {
        return view('user-management.auth-register');
    }

    public function calendar()
    {

        return view('frontend.calendar');
    }
}
