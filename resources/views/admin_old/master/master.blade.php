<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/reset.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/libs.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/boot.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('backend/assets/css/style.css')) }}"/>

    @hasSection('css')
        @yield('css')
    @endif

    <script src="https://kit.fontawesome.com/cde8c0fee9.js" crossorigin="anonymous"></script>


    <link rel="icon" type="image/png" href="{{ url(asset('backend/assets/images/favicon.png')) }}"/>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Campolimpo - Painel Administrativo</title>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"></div>

@php
    if (\Illuminate\Support\Facades\File::exists(public_path() . '/storage/' . \Illuminate\Support\Facades\Auth::user()->cover)) {
        $cover = \Illuminate\Support\Facades\Auth::user()->url_cover;
    } else {
    $cover = url(asset('backend/assets/images/avatar.jpg'));
    }
    if (\Illuminate\Support\Facades\Auth::user()->name) { $user_name = \Illuminate\Support\Facades\Auth::user()->name; }
@endphp

<div class="dash">
    <aside class="dash_sidebar">
        <article class="dash_sidebar_user">
            <img class="dash_sidebar_user_thumb" src="{{ $cover }}" alt=""
                 title=""/>

            <h1 class="dash_sidebar_user_name">
                <a href="">{{ $user_name }}</a>
            </h1></h1>
        </article>

        <ul class="dash_sidebar_nav">
            <li class="dash_sidebar_nav_item {{ isActive('admin.home') }}">
                <a class="icon-tachometer" href="{{ route('admin.home') }}">Painel de Controle</a>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.calls') }}"><a href="{{ route('admin.calls.index') }}"><i class="fa fa-business-time"></i> Atendimento</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class=""><a href="{{ route('admin.calls.index') }}">Ver Todos</a></li>
                    <li class=""><a href="{{ route('admin.calls.create') }}">Criar Novo</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.users') }} {{ isActive('admin.companies') }} {{ isActive('admin.properties') }} {{ isActive('admin.documents') }}">
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> Clientes</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class="{{ isActive('admin.users.index') }}"><a href="{{ route('admin.users.index') }}">Ver Todos</a></li>
                    <li class="{{ isActive('admin.users.team') }}"><a href="{{ route('admin.users.team') }}">Time</a>
                    </li>
                    <li class="{{ isActive('admin.companies.index') }}"><a href="{{ route('admin.companies.index') }}">Empresas</a>
                    </li>
                    <li class="{{ isActive('admin.documents.index') }}"><a href="{{ route('admin.documents.index') }}">Documentos</a>
                    </li>
                    <li class="{{ isActive('admin.properties.index') }}"><a href="{{ route('admin.properties.index') }}">Propriedades</a></li>
                    <li class="{{ isActive('admin.users.create') }}"><a href="{{ route('admin.users.create') }}">Criar
                            Novo</a></li>
                </ul>




            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.services') }}"><a href="{{ route('admin.services.index') }}"><i class="fa fa-briefcase"></i> Portfólio</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class=""><a href="{{ route('admin.services.index') }}">Ver Todos</a></li>
                    <li class=""><a href="{{ route('admin.services.create') }}">Criar Novo</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item  {{ isActive('admin.contracts') }}"><a href="{{ route('admin.contracts.index') }}"><i class="fa fa-file-signature"></i> Contratos</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class=""><a href="{{ route('admin.contracts.index') }}">Ver Todos</a></li>
                    <li class=""><a href="{{ route('admin.contracts.create') }}">Criar Novo</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item {{ isActive('admin.banks') }}">
                <a href=""><i class="fa fa-gears"></i> Configurações</a>
                <ul class="dash_sidebar_nav_submenu">
                    <li class=""><a href="">Site</a></li>
                    <li class=""><a href="">Admin</a></li>
                    <li class=""><a href="{{ route('admin.users.team') }}">Usuários</a></li>
                    <li class=""><a href="">Metas</a></li>
                    <li class="{{ isActive('admin.banks.index') }}"><a href="{{ route('admin.banks.index') }}">Bancos</a></li>
                </ul>
            </li>
            <li class="dash_sidebar_nav_item"><a class="icon-reply" href="{{ route('web.home') }}" target="_blank">Ver Site</a></li>
            <li class="dash_sidebar_nav_item"><a class="icon-sign-out on_mobile" href="{{ route('admin.logout') }}"
                                                 target="_blank">Sair</a></li>
        </ul>

    </aside>

    <section class="dash_content">

        <div class="dash_userbar">
            <div class="dash_userbar_box">
                <div class="dash_userbar_box_content">
                    <span class="icon-align-justify icon-notext mobile_menu transition btn btn-green"></span>
                    <h1 class="transition">
                        <a href="{{ route('admin.home') }}"><img
                                    src="{{ url(asset('backend/assets/images/logo_campolimpo.png')) }}" height="50"></a>
                    </h1>
                    <div class="dash_userbar_box_bar no_mobile">
                        <a class="text-red icon-sign-out" href="{{ route('admin.logout') }}">Sair</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dash_content_box">
            @yield('content')
        </div>
    </section>
</div>

<script src="{{ url(mix('backend/assets/js/jquery.js')) }}"></script>
<script src="{{ url(mix('backend/assets/js/scripts.js')) }}"></script>

@hasSection('js')
    @yield('js')
@endif

<script src="{{ url(mix('backend/assets/plugins/inputmask.js')) }}"></script>


</body>
</html>