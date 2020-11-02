<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as UserModel;
use App\Event as EventModel;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getEvents(Request $request)
    {
        if (!is_integer($userId = $eventsBuffer->{'userId'} ?? null))
        {
            return response('', 400);
        }
        /** @var UserModel $user */
        $user = UserModel::where('id', $userId)->first();

        if (!is_integer($startTime = $request->{'startTime'} ?? null))
        {
            return response('', 400);
        }
        if (!is_integer($endTime = $request->{'endTime'} ?? null))
        {
            return response('', 400);
        }

        $events = $user->events()
            ->where('time', '>=', $startTime)
            ->where('time', '<=', $endTime)
            ->get();

        return response()->json($events->toJson(), 202);
    }

    public function addEvents(Request $request)
    {
        if (!is_integer($userId = $eventsBuffer->{'userId'} ?? null))
        {
            return response('', 400);
        }
        /** @var UserModel $user */
        $user = UserModel::where('id', $userId)->first();

        if (!is_array($eventsBuffer = $request->{'events'} ?? null))
        {
            return response('', 400);
        }
        foreach ($eventsBuffer as $eventBuffer)
        {
            if ($eventBuffer instanceof \stdClass)
            {
                if (is_integer($eventBuffer->{'time'} ?? null))
                {
                    /** @var EventModel $event */
                    $event = $user->events()->where('time', $eventBuffer->{'time'})->first();
                    if (null === $event)
                    {
                        $event = new EventModel;
                        $event->{'user_id'} = $userId;
                        $event->{'time'} = $eventBuffer->{'time'};
                        $event->save();
                    }
                }
            }
        }
        return response('', 202);
    }
}
