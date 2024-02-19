<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.auth-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'role' => ['integer'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            // dd($request);

            //user code
            $prefix = 'usr';
            $user_code = $prefix . $this->generateUserCode();
            //assign user
            $super_admin = 1;
            $sub_admin = 2;
            if ($request->role == $super_admin) {
                $user = User::create([
                    'code' => $user_code,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'role' => $super_admin,
                ]);

                event(new Registered($user));

                Auth::login($user);


                return redirect()->route('dashboard')->with('toast_success', 'Login Successful');
            } else {

                $user = User::create([
                    'code' => $user_code,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'role' => $sub_admin,
                ]);
                event(new Registered($user));

                // Auth::login($user);

                return back()->with('toast_success', 'Account Created, Login');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('toast_error', $e->validator->getMessageBag())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->back()->with('toast_error', 'An error occurred. Please try again.');
        }
    }


    public function generateUserCode()
    {
        do {
            $uid = random_int(100, 999);
        } while (User::where('code', '=', $uid)->first());

        return $uid;
    }


}
