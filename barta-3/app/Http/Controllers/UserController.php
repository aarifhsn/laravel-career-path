<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function profile($username)
    {
        $user = $this->userService->getUserProfile($username);

        $posts = Post::where('user_id', $user->id)->latest('created_at')->get();

        return view('profile', compact('user', 'posts'));
    }

    public function showEditProfileForm()
    {
        $user = $this->userService->getAuthUserProfile();

        return view('edit-profile', compact('user'));
    }

    public function updateProfile(UserRequest $request)
    {

        $message = $this->userService->updateUserProfile($request);

        return redirect()->back()->with('success', $message);
    }

    public function search(Request $request)
    {

        $search = $request->input('search');

        $users = User::where('username', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhereRaw("(first_name || ' ' || last_name) LIKE ?", ["%{$search}%"])
            ->pluck('id');

        // Search posts by content or user ID
        $posts = Post::whereIn('user_id', $users)
            ->orWhere('content', 'like', '%'.$search.'%')
            ->with('user') // Eager load user data
            ->get();

        return view('search', compact('search', 'posts'));
    }
}
