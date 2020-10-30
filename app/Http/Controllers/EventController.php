<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Http\Controllers\Controller;
use illuminate\Http\Request;
use database;

    /*
    |--------------------------------------------------------------------------
    | Event Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the creation of new events through laravel http requests
    | by doing so allows the database to store the gathered data through the application.
    |
    */

class EventController extends Controller {

    public function createEvent(Request $request) {
        $event = Event::create($request->all());

        return response()->json($event);

    }
}
