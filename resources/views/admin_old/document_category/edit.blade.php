@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Editar Categoria de Documentos</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.document_category.index') }}">Categoria de Documentos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.document_category.create') }}" class="text-orange">Cadastrar
                                Categoria de Documentos</a></li>
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

                @if(session()->exists('message'))

                    @message(['color' => session()->get('color')])
                    <p class="icon-asterisk">{{ session()->get('message') }}</p>
                    @endmessage
                @endif

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Categoria de Documentos</a>
                    </li>
                </ul>

                <form action="{{ route('admin.document_category.update', ['document_category' => $document_category->id]) }}"
                      method="post" class="app_form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $document_category->id}}">

                    <div class="nav_tabs_content">
                        <div id="data">

                            <label class="label">
                                <input type="text" name="title" placeholder="Nome da Categoria de Documentos"
                                       value="{{ old('title') ?? $document_category->title }}" required/>
                            </label>

                        </div>

                        <div class="text-right mt-2">
                            <button class="btn btn-large btn-green icon-check-square-o">Atualizar Categoria de Documentos</button>
                        </div>

                </form>
            </div>
        </div>
    </section>

@endsection