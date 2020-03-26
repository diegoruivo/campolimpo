@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-building-o">Empresas</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.companies.index') }}" class="text-orange">Empresas</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.companies.create') }}" class="btn btn-orange icon-building-o ml-1">Criar Empresa</a>
        </div>
    </header>


    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>CNPJ</th>
                    <th>IE</th>
                    <th>Responsável</th>
                    <th width="80">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                <tr>
                    <td><a title="Acesse a Empresa" href="{{ route('admin.companies.edit', ['company' => $company->id]) }}" class="text-orange">{{ $company->social_name }}</a></td>
                    <td>{{ $company->alias_name }}</td>
                    <td>{{ $company->document_company }}</td>
                    <td>{{ $company->document_company_secondary }}</td>
                    <td>{{ $company->user()->first()->name }}</td>
                    <td>
                        <a href="{{ route('admin.companies.edit', ['company' => $company->id]) }}" class="btn btn-large btn-blue icon-check">
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