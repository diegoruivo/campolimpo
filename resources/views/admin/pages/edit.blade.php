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
                            <small><i class="fa fa-file-alt"></i></small>
                            Editar Página
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Páginas</a></li>
                            <li class="breadcrumb-item active">Editar Página</li>
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

            <form role="form" action="{{ route('admin.pages.update', ['page' => $page->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Página</h3>

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

                            <div class="col-md-3 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>*Título</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Título"
                                           value="{{ old('title') ?? $page->title }}"/>
                                </div>
                            </div>


                            <div class="col-md-2 col-sm-3 col-12">
                                <div class="form-group">
                                    <label>Posição</label>
                                    <input type="number" name="position" class="form-control"
                                           placeholder="Posição"
                                           value="{{ old('position') ?? $page->position }}"/>
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <div class="row">
                                    <label>Status</label>
                                    </div>
                                    <div class="icheck-primary" style="float:left;">
                                        <input type="radio" name="status" @if($page->status == 0) checked
                                               @endif id="0" value="0">
                                        <label for="0">Inativo
                                        </label>
                                    </div>


                                    <div class="icheck-primary" style="float:left; margin-left:20px;">
                                        <input type="radio" name="status" @if($page->status == 1) checked
                                               @endif id="1" value="1">
                                        <label for="1">Ativo
                                        </label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-3 col-sm-3 col-12 mt-3">
                                <a href="{{ route('admin.page_contents.create', ['page' => $page->id]) }}" class="btn btn-success btn-lg">
                                    <i class="fas fa-plus">
                                    </i>
                                    Cadastrar Conteúdo
                                </a>
                            </div>

                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->








                    <div class="col-sm-12">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Conteúdo da Página</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">
                                        ID
                                    </th>
                                    <th>
                                        Título
                                    </th>
                                    <th>
                                        Subtítulo
                                    </th>
                                    <th style="width: 1%">
                                        Posição
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Status
                                    </th>
                                    <th style="width: 1%;">
                                        Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($contents as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>{{ $content->subtitle }}</td>
                                    <td>{{ $content->position }}</td>
                                    <td>{{ $content->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.page_contents.edit', ['content' => $content->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



</div>







                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar Página</button>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </form>




                <div class="row mb-3 ml-1">
                    <form action="{{ route('admin.pages.destroy', ['page' => $page->id]) }}"
                          class="btn btn-danger btn-sm" method="post"
                          class="app_form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs bg-danger"
                                onclick="return confirm('Tem certeza que deseja excluir a página: {{ $page->title }}?')">
                            <i class="fa fa-trash"></i> Excluir Página
                        </button>
                    </form>

                </div>



        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection