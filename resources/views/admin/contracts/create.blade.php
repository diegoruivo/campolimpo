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
                            <small><i class="fa fa-briefcase"></i></small>
                            Cadastrar Contrato
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contracts.index') }}">Contratos</a></li>
                            <li class="breadcrumb-item active">Cadastrar Contrato</li>
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

            <form role="form" action="{{ route('admin.contracts.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Contrato</h3>

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
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione o
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                            @if (!empty($selected_user))
                                                <option value="{{ $user->id }}" {{ ($user->id === $selected_user->id ? 'selected' : '') }}>{{ $user->name }}
                                                    ({{ $user->document }})
                                                </option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }}
                                                    )
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.users.create') }}" style="font-size: .8em;"
                                           target="_blank">Cadastrar Cliente</a>
                                    </p>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>*Serviço</label>
                                    <select name="service" class="custom-select" required>
                                        <option value="" {{ (old('service') == '' ? 'selected' : '') }}>Selecione o
                                            Serviço
                                        </option>
                                        @foreach($services as $service)
                                            @if (!empty($selected_service))
                                                <option value="{{ $service->id }}" {{ ($service->id === $selected_service->id ? 'selected' : '') }}>{{ $service->title }}</option>
                                            @else
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Valor do Serviço</label>
                                    <input type="text" name="contract_price" class="form-control"
                                           placeholder="Valor do Serviço"
                                           value="{{ old('contract_price') }}"/>
                                </div>
                            </div>



                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>*Dia do Vencimento</label>
                                    <select name="pay_day" class="custom-select" required>
                                        <option value="">Selecione a opção</option>
                                        <option value="1">1º</option>
                                        <option value="2">2/mês</option>
                                        <option value="3">3/mês</option>
                                        <option value="4">4/mês</option>
                                        <option value="5">5/mês</option>
                                        <option value="6">6/mês</option>
                                        <option value="7">7/mês</option>
                                        <option value="8">8/mês</option>
                                        <option value="9">9/mês</option>
                                        <option value="10">10/mês</option>
                                        <option value="11">11/mês</option>
                                        <option value="12">12/mês</option>
                                        <option value="13">13/mês</option>
                                        <option value="14">14/mês</option>
                                        <option value="15">15/mês</option>
                                        <option value="16">16/mês</option>
                                        <option value="17">17/mês</option>
                                        <option value="18">18/mês</option>
                                        <option value="19">19/mês</option>
                                        <option value="20">20/mês</option>
                                        <option value="21">21/mês</option>
                                        <option value="22">22/mês</option>
                                        <option value="23">23/mês</option>
                                        <option value="24">24/mês</option>
                                        <option value="25">25/mês</option>
                                        <option value="26">26/mês</option>
                                        <option value="27">27/mês</option>
                                        <option value="28">28/mês</option>
                                        <option value="29">29/mês</option>
                                        <option value="30">30/mês</option>
                                        <option value="31">31/mês</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>*Prazo do Contrato</label>
                                    <select name="deadline" class="custom-select" required>
                                        <option value="">Selecione a opção</option>
                                        <option value="1">1 mês</option>
                                        <option value="2">2 meses</option>
                                        <option value="3">3 meses</option>
                                        <option value="4">4 meses</option>
                                        <option value="5">5 meses</option>
                                        <option value="6">6 meses</option>
                                        <option value="7">7 meses</option>
                                        <option value="8">8 meses</option>
                                        <option value="9">9 meses</option>
                                        <option value="10">10 meses</option>
                                        <option value="11">11 meses</option>
                                        <option value="12">12 meses</option>
                                        <option value="24">24 meses</option>
                                        <option value="36">36 meses</option>
                                        <option value="48">48 meses</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Data de Início</label>
                                    <input type="text" name="start_date" class="form-control"
                                           placeholder="Data de Início"
                                           value="{{ old('start_date') }}"/>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Termos</label>
                                    <textarea class="form-control" name="terms" cols="30"
                                              rows="4">{{ old('terms')}}</textarea>
                                </div>
                            </div>


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                    class="fa fa-long-arrow-alt-right"></i> Cadastrar Contrato
                        </button>
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