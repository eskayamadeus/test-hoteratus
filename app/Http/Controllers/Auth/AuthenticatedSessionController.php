<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.auth-login');
    }

    /**
     * Handle an incoming authentication request.
     */



    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            $super_admin = 1;
            $sub_admin = 2;

            if(Auth::check()){
                $role = Auth::user()->role;
                if($role == $super_admin){

                    return redirect()->intended(RouteServiceProvider::HOME)->with('toast_success', 'Login Successful');
                }else{

                    return back()->with('toast_success', 'Account Created, Login');
                }
            }

        } catch (ValidationException $e) {
            return redirect()->back()->with('toast_error',$e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            Log::error($e->getMessage());
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again. ');
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('toast_success', 'Logout Successful');
    }
}
