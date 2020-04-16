@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-bookmark-o">Setores de Atendimento</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.call_sectors.index') }}">Setores de Atendimento</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.call_sectors.create') }}" class="btn btn-orange icon-tag ml-1">Criar Setor de Atendimento</a>
        </div>
    </header>


        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Setor de Atendimento</th>
                        <th width="80">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sectors as $sector)
                        <tr>
                            <td><a href="{{ route('admin.call_sectors.edit', ['sector' => $sector->id]) }}" class="text-orange">{{ $sector->title }}</a></td>
                            <td>
                                <a href="{{ route('admin.call_sectors.edit', ['sector' => $sector->id]) }}" class="btn btn-large btn-blue icon-check">
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