<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowProfile extends Component
{
    public function render()
    {
        return view('livewire.show-profile');
    }
}


// public function profile($username)
//     {
//         $user = $this->userService->getUserProfile($username);

//         $posts = Post::where('user_id', $user->id)->latest('created_at')->get();

//         return view('profile', compact('user', 'posts'));
//     }