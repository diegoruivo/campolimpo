@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-tags">Serviços</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.services.index') }}" class="text-orange">Serviços</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.services.create') }}" class="btn btn-orange icon-tags ml-1">Criar Serviço</a>
        </div>
    </header>


    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>Serviços</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th width="80">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                <tr>
                    <td><a title="Editar Serviço" href="{{ route('admin.services.edit', ['service' => $service->id]) }}" class="text-orange">{{ $service->title}}</a></td>
                    <td>{{ $service->service_category()->first()->title }}</td>
                    <td>{{ $service->price}}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', ['service' => $service->id]) }}" class="btn btn-large btn-blue icon-check">
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