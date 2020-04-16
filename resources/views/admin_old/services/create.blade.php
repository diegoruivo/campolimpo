@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Cadastrar Serviço</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.services.index') }}">Serviços</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Cadastrar Serviço</a>
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
                        <a href="#data" class="nav_tabs_item_link active">Serviço</a>
                    </li>
                </ul>

                <form action="{{ route('admin.services.store') }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">

                            <label class="label">
                                <span class="legend">*Categoria do Serviço:</span>
                                <select name="service" class="select2">
                                    <option value="">Selecione a Categoria do Serviço</option>
                                    @foreach($services_categories as $category)
                                        @if (!empty($selected))
                                            <option value="{{ $category->id }}"  {{ ($category->id === $selected->id ? 'selected' : '') }}>{{ $category->title}}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <p style="margin-top: 4px;">
                                    <a href="{{ route('admin.service_category.index') }}"
                                       class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                        Categorias de Serviços</a> |
                                    <a href="{{ route('admin.service_category.create') }}"
                                       class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                        Nova Categoria de Serviços</a>
                                </p>
                            </label>


                            <label class="label">
                                <span class="legend">*Título do Serviço:</span>
                                <input type="text" name="title" placeholder="Título do Serviço"
                                       value="{{ old('title') }}"/>
                            </label>



                            <label class="label">
                                <span class="legend">*Preço do Serviço:</span>
                                <input type="tel" name="price" class="mask-money" value="{{ old('price') }}"/>
                            </label>


                            <label class="label">
                                <span class="legend">Descrição do Serviço:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') }}</textarea>
                            </label>



                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Serviço</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection