<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UrlController as UrlControllerV1;
use App\Http\Controllers\Api\V2\UrlController as UrlControllerV2;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{shortCode}', function ($shortCode) {

    $urlV1 = (new UrlControllerV1())->redirect($shortCode);
    if ($urlV1) {
        return $urlV1;
    }

    $urlV2 = (new UrlControllerV2())->redirect($shortCode);
    if ($urlV2) {
        return $urlV2;
    }

    return abort(404); // Return a 404 if not found in either version
});



