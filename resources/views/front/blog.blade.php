@extends('front.master.master')

@section('content')

    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Blog</h1>
                            <h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-blog">
        <div class="container">
            <div class="row">

                @isset($posts)

                    @foreach($posts as $post)

                        <div class="col-lg-4 col-md-4">
                            <div class="fh5co-blog animate-box">
                                <a href="{{ route('article', $post->uri) }}">
                                    <img class="img-responsive" src="{{ \Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 800, 450)) }}" alt="">
                                </a>
                                <div class="blog-text">
                                    <h3><a href="{{ route('article', $post->uri) }}">{{ $post->title }}</a></h3>
                                    <span class="posted_on">{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</span>
                                    <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                    <p>{{ $post->subtitle }}</p>
                                    <a href="{{ route('article', $post->uri) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                    @if(($loop->index + 1) % 3 === 0)
                        <div style="width: 100%; float:left; height:1px;"></div>
                    @endif

                    @endforeach

                @endisset

            </div>
        </div>
    </div>

    <div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Lets Get Started</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <p><a href="#" class="btn btn-default btn-lg">Create A Free Course</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection