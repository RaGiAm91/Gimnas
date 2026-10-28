<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth\Illuminate\Auth\Middleware;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        if (Auth::check()) {
            return view('home');
        } else {
            return view('bienvenido');
        }   
    }


}
