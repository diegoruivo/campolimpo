<?php

namespace CampoLimpo\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('front.home');
    }
}
