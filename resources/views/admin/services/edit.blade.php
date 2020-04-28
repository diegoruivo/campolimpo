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
                            <small><i class="fa fa-briefcase"></i></small>
                            Editar Portfólio
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Portfólio</a></li>
                            <li class="breadcrumb-item active">Editar Portfólio</li>
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

            <form role="form" action="{{ route('admin.services.update', ['service' => $service->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Portfólio</h3>

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
                                    <label>*Categoria de Portfólio</label>
                                    <select name="service" class="custom-select" required>
                                        <option value=""  {{ (old('service') == '' ? 'selected' : '') }}>Selecione a Categoria do Portfólio</option>
                                        @foreach($services_categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id === $service->service ? 'selected' : '') }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.service_category.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                            Categorias de Serviços</a> |
                                        <a href="{{ route('admin.service_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Nova Categoria de Serviços</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Título"
                                           value="{{ old('title') ?? $service->title }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Preço</label>
                                    <input type="text" name="price" class="form-control"
                                           placeholder="Preço"
                                           value="{{ old('price') ?? $service->price }}"/>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="description" cols="30"
                                              rows="4">{{ old('description') ?? $service->description }}</textarea>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Escolha o(s) Setor(res)</label>
                                    <select class="select2" multiple="multiple" name="sectors[]"
                                            data-placeholder="Escolha o(s) Serviço(s)"
                                            style="width: 100%;">
                                        @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}"
                                            @foreach($sector_services as  $sector_service)
                                                {{ ($sector->id === $sector_service->service ? 'selected' : '') }}
                                            @endforeach
                                            >{{ $sector->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y', strtotime($service->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar Portfólio</button>
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
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()



            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>
@endsection