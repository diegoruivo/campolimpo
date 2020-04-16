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
                            <small><i class="fa fa-building"></i></small>
                            Editar Empresa
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.companies.index') }}">Empresas</a></li>
                            <li class="breadcrumb-item active">Editar Empresa</li>
                            <a href="{{ route('admin.companies.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-building"></i> Cadastrar Empresa
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

            <form class="app_form"
                  action="{{ route('admin.companies.update', ['company' => $company->id]) }}"
                  method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dados da Empresa</h3>

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
                                    <label>Responsável Legal</label>
                                    <select name="user" class="custom-select">
                                        <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Selecione um responsável legal</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}"  {{ ($user->id === $company->user ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.users.edit', ['user' => $company->user]) }}" class="text-orange icon-link" style="font-size: .8em;" target="_blank">Acessar
                                            Cadastro</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Razão Social</label>
                                    <input type="text" name="social_name" class="form-control"
                                           placeholder="Razão Social"
                                           value="{{ old('social_name') ?? $company->social_name }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nome Fantasia</label>
                                    <input type="text" name="alias_name" class="form-control"
                                           placeholder="Razão Social"
                                           value="{{ old('alias_name') ?? $company->alias_name }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input type="text" name="document_company" class="form-control"
                                           placeholder="CNPJ"
                                           value="{{ old('document_company') ?? $company->document_company }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Inscrição Estadual</label>
                                    <input type="text" name="document_company_secondary" class="form-control"
                                           placeholder="Número da Inscrição"
                                           value="{{ old('document_company_secondary') ?? $company->document_company_secondary }}"/>
                                </div>
                            </div>




                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="tel" name="zipcode"  class="form-control"
                                           class="mask-zipcode zip_code_search" placeholder="Digite o CEP"
                                           value="{{ old('zipcode') ?? $company->zipcode }}"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" name="street"  class="form-control" class="street"
                                           placeholder="Endereço Completo"
                                           value="{{ old('street') ?? $company->street }}"/>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="text" name="number" class="form-control"
                                           placeholder="Número do Endereço"
                                           value="{{ old('number') ?? $company->number }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input type="text" name="complement" class="form-control"
                                           placeholder="Completo (Opcional)"
                                           value="{{ old('complement') ?? $company->complement  }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" name="neighborhood" class="form-control" class="neighborhood"
                                           placeholder="Bairro"
                                           value="{{ old('neighborhood') ?? $company->neighborhood  }}"/>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="state" class="form-control" class="state"
                                           placeholder="Estado" value="{{ old('state') ?? $company->state }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" name="city" class="form-control" class="city"
                                           placeholder="Cidade" value="{{ old('city') ?? $company->city }}"/>
                                </div>
                            </div>



                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y', strtotime($company->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar Empresa</button>
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









