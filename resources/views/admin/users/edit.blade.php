@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-user">Editar Cliente</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.users.create') }}" class="text-orange">Novo Cliente</a></li>
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
                        <a href="#complementary" class="nav_tabs_item_link">Dados Complementares</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#documents" class="nav_tabs_item_link">Documentos</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#properties" class="nav_tabs_item_link">Propriedades</a>
                    </li>

                </ul>

                <form class="app_form" action="{{ route('admin.users.update', ['user' => $user->id]) }}"
                      method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">


                    {{-- ### Dados Cadastrais ### --}}
                    <div class="nav_tabs_content">
                        <div id="data">


                            <div class="label_g4">

                                <label class="label">
                                    <span class="legend">*Nome:</span>
                                    <input type="text" name="name" placeholder="Nome Completo"
                                           value="{{ old('name') ?? $user->name }}" required/>
                                </label>


                                <label class="label">
                                    <span class="legend">*Genero:</span>
                                    <select name="genre" required>
                                        <option value="" {{ (old('genre') == '' ? 'selected' : ($user->genre == '' ? 'selected' : '')) }}>
                                            Escolha o Genero
                                        </option>
                                        <option value="male" {{ (old('genre') == 'male' ? 'selected' : ($user->genre == 'male' ? 'selected' : '')) }}>
                                            Masculino
                                        </option>
                                        <option value="female" {{ (old('genre') == 'female' ? 'selected' : ($user->genre == 'female' ? 'selected' : '')) }}>
                                            Feminino
                                        </option>
                                        <option value="other" {{ (old('genre') == 'other' ? 'selected' : ($user->genre == 'other' ? 'selected' : '')) }}>
                                            Outros
                                        </option>
                                    </select>
                                </label>


                                <label class="label">
                                    <span class="legend">*CPF:</span>
                                    <input type="tel" class="mask-doc" name="document" placeholder="CPF do Cliente"
                                           value="{{ old('document') ?? $user->document }}" required/>
                                </label>


                                <label class="label">
                                    <span class="legend">*Data de Nascimento:</span>
                                    <input type="tel" name="date_of_birth" class="mask-date"
                                           placeholder="Data de Nascimento"
                                           value="{{ old('date_of_birth') ?? $user->date_of_birth }}" required/>
                                </label>


                            </div>

                            <div class="label_g4">


                                <label class="label">
                                    <span class="legend">Naturalidade:</span>
                                    <input type="text" name="place_of_birth" placeholder="Cidade de Nascimento"
                                           value="{{ old('place_of_birth')  ?? $user->place_of_birth }}"/>
                                </label>


                                <label class="label">
                                    <span class="legend">Estado Civil:</span>
                                    <select name="civil_status">
                                        <option value="" {{ (old('civil_status') == '' ? 'selected' : ($user->civil_status == '' ? 'selected' : '')) }}>
                                            Escolha o Estado Civil
                                        </option>

                                        <optgroup label="Cônjuge Obrigatório">
                                            <option value="married" {{ (old('civil_status') == 'married' ? 'selected' : ($user->civil_status == 'married' ? 'selected' : '')) }}>
                                                Casado
                                            </option>
                                            <option value="separated" {{ (old('civil_status') == 'separated' ? 'selected' : ($user->civil_status == 'separated' ? 'selected' : '')) }}>
                                                Separado
                                            </option>
                                        </optgroup>
                                        <optgroup label="Cônjuge não Obrigatório">
                                            <option value="single" {{ (old('civil_status') == 'single' ? 'selected' : ($user->civil_status == 'single' ? 'selected' : '')) }}>
                                                Solteiro
                                            </option>
                                            <option value="divorced" {{ (old('civil_status') == 'divorced' ? 'selected' : ($user->civil_status == 'divorced' ? 'selected' : '')) }}>
                                                Divorciado
                                            </option>
                                            <option value="widower" {{ (old('civil_status') == 'widower' ? 'selected' : ($user->civil_status == 'widower' ? 'selected' : '')) }}>
                                                Viúvo
                                            </option>
                                        </optgroup>
                                    </select>
                                </label>


                                <label class="label">
                                    <span class="legend">RG:</span>
                                    <input type="text" name="document_secondary" placeholder="RG do Cliente"
                                           value="{{ old('document_secondary') ?? $user->document_secondary }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">Órgão Expedidor:</span>
                                    <input type="text" name="document_secondary_complement" placeholder="Expedição"
                                           value="{{ old('document_secondary_complement') ?? $user->document_secondary_complement }}"/>
                                </label>
                            </div>


                            {{-- Endereço --}}
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
                                                   placeholder="Digite o CEP"
                                                   value="{{ old('zipcode') ?? $user->zipcode }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Endereço:</span>
                                            <input type="text" name="street" class="street"
                                                   placeholder="Endereço Completo"
                                                   value="{{ old('street') ?? $user->street }}"/>
                                        </label>
                                        <label class="label" style="margin-left:20px">
                                            <span class="legend">Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                   value="{{ old('number') ?? $user->number }}"/>
                                        </label>
                                    </div>

                                    <div class="label_g4">
                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                   value="{{ old('complement') ?? $user->complement  }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Bairro:</span>
                                            <input type="text" name="neighborhood" class="neighborhood"
                                                   placeholder="Bairro"
                                                   value="{{ old('neighborhood') ?? $user->neighborhood  }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                   value="{{ old('state') ?? $user->state }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                   value="{{ old('city') ?? $user->city }}"/>
                                        </label>
                                    </div>

                                </div>
                            </div>


                            {{-- Contato --}}
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
                                                   placeholder="Número do Telefonce com DDD"
                                                   value="{{ old('telephone') ?? $user->telephone }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Celular:</span>
                                            <input type="tel" name="cell" class="mask-cell"
                                                   placeholder="Número do Telefonce com DDD"
                                                   value="{{ old('cell') ?? $user->cell }}"/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Acesso --}}
                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Acesso</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">


                                    <div class="label_gc">
                                        <span class="legend">Conceder:</span>
                                        <label class="label">
                                            <input type="checkbox"
                                                   name="admin" {{ (old('admin') == 'on' || old('admin') == true ? 'checked' : ($user->admin == true ? 'checked' : '')) }}><span>Administrativo</span>
                                        </label>

                                        <label class="label">
                                            <input type="checkbox"
                                                   name="client" {{ (old('client') == 'on' || old('client') == true ? 'checked' : ($user->client == true ? 'checked' : '')) }}><span>Cliente</span>
                                        </label>
                                    </div>


                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">E-mail:</span>
                                            <input type="email" name="email" placeholder="Melhor e-mail"
                                                   value="{{ old('email') ?? $user->email }}"/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Senha:</span>
                                            <input type="password" name="password" placeholder="Senha de acesso"
                                                   value=""/>
                                        </label>
                                    </div>
                                </div>


                                <div class="label_g2">

                                    <div class="dash_content_app_box">
                                        <section class="app_users_home">

                                            <article class="user radius">

                                                <div class="cover"
                                                     style="background-size: cover; background-image: url({{ $user->url_cover }});"></div>
                                            </article>

                                        </section>
                                    </div>

                                    <div class="label">
                                        <label class="label">
                                            <span class="legend">Foto</span>
                                            <input type="file" name="cover">
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                        {{-- FIM Dados Cadastrais --}}



                        {{-- ### Dados Complementares ### --}}
                        <div id="complementary" class="d-none">


                            <div class="label_gc">
                                <span class="legend">Perfil:</span>

                                <label class="label_g2">
                                    <input type="checkbox"
                                           name="small_rural_producer" {{ (old('small_rural_producer') == 'on' || old('small_rural_producer') == true ? 'checked' : ($user->small_rural_producer == true ? 'checked' : '')) }}><span>Pequeno</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox"
                                           name="medium_rural_producer" {{ (old('medium_rural_producer') == 'on' || old('medium_rural_producer') == true ? 'checked' : ($user->medium_rural_producer == true ? 'checked' : '')) }}><span>Médio</span>
                                </label>

                                <label class="label">
                                    <input type="checkbox"
                                           name="large_rural_producer" {{ (old('large_rural_producer') == 'on' || old('large_rural_producer') == true ? 'checked' : ($user->large_rural_producer == true ? 'checked' : '')) }}><span>Grande</span>
                                </label>
                            </div>


                            {{-- Renda --}}
                            <div class="app_collapse">
                                <div class="app_collapse mt-2">
                                    <div class="app_collapse_header collapse">
                                        <h3>Renda</h3>
                                        <span class="icon-plus-circle icon-notext"></span>
                                    </div>
                                    <div class="app_collapse_content d-none content_income">
                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Profissão:</span>
                                                <input type="text" name="occupation"
                                                       placeholder="Profissão do Cliente"
                                                       value="{{ old('occupation') ?? $user->occupation }}"/>
                                            </label>
                                            <label class="label">
                                                <span class="legend">Renda:</span>
                                                <input type="tel" name="income" class="mask-money"
                                                       placeholder="Valores em Reais"
                                                       value="{{ old('income') ?? $user->income }}"/>
                                            </label>
                                            <label class="label" style="margin-left: 20px">
                                                <span class="legend">Empresa:</span>
                                                <input type="text" name="company_work" placeholder="Contratante"
                                                       value="{{ old('company_work') ?? $user->company_work }}"/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Empresa --}}
                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Empresa</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>
                                <div class="app_collapse_content d-none">


                                    <p class="text-right">
                                        <a href="{{ route('admin.companies.create', ['user' => $user->id]) }}"
                                           class="btn btn-blue icon-building-o">Cadastrar Nova Empresa</a>
                                    </p>


                                    <div class="companies_list">
                                        @if($user->companies()->get())
                                            @foreach($user->companies()->get() as $company)
                                                <div class="companies_list_item mb-2">
                                                    <p><b>Razão Social:</b> {{ $company->social_name }}</p>
                                                    <p><b>Nome Fantasia:</b> {{ $company->alias_name }}</p>
                                                    <p><b>CNPJ:</b> {{ $company->document_company }} - <b>Inscrição
                                                            Estadual:</b>{{ $company->document_company_secondary }}
                                                    </p>
                                                    <p><b>Endereço:</b> {{ $company->street }}
                                                        , {{ $company->number }} {{ $company->complement }}
                                                        208</p>
                                                    <p><b>CEP:</b> {{ $company->zipcode }}
                                                        <b>Bairro:</b> {{ $company->neighborhood }}
                                                        <b>Cidade/Estado:</b>
                                                        {{$company->city}}/{{ $company->state }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="no-content mb-2">Não foram encontrados registros!</div>
                                        @endif
                                    </div>

                                </div>
                            </div>


                            {{-- Organização --}}
                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Organização Social</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>
                                <div class="app_collapse_content d-none">
                                    <div class="_list">

                                        <div class="label_g2">
                                            <label class="label">
                                                <span class="legend">Participa de Grupo Organizado:</span>
                                                <select name="organized_group">
                                                    <option value="" {{ (old('organized_group') == '' ? 'selected' : ($user->organized_group == '' ? 'selected' : '')) }}>
                                                        Escolha a opção
                                                    </option>
                                                    <option value="1" {{ (old('organized_group') == '1' ? 'selected' : ($user->organized_group == '1' ? 'selected' : '')) }}>
                                                        Sim
                                                    </option>
                                                    <option value="0" {{ (old('organized_group') == '0' ? 'selected' : ($user->organized_group == '0' ? 'selected' : '')) }}>
                                                        Não
                                                    </option>
                                                </select>
                                            </label>

                                            <label class="label">
                                                <span class="legend">Tipo do Grupo Organizado:</span>
                                                <select name="organized_group_type">
                                                    <option value="" {{ (old('organized_group_type') == '0' ? 'selected' : ($user->organized_group_type == '0' ? 'selected' : '')) }}>
                                                        Escolha a opção
                                                    </option>
                                                    <option value="Association" {{ (old('organized_group_type') == 'Association' ? 'selected' : ($user->organized_group_type == 'Association' ? 'selected' : '')) }}>
                                                        Associação
                                                    </option>
                                                    <option value="Cooperative" {{ (old('organized_group_type') == 'Cooperative' ? 'selected' : ($user->organized_group_type == 'Cooperative' ? 'selected' : '')) }}>
                                                        Cooperativa
                                                    </option>
                                                </select>
                                            </label>

                                            <label class="label" style="margin-left: 20px">
                                                <span class="legend">Nome do Grupo Organizado:</span>
                                                <input type="text" name="organized_group_name"
                                                       placeholder="Nome da Organização"
                                                       value="{{ old('organized_group_name') ?? $user->organized_group_name }}"/>
                                            </label>
                                        </div>


                                    </div>

                                </div>
                            </div>


                            {{-- Cônjuge --}}
                            <div class="app_collapse mt-2">
                                <div class="app_collapse_header collapse">
                                    <h3>Cônjuge</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>
                                <div class="app_collapse_content d-none content_spouse">
                                    <label class="label">
                                        <span class="legend">Tipo de Comunhão:</span>
                                        <select name="type_of_communion" class="select2">
                                            <option value="" {{ (old('type_of_communion') == '' ? 'selected' : ($user->type_of_communion == '' ? 'selected' : '')) }}>
                                                Escolha a opção
                                            </option>
                                            <option value="Comunhão Universal de Bem" {{ (old('type_of_communion') == 'Comunhão Universal de Bem' ? 'selected' : ($user->type_of_communion == 'Comunhão Universal de Bem' ? 'selected' : '')) }}>
                                                Comunhão Universal de Bens
                                            </option>
                                            <option value="Comunhão Parcial de Bens" {{ (old('type_of_communion') == 'Comunhão Parcial de Bens' ? 'selected' : ($user->type_of_communion == 'Comunhão Parcial de Bens' ? 'selected' : '')) }}>
                                                Comunhão Parcial de Bens
                                            </option>
                                            <option value="Separação Total de Bens" {{ (old('type_of_communion') == 'Separação Total de Bens' ? 'selected' : ($user->type_of_communion == 'Separação Total de Bens' ? 'selected' : '')) }}>
                                                Separação Total de Bens
                                            </option>
                                            <option value="Participação Final de Aquestos" {{ (old('type_of_communion') == 'Participação Final de Aquestos' ? 'selected' : ($user->type_of_communion == 'Participação Final de Aquestos' ? 'selected' : '')) }}>
                                                Participação Final de Aquestos
                                            </option>
                                        </select>
                                    </label>
                                    <div class="label_g4">
                                        <label class="label">
                                            <span class="legend">Nome:</span>
                                            <input type="text" name="spouse_name" placeholder="Nome do Cônjuge"
                                                   value="{{ old('spouse_name') ?? $user->spouse_name }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Data de Nascimento:</span>
                                            <input type="tel" class="mask-date" name="spouse_date_of_birth"
                                                   placeholder="Data de Nascimento"
                                                   value="{{ old('spouse_date_of_birth') ?? $user->spouse_date_of_birth }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Naturalidade:</span>
                                            <input type="text" name="spouse_place_of_birth"
                                                   placeholder="Cidade de Nascimento"
                                                   value="{{ old('spouse_place_of_birth') ?? $user->spouse_place_of_birth }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Genero:</span>
                                            <select name="spouse_genre">
                                                <option value="" {{ (old('spouse_genre') == '' ? 'selected' : ($user->spouse_genre == '' ? 'selected' : '')) }}>
                                                    Escolha o Genero
                                                </option>
                                                <option value="male" {{ (old('spouse_genre') == 'male' ? 'selected' : ($user->spouse_genre == 'male' ? 'selected' : '')) }}>
                                                    Masculino
                                                </option>
                                                <option value="female" {{ (old('spouse_genre') == 'female' ? 'selected' : ($user->spouse_genre == 'female' ? 'selected' : '')) }}>
                                                    Feminino
                                                </option>
                                                <option value="other" {{ (old('spouse_genre') == 'other' ? 'selected' : ($user->spouse_genre == 'other' ? 'selected' : '')) }}>
                                                    Outros
                                                </option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">CPF:</span>
                                            <input type="text" class="mask-doc" name="spouse_document"
                                                   placeholder="CPF do Cliente"
                                                   value="{{ old('spouse_document') ?? $user->spouse_document }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">RG:</span>
                                            <input type="text" name="spouse_document_secondary"
                                                   placeholder="RG do Cliente"
                                                   value="{{ old('spouse_document_secondary') ?? $user->spouse_document_secondary }}"/>
                                        </label>
                                        <label class="label" style="margin-left:20px">
                                            <span class="legend">Órgão Expedidor:</span>
                                            <input type="text" name="spouse_document_secondary_complement"
                                                   placeholder="Expedição"
                                                   value="{{ old('spouse_document_secondary_complement') ?? $user->spouse_document_secondary_complement }}"/>
                                        </label>
                                    </div>
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Profissão:</span>
                                            <input type="text" name="spouse_occupation"
                                                   placeholder="Profissão do Cliente"
                                                   value="{{ old('spouse_occupation') ?? $user->spouse_occupation }}"/>
                                        </label>
                                        <label class="label">
                                            <span class="legend">Renda:</span>
                                            <input type="text" class="mask-money" name="spouse_income"
                                                   placeholder="Valores em Reais"
                                                   value="{{ old('spouse_income') ?? $user->spouse_income }}"/>
                                        </label>
                                        <label class="label" style="margin-left:20px">
                                            <span class="legend">Empresa:</span>
                                            <input type="text" name="spouse_company_work" placeholder="Contratante"
                                                   value="{{ old('spouse_company_work') ?? $user->spouse_company_work }}"/>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                        {{-- FIM Dados Complementares --}}


                        {{-- Documentos --}}
                        <div id="documents" class="d-none">

                            <p class="text-right">
                                <a href="{{ route('admin.documents.create', ['user' => $user->id]) }}"
                                   class="btn btn-blue icon-building-o">Cadastrar Novo Documento</a>
                            </p>

                            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Título</th>
                                    <th>Cliente</th>
                                    <th>Arquivo</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($user->documents()->get())
                                    @foreach($user->documents()->get() as $document)
                                        <tr>
                                            <td>{{ $document->id }}</td>
                                            <td>{{ $document->document_category()->first()->title }}</td>
                                            <td>
                                                <a href="{{ route('admin.documents.edit', ['document' => $document->id]) }}"
                                                   class="text-orange">{{ $document->title }}</a></td>
                                            <td>{{ $document->user()->first()->name }}</td>
                                            <td><a href="{{ asset('storage/' . $documents_user->path) }}" class="btn"
                                                   target="_blank">Download</a></td>
                                        </tr>
                                    @endforeach

                                @else
                                    <div class="no-content">Não foram encontrados registros!</div>
                                @endif


                                </tbody>
                            </table>


                        </div>

                        {{-- Propriedades --}}
                        <div id="properties" class="d-none">


                            <p class="text-right">
                                <a href="{{ route('admin.properties.create', ['user' => $user->id]) }}"
                                   class="btn btn-blue icon-building-o">Cadastrar Nova Propriedade</a>
                            </p>

                            <table id="dataTable" class="nowrap stripe" width="100" style="width: 100% !important;">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Categoria</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>


                                @if($user->properties()->get())
                                    @foreach($user->properties()->get() as $property)


                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}"
                                                   class="text-orange">{{ $property->user()->first()->name }}</a></td>
                                            <td>
                                                <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}"
                                                   class="text-orange">{{ $property->category }}</a></td>
                                            <td>
                                                <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}"
                                                   class="text-orange">{{ $property->type }}</a></td>
                                            <td>
                                                <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}"
                                                   class="text-orange">R$ {{ $property->sale_price }}</a></td>
                                            <td>
                                                <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}"
                                                   class="btn btn-large btn-blue icon-check">
                                                    Editar</a>
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

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o" type="submit">Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection