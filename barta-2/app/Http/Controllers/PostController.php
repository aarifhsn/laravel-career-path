<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'content' => 'required |max:255',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'content' => $validatedData['content'],
            'created_at' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($username, string $postId)
    {
        $user = User::where('username', $username)->first();

        $post = Post::where('user_id', $user->id)->where('id', $postId)->firstOrFail();

        return view('show', compact('user', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($username, string $id)
    {
        $user = User::where('username', $username)->firstOrFail();
        $post = Post::where('id', $id)->first();

        // Check if post exists
        if (!$post) {
            return redirect()->route('profile', ['username' => $username])->with('error', 'Post not found.');
        }

        return view('edit-post', compact('user', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username, string $id)
    {

        $validatedData = $request->validate([
            'content' => 'required |max:255',
        ]);

        $post = Post::where('id', $id)->first();
        if (!$post) {
            return redirect()->route('profile', ['username' => $username])->with('error', 'Post not found.');
        }

        // Check if authenticated user is the owner of the post
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('profile', ['username' => $username])->with('error', 'You are not authorized to update this post.');
        }

        // Update post content
        $post->update([
            'content' => $validatedData['content'],
            'updated_at' => now(),
        ]);

        return redirect()->route('profile', ['username' => $username])->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::findOrFail($id);
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this post!');
        }
        $post->delete();

        return redirect(route('profile', ['username' => Auth::user()->username]))->with('success', 'Post deleted successfully!');

    }
}
