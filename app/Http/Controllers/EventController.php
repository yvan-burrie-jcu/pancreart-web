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

        /**returns a response as json*/

        return response()->json($event);

    }

    public function updateEvent(Request $request, $id) {
        /**TODO update database by getting requests with
         *userId
         *time
         *amount
         *eventType -- TYPE_GLUCOSE_READING = 0 OR TYPE_INSULIN_INJECTION = 1
         *
         *  to determine user() ---> return $this->belongsTo('App\User', 'user_id', 'id');
         **/
     }

     public function index() {
        /**TODO Get response from DB + JSON PARSER CLASS
        $event = Event::all();

        return response()->json($response);
     }
}
