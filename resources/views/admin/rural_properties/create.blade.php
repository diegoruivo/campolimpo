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
                            <small><i class="fa fa-warehouse"></i></small>
                            Cadastrar Imóvel Rural
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.rural_properties.index') }}">Imóvel Rural</a></li>
                            <li class="breadcrumb-item active">Cadastrar Imóvel Rural</li>
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

            <form role="form" action="{{ route('admin.rural_properties.store') }}" method="post">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Imóvel Rural</h3>

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


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>*Cliente</label>
                                    <select name="user" class="custom-select">
                                        <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Selecione o Produtor</option>
                                        @foreach($users as $user)
                                            @if (!empty($selected))
                                                <option value="{{ $user->id }}" {{ ($user->id === $selected->id ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }}) {{ $user->id }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>N° NIRF</label>
                                    <input type="text" name="nirf_number" class="form-control"
                                           placeholder="N° NIRF"
                                           value="{{ old('nirf_number') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>N° CCIR</label>
                                    <input type="text" name="ccir_number" class="form-control"
                                           placeholder="N° CCIR"
                                           value="{{ old('ccir_number') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Denominação</label>
                                    <input type="text" name="rural_property" class="form-control"
                                           placeholder="Denominação do Imóvel Rural"
                                           value="{{ old('rural_property') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Área (HA)</label>
                                    <input type="text" name="area" class="form-control"
                                           placeholder="Área(HA)"
                                           value="{{ old('area') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Tipo de Domínio</label>
                                    <input type="text" name="domain_type" class="form-control"
                                           placeholder="Tipo de Domínio"
                                           value="{{ old('domain_type') }}"/>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Comprovação</label>
                                    <input type="tel" name="domain_document" class="form-control"
                                           placeholder="Comprovação (Especificar Documento)"
                                           value="{{ old('domain_document') }}"/>
                                </div>
                            </div>



                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar Imóvel Rural</button>
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