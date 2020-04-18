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
                            <small><i class="fa fa-user-edit"></i></small>
                            Editar Cliente
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item active">Editar Cliente</li>
                            <a href="{{ route('admin.users.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-user-plus"></i> Cadastrar Cliente
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

            <form role="form"
                  action="{{ route('admin.users.update', ['user' => $user->id]) }}"
                  method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-user"></i>
                            {{ $user->name }}
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
                                       aria-selected="false">Endereço e Contato</a>

                                    <a class="nav-link" id="vert-tabs-producer-tab" data-toggle="pill"
                                       href="#vert-tabs-producer" role="tab" aria-controls="vert-tabs-producer"
                                       aria-selected="false">Dados Produtor</a>

                                    <a class="nav-link" id="vert-tabs-spouse-tab" data-toggle="pill"
                                       href="#vert-tabs-spouse" role="tab" aria-controls="vert-tabs-spouse"
                                       aria-selected="false">Cônjuge</a>

                                    <a class="nav-link" id="vert-tabs-income-tab" data-toggle="pill"
                                       href="#vert-tabs-income" role="tab" aria-controls="vert-tabs-income"
                                       aria-selected="false">Renda</a>

                                    <a class="nav-link" id="vert-tabs-banks-tab" data-toggle="pill"
                                       href="#vert-tabs-banks" role="tab" aria-controls="vert-tabs-banks"
                                       aria-selected="false">Dados Bancários</a>

                                    <a class="nav-link" id="vert-tabs-documents-tab" data-toggle="pill"
                                       href="#vert-tabs-documents" role="tab" aria-controls="vert-tabs-documents"
                                       aria-selected="false">Documentos</a>

                                    <a class="nav-link" id="vert-tabs-properties-tab" data-toggle="pill"
                                       href="#vert-tabs-properties" role="tab" aria-controls="vert-tabs-properties"
                                       aria-selected="false">Propriedades</a>

                                    <a class="nav-link" id="vert-tabs-companies-tab" data-toggle="pill"
                                       href="#vert-tabs-companies" role="tab" aria-controls="vert-tabs-companies"
                                       aria-selected="false">Empresas</a>

                                    <a class="nav-link" id="vert-tabs-access-tab" data-toggle="pill"
                                       href="#vert-tabs-access" role="tab" aria-controls="vert-tabs-access"
                                       aria-selected="false">Acesso</a>
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

                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Nome completo"
                                                           value="{{ old('name') ?? $user->name }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Genero</label>
                                                    <select name="genre" class="custom-select">
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
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>CPF</label>
                                                    <input type="text" class="form-control"
                                                           name="document" placeholder="CPF do Cliente"
                                                           value="{{ old('document') ?? $user->document }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Data de Nascimento</label>
                                                    <input type="text" class="form-control"
                                                           name="date_of_birth" placeholder="Data de Nascimento"
                                                           value="{{ old('date_of_birth') ?? $user->date_of_birth }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Naturalidade</label>
                                                    <input type="text" name="place_of_birth" class="form-control"
                                                           placeholder="Cidade de Nascimento"
                                                           value="{{ old('place_of_birth')  ?? $user->place_of_birth }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Estado Civil</label>
                                                    <select name="civil_status" class="custom-select">
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
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>RG</label>
                                                    <input type="text" name="document_secondary" class="form-control"
                                                           placeholder="RG do Cliente"
                                                           value="{{ old('document_secondary') ?? $user->document_secondary }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Órgão Expedidor</label>

                                                    <input type="text" name="document_secondary_complement"
                                                           class="form-control" placeholder="Expedição"
                                                           value="{{ old('document_secondary_complement') ?? $user->document_secondary_complement }}"/>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    {{-- Fim Dados Primários --}}









                                    {{-- Endereço e Contato --}}
                                    <div class="tab-pane fade" id="vert-tabs-address" role="tabpanel"
                                         aria-labelledby="vert-tabs-address-tab">


                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Endereço e Contato</h3>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>CEP</label>
                                                    <input type="tel" name="zipcode" class="form-control"
                                                           class="mask-zipcode zip_code_search"
                                                           placeholder="Digite o CEP"
                                                           value="{{ old('zipcode') ?? $user->zipcode }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Endereço</label>
                                                    <input type="text" name="street" class="form-control" class="street"
                                                           placeholder="Endereço Completo"
                                                           value="{{ old('street') ?? $user->street }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Número</label>
                                                    <input type="text" name="number" class="form-control"
                                                           placeholder="Número do Endereço"
                                                           value="{{ old('number') ?? $user->number }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Complemento</label>
                                                    <input type="text" name="complement" class="form-control"
                                                           placeholder="Completo (Opcional)"
                                                           value="{{ old('complement') ?? $user->complement  }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Bairro</label>
                                                    <input type="text" name="neighborhood" class="form-control"
                                                           class="neighborhood"
                                                           placeholder="Bairro"
                                                           value="{{ old('neighborhood') ?? $user->neighborhood  }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <input type="text" name="state" class="form-control" class="state"
                                                           placeholder="Estado"
                                                           value="{{ old('state') ?? $user->state }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Cidade</label>
                                                    <input type="text" name="city" class="form-control" class="city"
                                                           placeholder="Cidade"
                                                           value="{{ old('city') ?? $user->city }}"/>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    {{-- Fim Endereço e Contato --}}









                                    {{-- Dados Produtor --}}
                                    <div class="tab-pane fade" id="vert-tabs-producer" role="tabpanel"
                                         aria-labelledby="vert-tabs-producer-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Dados Produtor</h3>
                                        </div>

                                        <div class="row">


                                            <div class="col-sm-12 mb-4">
                                                <div class="row">
                                                    <label>Tipo de Produtor</label>
                                                </div>

                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="small_rural_producer"
                                                           name="small_rural_producer" {{ (old('small_rural_producer') == 'on' || old('small_rural_producer') == true ? 'checked' : ($user->small_rural_producer == true ? 'checked' : '')) }}>
                                                    <label for="small_rural_producer">Pequeno</label>
                                                </div>

                                                <div class="icheck-primary offset-sm-1 d-inline">
                                                    <input type="checkbox" id="medium_rural_producer"
                                                           name="medium_rural_producer" {{ (old('medium_rural_producer') == 'on' || old('medium_rural_producer') == true ? 'checked' : ($user->medium_rural_producer == true ? 'checked' : '')) }}>
                                                    <label for="medium_rural_producer">Médio</label>
                                                </div>

                                                <div class="icheck-primary offset-sm-1 d-inline">
                                                    <input type="checkbox" id="large_rural_producer"
                                                           name="large_rural_producer" {{ (old('large_rural_producer') == 'on' || old('large_rural_producer') == true ? 'checked' : ($user->large_rural_producer == true ? 'checked' : '')) }}>
                                                    <label for="large_rural_producer">Grande</label>
                                                </div>

                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Grupo Organizado</label>
                                                    <select name="organized_group" class="custom-select">
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
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Tipo do Grupo Organizado</label>
                                                    <select name="organized_group_type" class="custom-select">
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
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Nome do Grupo Organizado</label>
                                                    <input type="tel" class="form-control" class="mask-doc"
                                                           name="organized_group_name"
                                                           placeholder="Nome do Grupo Organizado"
                                                           value="{{ old('organized_group_name') ?? $user->organized_group_name }}"/>
                                                </div>
                                            </div>


                                        </div>























                                        <div class="col-12 col-sm-12">
                                            <div class="card card-primary card-outline card-outline-tabs">

                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Home</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Profile</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Messages</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-four-tabContent">

                                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

















                                    </div>
                                    {{-- Fim Dados Produtor --}}





                                    {{-- Cônjuge --}}
                                    <div class="tab-pane fade" id="vert-tabs-spouse" role="tabpanel"
                                         aria-labelledby="vert-tabs-spouse-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Cônjuge</h3>
                                        </div>


                                        <div class="row">


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Tipo de Comunhão</label>
                                                    <select name="type_of_communion" class="custom-select">
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
                                                </div>
                                            </div>


                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" name="spouse_name" class="form-control"
                                                           placeholder="Nome do cônjuge"
                                                           value="{{ old('spouse_name') ?? $user->spouse_name }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Genero</label>
                                                    <select name="spouse_genre" class="custom-select">
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
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Data de Nascimento</label>
                                                    <input type="text" name="spouse_place_of_birth" class="form-control"
                                                           placeholder="Data de nascimento"
                                                           value="{{ old('spouse_place_of_birth') ?? $user->spouse_place_of_birth }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Naturalidade</label>
                                                    <input type="text" name="spouse_place_of_birth" class="form-control"
                                                           placeholder="Cidade de nascimento"
                                                           value="{{ old('spouse_place_of_birth') ?? $user->spouse_place_of_birth }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>CPF</label>
                                                    <input type="tel" class="form-control" class="mask-doc"
                                                           name="spouse_document" placeholder="CPF do Cônjuge"
                                                           value="{{ old('spouse_document') ?? $user->spouse_document }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="legend">RG</span>
                                                    <input type="text" name="spouse_document_secondary"
                                                           class="form-control"
                                                           placeholder="RG do Cônjuge"
                                                           value="{{ old('spouse_document_secondary') ?? $user->spouse_document_secondary }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="legend">Órgão Expedidor</span>

                                                    <input type="text" name="spouse_document_secondary_complement"
                                                           class="form-control" placeholder="Expedição"
                                                           value="{{ old('spouse_document_secondary_complement') ?? $user->spouse_document_secondary_complement }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Profissão</label>
                                                    <input type="text" class="form-control" name="spouse_occupation"
                                                           placeholder="Profissão"
                                                           value="{{ old('spouse_occupation') ?? $user->spouse_occupation }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Renda</label>
                                                    <input type="tel" class="form-control" name="spouse_income"
                                                           class="mask-money"
                                                           placeholder="Valores em Reais"
                                                           value="{{ old('spouse_income') ?? $user->spouse_income }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input class="form-control" type="text" name="spouse_company_work"
                                                           placeholder="Empresa em que trabalha"
                                                           value="{{ old('spouse_company_work') ?? $user->spouse_company_work }}"/>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    {{-- Fim Cônjuge--}}









                                    {{-- Renda --}}
                                    <div class="tab-pane fade" id="vert-tabs-income" role="tabpanel"
                                         aria-labelledby="vert-tabs-income-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Renda</h3>
                                        </div>


                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Profissão</label>
                                                    <input type="text" class="form-control" name="occupation"
                                                           placeholder="Profissão"
                                                           value="{{ old('occupation') ?? $user->occupation }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Renda</label>
                                                    <input type="tel" class="form-control" name="income"
                                                           class="mask-money"
                                                           placeholder="Valores em Reais"
                                                           value="{{ old('income') ?? $user->income }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input class="form-control" type="text" name="company_work"
                                                           placeholder="Empresa em que trabalha"
                                                           value="{{ old('company_work') ?? $user->company_work }}"/>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    {{-- Fim Cônjuge--}}









                                    {{-- Dados Bancários --}}
                                    <div class="tab-pane fade" id="vert-tabs-banks" role="tabpanel"
                                         aria-labelledby="vert-tabs-banks-tab">


                                        <div class="card-header mb-2">
                                            <h3 class="card-title">Dados Bancários</h3>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <a href="{{ route('admin.accounts.create', ['user' => $user->id]) }}">
                                                    <button type="button" class="btn btn-xs bg-gradient-primary ml-3"
                                                            style="float:right;"><i
                                                                class="fa fa-plus"></i> Cadastrar Dados Bancários
                                                    </button>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <table class="table table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th>Titular</th>
                                                        <th>Agência</th>
                                                        <th>Conta</th>
                                                        <th width="100">Ação</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @if($accounts)
                                                        @foreach($accounts as $account)


                                                            <tr>
                                                                <td>{{ $account->user()->first()->name }}</td>
                                                                <td>{{ $account->bank()->first()->bank }} ({{ $account->agency }} - {{ $account->agency_dv }})</td>
                                                                <td>{{ $account->account }} - {{ $account->account_dv }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.accounts.edit', ['account' => $account->id]) }}">
                                                                        <button type="button"
                                                                                class="btn btn-block bg-gradient-primary btn-xs">
                                                                            <i class="fa fa-edit"></i> Editar
                                                                        </button>
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


                                    </div>
                                    {{-- Fim Dados Bancários --}}








                                    {{-- Documentos --}}
                                    <div class="tab-pane fade" id="vert-tabs-documents" role="tabpanel"
                                         aria-labelledby="vert-tabs-documents-tab">

                                        <div class="card-header mb-2">
                                            <h3 class="card-title">Documentos</h3>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <a href="{{ route('admin.documents.create', ['user' => $user->id]) }}">
                                                    <button type="button" class="btn btn-xs bg-gradient-primary ml-3"
                                                            style="float:right;"><i
                                                                class="fa fa-plus"></i> Cadastrar Documento
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-12 mb-2">

                                                <table class="table table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Categoria</th>
                                                        <th>Título</th>
                                                        <th>Cliente</th>
                                                        <th>Arquivo</th>
                                                        <th>Ação</th>
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
                                                                    <a href="{{ asset('storage/' . $documents_user->path) }}"
                                                                       target="_blank">
                                                                        <button type="button"
                                                                                class="btn btn-xs bg-gradient-success">
                                                                            <i
                                                                                    class="fa fa-download"></i> Donwload
                                                                            do Arquivo
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.documents.edit', ['$document' => $document->id]) }}">
                                                                        <button type="button"
                                                                                class="btn btn-xs bg-gradient-primary">
                                                                            <i class="fa fa-edit"></i> Editar
                                                                        </button>
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
                                    </div>
                                    {{-- Fim Documentos --}}








                                    {{-- Propriedades --}}
                                    <div class="tab-pane fade" id="vert-tabs-properties" role="tabpanel"
                                         aria-labelledby="vert-tabs-properties-tab">

                                        <div class="card-header mb-2">
                                            <h3 class="card-title">Propriedades</h3>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <a href="{{ route('admin.properties.create', ['user' => $user->id]) }}">
                                                    <button type="button" class="btn btn-xs bg-gradient-primary ml-3"
                                                            style="float:right;"><i
                                                                class="fa fa-plus"></i> Cadastrar Propriedade
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-12">

                                                <table class="table table-sm">
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
                                                                <td>{{ $property->user()->first()->name }}</td>
                                                                <td>{{ $property->category }}</td>
                                                                <td>{{ $property->type }}</td>
                                                                <td>R$ {{ $property->sale_price }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}">
                                                                        <button type="button"
                                                                                class="btn btn-block bg-gradient-primary btn-xs">
                                                                            <i class="fa fa-edit"></i> Editar
                                                                        </button>
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

                                    </div>
                                    {{-- Fim Propriedades --}}









                                    {{-- Empresas  --}}
                                    <div class="tab-pane fade" id="vert-tabs-companies" role="tabpanel"
                                         aria-labelledby="vert-tabs-companies-tab">

                                        <div class="card-header mb-2">
                                            <h3 class="card-title">Empresas</h3>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12 mb-4">
                                                <p class="text-right">
                                                    <a href="{{ route('admin.companies.create', ['user' => $user->id]) }}">
                                                        <button type="button"
                                                                class="btn btn-xs bg-gradient-primary"><i
                                                                    class="fa fa-plus"></i> Cadastrar Empresa
                                                        </button>
                                                    </a>
                                                </p>
                                            </div>


                                            <div class="col-sm-12 mb-3">
                                                @if($user->companies()->get())
                                                    @foreach($user->companies()->get() as $company)

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <b>{{ $company->social_name }}</b></h5>

                                                                <p class="card-text">
                                                                    <small>
                                                                        <b>Nome Fantasia:</b> {{ $company->alias_name }}
                                                                        <br>
                                                                        <b>CNPJ:</b> {{ $company->document_company }} -
                                                                        <b>Inscrição
                                                                            Estadual:</b>{{ $company->document_company_secondary }}
                                                                        <br>
                                                                        <b>Endereço:</b> {{ $company->street }}
                                                                        , {{ $company->number }}
                                                                        @if(!empty($company->complement)){{ $company->complement }}
                                                                        ,  @endif
                                                                        - {{ $company->neighborhood }}
                                                                        - {{$company->city}}/{{ $company->state }}
                                                                    </small>
                                                                </p>

                                                                <a href="{{ route('admin.companies.edit', ['company' => $company->id]) }}"
                                                                   class="card-link">Editar</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="no-content mb-2">Não foram encontrados registros!</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Fim Empresas --}}








                                    {{-- Acesso --}}
                                    <div class="tab-pane fade" id="vert-tabs-access" role="tabpanel"
                                         aria-labelledby="vert-tabs-access-tab">


                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Acesso</h3>
                                        </div>


                                        <div class="row">

                                            <div class="col-sm-12 mb-4">
                                                <div class="row">
                                                    <label>Tipo de Acesso</label>
                                                </div>

                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="checkboxPrimary1"
                                                           name="admin" {{ (old('admin') == 'on' || old('admin') == true ? 'checked' : ($user->admin == true ? 'checked' : '')) }}>
                                                    <label for="checkboxPrimary1">Administrativo</label>
                                                </div>

                                                <div class="icheck-primary offset-sm-1 d-inline">
                                                    <input type="checkbox" id="checkboxPrimary2"
                                                           name="client" {{ (old('client') == 'on' || old('client') == true ? 'checked' : ($user->client == true ? 'checked' : '')) }}>
                                                    <label for="checkboxPrimary2">Cliente</label>
                                                </div>

                                                <div class="icheck-primary offset-sm-1 d-inline">
                                                    <input type="checkbox" id="checkboxPrimary3"
                                                           name="provider" {{ (old('provider') == 'on' || old('provider') == true ? 'checked' : ($user->provider== true ? 'checked' : '')) }}>
                                                    <label for="checkboxPrimary3">Fornecedor</label>
                                                </div>

                                                <div class="icheck-primary offset-sm-1 d-inline">
                                                    <input type="checkbox" id="checkboxPrimary4"
                                                           name="clerk" {{ (old('clerk') == 'on' || old('clerk') == true ? 'checked' : ($user->clerk== true ? 'checked' : '')) }}>
                                                    <label for="checkboxPrimary4">Atendente</label>
                                                </div>

                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="email" name="email" class="form-control"
                                                           placeholder="Endereço de e-mail"
                                                           value="{{ old('email') ?? $user->email }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>E-Senha</label>
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="Digite uma senha em caso de alteração"
                                                           value=""/>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Setor de Atendimento</label>
                                                    <select name="sector" class="custom-select">
                                                        <option value="">Escolha o setor de atendimento</option>
                                                        @foreach($sectors as $sector)
                                                            <option value="{{ $sector->id }}" {{ ($sector->id === $user->sector ? 'selected' : '') }}>{{ $sector->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <p style="margin-top: 4px; margin-bottom:40px;">
                                                    <a href="{{ route('admin.call_sectors.index') }}"
                                                       class="text-orange icon-link" style="font-size: .8em;"
                                                       target="_blank">Editar
                                                        Setores de Atendimento</a> |
                                                    <a href="{{ route('admin.call_sectors.create') }}"
                                                       class="text-orange icon-link" style="font-size: .8em;"
                                                       target="_blank">Cadastrar
                                                        Novo Setor de Atendimento</a>
                                                </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Foto</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                   id="exampleInputFile"
                                                                   name="cover">
                                                            <label class="custom-file-label" for="exampleInputFile">Escolher
                                                                Arquivo</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <section class="app_users_home">
                                                    <article class="user radius">
                                                        <div class="cover"
                                                             style="background-size: cover; background-image: url({{ $user->cover }});"></div>
                                                    </article>
                                                </section>
                                            </div>


                                        </div>
                                        {{-- Fim Propriedades --}}


                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->


                        <!-- /.card-body -->
                        <div class="card-footer">

                            Última atualização: {{ date('d/m/Y', strtotime($user->updated_at)) }}

                            <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                        class="fa fa-long-arrow-alt-right"></i> Atualizar Cliente
                            </button>

                        </div>
                        <!-- /.card-footer-->


                    </div>

            </form>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection