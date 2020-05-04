<?php

namespace CampoLimpo\Http\Controllers\Web;

use CampoLimpo\Page;
use CampoLimpo\PageContent;
use CampoLimpo\Partner;
use CampoLimpo\Post;
use CampoLimpo\Service;
use CampoLimpo\ServiceCategory;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class WebController extends Controller
{
    public function home()
    {
        $pages = Page::orderBy('position', 'ASC')->get();

        $pageHome = Page::where('slug', 'home')->first();
        $homes = PageContent::where('page', $pageHome->id)->orderBy('position', 'ASC')->get();

        $pageSobre = Page::where('slug', 'sobre')->first();
        $sobres = PageContent::where('page', $pageSobre->id)->orderBy('position', 'ASC')->get();

        $services = Service::where('cover', '1')->orderBy('position', 'ASC')->get();

        $posts = Post::orderBy('id', 'DESC')->limit(3)->get();

        $pageContato= Page::where('slug', 'contato')->first();
        $contatos = PageContent::where('page', $pageContato->id)->orderBy('position', 'ASC')->get();

        $partners = Partner::orderBy('position', 'ASC')->get();

        $system = System::where('id', 1)->first();

        return view('web.home', [
            'pages' => $pages,
            'homes' => $homes,
            'sobres' => $sobres,
            'services' => $services,
            'posts' => $posts,
            'contatos' => $contatos,
            'partners' => $partners,
            'system' => $system
        ]);

    }


    public function content($uri)
    {
        $content = PageContent::where('slug', $uri)->first();
        $pages = Page::orderBy('position', 'ASC')->get();
        $system = System::where('id', 1)->first();

        return view('web.content', [
            'content' => $content,
            'pages' => $pages,
            'system' => $system
        ]);
    }

    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        $pages = Page::orderBy('position', 'ASC')->get();
        $system = System::where('id', 1)->first();

        return view('web.blog', [
            'posts' => $posts,
            'pages' => $pages,
            'system' => $system
        ]);
    }

    public function article($uri)
    {
        $article = Post::where('slug', $uri)->first();
        $content = PageContent::where('slug', $uri)->first();
        $pages = Page::orderBy('position', 'ASC')->get();
        $system = System::where('id', 1)->first();

        return view('web.article', [
            'article' => $article,
            'pages' => $pages,
            'system' => $system
        ]);
    }


    public function service($uri)
    {
        $service= Service::where('slug', $uri)->first();
        $pages = Page::orderBy('position', 'ASC')->get();
        $system = System::where('id', 1)->first();

        return view('web.service', [
            'service' => $service,
            'pages' => $pages,
            'system' => $system
        ]);
    }

}