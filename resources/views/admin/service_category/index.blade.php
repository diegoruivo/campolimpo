@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-tags">Categorias de Serviços</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.services.index') }}">Serviços</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.service_category.index') }}" class="text-orange">Categorias de Serviços</a>
                </ul>
            </nav>

            <a href="{{ route('admin.service_category.create') }}" class="btn btn-orange icon-tags ml-1">Criar Categoria de Serviços</a>
        </div>
    </header>


    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>Serviços</th>
                    <th>Imagem</th>
                    <th width="80">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services_categories as $service_category)
                <tr>
                    <td><a title="Acesse o Serviço" href="{{ route('admin.service_category.edit', ['service_category' => $service_category->id]) }}" class="text-orange">{{ $service_category->title}}</a></td>
                    <td>{{ $service_category->cover }}</td>

                    <td>
                        <a href="{{ route('admin.service_category.edit', ['service_category' => $service_category->id]) }}" class="btn btn-large btn-blue icon-check">
                            Editar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection