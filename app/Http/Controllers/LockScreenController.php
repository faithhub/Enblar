<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Cookie;
//use http\Cookie;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LockScreenController extends Controller
{
    public function startCookie(Request $request)
    {
        $get = Auth::user()->username;
        $time = 60;
        Cookie::make('username', 'olamide', $time);
//        $response = new Response('Hello guys');
//        $response->withCookie('username', 'olamide', $time);

        return $request->cookie('username');
    }
}
