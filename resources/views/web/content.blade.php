@extends('web.master.master')


@section('content')

    <div class="content-lg container">
        <div class="row margin-b-40" style="padding:40px;">

            <div class="col-md-9" style="margin:0 auto; float:none;">

                    <h1>{{ $content->title }}</h1>
                    <h2>{{ $content->subtitle }}</h2>
                    <p>{!! $content->description !!}</p>

                    <img class="full-width img-responsive wow fadeInUp" src="{{ url($content->images()->first()->url_cropped) }}"  data-wow-duration=".3" data-wow-delay=".2s">


                </div>
        </div>
    </div>

@endsection