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
                            Cadastrar Portfólio
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Portfólio</a></li>
                            <li class="breadcrumb-item active">Cadastrar Portfólio</li>
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
                    <p class="icon-asterisk">{{ $error }}</p>
                    @endmessage
                @endforeach
            @endif

            <form role="form" action="{{ route('admin.services.store') }}" method="post">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Portfólio</h3>

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
                                            @if (!empty($selected))
                                                <option value="{{ $category->id }}" {{ ($category->id === $selected->id ? 'selected' : '') }}>{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
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
                                            data-placeholder="Escolha o(s) Serviço(s)"
                                            style="width: 100%;">
                                        @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}">{{ $sector->title }}</option>
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
                                        <option value=""  {{ (old('term') == '' ? 'selected' : '') }}>Selecione a Termo Contratual</option>
                                        @foreach($terms as $term)
                                            @if (!empty($selected))
                                                <option value="{{ $term->id }}" {{ ($term->id === $selected->id ? 'selected' : '') }}>{{ $term->title }}</option>
                                            @else
                                                <option value="{{ $term->id }}">{{ $term->title }}</option>
                                            @endif
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
                                           value="{{ old('title') }}"/>
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Preço</label>
                                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Custo</label>
                                    <input type="text" class="form-control" name="cost" id="cost" value="{{ old('cost') }}"/>
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Ícone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-"></i></span>
                                        </div>
                                        <input type="text" name="icon" class="form-control" placeholder="Ícone" value="{{ old('icon')}}"/>
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
                                        <input type="radio" name="cover"
                                               id="0" value="0">
                                        <label for="0">Inativo
                                        </label>
                                    </div>

                                    <div class="icheck-primary">
                                        <input type="radio" name="cover"
                                               id="1" value="1">
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
                                        {{ old('description') }}
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
                                            <option value="{{$document_category->id}}">{{ $document_category->title }}</option>
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





{{--                            <div class="col-md-12">--}}
{{--                                <div class="clearfix">--}}
{{--                                    <label class="pull-left">Itens de Custo Variável</label>--}}
{{--                                </div>--}}

{{--                                <div class="form-group multiple-form-group input-group">--}}

{{--                                    <div class="col-sm-9">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Título do Item</label>--}}
{{--                                            <input type="text" name="title[]" maxlength="45" id="title" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Custo</label>--}}
{{--                                            <input type="text" class="form-control" name="variable_cost[]" id="variable_cost" value="{{ old('variable_cost') }}"/>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


{{--                                    <div class="col-sm-3">--}}

{{--                                        <span class="input-group-btn">--}}
{{--                                            <button type="button" class="btn btn-success btn-add">+ Adicionar</button>--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}








                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar Portfólio</button>
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
                $j("#variable_cost").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
            });

        })
    </script>




    <script type="text/javascript">
        (function ($) {
            $(function () {

                var addFormGroup = function (event) {
                    event.preventDefault();

                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
                    var $formGroupClone = $formGroup.clone();

                    $(this)
                        .toggleClass('btn-success btn-add btn-danger btn-remove')
                        .html('–');

                    $formGroupClone.find('input').val('');
                    $formGroupClone.find('.concept_sistema').text('Sistema');
                    $formGroupClone.find('.concept').text('Tipo do Item');
                    $formGroupClone.insertAfter($formGroup);

                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', true);
                    }
                };

                var removeFormGroup = function (event) {
                    event.preventDefault();

                    var $formGroup = $(this).closest('.form-group');
                    var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

                    var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
                    if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                        $lastFormGroupLast.find('.btn-add').attr('disabled', false);
                    }

                    $formGroup.remove();
                };

                var countFormGroup = function ($form) {
                    return $form.find('.form-group').length;
                };

                $(document).on('click', '.btn-add', addFormGroup);
                $(document).on('click', '.btn-remove', removeFormGroup);

            });
        })(jQuery);

    </script>

@endsection
