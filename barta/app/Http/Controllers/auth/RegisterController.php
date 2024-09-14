<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function register(Request $request)
    {
        // validate the form inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

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
