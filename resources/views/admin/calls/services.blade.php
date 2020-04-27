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
                            <li class="breadcrumb-item"><a href="{{ route('admin.calls.index') }}">Atendimentos</a></li>
                            <li class="breadcrumb-item active">Atendimento</li>
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

            <form role="form" action="{{ route('admin.calls.services') }}" method="post">

            @csrf


            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Escolha o(s) serviço(s)</h3>

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


                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            @if(!empty($user->cover))
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{ $user->cover }}">
                                            @endif
                                        </div>

                                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                        <p class="text-muted text-center">{{ $user->occupation }}</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Atendimentos</b> <a class="float-right">1,322</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Serviços Contrados</b> <a class="float-right">543</a>
                                            </li>
                                        </ul>

                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                           class="btn btn-primary btn-block"><b>Cadastro do Cliente</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                                <!-- /.card -->
                            </div>


                            <div class="col-sm-9">

                                <div class="row">

                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="info-box bg-gradient-success">
                                            <span class="info-box-icon"><i class="fa fa-headset"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Atendimento n° <b>{{ $call->id }}</b></span>
                                                <span class="progress-description" style="float:right"><small>Tempo:</small> {{ $call->status }}</span>
                                                <span class="info-box-number"><small>Senha:</small> <h3>{{ $call->password }}</h3></span>

                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 10%"></div>
                                                </div>
                                                <span class="progress-description" style="float:right"><small>Status:</small> {{ $call->status }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Escolha o(s) Serviço(s)</label>
                                            <select class="select2" multiple="multiple" name="service[]"
                                                    data-placeholder="Escolha o(s) Serviço(s)"
                                                    style="width: 100%;">
                                                @foreach($services as $service)
                                                <option>{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" name="description" cols="30"
                                                      rows="4">{{ old('description')}}</textarea>
                                        </div>
                                    </div>


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
                                    class="fa fa-long-arrow-alt-right"></i> Encaminhar Atendimento
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