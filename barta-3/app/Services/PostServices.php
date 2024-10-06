<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostServices
{
    public function createPost(PostRequest $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'created_at' => now(),
        ]);
    }
}
