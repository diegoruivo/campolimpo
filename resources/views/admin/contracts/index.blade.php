@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-file-text">Contrato</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.contracts.index') }}">Contratos</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.contracts.create') }}" class="btn btn-orange icon-file-text ml-1">Criar Contrato</a>
        </div>
    </header>


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


    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Valor</th>
                    <th>Início</th>
                    <th width="80">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $contract)

                <tr>
                    <td>{{ $contract->user()->first()->name }}</td>
                    <td>{{ $contract->service()->first()->title }}</td>
                    <td>R$ {{ $contract->contract_price }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>
                        <a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}" class="btn btn-large btn-blue icon-check">
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