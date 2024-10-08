<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostServices
{
    public function createPost(PostRequest $request)
    {
        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'created_at' => now(),
        ]);
    }
}
