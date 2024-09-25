<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ProjectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function home()
    {
        return view('home');
    }
}
