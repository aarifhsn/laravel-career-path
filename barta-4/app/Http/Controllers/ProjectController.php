<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller;

class ProjectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function home()
    {
        //$posts = Post::with('user')->latest('created_at')->paginate(2);

        return view('home');
    }
}
