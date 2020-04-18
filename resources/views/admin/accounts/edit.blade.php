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
                            <small><i class="fa fa-money-check-alt"></i></small>
                            Editar Dados Bancários
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.accounts.index') }}">Dados Bancários</a></li>
                            <li class="breadcrumb-item active">Editar Dados Bancários</li>
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

            <form class="app_form"
                  action="{{ route('admin.accounts.update', ['account' => $account->id]) }}"
                  method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dados Bancários</h3>

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
                                        <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Selecione o Cliente</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($user->id === $account->user ? 'selected' : '') }} >{{ $user->name }}
                                                ({{ $user->document }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 0px;">
                                        <a href="{{ route('admin.users.edit', ['user' => $account->user]) }}"
                                           class="text-orange icon-link" style="font-size: .8em;">Editar
                                            Cliente</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>*Banco</label>
                                    <select name="bank" class="custom-select" required>
                                        <option value=""  {{ (old('bank') == '' ? 'selected' : '') }}>Selecione o Banco</option>
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ ($bank->id === $account->bank ? 'selected' : '') }} >{{ $bank->bank }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>*Agência</label>
                                    <input type="number" name="agency" class="form-control"
                                           placeholder="Número da Agência"
                                           value="{{ old('agency') ?? $account->agency }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>*Dígito Agência</label>
                                    <input type="number" name="agency_dv" class="form-control"
                                           placeholder="Dígito da Agência"
                                           value="{{ old('agency_dv') ?? $account->agency_dv }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>*Conta</label>
                                    <input type="number" name="account" class="form-control"
                                           placeholder="Número da Agência"
                                           value="{{ old('account') ?? $account->account }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>*Dígito Conta</label>
                                    <input type="number" name="account_dv" class="form-control"
                                           placeholder="Dígito da Agência"
                                           value="{{ old('account_dv') ?? $account->account_dv }}"/>
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Carteira</label>
                                    <input type="number" name="wallet" class="form-control"
                                           placeholder="Carteira"
                                           value="{{ old('wallet') ?? $account->wallet }}"/>
                                </div>
                            </div>




                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y', strtotime($account->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar Dados Bancários</button>

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