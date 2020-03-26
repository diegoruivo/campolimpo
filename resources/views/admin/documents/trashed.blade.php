@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-file">Lixeira de Documentos</h2>

        <div class="dash_content_app_header_actions">


            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.documents.index') }}" class="text-orange">Lixeira de Documentos</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.documents.create') }}" class="btn btn-large btn-green icon-file-o">Criar Documento</a>
            <a href="{{ route('admin.documents.index') }}" class="btn btn-large btn-blue icon-file">Ver Documentos</a>


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
                <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Categoria</th>
                        <th>Título</th>
                        <th>Arquivo</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->user()->first()->name }}</td>
                            <td>{{ $document->document_category()->first()->title }}</td>
                            <td>{{ $document->title }}</td>
                            <td><a href="{{ asset('storage/' . $document->path) }}" class="btn icon-download" target="_blank">Download</a></td>
                            <td>
                                <a href="{{ route('admin.documents.restore', ['id' => $document->id]) }}" class="btn btn-green icon-check">Restaurar</a>

                                <form action="{{ route('admin.documents.forceDelete', ['id' => $document->id]) }}" method="post" class="app_form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-large btn-red icon-trash">Excluir Definitivamente</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</section>

@endsection