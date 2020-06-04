<!DOCTYPE html>

<html lang="pt-br" class="no-js">

<head>
    <meta charset="utf-8"/>
    <title>{{ $system->title }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="description" content="{!! $system->description !!}"/>
    <meta name="keywords" content="{!! $system->keywords !!}"/>

    {!! $head ?? '' !!}

    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="frontend/assets/vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
{{--    <link href="frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="frontend/assets/css/animate.css" rel="stylesheet">--}}
{{--    <link href="frontend/assets/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="frontend/assets/css/layout.min.css" rel="stylesheet" type="text/css"/>--}}

<!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/cde8c0fee9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ url(mix('frontend/assets/css/libs.css')) }}">

    @hasSection('css')
        @yield('css')
    @endif

    <link rel="icon" type="image/png" href="{{ $system->url_favico }}"/>

</head>

<body id="home" data-spy="scroll" data-target=".header">

<header class="header navbar-fixed-top">
    <nav class="navbar" role="navigation">
        <div class="container">
            <div class="menu-container js_nav-item">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon"></span>
                </button>

                <div class="logo">
                    <a class="logo-wrap" href="{{ $system->site }}">
                        <img class="logo-img logo-img-main" src="{{ $system->urL_logo }}">
                        <img class="logo-img logo-img-active" src="{{ $system->url_logo }}">
                    </a>
                </div>
            </div>

            <div class="collapse navbar-collapse nav-collapse">

                <!--div class="language-switcher">
                  <ul class="nav-lang">
                    <li><a class="active" href="#">EN</a></li>
                    <li><a href="#">DE</a></li>
                    <li><a href="#">FR</a></li>
                  </ul>
                </div--->

                <div class="menu-container">
                    <ul class="nav navbar-nav navbar-nav-right">
                        @php
                            $link = Request::segment(1);
                            if ($link == 'blog') { $uri = $link; } else { $uri = ''; }
                            if ($link == 'service') { $uri = $link; } else { $uri = ''; }
                        @endphp

                        @foreach($pages as $page)
                            <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover"
                                                                href="
                                                                @if(empty($content->slug) AND empty($article->slug) AND empty($uri)){{ '#' . $page->slug }}@endif
                                                                @if(!empty($content->slug)){{ route('web.home'). '#' . $page->slug }}@endif
                                                                @if(!empty($uri)){{ route('web.home'). '#' . $page->slug }}@endif
                                                                @if(!empty($article->slug)){{ route('web.home'). '#' . $page->slug }}@endif
                                                                        ">{{ $page->title }}</a>
                            </li>
                        @endforeach
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">Home</a></li>--}}
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">Team</a></li>--}}
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#services">Services</a></li>--}}
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#products">Products</a></li>--}}
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#work">Credentials</a></li>--}}
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#pricing">Pricing</a></li>--}}
                        {{--                        <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">Contact</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>


@yield('content')


<!--========== FOOTER ==========-->
<footer class="footer">


    <!-- Copyright -->
    <div class="content container">
        <div class="row">
            <div class="col-xs-6">
                <img class="footer-logo" src="{{ url($system->url_logo) }}">
            </div>
            <div class="col-xs-6 text-right">
                <ul class="fh5co-social-icons">
                    @if (!empty($system->twitter))
                        <li><a href="{{ $system->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    @endif
                    @if (!empty($system->facebook))
                        <li><a href="{{ $system->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    @endif
                    @if (!empty($system->instagram))
                        <li><a href="{{ $system->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    @endif
                    @if (!empty($system->youtube))
                        <li><a href="{{ $system->youtube}}" target="_blank"><i class=" fa fa-youtube"></i></a></li>
                    @endif
                </ul>
            </div>


            <div class="col-xs-12">
                <p style="padding:20px; text-align:center;"><small><a href="https://www.ruivooffice.com.br" target="_blank">Desenvolvimento Ruivo Office</a></small></p>
            </div>


        </div>
        <!--// end row -->
    </div>
    <!-- End Copyright -->
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

{{--<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->--}}
{{--<!-- CORE PLUGINS -->--}}
{{--<script src="frontend/assets/vendor/jquery.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/jquery-migrate.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>--}}

{{--<!-- PAGE LEVEL PLUGINS -->--}}
{{--<script src="frontend/assets/vendor/jquery.easing.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/jquery.back-to-top.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/jquery.wow.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>--}}

{{--<!-- PAGE LEVEL SCRIPTS -->--}}
{{--<script src="frontend/assets/js/layout.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/js/components/wow.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/js/components/swiper.min.js" type="text/javascript"></script>--}}
{{--<script src="frontend/assets/js/components/masonry.min.js" type="text/javascript"></script>--}}

<script src="{{ url(mix('frontend/assets/js/libs.js')) }}"></script>

@hasSection('js')
    @yield('js')
@endif

</body>
<!-- END BODY -->
</html>