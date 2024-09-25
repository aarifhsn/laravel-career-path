<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserServices;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function profile()
    {
        $user = $this->userService->getUserProfile();

        return view('profile', compact('user'));
    }

    public function showEditProfileForm()
    {
        $user = $this->userService->getUserProfile();

        return view('edit-profile', compact('user'));
    }

    public function updateProfile(UserRequest $request)
    {

        $message = $this->userService->updateUserProfile($request);

        return redirect()->back()->with('success', $message);
    }
}
