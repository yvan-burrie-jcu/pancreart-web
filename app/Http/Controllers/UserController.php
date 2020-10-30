<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            $user = Auth::user();
            $token = $user->createToken('temp')->accessToken;

            return response()->json([
                "name" => $user->{'name'},
                "token" => $token,
            ]);
        }

        return response('Invalid', 400);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response();
    }
}
