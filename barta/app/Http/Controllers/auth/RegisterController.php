<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    /**
     * Handle registration request.
     */
    public function register(RegisterRequest $request)
    {
        // Split full name into first name and last name
        $fullName = explode(' ', $request->input('full_name'), 2);
        $firstName = $fullName[0];
        $lastName = $fullName[1] ?? '';

        // prepare user data
        $userData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        // insert new user into the users table
        DB::table('users')->insert($userData);

        // log the user in after registation
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('profile')->with('success', 'You have successfully registered and logged in!');
        }
        // redirect back to the home page
        return redirect()->route('register')->with('errors', 'Registration Failed, please try again.');
    }

}
