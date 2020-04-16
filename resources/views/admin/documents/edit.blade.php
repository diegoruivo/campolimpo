@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1>
                            <small><i class="fa fa-id-card"></i></small>
                            Editar Documento
                        </h1>
                    </div>
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.documents.index') }}">Documentos</a></li>
                            <li class="breadcrumb-item active">Editar Documento</li>
                            <a href="{{ route('admin.documents.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-plus"></i> Cadastrar Documento
                                </button>
                            </a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            @if($errors->all())
                @foreach($errors->all() as $error)
                    @message(['color' => 'orange'])
                    {{ $error }}
                    @endmessage
                @endforeach
            @endif

            @if(session()->exists('message'))
                @message(['color' => session()->get('color')])
                {{ session()->get('message') }}
                @endmessage
            @endif

                <form action="{{ route('admin.documents.update', ['id' => $document->id]) }}" method="post"
                      class="app_form" enctype="multipart/form-data">

                @csrf
                @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Documento</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">





                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>*Categoria de Documentos</label>
                                    <select name="document" class="custom-select" required>
                                        <option value="">Selecione a Categoria do Documento</option>
                                        @foreach($documents_categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id === $document->document ? 'selected' : '') }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.document_category.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                            Categorias de Documentos</a> <br>
                                        <a href="{{ route('admin.document_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Nova Categoria de Documentos</a>
                                    </p>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>*Cliente</label>
                                    <select name="user" class="custom-select" required>
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($user->id === $document->user ? 'selected' : '') }} >{{ $user->name }}
                                                ({{ $user->document }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            @if (!empty($properties))
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Propriedade</label>
                                        <select name="property" class="custom-select">
                                            <option value="" {{ (old('property') == '' ? 'selected_property' : '') }}>
                                                Selecione uma Propriedade
                                            </option>
                                            @foreach($properties as $property)
                                                <option value="{{ $property->id }}" {{ ($property->id === $document->property ? 'selected' : '') }} >
                                                    {{ $property->type }} - {{ $property->category }} - {{ $property->city }}/{{ $property->state }} - {{ $property->street }}, {{ $property->number }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Título do Documento</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Título do Documento"
                                           value="{{ old('title') ?? $document->title }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Arquivo do Documento</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="path">
                                            <label class="custom-file-label" for="exampleInputFile">Escolher Arquivo</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">

                                    <a href="{{ asset('storage/' . $document->path) }}" target="_blank">
                                        <button type="button" class="btn btn-block bg-gradient-success btn-xs" style="margin-top:30px; padding:10px;"><i class="fa fa-download"></i> Download</button>
                                    </a>

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="description" cols="30"
                                              rows="2">{{ old('description') ?? $document->description }}</textarea>
                                </div>
                            </div>




                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        Última atualização: {{ date('d/m/Y', strtotime($document->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar Documento</button>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </form>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection