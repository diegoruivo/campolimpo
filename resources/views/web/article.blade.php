@extends('web.master.master')

@section('content')

    <div class="content-lg container">
        <div class="row justify-content-md-center">

        <div class="row margin-b-40" style="padding:40px;">

            <div class="container">

            <div class="col-md-9" style="margin:0 auto; float:none;">

                <span class="text-uppercase">{{ $article->category()->first()->title }}</span>
                <h1>{{ $article->title }}</h1>
                <h6>Publicado por {{ $article->author()->first()->name }} em {{ date('d/m/Y', strtotime($article->created_at)) }}</h6>
                <h2>{{ $article->subtitle }}</h2>
                <p>{!! $article->description !!}</p>

                @foreach($article->images()->get() as $image)
                    <img class="full-width img-responsive wow fadeInUp" src="{{ url('storage/' . $image->path) }}"  data-wow-duration=".3" data-wow-delay=".2s" style="margin-top:20px; margin-bottom:30px;">
                @endforeach

            </div>

            </div>
        </div>
    </div>

@endsection