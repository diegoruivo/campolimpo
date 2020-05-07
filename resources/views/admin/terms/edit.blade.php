@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>
                            <small><i class="fa fa-file-contract"></i></small>
                            Editar Termo Contratual
                        </h1>
                    </div>
                    <div class="col-sm-7">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.terms.index') }}">Termos Contratuais</a></li>
                            <li class="breadcrumb-item active">Editar Termo Contratual</li>
                            <a href="{{ route('admin.terms.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-plus"></i> Cadastrar Termo Contratual
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


            <form role="form" action="{{ route('admin.terms.update', ['term' => $term->id]) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Termo Contratual</h3>

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
                                    <label>Título</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Título"
                                           value="{{ old('title') ?? $term->title }}"/>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="textarea" name="description"
                                              style="width: 100%; height: 600px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{ old('description') ?? $term->description }}
                                    </textarea>
                                </div>
                            </div>


                        </div>

                        <!-- /.row -->

                    </div>
                    <!-- /.card -->


                        <!-- /.card-body -->
                        <div class="card-footer">

                            Última atualização: {{ date('d/m/Y', strtotime($term->updated_at)) }}

                            <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                        class="fa fa-long-arrow-alt-right"></i> Atualizar Termo Contratual
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