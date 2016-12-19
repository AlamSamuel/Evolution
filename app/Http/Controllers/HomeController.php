<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       switch (Auth::user()->rol) {
            case '1':
                  return view('home');
             break;
            case '2':
                return view('home_coor');
                break;
            case '3':
                 return view('home_profesor');
                 break;
            case '4':
                 return view('home_estudiantes');
             break;
            default:
                 return view('welcome');
                 break;
             }
    }
}
