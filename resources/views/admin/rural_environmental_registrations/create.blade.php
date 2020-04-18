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
                            <small><i class="fa fa-tree"></i></small>
                            Cadastro Ambiental Rural - CAR
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.rural_environmental_registrations.index') }}">Cadastro Ambiental Rural - CAR</a></li>
                            <li class="breadcrumb-item active">Cadastrar CAR</li>
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

            <form role="form" action="{{ route('admin.rural_environmental_registrations.store') }}" method="post">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro Ambiental Rural - CAR</h3>

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
                                    <label>N° CAR</label>
                                    <input type="text" name="car_number" class="form-control"
                                           placeholder="N° CAR"
                                           value="{{ old('car_number') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nome da Propriedade</label>
                                    <input type="text" name="property_name" class="form-control"
                                           placeholder="Nome da Propriedade"
                                           value="{{ old('property_name') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Município</label>
                                    <input type="text" name="county" class="form-control"
                                           placeholder="Município"
                                           value="{{ old('county') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>UF</label>
                                    <input type="text" name="uf" class="form-control"
                                           placeholder="UF"
                                           value="{{ old('uf') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Data do Cadastro</label>
                                    <input type="text" name="register_date" class="form-control"
                                           placeholder="Data do Cadastro"
                                           value="{{ old('register_date') }}"/>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Código Imóvel MMA</label>
                                    <input type="tel" name="property_code_mma" class="form-control"
                                           placeholder="Código Imóvel MMA)"
                                           value="{{ old('property_code_mma') }}"/>
                                </div>
                            </div>



                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar CAR</button>
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