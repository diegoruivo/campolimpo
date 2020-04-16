@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-tags">Atendimento</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.calls.index') }}" class="text-orange">Atendimento</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.calls.create') }}" class="btn btn-orange icon-tags ml-1">Criar Atendimento</a>
        </div>
    </header>


        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Senha</th>
                        <th>Status</th>
                        <th width="80">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($calls as $call)

                        <tr>
                            <td>{{ $call->user()->first()->name }}</td>
                            <td>{{ $call->service()->first()->title }}</td>
                            <td>{{ $call->password }}</td>
                            <td>{{ $call->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.calls.edit', ['call' => $call->id]) }}" class="btn btn-large btn-blue icon-check">
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