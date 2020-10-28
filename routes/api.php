<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('events/get', [EventController::class, 'getEvents']);
Route::post('events/add', [EventController::class, 'addEvents']);
