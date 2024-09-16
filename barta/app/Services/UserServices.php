<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;

class UserServices
{

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
        return DB::table('users')->insert($userData);
    }

    public function getUserProfile()
    {
        return Auth::user();  // Get the currently logged-in user
    }

    public function updateUserProfile($request)
    {
        // prepare userdata to be updated
        $userData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'bio' => trim($request->input('bio')),
        ];

        // If password is provided, hash it and add to the userData
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        // Update the user's info
        DB::table('users')->where('id', Auth::id())->update($userData);

        return 'Profile updated successfully';
    }

}