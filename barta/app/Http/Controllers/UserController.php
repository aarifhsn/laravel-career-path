<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the profile of the currently authenticated user.
     */
    public function profile()
    {
        $user = Auth::user();  // Get the currently logged-in user

        return view('profile', compact('user'));
    }

    public function showEditProfileForm()
    {
        $user = Auth::user();  // Get the currently logged-in user
        return view('edit-profile', compact('user'));
    }

    /**
     * Update the profile of the currently authenticated user.
     */

    public function updateProfile(Request $request)
    {
        //validate the form input
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(), // Add the current user's ID to the unique rule
            'password' => 'nullable|string|min:6',
            'bio' => 'string|max:255',
        ]);

        // prepare userdata to be updated
        $userData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'bio' => $request->input('bio'),
        ];

        // If password is provided, hash it and add to the userData
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        // Update the user's info
        DB::table('users')->where('id', Auth::id())->update($userData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}
