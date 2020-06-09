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
                            <a href="{{ route('admin.services.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-plus"></i> Cadastrar Portfólio
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



                            <div class="col-sm-4">
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
                                            Categorias</a> |
                                        <a href="{{ route('admin.service_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Nova Categoria</a>
                                    </p>
                                </div>
                            </div>



                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Escolha o(s) Setor(res)</label>
                                    <select class="select2" multiple="multiple" name="sectors[]"
                                            data-placeholder="Escolha o(s) Setor(es)"
                                            style="width: 100%;">
                                        @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}"
                                            @foreach($sector_services as $sector_service)
                                                {{ ($sector->id === $sector_service->sector ? 'selected' : '') }}
                                                    @endforeach
                                            >{{ $sector->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px; margin-bottom:40px;">
                                        <a href="{{ route('admin.call_sectors.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;"
                                           target="_blank">Editar
                                            Setores</a> |
                                        <a href="{{ route('admin.call_sectors.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;"
                                           target="_blank">Cadastrar
                                            Novo Setor</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>*Termo Contratual</label>
                                    <select name="term" class="custom-select" required>
                                        <option value=""  {{ (old('term') == '' ? 'selected' : '') }}>Selecione a Categoria do Portfólio</option>
                                        @foreach($terms as $term)
                                            <option value="{{ $term->id }}" {{ ($term->id === $service->term ? 'selected' : '') }}>{{ $term->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px;">
                                        <a href="{{ route('admin.terms.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                            Termos</a> |
                                        <a href="{{ route('admin.terms.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                            Novo Termo</a>
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
                                    <input type="text" id="price" name="price" class="form-control"
                                           placeholder="Preço"
                                           value="{{ old('price') ?? $service->price }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Custo</label>
                                    <input type="text" class="form-control" name="cost" id="cost" value="{{ old('cost') ?? $service->cost }}"/>
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Ícone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-{{ $service->icon }}"></i></span>
                                        </div>
                                        <input type="text" name="icon" class="form-control" placeholder="Ícone" value="{{ old('icon') ?? $service->icon }}"/>
                                    </div>
                                    <p>
                                        <a href="https://fontawesome.com/icons?d=gallery&m=free" style="font-size: .8em;" target="_blank">
                                            Lista de ícones</a>
                                    </p>
                                </div>
                            </div>



                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Habilitar no Site</label>
                                    <div class="icheck-primary">
                                        <input type="radio" name="cover" @if($service->cover == 0) checked
                                               @endif id="0" value="0">
                                        <label for="0">Inativo
                                        </label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" name="cover" @if($service->cover == 1) checked
                                               @endif id="1" value="1">
                                        <label for="1">Ativo
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="textarea" name="description"
                                              style="width: 100%; height: 600px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{ old('description') ?? $service->description }}
                                    </textarea>
                                </div>
                            </div>






                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Escolha o(s) Documento(s) Obrigatório(s)</label>
                                    <select class="select2" multiple="multiple" name="documents_categories[]"
                                            data-placeholder="Escolha o(s) Documento(s) Obrigatório(s)"
                                            style="width: 100%;">
                                        @foreach($documents_categories as $document_category)
                                            <option value="{{$document_category->id}}"
                                            @foreach($service_documents as $service_document)
                                                {{ ($document_category->id === $service_document->document_category ? 'selected' : '') }}
                                                    @endforeach
                                            >{{ $document_category->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="margin-top: 4px; margin-bottom:40px;">
                                        <a href="{{ route('admin.document_category.index') }}"
                                           class="text-orange icon-link" style="font-size: .8em;"
                                           target="_blank">Editar
                                            Documentos</a> |
                                        <a href="{{ route('admin.document_category.create') }}"
                                           class="text-orange icon-link" style="font-size: .8em;"
                                           target="_blank">Cadastrar
                                            Novo Documento</a>
                                    </p>
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
    <script type="text/javascript">

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
            $('#cpf').inputmask('999.999.999-99', { 'placeholder': '999.999.999-99' })
            //Money Euro
            $('[data-mask]').inputmask()

            var $j = jQuery.noConflict();
            $j(document).ready(function(){
                $j("#price").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
                $j("#cost").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
            });

        })
    </script>
@endsection