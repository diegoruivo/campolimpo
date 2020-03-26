@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Cadastrar Novo Imóvel</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.properties.index') }}">Propriedades</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Cadastrar Propriedade</a></li>
                </ul>
            </nav>

        </div>
    </header>


    <div class="dash_content_app_box">

        <div class="nav">

            @if($errors->all())
                @foreach($errors->all() as $error)
                    @message(['color' => 'orange'])
                    <p class="icon-asterisk">{{ $error }}</p>
                    @endmessage
                @endforeach
            @endif

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#images" class="nav_tabs_item_link">Imagens</a>
                </li>
            </ul>

            <form action="{{ route('admin.properties.store') }}" method="post" class="app_form" enctype="multipart/form-data">

                @csrf

                <div class="nav_tabs_content">
                    <div id="data">



                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Categoria:</span>
                                <select name="category" class="select2" required>
                                    <option value="" {{ (old('category') == '' ? 'selected' : '') }}>Escolha uma Categoria</option>
                                    <option value="Propriedade Rural" {{ (old('category') == 'Propriedade Rural' ? 'selected' : '') }}>Propriedade Rural</option>
                                    <option value="Imóvel Residencial" {{ (old('category') == 'Imóvel Residencial' ? 'selected' : '') }}>Imóvel Residencial</option>
                                    <option value="Comercial/Industrial" {{ (old('category') == 'Comercial/Industrial' ? 'selected' : '') }}>Comercial/Industrial</option>
                                    <option value="Terreno" {{ (old('category') == 'Terreno' ? 'selected' : '') }}>Terreno</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">Tipo:</span>
                                <select name="type" class="select2" required>
                                    <option value="" {{ (old('type') == '' ? 'selected' : '') }}>Escolha um Tipo</option>
                                    <optgroup label="Propriedade Rural">
                                        <option value="Pequeno Porte" {{ (old('type') == 'Pequeno Porte' ? 'selected' : '') }}>Pequeno Porte</option>
                                        <option value="Médio Porte" {{ (old('type') == 'Médio Porte' ? 'selected' : '') }}>Médio Porte</option>
                                        <option value="Grande Porte" {{ (old('type') == 'Grande Porte' ? 'selected' : '') }}>Grande Porte</option>
                                    </optgroup>
                                    <optgroup label="Imóvel Residencial">
                                        <option value="Casa" {{ (old('type') == 'Casa' ? 'selected' : '') }}>Casa</option>
                                        <option value="Cobertura" {{ (old('type') == 'Cobertura' ? 'selected' : '') }}>Cobertura</option>
                                        <option value="Apartamento" {{ (old('type') == 'Apartamento' ? 'selected' : '') }}>Apartamento</option>
                                        <option value="Studio" {{ (old('type') == 'Studio' ? 'selected' : '') }}>Studio</option>
                                        <option value="Kitnet" {{ (old('type') == 'Kitnet' ? 'selected' : '') }}>Kitnet</option>
                                    </optgroup>
                                    <optgroup label="Comercial/Industrial">
                                        <option value="Sala Comercial" {{ (old('type') == 'Sala Comercial' ? 'selected' : '') }}>Sala Comercial</option>
                                        <option value="Depósito/Galpão" {{ (old('type') == 'deposit_shed' ? 'selected' : '') }}>Depósito/Galpão</option>
                                        <option value="Ponto Comercial" {{ (old('type') == 'commercial_point' ? 'selected' : '') }}>Ponto Comercial</option>
                                    </optgroup>
                                    <optgroup label="Terreno">
                                        <option value="Terreno" {{ (old('type') == 'Terreno' ? 'selected' : '') }}>Terreno</option>
                                    </optgroup>
                                </select>
                            </label>


                            <label class="label" style="margin-left: 20px">
                                <span class="legend">Proprietário:</span>
                                <select name="user" class="select2" required>
                                    <option value=""  {{ (old('user') == '' ? 'selected' : '') }}>Selecione o Proprietário</option>
                                    @foreach($users as $user)
                                        @if (!empty($selected))
                                            <option value="{{ $user->id }}" {{ ($user->id === $selected->id ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </label>



                        </div>




                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Valor de Venda:</span>
                                <input type="tel" name="sale_price" class="mask-money" value="{{ old('sale_price') }}" required/>
                            </label>

                            <label class="label">
                                <span class="legend">Área Total:</span>
                                <input type="tel" name="area_total" placeholder="Quantidade de M&sup2;" value="{{ old('area_total') }}" required/>
                            </label>

                            <label class="label" style="margin-left: 20px">
                                <span class="legend">Área Útil:</span>
                                <input type="tel" name="area_util" placeholder="Quantidade de M&sup2;" value="{{ old('area_util') }}" required/>
                            </label>
                        </div>



                        <label class="label">
                            <span class="legend">Descrição da Propriedade:</span>
                            <textarea name="description" cols="30" rows="10" class="mce">{{ old('description') }}</textarea>
                        </label>



                        <div class="app_collapse">
                            <div class="app_collapse_header mt-2 collapse">
                                <h3>Endereço</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">
                                <div class="label_g2">

                                    <label class="label">
                                        <span class="legend">*CEP:</span>
                                        <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                               placeholder="Digite o CEP" value="{{ old('zipcode') }}" required/>
                                    </label>
                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street"
                                               placeholder="Endereço Completo" value="{{ old('street') }}" required/>
                                    </label>
                                    <label class="label" style="margin-left: 20px">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="number" placeholder="Número do Endereço"
                                               value="{{ old('number') }}" required/>
                                    </label>


                                </div>





                                <div class="label_g4">

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complement" placeholder="Completo (Opcional)"
                                               value="{{ old('complement') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood"
                                               placeholder="Bairro" value="{{ old('neighborhood') }}" required/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="state" class="state" placeholder="Estado"
                                               value="{{ old('state') }}" required/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="city" class="city" placeholder="Cidade"
                                               value="{{ old('city') }}" required/>
                                    </label>


                                </div>


                            </div>
                        </div>
                    </div>

                    <div id="images" class="d-none">
                        <label class="label">
                            <span class="legend">Imagens</span>
                            <input type="file" name="files[]" multiple>
                        </label>

                        <div class="content_image"></div>
                    </div>

                </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o">Cadastrar Propriedade</button>
                </div>
            </form>
        </div>
    </div>
</section>

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