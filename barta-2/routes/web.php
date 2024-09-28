<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'home'])->name('home');

// Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/edit-profile', [UserController::class, 'showEditProfileForm'])->name('edit-profile')->middleware('auth');
Route::put('/edit-profile', [UserController::class, 'updateProfile']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/@{username}', [UserController::class, 'profile'])->name('profile');
Route::post('/', [PostController::class, 'store'])->middleware('auth')->name('posts.store');

Route::get('/@{username}/question/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/@{username}/question/{id}/edit', [PostController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::put('/@{username}/question/{id}', [PostController::class, 'update'])->middleware('auth')->name('post.update');

Route::delete('/question/{id}', [PostController::class, 'destroy'])->middleware('auth')->name('post.destroy');