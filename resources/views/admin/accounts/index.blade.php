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
                            Dados Bancários
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item active">Dados Bancários</li>
                            <a href="{{ route('admin.accounts.create') }}">
                                <button type="button" class="btn bg-gradient-primary ml-3"><i class="fa fa-plus"></i> Cadastrar Dados Bancários</button>
                            </a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista Dados Bancários</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Titular</th>
                            <th>Agência</th>
                            <th>Conta</th>
                            <th width="100">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($accounts))
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $account->user()->first()->name }}</td>
                                    <td>{{ $account->bank()->first()->bank }} ({{ $account->agency }} - {{ $account->agency_dv }})</td>
                                    <td>{{ $account->account }} - {{ $account->account_dv }}</td>
                                    <td>
                                        <a href="{{ route('admin.accounts.edit', ['account' => $account->id]) }}">
                                            <button type="button" class="btn btn-block bg-gradient-primary btn-xs"><i class="fa fa-edit"></i> Editar</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="no-content">Não foram encontrados registros!</div>
                        @endif
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection


@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection