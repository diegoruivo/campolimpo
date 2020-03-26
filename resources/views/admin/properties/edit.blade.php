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
                    <li><a href="" class="text-orange">Editar Propriedade</a></li>
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

            @if(session()->exists('message'))

                @message(['color' => session()->get('color')])
                <p class="icon-asterisk">{{ session()->get('message') }}</p>
                @endmessage

            @endif

            <ul class="nav_tabs">
                <li class="nav_tabs_item">
                    <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#images" class="nav_tabs_item_link">Imagens</a>
                </li>
            </ul>

            <form action="{{ route('admin.properties.update', ['property' => $property->id]) }}" method="post" class="app_form" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $property->id }}">

                <div class="nav_tabs_content">
                    <div id="data">



                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Categoria:</span>
                                <select name="category" class="select2">
                                    <option value="" {{ (old('category') == '' ? 'selected' : ($property->category == '' ? 'selected' : '')) }}>Escolha uma Categoria</option>
                                    <option value="Propriedade Rural" {{ (old('category') == 'Propriedade Rural' ? 'selected' : ($property->category == 'Propriedade Rural' ? 'selected' : '')) }}>Propriedade Rural</option>
                                    <option value="Imóvel Residencial" {{ (old('category') == 'Imóvel Residencial' ? 'selected' : ($property->category == 'Imóvel Residencial' ? 'selected' : '')) }}>Imóvel Residencial</option>
                                    <option value="Comercial/Industrial" {{ (old('category') == 'Comercial/Industrial' ? 'selected' : ($property->category == 'Comercial/Industrial' ? 'selected' : '')) }}>Comercial/Industrial</option>
                                    <option value="Terreno" {{ (old('category') == 'Terreno' ? 'selected' : ($property->category == '' ? 'selected' : 'Terreno')) }}>Terreno</option>
                                </select>
                            </label>

                            <label class="label">
                                <span class="legend">Tipo:</span>
                                <select name="type" class="select2">
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
                            </label>


                            <label class="label" style="margin-left: 20px">
                                <span class="legend">Proprietário:</span>
                                <select name="user" class="select2">
                                    <option value="">Selecione o Proprietário</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ ($user->id === $property->user ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                    @endforeach
                                </select>
                            </label>



                        </div>

                        <div class="label_g2">
                            <label class="label">
                                <span class="legend">Valor de Venda:</span>
                                <input type="tel" name="sale_price" class="mask-money" value="{{ old('sale_price') ?? $property->sale_price }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Área Total:</span>
                                <input type="tel" name="area_total" placeholder="Quantidade de M&sup2;" value="{{ old('area_total') ?? $property->area_total }}"/>
                            </label>

                            <label class="label" style="margin-left: 20px">
                                <span class="legend">Área Útil:</span>
                                <input type="tel" name="area_util" placeholder="Quantidade de M&sup2;" value="{{ old('area_util') ?? $property->area_util }}"/>
                            </label>
                        </div>





                        <label class="label">
                            <span class="legend">Descrição da Propriedade:</span>
                            <textarea name="description" cols="30" rows="10" class="mce">{{ old('description') ?? $property->description }}</textarea>
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
                                               placeholder="Digite o CEP" value="{{ old('zipcode') ?? $property->zipcode }}"/>
                                    </label>
                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street"
                                               placeholder="Endereço Completo" value="{{ old('street') ?? $property->street }}"/>
                                    </label>
                                    <label class="label" style="margin-left: 20px">
                                        <span class="legend">*Número:</span>
                                        <input type="text" name="number" placeholder="Número do Endereço"
                                               value="{{ old('number') ?? $property->number }}"/>
                                    </label>


                                </div>





                                <div class="label_g4">

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complement" placeholder="Completo (Opcional)"
                                               value="{{ old('complement') ?? $property->complement }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood"
                                               placeholder="Bairro" value="{{ old('neighborhood') ?? $property->neighborhood }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Estado:</span>
                                        <input type="text" name="state" class="state" placeholder="Estado"
                                               value="{{ old('state') ?? $property->state }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">*Cidade:</span>
                                        <input type="text" name="city" class="city" placeholder="Cidade"
                                               value="{{ old('city') ?? $property->city }}"/>
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

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o">Atualizar Propriedade</button>
                </div>
            </form>
        </div>
    </div>
</section>

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