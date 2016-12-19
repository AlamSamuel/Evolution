<?php

namespace App\Http\Controllers;

use Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return view('auth/login');
        } else {
            return view('/home');
        }

    }
}
