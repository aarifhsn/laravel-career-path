<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function home()
    {
        return view('home', [
            'bodyClass' => 'index-page'
        ]);
    }
    public function about()
    {
        return view('about', [
            'title' => 'About',
            'bodyClass' => 'about-page'
        ]);
    }

    public function workExperiences()
    {
        $experiences = json_decode(Storage::get('data/work_experiences.json'), true);
        $title = 'Work Experiences';
        $bodyClass = 'work-experiences-page';
        return view('work_experiences', compact('experiences', 'title', 'bodyClass'));
    }

    public function projects()
    {
        $projects = json_decode(Storage::get('data/projects.json'), true);
        $title = 'Projects';
        $bodyClass = 'projects-page';
        return view('projects', compact('projects', 'title', 'bodyClass'));
    }

    public function projectDetails($id)
    {
        $projects = json_decode(Storage::get('data/projects.json'), true);
        $project = collect($projects)->firstWhere('id', $id) ?? abort(404);
        $title = 'Project' . $project['id'];
        $bodyClass = 'project-details-page';
        return view('project_details', compact('project', 'title', 'bodyClass'));
    }
}
