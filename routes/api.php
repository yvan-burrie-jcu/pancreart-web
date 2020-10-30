<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request)
{
    return $request->user();
});

Route::post('login', 'UserController@login');
Route::post('logout', 'UserController@logout');

Route::post('events/get', 'ApiController@getEvents');
Route::post('events/add', 'ApiController@addEvents');
