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

    public function course()
    {
        $head = $this->seo->render(
            env('APP_NAME') . 'Sobre os Cursos',
            'Descriçao de sobre os cursos' . env('APP_NAME'),
            route('course'),
            asset('images/img_bg_1.jpg')
        );

        return view('front.course',[
            'head' => $head
        ]);
    }

    public function blog()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $head = $this->seo->render(
            env('APP_NAME') . 'Blog',
            'Descriçao de Blog' . env('APP_NAME'),
            url('/blog'),
            asset('images/img_bg_1.jpg')
        );
        return view('front.blog',[
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function article($uri)
    {
        $post = Post::where('uri', $uri)->first();

        $head = $this->seo->render(
            env('APP_NAME') . '-' . $post->title,
            $post->subtitle,
            route('article', $post->uri),
            \Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 1200, 628))
        );

        return view('front.article',[
            'head' => $head,
            'post' => $post
        ]);
    }


    public function contact()
    {
        $head = $this->seo->render(
            env('APP_NAME') . 'Contato',
            'Descriçao Contato' . env('APP_NAME'),
            route('contact'),
            asset('images/img_bg_1.jpg')
        );

        return view('front.contact',[
            'head' => $head
        ]);
    }
}
