@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Categoria de Documentos</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.document_category.index') }}">Categorias de Documentos</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.document_category.create') }}" class="btn btn-orange icon-tag ml-1">Criar Categoria de Documentos</a>
        </div>
    </header>


        <div class="dash_content_app_box">
            <div class="dash_content_app_box_stage">
                <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Categoria de Documentos</th>
                        <th width="80">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents_categories as $category)
                        <tr>
                            <td><a href="{{ route('admin.document_category.edit', ['document_category' => $category->id]) }}" class="text-orange">{{ $category->title }}</a></td>
                            <td>
                                <a href="{{ route('admin.document_category.edit', ['document_category' => $contract->id]) }}" class="btn btn-large btn-blue icon-check">
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