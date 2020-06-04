@extends('web.master.master')

@section('content')

    <div class="content-lg container">
        <div class="row margin-b-40" style="padding:40px;">

            <div class="col-sm-12">

                <!-- Blog -->
                <div id="blog">
                    <div class="content-lg container">
                        <div class="row margin-b-40">
                            <div class="col-sm-6">
                                <h2>Blog</h2>
                            </div>
                        </div>
                        <!--// end row -->

                        <div class="row">

                            @foreach($posts as $post)
                                <a href="{{ route('web.article', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
                                <div class="col-sm-4 sm-margin-b-50">
                                    <div class="margin-b-20">
                                        <img class="full-width img-responsive" src="{{ url($post->images()->first()->url_cropped) }}">
                                    </div>
                                    <span class="text-uppercase">{{ $post->category()->first()->title }}</span>
                                    <h4>{{ $post->title }}</h4>
                                    <p>{!! limitText($post->description, $limit = 240) !!}</p>
                                    <h6>Por {{ $post->author()->first()->name }} em {{ date('d/m/Y', strtotime($post->created_at)) }}</h6>
                                    <a class="link" href="{{ route('web.article', ['slug' => $post->slug]) }}">Leia Mais</a>
                                </div>
                                </a>
                                @if(($loop->index + 1) % 3 === 0)
                                    <div style="width: 100%; float:left; height:40px;"></div>
                                @endif
                            @endforeach



                        </div>
                        <!--// end row -->
                    </div>
                </div>
                <!-- End Últimas Publicações -->

            </div>
        </div>
    </div>

@endsection