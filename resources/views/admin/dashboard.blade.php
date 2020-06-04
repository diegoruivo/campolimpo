@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Home</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-8">


                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#calls" data-toggle="tab">Atendimento</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#contracts"
                                                            data-toggle="tab">Contratos</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">Ordens</a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">






                                    <div class="active tab-pane" id="calls">
                                        <!-- TABLE: LATEST CALLS -->
                                        <div class="card">

                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Cliente</th>
                                                            <th>Senha</th>
                                                            <th>Status</th>
                                                            <th>Data</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($calls as $call)
                                                        <tr>
                                                            <td><a href="{{ route('admin.attendances.edit', ['call' => $call->id]) }}" title="Acesse o Atendimento">{{ $call->id }}</a></td>
                                                            <td><a href="{{ route('admin.attendances.edit', ['call' => $call->id]) }}" title="Acesse o Atendimento">{{ $call->user()->first()->name }}</a></td>
                                                            <td><a href="{{ route('admin.attendances.edit', ['call' => $call->id]) }}" title="Acesse o Atendimento"><span class="badge badge-secondary" style="zoom:150%;">{{ $call->password }}</span></a></td>
                                                            <td><a href="{{ route('admin.attendances.edit', ['call' => $call->id]) }}" title="Acesse o Atendimento">
                                                                @if($call->status == 0)
                                                                    <span class="badge badge-warning">Inicial</span>
                                                                @endif

                                                                @if($call->status == 1)
                                                                    <span class="badge badge-info">Processando</span>
                                                                @endif

                                                                @if($call->status == 2)
                                                                    <span class="badge badge-success">Contratado</span>
                                                                @endif

                                                                @if($call->status == 3)
                                                                    <span class="badge badge-danger">Cancelado</span>
                                                                @endif
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00a65a"
                                                                     data-height="20">
                                                                    <a href="{{ route('admin.attendances.edit', ['call' => $call->id]) }}" title="Acesse o Atendimento">{{ $call->created_at }}</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <a href="{{ route('admin.calls.create') }}" class="btn btn-sm btn-info float-left">Criar novo Atendimento</a>
                                                <a href="{{ route('admin.calls.index') }}"
                                                   class="btn btn-sm btn-secondary float-right">Ver todos os Atendimentos</a>
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!-- /.card -->

                                    </div>
                                    <!-- /.tab-pane -->








                                    <div class="tab-pane" id="contracts">


                                        <!-- TABLE: LATEST CALLS -->
                                        <div class="card">

                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Cliente</th>
                                                            <th>Serviço</th>
                                                            <th>Valor</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($contracts as $contract)
                                                            <tr>
                                                                <td><a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}">{{ $contract->id }}</a></td>
                                                                <td><a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}">{{ $contract->user()->first()->name }}</a></td>
                                                                <td><a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}">{{ $contract->service()->first()->title }}</a></td>
                                                                <td><a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}">R$ {{ $contract->contract_price }}</a></td>
                                                                <td><a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}">
                                                                    @if($contract->status == 0)
                                                                        <span class="badge badge-warning">Inicial</span>
                                                                    @endif

                                                                    @if($contract->status == 1)
                                                                        <span class="badge badge-info">Em Andamento</span>
                                                                    @endif

                                                                    @if($contract->status == 2)
                                                                        <span class="badge badge-success">Concluído</span>
                                                                    @endif

                                                                    @if($contract->status == 3)
                                                                        <span class="badge badge-danger">Cancelado</span>
                                                                    @endif
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <a href="{{ route('admin.contracts.index') }}"
                                                   class="btn btn-sm btn-secondary float-right">Ver todos os Contratos</a>
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!-- /.card -->


                                    </div>



                                    <div class="tab-pane" id="orders">


                                        <!-- TABLE: LATEST ORDERS -->
                                        <div class="card">

                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>ID Ordem</th>
                                                            <th>ID Contrato</th>
                                                            <th>Cliente</th>
                                                            <th>Serviço</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->id }}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->contract }}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->user()->first()->name}}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->service()->first()->title}}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">
                                                                    @if($order->status == 0)
                                                                        <span class="badge badge-warning">Inicial</span>
                                                                    @endif

                                                                    @if($order->status == 1)
                                                                        <span class="badge badge-info">Em Andamento</span>
                                                                    @endif

                                                                    @if($order->status == 2)
                                                                        <span class="badge badge-success">Concluído</span>
                                                                    @endif

                                                                    @if($order->status == 3)
                                                                        <span class="badge badge-danger">Cancelado</span>
                                                                    @endif
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <a href="{{ route('admin.orders.index') }}"
                                                   class="btn btn-sm btn-secondary float-right">Ver todas as Ordens</a>
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!-- /.card -->


                                    </div>
                                    <!-- /.tab-pane -->


                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->


                    </div>


                    <div class="col-md-4">


                        <a href="{{ route('admin.calls.create') }}">
                            <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i
                                                class="fas fa-headset"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><h4
                                                style="margin-top:13px;">CRIAR ATENDIMENTO</h4></span>
                                </div>
                            </div>
                        </a>


                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $ncalls }}</h3>

                                <p>Atendimentos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <a href="{{ route('admin.calls.index') }}" class="small-box-footer">Todos os Atendimentos <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>


                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $nclients }}</h3>

                                <p>Clientes</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="small-box-footer">Todos os Clientes <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>


                        <!-- ÚLTIMOS POSTS -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Últimos Posts</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">


                                    @foreach($posts as $post)
                                        <li class="item">
                                            <div class="product-img">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{  url('storage/' . $post->author()->first()->cover) }}"
                                                     title="{{ $post->author()->first()->name }}">
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-title">{{ $post->title }}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{ route('admin.posts.index') }}" class="uppercase">Todos os Posts</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                    {{-- FIM POSTS --}}





                    <!-- BOTÕES -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Atalhos e Links</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                <!-- Application buttons -->
                                @foreach($buttons as $button)
                                    <a href="{{ $button->url }}" class="btn btn-app">
                                        <i class="fa fa-{{ $button->icon }}"></i> {{ $button->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card -->

                        {{-- FIM Botões --}}


                    </div>


                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection