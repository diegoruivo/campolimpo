<?php

namespace CampoLimpo\Http\Controllers\Web;

use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class WebController extends Controller
{
    public function home()
    {
        return view('web.home');
    }
}
