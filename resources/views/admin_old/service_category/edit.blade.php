@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Cadastrar Nova Categoria de Serviços</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.services.index') }}">Serviços</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.service_category.index') }}">Categorias de Serviços</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.service_category.create') }}" class="text-orange">Criar Nova Categoria de Serviços</a>
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
                        <a href="#data" class="nav_tabs_item_link active">Categoria de Serviços</a>
                    </li>
                </ul>

                <form action="{{ route('admin.service_category.update', ['services_categories' => $services_categories->id]) }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $services_categories->id}}">


                    <div class="nav_tabs_content">
                        <div id="data">


                            <label class="label">
                                <span class="legend">*Título da Categoria de Serviço:</span>
                                <input type="text" name="title" placeholder="Título da Categoria de Serviços"
                                       value="{{ old('title') ?? $services_categories->title }}" required/>
                            </label>

                            <label class="label">
                                <span class="legend">Descrição da Categoria de Serviços:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') ?? $services_categories->description }}</textarea>
                            </label>


                            <label class="label">
                                <span class="legend">Imagem</span>
                                <input type="file" name="cover">
                            </label>

                            <label class="label">
                            <img src="
                               @if($services_categories->cover)
                                {{ url('storage/' . $services_categories->cover)  }}
                               @endif
                                    " alt="">
                            </label>

                        </div>

                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Categoria de Serviços</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection