<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V2\UrlController;

// Route::prefix('v2')->group(function () {
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/shorten', [UrlController::class, 'shorten']);
Route::middleware('auth:sanctum')->get('/urls', [UrlController::class, 'listCount']);
// });


// Route::apiResource('posts', UrlController::class);