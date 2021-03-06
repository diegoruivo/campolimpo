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
                            <small><i class="fa fa-link"></i></small>
                            Editar Botão
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.buttons.index') }}">Botões</a></li>
                            <li class="breadcrumb-item active">Editar Botão</li>
                            <a href="{{ route('admin.buttons.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-plus"></i> Cadastrar Botão
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

            <form role="form" action="{{ route('admin.buttons.update', ['button' => $button->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Botão</h3>

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


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Título do Botão</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Título"
                                           value="{{ old('title') ?? $button->title}}"/>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Ícone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-{{ $button->icon }}"></i></span>
                                        </div>
                                        <input type="text" name="icon" class="form-control" placeholder="Ícone" value="{{ old('icon') ?? $button->icon }}"/>
                                    </div>
                                </div>
                                <p style="margin-top: 4px;">
                                    <a href="https://fontawesome.com/icons?d=gallery&m=free" style="font-size: .8em;" target="_blank">
                                        Clique aqui para ver a lista de ícones</a>
                                </p>
                            </div>



                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="url" class="form-control"
                                           placeholder="Ícone"
                                           value="{{ old('url') ?? $button->url }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Posição</label>
                                    <input type="number" name="position" class="form-control"
                                           placeholder="Posição"
                                           value="{{ old('position') ?? $button->position }}"/>
                                </div>
                            </div>


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y', strtotime($button->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar Botão</button>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </form>


                <form action="{{ route('admin.buttons.destroy', ['button' => $button->id]) }}" method="post"
                      class="app_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir o botão?')"><i class="fa fa-trash"></i> Excluir Botão</button>
                </form>



        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection