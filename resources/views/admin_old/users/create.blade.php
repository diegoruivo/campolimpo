@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-user-plus">Novo Cliente</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Novo Cliente</a></li>
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
            </ul>

            <form class="app_form" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="nav_tabs_content">
                    <div id="data">

                        <div class="label_g4">

                        <label class="label">
                            <span class="legend">*Nome:</span>
                            <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name') }}" required />
                        </label>



                            <label class="label">
                                <span class="legend">Genero:</span>
                                <select name="genre">
                                    <option value="" {{ (old('genre') == '' ? 'selected' : '') }}>Escolha o Genero</option>
                                    <option value="male" {{ (old('genre') == 'male' ? 'selected' : '') }}>Masculino</option>
                                    <option value="female" {{ (old('genre') == 'female' ? 'selected' : '') }}>Feminino</option>
                                    <option value="other" {{ (old('genre') == 'other' ? 'selected' : '') }}>Outros</option>
                                </select>
                            </label>


                            <label class="label">
                                <span class="legend">CPF:</span>
                                <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                       value="{{ old('document') }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Data de Nascimento:</span>
                                <input type="tel" name="date_of_birth" class="mask-date"
                                       placeholder="Data de Nascimento" value="{{ old('date_of_birth') }}"/>
                            </label>




                        </div>

                        <div class="label_g4">


                            <label class="label">
                                <span class="legend">Naturalidade:</span>
                                <input type="text" name="place_of_birth" placeholder="Cidade de Nascimento"
                                       value="{{ old('place_of_birth') }}"/>
                            </label>


                            <label class="label">
                                <span class="legend">Estado Civil:</span>
                                <select name="civil_status">
                                    <option value="" {{ (old('civil_status') == '' ? 'selected' : '') }}>Escolha o Estado Civil</option>

                                    <optgroup label="Cônjuge Obrigatório">
                                        <option value="married" {{ (old('civil_status') == 'married' ? 'selected' : '') }}>Casado</option>
                                        <option value="separated" {{ (old('civil_status') == 'separated' ? 'selected' : '') }}>Separado</option>
                                    </optgroup>
                                    <optgroup label="Cônjuge não Obrigatório">
                                        <option value="single" {{ (old('civil_status') == 'single' ? 'selected' : '') }}>Solteiro</option>
                                        <option value="divorced" {{ (old('civil_status') == 'divorced' ? 'selected' : '') }}>Divorciado</option>
                                        <option value="widower" {{ (old('civil_status') == 'widower' ? 'selected' : '') }}>Viúvo</option>
                                    </optgroup>
                                </select>
                            </label>


                            <label class="label">
                                <span class="legend">RG:</span>
                                <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                       value="{{ old('document_secondary') }}"/>
                            </label>

                            <label class="label">
                                <span class="legend">Órgão Expedidor:</span>
                                <input type="text" name="document_secondary_complement" placeholder="Expedição"
                                       value="{{ old('document_secondary_complement') }}"/>
                            </label>
                        </div>



                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Endereço</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">
                                <div class="label_g2">

                                    <label class="label">
                                        <span class="legend">CEP:</span>
                                        <input type="tel" name="zipcode" class="mask-zipcode zip_code_search"
                                               placeholder="Digite o CEP" value="{{ old('zipcode') }}"/>
                                    </label>
                                    <label class="label">
                                        <span class="legend">*Endereço:</span>
                                        <input type="text" name="street" class="street"
                                               placeholder="Endereço Completo" value="{{ old('street') }}"/>
                                    </label>
                                    <label class="label"  style="margin-left:20px">
                                        <span class="legend">Número:</span>
                                        <input type="text" name="number" placeholder="Número do Endereço"
                                               value="{{ old('number') }}"/>
                                    </label>


                                </div>





                                <div class="label_g4">

                                    <label class="label">
                                        <span class="legend">Complemento:</span>
                                        <input type="text" name="complement" placeholder="Completo (Opcional)"
                                               value="{{ old('complement') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood"
                                               placeholder="Bairro" value="{{ old('neighborhood') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Estado:</span>
                                        <input type="text" name="state" class="state" placeholder="Estado"
                                               value="{{ old('state') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Cidade:</span>
                                        <input type="text" name="city" class="city" placeholder="Cidade"
                                               value="{{ old('city') }}"/>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Contato</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">
                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">Residencial:</span>
                                        <input type="tel" name="telephone" class="mask-phone"
                                               placeholder="Número do Telefonce com DDD" value="{{ old('telephone') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Celular:</span>
                                        <input type="tel" name="cell" class="mask-cell"
                                               placeholder="Número do Telefonce com DDD" value="{{ old('cell') }}"/>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="app_collapse mt-2">
                            <div class="app_collapse_header collapse">
                                <h3>Acesso</h3>
                                <span class="icon-plus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content d-none">


                                <div class="label_gc">
                                    <span class="legend">Conceder:</span>
                                    <label class="label">
                                        <input type="checkbox" name="admin" {{ (old('admin') == 'on' || old('admin') == true ? 'checked' : '') }}><span>Administrativo</span>
                                    </label>

                                    <label class="label">
                                        <input type="checkbox" name="client" {{ (old('client') == 'on' || old('client') == true ? 'checked' : '') }}><span>Cliente</span>
                                    </label>

                                    <label class="label">
                                        <input type="checkbox" name="provider" {{ (old('provider') == 'on' || old('provider') == true ? 'checked' : '') }}><span>Fornecedor</span>
                                    </label>
                                </div>


                                <div class="label_g2">
                                    <label class="label">
                                        <span class="legend">E-mail:</span>
                                        <input type="email" name="email" placeholder="Melhor e-mail"
                                               value="{{ old('email') }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Senha:</span>
                                        <input type="password" name="password" placeholder="Senha de acesso"
                                               value=""/>
                                    </label>
                                </div>


                                <label class="label">
                                    <span class="legend">Setor de Atendimento:</span>
                                    <select name="sector" class="select2">
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->title }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <p style="margin-top: 4px; margin-bottom:40px;">
                                    <a href="{{ route('admin.call_sectors.index') }}"
                                       class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                        Setores de Atendimento</a> |
                                    <a href="{{ route('admin.call_sectors.create') }}"
                                       class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                        Novo Setor de Atendimento</a>
                                </p>

                            </div>
                        </div>
                    </div>

                <div class="text-right mt-2">
                    <button class="btn btn-large btn-green icon-check-square-o" type="submit">Cadastrar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection