@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <small><i class="fa fa-id-card"></i></small>
                            Cadastrar Documento
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.documents.index') }}">Documentos</a></li>
                            <li class="breadcrumb-item active">Cadastrar Documento</li>
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
                    <p class="icon-asterisk">{{ $error }}</p>
                    @endmessage
                @endforeach
            @endif

            <form role="form" action="{{ route('admin.documents.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Documento</h3>

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
                                        <option value=""  {{ (old('document') == '' ? 'selected' : '') }}>Selecione a Categoria do Documento</option>
                                        @foreach($documents_categories as $category)
                                            @if (!empty($selected))
                                                <option value="{{ $category->id }}" {{ ($category->id === $selected->id ? 'selected' : '') }}>{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>*Cliente</label>
                                    <select name="user" class="custom-select" required>
                                        <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Selecione o Cliente</option>
                                        @foreach($users as $user)
                                            @if (!empty($selected_user))
                                                <option value="{{ $user->id }}" {{ ($user->id === $selected_user->id ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }}) {{ $user->id }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            @if (!empty($properties))
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Propriedade</label>
                                        <select name="property" class="custom-select">
                                            <option value=""  {{ (old('property') == '' ? 'selected' : '') }}>Selecione a Propriedade</option>
                                            @foreach($properties as $property)
                                                @if (!empty($selected_property))
                                                    <option value="{{ $property->id }}" {{ ($property->id === $selected_property->id ? 'selected' : '') }} >{{ $property->type }} - {{ $property->category }} - {{ $property->city }}/{{ $property->state }} - {{ $property->street }}, {{ $property->number }}
                                                    </option>
                                                @else
                                                    <option value="{{ $property->id }}">{{ $property->type }} - {{ $property->category }} - {{ $property->city }}/{{ $property->state }} - {{ $property->street }}, {{ $property->number }}</option>
                                                @endif
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
                                           value="{{ old('title') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">*Arquivo do Documento</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                   name="path" required>
                                            <label class="custom-file-label" for="exampleInputFile">Escolher
                                                Arquivo</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="description" cols="30"
                                              rows="2">{{ old('description') }}</textarea>
                                </div>
                            </div>




                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar Documento</button>
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