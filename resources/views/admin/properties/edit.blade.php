@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1>
                            <small><i class="fa fa-house-user"></i></small>
                            Editar Propriedade
                        </h1>
                    </div>
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Propriedades</a></li>
                            <li class="breadcrumb-item active">Editar Propriedade</li>
                            <a href="{{ route('admin.properties.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-plus"></i> Cadastrar Propriedade
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

            <form class="app_form"
                  action="{{ route('admin.properties.update', ['property' => $property->id]) }}"
                  method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Dados da Propriedade
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                     aria-orientation="vertical">

                                    <a class="nav-link active" id="vert-tabs-prymary-tab" data-toggle="pill"
                                       href="#vert-tabs-primary" role="tab" aria-controls="vert-tabs-primary"
                                       aria-selected="true">Dados Primários</a>

                                    <a class="nav-link" id="vert-tabs-address-tab" data-toggle="pill"
                                       href="#vert-tabs-address" role="tab" aria-controls="vert-tabs-address"
                                       aria-selected="false">Endereço</a>

                                    <a class="nav-link" id="vert-tabs-documents-tab" data-toggle="pill"
                                       href="#vert-tabs-documents" role="tab" aria-controls="vert-tabs-documents"
                                       aria-selected="false">Documentos</a>

                                    <a class="nav-link" id="vert-tabs-images-tab" data-toggle="pill"
                                       href="#vert-tabs-images" role="tab" aria-controls="vert-tabs-images"
                                       aria-selected="false">Imagens</a>

                                </div>


                            </div>
                            <div class="col-7 col-sm-9">

                                <div class="tab-content" id="vert-tabs-tabContent">

                                    {{-- Dados Primários --}}
                                    <div class="tab-pane text-left fade show active" id="vert-tabs-primary"
                                         role="tabpanel"
                                         aria-labelledby="vert-tabs-primary-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Dados Primários</h3>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Categoria</label>
                                                    <select name="category" class="custom-select">
                                                        <option value="" {{ (old('category') == '' ? 'selected' : ($property->category == '' ? 'selected' : '')) }}>Escolha uma Categoria</option>
                                                        <option value="Propriedade Rural" {{ (old('category') == 'Propriedade Rural' ? 'selected' : ($property->category == 'Propriedade Rural' ? 'selected' : '')) }}>Propriedade Rural</option>
                                                        <option value="Imóvel Residencial" {{ (old('category') == 'Imóvel Residencial' ? 'selected' : ($property->category == 'Imóvel Residencial' ? 'selected' : '')) }}>Imóvel Residencial</option>
                                                        <option value="Comercial/Industrial" {{ (old('category') == 'Comercial/Industrial' ? 'selected' : ($property->category == 'Comercial/Industrial' ? 'selected' : '')) }}>Comercial/Industrial</option>
                                                        <option value="Terreno" {{ (old('category') == 'Terreno' ? 'selected' : ($property->category == '' ? 'selected' : 'Terreno')) }}>Terreno</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <select name="type" class="custom-select">
                                                        <option value="" {{ (old('type') == '' ? 'selected' : ($property->type == '' ? 'selected' : '')) }}>Escolha um Tipo</option>
                                                        <optgroup label="Propriedade Rural">
                                                            <option value="Pequeno Porte" {{ (old('type') == 'Pequeno Porte' ? 'selected' : ($property->type == 'Pequeno Porte' ? 'selected' : '')) }}>Pequeno Porte</option>
                                                            <option value="Médio Porte" {{ (old('type') == 'Médio Porte' ? 'selected' : ($property->type == 'Médio Porte' ? 'selected' : '')) }}>Médio Porte</option>
                                                            <option value="Grande Porte" {{ (old('type') == 'Grande Porte' ? 'selected' : ($property->type == 'Grande Porte' ? 'selected' : '')) }}>Grande Porte</option>
                                                        </optgroup>
                                                        <optgroup label="Imóvel Residencial">
                                                            <option value="Casa"  {{ (old('type') == 'Casa' ? 'selected' : ($property->type == 'Casa' ? 'selected' : '')) }}>Casa</option>
                                                            <option value="Cobertura"  {{ (old('type') == 'Cobertura' ? 'selected' : ($property->type == 'Cobertura' ? 'selected' : '')) }}>Cobertura</option>
                                                            <option value="Apartamento"  {{ (old('type') == 'Apartamento' ? 'selected' : ($property->type == 'Apartamento' ? 'selected' : '')) }}>Apartamento</option>
                                                            <option value="Studio"  {{ (old('type') == 'Studio' ? 'selected' : ($property->type == 'Studio' ? 'selected' : '')) }}>Studio</option>
                                                            <option value="Kitnet"  {{ (old('type') == 'Kitnet' ? 'selected' : ($property->type == 'Kitnet' ? 'selected' : '')) }}>Kitnet</option>
                                                        </optgroup>
                                                        <optgroup label="Comercial/Industrial">
                                                            <option value="Sala Comercial"  {{ (old('type') == 'Sala Comercial' ? 'selected' : ($property->type == 'Sala Comercial' ? 'selected' : '')) }}>Sala Comercial</option>
                                                            <option value="Depósito/Galpão"  {{ (old('type') == 'Depósito/Galpão' ? 'selected' : ($property->type == 'Depósito/Galpão' ? 'selected' : '')) }}>Depósito/Galpão</option>
                                                            <option value="Ponto Comercial"  {{ (old('type') == 'Ponto Comercial' ? 'selected' : ($property->type == 'Ponto Comercial' ? 'selected' : '')) }}>Ponto Comercial</option>
                                                        </optgroup>
                                                        <optgroup label="Terreno">
                                                            <option value="Terreno"  {{ (old('type') == 'Terreno' ? 'selected' : ($property->type == 'Terreno' ? 'selected' : '')) }}>Terreno</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Responsável Legal</label>
                                                    <select name="user" class="custom-select">
                                                        <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Proprietário</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}" {{ ($user->id === $property->user ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Valor</label>
                                                    <input type="text" name="sale_price" class="form-control"
                                                           placeholder="Valor da propriedade"
                                                           value="{{ old('sale_price') ?? $property->sale_price }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Área Total</label>
                                                    <input type="text" name="area_total" class="form-control"
                                                           placeholder="Área"
                                                           value="{{ old('area_total') ?? $property->area_total }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Área Útil</label>
                                                    <input type="text" name="area_util" class="form-control"
                                                           placeholder="Área"
                                                           value="{{ old('area_util') ?? $property->area_util }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Descrição da Propriedade</label>
                                                    <textarea class="form-control" name="description" cols="30"
                                                              rows="4">{{ old('description')?? $property->description }}</textarea>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    {{-- Fim Dados Primários --}}









                                    {{-- Endereço e Contato --}}
                                    <div class="tab-pane fade" id="vert-tabs-address" role="tabpanel"
                                         aria-labelledby="vert-tabs-address-tab">


                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Endereço</h3>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>CEP</label>
                                                    <input type="tel" name="zipcode" class="form-control"
                                                           class="mask-zipcode zip_code_search"
                                                           placeholder="Digite o CEP"
                                                           value="{{ old('zipcode') ?? $property->zipcode }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Endereço</label>
                                                    <input type="text" name="street" class="form-control" class="street"
                                                           placeholder="Endereço Completo"
                                                           value="{{ old('street') ?? $property->street }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Número</label>
                                                    <input type="text" name="number" class="form-control"
                                                           placeholder="Número do Endereço"
                                                           value="{{ old('number') ?? $property->number }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Complemento</label>
                                                    <input type="text" name="complement" class="form-control"
                                                           placeholder="Completo (Opcional)"
                                                           value="{{ old('complement') ?? $property->complement }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Bairro</label>
                                                    <input type="text" name="neighborhood" class="form-control"
                                                           class="neighborhood"
                                                           placeholder="Bairro"
                                                           value="{{ old('neighborhood') ?? $property->neighborhood }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <input type="text" name="state" class="form-control" class="state"
                                                           placeholder="Estado"
                                                           value="{{ old('state') ?? $property->state }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Cidade</label>
                                                    <input type="text" name="city" class="form-control" class="city"
                                                           placeholder="Cidade"
                                                           value="{{ old('city') ?? $property->city }}"/>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    {{-- Fim Endereço e Contato --}}









                                    {{-- Documentos --}}
                                    <div class="tab-pane fade" id="vert-tabs-documents" role="tabpanel"
                                         aria-labelledby="vert-tabs-documents-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Documentos</h3>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <a href="{{ route('admin.documents.create', ['user' => $user->id, 'property' => $property]) }}">
                                                    <button type="button" class="btn btn-xs bg-gradient-primary ml-3" style="float:right;"><i
                                                                class="fa fa-plus"></i> Cadastrar Documento</button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <table class="table table-sm">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Categoria</th>
                                                    <th>Título</th>
                                                    <th>Cliente</th>
                                                    <th>Arquivo</th>
                                                    <th width="100">Ação</th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                @if($user->documents()->get())
                                                    @foreach($user->documents()->get() as $document)
                                                        <tr>
                                                            <td>{{ $document->id }}</td>
                                                            <td>{{ $document->document_category()->first()->title }}</td>
                                                            <td>{{ $document->title }}</td>
                                                            <td>{{ $document->user()->first()->name }}</td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $document->path) }}"
                                                                   target="_blank">
                                                                    <button type="button" class="btn btn-xs bg-gradient-success"><i
                                                                                class="fa fa-download"></i> Donwload do Arquivo</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.documents.edit', ['document' => $document->id]) }}">
                                                                    <button type="button" class="btn btn-xs bg-gradient-primary"><i class="fa fa-edit"></i> Editar</button>
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



                                    </div>
                                    {{-- Fim Documentos --}}










                                    {{-- Imagens --}}
                                    <div class="tab-pane fade" id="vert-tabs-images" role="tabpanel"
                                         aria-labelledby="vert-tabs-images-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Imagens</h3>
                                        </div>


                                        <div class="row">


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Imagens</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="files[]" multiple>

                                                            <label class="custom-file-label" for="exampleInputFile">Escolher
                                                                Arquivo</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="content_image"></div>
                                                <div class="property_image">
                                                    @foreach($property->images()->get() as $image)
                                                        <div class="property_image_item">
                                                            <img src="{{ $image->url_cropped}}" alt="">
                                                            <div class="property_image_actions">
                                                                <a href="javascript:void(0)" class="btn btn-small {{ ($image->cover == true ? 'btn-green' : '') }} icon-check icon-notext image-set-cover" data-action="{{ route('admin.properties.imageSetCover', ['image' => $image->id]) }}"></a>
                                                                <a href="javascript:void(0)" class="btn btn-red btn-small icon-times icon-notext image-remove" data-action="{{ route('admin.properties.imageRemove', ['image' => $image->id])  }}"></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>





                                        </div>


                                    </div>
                                    {{-- Fim Imagens --}}








                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Atualizar</button>

                    </div>
                    <!-- /.card-footer-->


                </div>

            </form>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection




@section('js')
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[name="files[]"]').change(function (files) {

                $('.content_image').text('');

                $.each(files.target.files, function (key, value) {
                    var reader = new FileReader();
                    reader.onload = function (value) {
                        $('.content_image').append(
                            '<div class="property_image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });

            $('.image-set-cover').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.post(button.data('action'), {}, function (response) {
                    if(response.success === true) {
                        $('.property_image').find('a.btn-green').removeClass('btn-green');
                        button.addClass('btn-green');
                    }
                }, 'json');
            });

            $('.image-remove').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.ajax({
                    url: button.data('action'),
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if(response.success === true) {
                            button.closest('.property_image_item').fadeOut(function () {
                                $(this).remove();
                            })
                        }
                    }
                })
            });

        });
    </script>
@endsection