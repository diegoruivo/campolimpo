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
                            <small><i class="fa fa-house-user"></i></small>
                            Cadastrar Propriedade
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Propriedades</a></li>
                            <li class="breadcrumb-item active">Cadastrar Propriedade</li>
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
                  action="{{ route('admin.properties.store') }}"
                  method="post" enctype="multipart/form-data">

                @csrf

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
                                                        <option value="" {{ (old('category') == '' ? 'selected' : '') }}>Escolha uma Categoria</option>
                                                        <option value="Propriedade Rural" {{ (old('category') == 'Propriedade Rural' ? 'selected' : '') }}>Propriedade Rural</option>
                                                        <option value="Imóvel Residencial" {{ (old('category') == 'Imóvel Residencial' ? 'selected' : '') }}>Imóvel Residencial</option>
                                                        <option value="Comercial/Industrial" {{ (old('category') == 'Comercial/Industrial' ? 'selected' : '') }}>Comercial/Industrial</option>
                                                        <option value="Terreno" {{ (old('category') == 'Terreno' ? 'selected' : '') }}>Terreno</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <select name="type" class="custom-select">
                                                        <option value="" {{ (old('type') == '' ? 'selected' : '') }}>Escolha um Tipo</option>
                                                        <optgroup label="Propriedade Rural">
                                                            <option value="Pequeno Porte" {{ (old('type') == 'Pequeno Porte' ? 'selected' : '') }}>Pequeno Porte</option>
                                                            <option value="Médio Porte" {{ (old('type') == 'Médio Porte' ? 'selected' : '') }}>Médio Porte</option>
                                                            <option value="Grande Porte" {{ (old('type') == 'Grande Porte' ? 'selected' : '') }}>Grande Porte</option>
                                                        </optgroup>
                                                        <optgroup label="Imóvel Residencial">
                                                            <option value="Casa"  {{ (old('type') == 'Casa' ? 'selected' : '') }}>Casa</option>
                                                            <option value="Cobertura"  {{ (old('type') == 'Cobertura' ? 'selected' : '') }}>Cobertura</option>
                                                            <option value="Apartamento"  {{ (old('type') == 'Apartamento' ? 'selected' : '') }}>Apartamento</option>
                                                            <option value="Studio"  {{ (old('type') == 'Studio' ? 'selected' : '') }}>Studio</option>
                                                            <option value="Kitnet"  {{ (old('type') == 'Kitnet' ? 'selected' : '') }}>Kitnet</option>
                                                        </optgroup>
                                                        <optgroup label="Comercial/Industrial">
                                                            <option value="Sala Comercial"  {{ (old('type') == 'Sala Comercial' ? 'selected' : '') }}>Sala Comercial</option>
                                                            <option value="Depósito/Galpão"  {{ (old('type') == 'Depósito/Galpão' ? 'selected' : '') }}>Depósito/Galpão</option>
                                                            <option value="Ponto Comercial"  {{ (old('type') == 'Ponto Comercial' ? 'selected' : '') }}>Ponto Comercial</option>
                                                        </optgroup>
                                                        <optgroup label="Terreno">
                                                            <option value="Terreno"  {{ (old('type') == 'Terreno' ? 'selected' : '') }}>Terreno</option>
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
                                                            @if (!empty($selected))
                                                                <option value="{{ $user->id }}" {{ ($user->id === $selected->id ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                                            @else
                                                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }}) {{ $user->id }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Valor</label>
                                                    <input type="text" name="sale_price" class="form-control"
                                                           placeholder="Valor da propriedade"
                                                           value="{{ old('sale_price') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Área Total</label>
                                                    <input type="text" name="area_total" class="form-control"
                                                           placeholder="Área"
                                                           value="{{ old('area_total') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Área Útil</label>
                                                    <input type="text" name="area_util" class="form-control"
                                                           placeholder="Área"
                                                           value="{{ old('area_util') }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Descrição da Propriedade</label>
                                                    <textarea class="form-control" name="description" cols="30"
                                                              rows="4">{{ old('description') }}</textarea>
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
                                                           value="{{ old('zipcode') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Endereço</label>
                                                    <input type="text" name="street" class="form-control" class="street"
                                                           placeholder="Endereço Completo"
                                                           value="{{ old('street') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Número</label>
                                                    <input type="text" name="number" class="form-control"
                                                           placeholder="Número do Endereço"
                                                           value="{{ old('number') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Complemento</label>
                                                    <input type="text" name="complement" class="form-control"
                                                           placeholder="Completo (Opcional)"
                                                           value="{{ old('complement') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Bairro</label>
                                                    <input type="text" name="neighborhood" class="form-control"
                                                           class="neighborhood"
                                                           placeholder="Bairro"
                                                           value="{{ old('neighborhood') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <input type="text" name="state" class="form-control" class="state"
                                                           placeholder="Estado"
                                                           value="{{ old('state') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Cidade</label>
                                                    <input type="text" name="city" class="form-control" class="city"
                                                           placeholder="Cidade"
                                                           value="{{ old('city') }}"/>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    {{-- Fim Endereço e Contato --}}








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

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar Propriedade</button>

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
        });
    </script>
@endsection