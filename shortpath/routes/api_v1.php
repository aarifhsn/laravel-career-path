<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\UrlController;

// Route::prefix('v1')->group(function () {
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/shorten', [UrlController::class, 'shorten']);
Route::middleware('auth:sanctum')->get('/urls', [UrlController::class, 'list']);
// });

// use App\Http\Controllers\Api\V1\UrlController;

// Route::apiResource('posts', UrlController::class);
