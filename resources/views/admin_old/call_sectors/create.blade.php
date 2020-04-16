@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-bookmark-o">Cadastrar Setor de Atendimento</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.call_sectors.index') }}">Setores de Atendimento</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.call_sectors.create') }}" class="text-orange">Cadastrar Setor de Atendimento</a></li>
                    </ul>
                </nav>

            </div>
        </header>


        <div class="dash_content_app_box">

            <div class="nav">

                @if($errors->all())
                    @foreach($errors->all() as $error)
                        @message(['color' => 'orange'])
                        <p class="icon-asterisk">{{ $error }}</p>
                        @endmessage
                    @endforeach
                @endif

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Setor de Atendimento</a>
                    </li>
                </ul>

                <form action="{{ route('admin.call_sectors.store') }}" method="post" class="app_form">

                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">

                            <label class="label">
                                <input type="text" name="title" placeholder="Nome do Setor de Atendimento"
                                       value="{{ old('title') }}"/>
                            </label>

                        </div>

                        <div class="text-right mt-2">
                            <button class="btn btn-large btn-green icon-check-square-o">Criar Setor de Atendimento</button>
                        </div>

                </form>
            </div>
        </div>
    </section>

@endsection