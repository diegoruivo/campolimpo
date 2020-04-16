@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Atendimento - Senha: {{ $call->password }}</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.calls.index') }}">Atendimento</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.calls.create') }}" class="text-orange">Criar Novo Atendimento</a>
                        </li>
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
                        <a href="#data" class="nav_tabs_item_link active">Atendimento ao Cliente</a>
                    </li>
                </ul>

                <form action="{{ route('admin.calls.update', ['call' => $call->id]) }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                        <div id="data">



                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">*Serviço:</span>
                                    <select name="service" class="select2" >
                                        <option value="" {{ (old('service') == '' ? 'selected' : '') }}>Selecione um
                                            Serviço
                                        </option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}"  {{ ($service->id === $call->service? 'selected' : '') }}>{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label class="label">
                                    <span class="legend">*Cliente:</span>
                                    <select name="user" class="select2" >
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Cliente
                                        </option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}"  {{ ($user->id === $call->user ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
                                        @endforeach
                                    </select>
                                </label>



                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">*Setor de Atendimento:</span>

                                        <select name="sector" class="select2" >
                                            <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                                Setor de Atendimento
                                            </option>
                                            @foreach($sectors as $sector)
                                                <option value="{{ $sector->id }}"  {{ ($sector->id === $call->sector? 'selected' : '') }}>{{ $sector->title}} </option>
                                            @endforeach
                                        </select>

                                </label>

                            </div>


                            <label class="label">
                                <span class="legend">Descrição do Atendimento:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') ?? $call->description }}</textarea>
                            </label>



                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Atendimento</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection