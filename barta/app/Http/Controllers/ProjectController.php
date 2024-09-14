<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
