<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'home'])->name('home');

Route::get('/work-experiences', [ProjectController::class, 'workExperiences'])->name('work-experiences');

Route::get('/projects', [ProjectController::class, 'projects'])->name('projects');

Route::get('/about', [ProjectController::class, 'about'])->name('about');

Route::get('/projects/project-{id}', [ProjectController::class, 'projectDetails'])->name('project-details');
