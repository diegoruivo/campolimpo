@extends('web.master.master')


@section('content')

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <div class="container">
            <ol class="carousel-indicators">
                @foreach($homes as $home)
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $home->id }}"></li>
                @endforeach
            </ol>
        </div>

        <div class="carousel-inner" role="listbox">

            @foreach($homes as $home)
                <div class="item">
                    <img class="img-responsive" src="{{ url('storage/' . $home->images()->first()->path) }}">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h2 class="carousel-title">{{ $home->title }}</h2>
                                <p class="color-white">{{ $home->subtitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!--========== SLIDER ==========-->

    <!--========== PAGE LAYOUT ==========-->
    <!-- Sobre -->
    <div id="sobre">
        <div class="content-lg container">
            <!-- Masonry Grid -->
            <div class="masonry-grid row">
                <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>

                @foreach($sobres as $sobre)
                    <a href="{{ route('web.content', ['slug' => $sobre->slug]) }}" title="{{ $sobre->title }}">
                        <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 sm-margin-b-30"
                             style="margin-bottom:30px;">
                            <div class="margin-b-20">
                                <h2>{{ $sobre->title }}</h2>
                                <h4>{{ $sobre->subtitle }}</h4>
                                <p>{!! $sobre->description  !!}</p>
                            </div>
                            <img class="full-width img-responsive wow fadeInUp"
                                 src="{{ url('storage/' . $sobre->images()->first()->path) }}" data-wow-duration=".3"
                                 data-wow-delay=".2s">
                            <p class="wow fadeInUp" style="margin-top:20px;"><a class="link"
                                                                                href="{{ route('web.content', ['slug' => $sobre->slug]) }}">Leia
                                    Mais</a></p>
                        </div>
                    </a>
                @endforeach

            </div>
            <!-- End Masonry Grid -->
        </div>

    </div>

    </div>
    <!-- End Sobre -->




{{--    <!-- Portfólio -->--}}
{{--    <div class="bg-color-sky-light">--}}
{{--        <div id="portfolio">--}}
{{--            <div class="section-seperator">--}}
{{--                <div class="content-md container">--}}

{{--                    <div class="row margin-b-40">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <h2>Portfolio</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--// end row -->--}}

{{--                    <!-- Masonry Grid -->--}}
{{--                    <div class="masonry-grid row">--}}


{{--                        @foreach($portfolios as $portfolio)--}}
{{--                            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 md-margin-b-30">--}}
{{--                                <!-- Work -->--}}
{{--                                <div class="work work-popup-trigger">--}}
{{--                                    <div class="work-overlay">--}}
{{--                                        <img class="full-width img-responsive"--}}
{{--                                             src="{{ url('storage/' . $sobre->images()->first()->path) }}">--}}
{{--                                    </div>--}}
{{--                                    <h4>{{ $portfolio->title }}</h4>--}}

{{--                                    <div class="work-popup-overlay">--}}
{{--                                        <div class="work-popup-content">--}}
{{--                                            <a href="javascript:void(0);" class="work-popup-close">Hide</a>--}}
{{--                                            <div class="margin-b-30">--}}
{{--                                                <h3 class="margin-b-5">{{ $portfolio->title }}</h3>--}}
{{--                                                <span>{{ $portfolio->title }}</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="margin-t-10 sm-margin-t-0" style="margin-left:15px;">--}}
{{--                                                    <p>{!!  $portfolio->description !!}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- End Portfólio -->--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                        <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}











    <!-- Services -->
    <div id="portfolio">
        <div class="bg-color-sky-light" data-auto-height="true">
            <div class="content-lg container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2>Portfólio</h2>
                    </div>
                </div>
                <!--// end row -->

                <div class="row row-space-1 margin-b-2">

                    @foreach($services as $service)
                        <div class="col-sm-4 sm-margin-b-2">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i style="zoom:200%; color:#ccc; margin-bottom:10px;" class="fa fa-{{ $service->icon }}"></i>
                                </div>
                                <div class="service-info">
                                    <h3>{{ $service->title }}</h3>
                                    <p class="margin-b-5">{!! limitText($service->description, $limit = 240) !!}</p>
                                </div>
                                <a href="{{ route('web.service', ['slug' => $service->slug]) }}" class="content-wrapper-link"></a>
                            </div>
                        </div>
                    @endforeach





                </div>
                <!--// end row -->
            </div>
        </div>
    </div>
    <!-- End Service -->
















    <!-- Últimas Publicações -->
    <div id="blog">
        <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-12">
                    <h2>Últimas Publicações
                        <a href="{{ route('web.blog') }}" title="Veja todas as Publicações"><span style="float:right">VER TODAS AS PUBLICAÇÕES</span></a>
                    </h2>
                </div>
            </div>
            <!--// end row -->

            <div class="row">

                @foreach($posts as $post)
                    <a href="{{ route('web.article', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
                        <div class="col-sm-4 sm-margin-b-50">
                            <div class="margin-b-20">
                                <img class="full-width img-responsive" src="{{ url('storage/' . $post->images()->first()->path) }}">
                            </div>
                            <span class="text-uppercase">{{ $post->category()->first()->title }}</span>
                            <h4>{{ $post->title }}</h4>
                            <p>{!! limitText($post->description, $limit = 240)  !!}</p>
                            <h6>Por {{ $post->author()->first()->name }} em {{ date('d/m/Y', strtotime($post->created_at)) }}</h6>
                            <a class="link" href="{{ route('web.article', ['slug' => $post->slug]) }}">Leia Mais</a>
                        </div>
                @endforeach

            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Últimas Publicações -->





    <!-- Clients -->
    <div class="content-lg container">
        <!-- Swiper Clients -->
        <div class="swiper-slider swiper-clients">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="frontend/assets/img/clients/01.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="frontend/assets/img/clients/02.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="frontend/assets/img/clients/03.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="frontend/assets/img/clients/04.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="frontend/assets/img/clients/05.png" alt="Clients Logo">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-clients-img" src="frontend/assets/img/clients/06.png" alt="Clients Logo">
                </div>
            </div>
            <!-- End Swiper Wrapper -->
        </div>
        <!-- End Swiper Clients -->
    </div>
    <!-- End Clients -->
    </div>
    <!-- End Work -->


    <!-- Contact -->
    <div id="contato">
        <!-- Contact List -->
        <div class="section-seperator">
            <div class="content-lg container">
                <div class="row">
                    <!-- Contact List -->
                    <div class="col-sm-2 sm-margin-b-50">
                        <h3>CONTATO</h3>
                    </div>
                    <!-- End Contact List -->


                    <!-- Contact List -->
                    <div class="col-sm-5 sm-margin-b-50">
                        <p>{{ $system->street }}, {{ $system->number }} @if(!empty($system->complement)){{ $system->complement }}@endif - {{ $system->neighborhood }}, {{ $system->city }}/{{ $system->state }}</p>
                    </div>
                    <!-- End Contact List -->

                    <!-- Contact List -->
                    <div class="col-sm-5 sm-margin-b-50">
                        @if(!empty($system->telephone))<span style="margin-left:20px;"><i class="fa fa-phone-alt"></i> {{ $system->telephone }}</span>@endif
                        @if(!empty($system->cell))<span style="margin-left:20px;"><i class="fa fa-phone-alt"></i> {{ $system->cell }}</span>@endif
                        @if(!empty($system->email))<span style="margin-left:20px;"><i class="fa fa-envelope"></i> {{ $system->email }}</span>@endif
                        </ul>
                    </div>
                    <!-- End Contact List -->

                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Contact List -->

        <!-- Google Map -->
        <div class="map height-300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2724.0694570748947!2d7.455080415208266!3d46.94067397914616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e39d0cf20e8d1%3A0x9daac4cd3043d067!2sThunstrasse+50%2C+3005+Bern%2C+Switzerland!5e0!3m2!1sen!2sin!4v1496749852928" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
        <!-- End Contact -->
            <!--========== END PAGE LAYOUT ==========-->


@endsection