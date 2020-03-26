@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-file">Editar Documento</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.documents.index') }}">Documentos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Editar Documento</a>
                        </li>
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
                        <a href="#data" class="nav_tabs_item_link active">Documentos</a>
                    </li>
                </ul>



                <form action="{{ route('admin.documents.update', ['document' => $document->id]) }}" method="post" class="app_form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $document->id }}">

                    <div class="nav_tabs_content">
                        <div id="data">

                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">Categoria do Documento:</span>
                                    <select name="document" class="select2">
                                        <option value="">Selecione a Categoria do Documento</option>
                                        @foreach($documents_categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id === $document->document ? 'selected' : '') }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.document_category.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                            Categorias de Documentos</a> <br>
                                        <a href="{{ route('admin.document_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Nova Categoria de Documentos</a>
                                    </p>
                                </label>

                                <label class="label">
                                    <span class="legend">Cliente:</span>
                                    <select name="user" class="select2">
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ ($user->id === $document->user ? 'selected' : '') }} >{{ $user->name }}
                                                    ({{ $user->document }})
                                                </option>
                                        @endforeach
                                    </select>
                                </label>


                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Título do Documento:</span>
                                    <input type="text" name="title" placeholder="Título do Documento(s)"
                                           value="{{ old('title') ?? $document->title }}"/>
                                </label>


                            </div>


                            <div class="label_g2">
                            <label class="label">
                                <span class="legend">Arquivo</span>
                                <input type="file" name="path">
                            </label>

                            <label class="label">
                                <span class="legend" style="zoom:80%;">Nome do Arquivo: {{ $document->path }}</span>
                                <a href="{{ asset('storage/' . $document->path) }}" class="btn" target="_blank">Download do Arquivo
                                </a>
                            </label>
                            </div>

                            <label class="label">
                                <span class="legend">Descrição do Documento:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') ?? $document->description }}</textarea>
                            </label>


                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Documento</button>
                    </div>
                </form>


                    <form action="{{ route('admin.documents.destroy', ['id' => $document->id]) }}" method="post" class="app_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-large btn-red icon-trash">Enviar para a Lixeira</button>
                    </form>



            </div>
        </div>
    </section>

@endsection