@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2><i class="fa fa-university"></i> Bancos</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.banks.index') }}">Bancos</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.banks.create') }}" class="btn btn-orange ml-1"><i class="fa fa-university"></i> Cadastrar Banco</a>
            </div>
        </header>


        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Bancos</th>
                        <th>Dígito Verificador</th>
                        <th width="80">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td>
                                <a href="{{ route('admin.banks.edit', ['bank' => $bank->id]) }}"
                                   class="text-orange">{{ $bank->bank }}</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.banks.edit', ['bank_dv' => $bank->id]) }}"
                                   class="text-orange">{{ $bank->bank_dv}}</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.banks.edit', ['bank' => $bank->id]) }}"
                                   class="btn btn-large btn-blue icon-check">
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