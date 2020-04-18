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
                            Editar Cadastro Ambiental Rural - CAR
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.rural_environmental_registrations.index') }}">Cadastro Ambiental Rural - CAR</a></li>
                            <li class="breadcrumb-item active">Editar CAR</li>
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

            <form role="form" action="{{ route('admin.rural_environmental_registrations.update', ['rural_environmental_registry' => $rural_environmental_registry->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Cadastro Ambiental Rural - CAR</h3>

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
                                    <select name="user" class="custom-select" required>
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($user->id === $rural_environmental_registry->user ? 'selected' : '') }} >{{ $user->name }}
                                                ({{ $user->document }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>N° CAR</label>
                                    <input type="text" name="car_number" class="form-control"
                                           placeholder="N° CAR"
                                           value="{{ old('car_number') ?? $rural_environmental_registry->car_number }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nome da Propriedade</label>
                                    <input type="text" name="property_name" class="form-control"
                                           placeholder="Nome da Propriedade"
                                           value="{{ old('property_name') ?? $rural_environmental_registry->property_name }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Município</label>
                                    <input type="text" name="county" class="form-control"
                                           placeholder="Município"
                                           value="{{ old('county') ?? $rural_environmental_registry->county }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>UF</label>
                                    <input type="text" name="uf" class="form-control"
                                           placeholder="Área(HA)"
                                           value="{{ old('uf') ?? $rural_environmental_registry->uf }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Data do Cadastro</label>
                                    <input type="text" name="register_date" class="form-control"
                                           placeholder="Data do Cadastro"
                                           value="{{ old('register_date') ?? $rural_environmental_registry->register_date }}"/>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Código Imóvel MMA</label>
                                    <input type="tel" name="property_code_mma" class="form-control"
                                           placeholder="Código Imóvel MMA)"
                                           value="{{ old('property_code_mma') ?? $rural_environmental_registry->property_code_mma }}"/>
                                </div>
                            </div>



                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y', strtotime($rural_environmental_registry->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar CAR</button>
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