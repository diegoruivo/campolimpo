@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Filtro</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.properties.index') }}" class="text-orange">Propriedades</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.properties.create') }}" class="btn btn-orange icon-home ml-1">Criar Propriedade</a>
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
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($properties))
                        @foreach($properties as $property)
                            <tr>
                                <td><a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="text-orange">{{ $property->user()->first()->name }}</a></td>
                                <td><a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="text-orange">{{ $property->category }}</a></td>
                                <td><a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="text-orange">{{ $property->type }}</a></td>
                                <td><a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="text-orange">R$ {{ $property->sale_price }}</a></td>
                                <td>
                                    <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="btn btn-large btn-blue icon-check">
                                        Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="no-content">Não foram encontrados registros!</div>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection