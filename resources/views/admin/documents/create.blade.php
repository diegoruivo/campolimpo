@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-file">Cadastrar Novo Documento</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.documents.index') }}">Documentos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.documents.create') }}" class="text-orange">Cadastrar Documento</a>
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

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Documentos</a>
                    </li>
                </ul>

                <form action="{{ route('admin.documents.store') }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">*Categoria de Documentos:</span>
                                    <select name="document" class="select2" required>
                                        <option value="">Selecione a Categoria do Documento</option>
                                        @foreach($documents_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.document_category.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                            Categorias de Documentos</a> |
                                        <a href="{{ route('admin.document_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Nova Categoria de Documentos</a>
                                    </p>
                                </label>
                                <label class="label">
                                    <span class="legend">*Cliente:</span>
                                    <select name="user" class="select2" required>
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                            @if (!empty($selected))
                                                <option value="{{ $user->id }}" {{ ($user->id === $selected->id ? 'selected' : '') }} >{{ $user->name }}
                                                    ({{ $user->document }})

                                                </option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }}
                                                    )
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">*Arquivo</span>
                                <input type="file" name="path" required>
                            </label>


                            <label class="label">
                                <span class="legend">Título do Documento:</span>
                                <input type="text" name="title" placeholder="Título do Documento(s)"
                                       value="{{ old('title') }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Descrição do Documento:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') }}</textarea>
                            </label>


                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Documento</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection