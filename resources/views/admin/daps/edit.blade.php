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
                            <small><i class="fa fa-seedling"></i></small>
                            Editar DAP
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.daps.index') }}">DAP</a></li>
                            <li class="breadcrumb-item active">Editar DAP</li>
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

            <form role="form" action="{{ route('admin.daps.update', ['dap' => $dap->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de DAP</h3>

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




                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>*Cliente</label>
                                    <select name="user" class="custom-select" required>
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($user->id === $dap->user ? 'selected' : '') }} >{{ $user->name }}
                                                ({{ $user->document }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>N° DAP</label>
                                    <input type="text" name="dap_number" class="form-control"
                                           placeholder="N° DAP"
                                           value="{{ old('dap_number') ?? $dap->dap_number }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Múnicípio</label>
                                    <input type="text" name="county" class="form-control"
                                           placeholder="Município"
                                           value="{{ old('county') ?? $dap->county }}"/>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>UF</label>
                                    <input type="text" name="state" class="form-control"
                                           placeholder="UF"
                                           value="{{ old('state') ?? $dap->state }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Validade</label>
                                    <input type="text" name="validity" class="form-control"
                                           placeholder="Validade"
                                           value="{{ old('validity') ?? $dap->validity }}"/>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="tel" name="category" class="form-control"
                                           placeholder="Categoria"
                                           value="{{ old('category') ?? $dap->category }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Enquadramento</label>
                                    <input type="text" name="framework" class="form-control" class="street"
                                           placeholder="Enquadramento"
                                           value="{{ old('framework') ?? $dap->framework }}"/>
                                </div>
                            </div>


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        Última atualização: {{ date('d/m/Y', strtotime($dap->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar DAP</button>
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