<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }

    public function workExperiences()
    {
        $experiences = json_decode(Storage::get('data/work_experiences.json'), true);
        return view('work_experiences', compact('experiences'));
    }

    public function projects()
    {
        $projects = json_decode(Storage::get('data/projects.json'), true);
        return view('projects', compact('projects'));
    }

    public function projectDetails($id)
    {
        $projects = json_decode(Storage::get('data/projects.json'), true);
        $project = array_filter($projects, fn($p) => $p['id'] == $id);
        $project = !empty($project) ? array_shift($project) : abort(404);
        return view('project_details', compact('project'));
    }
}
