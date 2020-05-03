<?php

namespace Campolimpo\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {

        $head = $this->seo->render(
            env('APP_NAME') . 'Home',
            'Descriçao de' . env('APP_NAME'),
            url('/'),
            asset('images/img_bg_1.jpg')
        );
        return view('front.home',[
            'head' => $head,
        ]);
    }

}
