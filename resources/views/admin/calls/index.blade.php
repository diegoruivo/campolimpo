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
                            Atendimento
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Atendimento</li>
                            <a href="{{ route('admin.calls.create') }}">
                                <button type="button" class="btn bg-gradient-primary ml-3"><i class="fa fa-plus"></i> Cadastrar Atendimento</button>
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
                    <h3 class="card-title">Lista de Atendimentos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10">ID</th>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Senha</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th width="80">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($calls))
                            @foreach($calls as $call)
                                <tr>
                                    <td>{{ $call->id }}</td>
                                    <td>{{ $call->user()->first()->name }}</td>
                                    <td>
                                        @foreach($call_services as  $call_service)
                                            {{ $call_service->service  }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary" style="zoom:150%;">{{ $call->password }}</span>
                                    </td>
                                    <td>
                                        @if($call->status == 0)
                                            <span class="badge badge-warning">Inicial</span>
                                        @endif

                                        @if($call->status == 1)
                                            <span class="badge badge-info">Encaminhado</span>
                                        @endif

                                        @if($call->status == 2)
                                            <span class="badge badge-success">Finalizado</span>
                                        @endif

                                        @if($call->status == 3)
                                            <span class="badge badge-danger">Cancelado</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $call->created_at }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.calls.edit', ['call' => $call->id]) }}">
                                            <button type="button" class="btn btn-block bg-gradient-warning btn-xs"><i class="fa fa-headset"></i> Acompanhar</button>
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