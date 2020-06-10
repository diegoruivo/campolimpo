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
                            <small><i class="fa fa-headset"></i></small>
                            Abrir Atendimento Attendances
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.calls.index') }}">Atendimentos</a></li>
                            <li class="breadcrumb-item active">Abrir Atendimento</li>
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

            <form role="form" action="{{ route('admin.attendances.store') }}" method="post">

            @csrf
            <?php $password = sprintf('%04X', mt_rand(0, 0xFFFF)); ?>
            <input type="hidden" name="password" value="{{ $password }}">

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Escolha um cliente cadastrado ou cadastre um novo cliente</h3>

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


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Escolha um Cliente</label>
                                    <select name="user" class="custom-select">
                                        <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Selecione o Cliente</option>
                                        @foreach($users as $user)
                                            @if (!empty($selected_user))
                                                <option value="{{ $user->id }}" {{ ($user->id === $selected_user->id ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }})</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="col-sm-12 mb-3 mt-3">
                                <h3 class="card-title">Cadastre um novo Cliente</h3>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Nome completo"
                                           value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control"
                                           placeholder="Endereço de e-mail"
                                           value="{{ old('email') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Telefone Fixo</label>
                                    <input type="tel" name="telephone" class="form-control" class="telephone"
                                           data-inputmask="'mask': ['(99) 9999-9999']" data-mask
                                           placeholder="Telefone Fixo"
                                           value="{{ old('telephone') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Telefone Móvel</label>
                                    <input type="tel" name="cell" class="form-control" class="cell"
                                           data-inputmask="'mask': ['(99) 99999-9999']" data-mask
                                           placeholder="Telefone Móvel"
                                           value="{{ old('cell') }}"/>
                                </div>
                            </div>


                        <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar Atendimento</button>
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


@section('js')
    <!-- Page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#cpf').inputmask('999.999.999-99', {'placeholder': '999.999.999-99'})
            //Money Euro
            $('[data-mask]').inputmask()

        })
    </script>
@endsection