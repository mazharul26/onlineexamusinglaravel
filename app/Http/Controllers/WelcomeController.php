<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }
        return view('welcome');
    }
}
