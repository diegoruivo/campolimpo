@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-tags">Cadastrar DAP</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.calls.index') }}">Atendimento</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Cadastrar Atendimento</a>
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

                <form action="{{ route('admin.calls.store') }}" method="post" class="app_form"
                      enctype="multipart/form-data">

                    @csrf
                    <?php $password = sprintf('%04X', mt_rand(0, 0xFFFF)); ?>


                    <input type="hidden" name="password" value="{{ $password }}">


                    <div class="nav_tabs_content">
                        <div id="data">



                            <div class="label_g2">
                            <label class="label">
                                <span class="legend">*Cliente:</span>
                                <select name="user" class="select2" >
                                    <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                        Cliente
                                    </option>
                                    @foreach($users as $user)
                                        @if (!empty($selected))
                                            <option value="{{ $user->id }}" {{ ($user->id === $selected->id ? 'selected' : '') }} >{{ $user->name }}
                                                ({{ $user->document }})

                                            </option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->document }}
                                                )
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <p style="margin-top: 4px;">
                                    <a href="{{ route('admin.users.create') }}" class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar Cliente</a>
                                </p>
                            </label>


                            <label class="label">
                                <span class="legend">*Serviço:</span>
                                <select name="service" class="select2" >
                                    <option value="" {{ (old('service') == '' ? 'selected' : '') }}>Selecione um
                                        Serviço
                                    </option>
                                    @foreach($services as $service)
                                        @if (!empty($selected))
                                            <option value="{{ $service->id }}" {{ ($service->id === $selected->id ? 'selected' : '') }} >{{ $service->title }} </option>
                                        @else
                                            <option value="{{ $service->id }}">{{ $service->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </label>



                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">*Setor de Atendimento:</span>
                                    <select name="sector" class="select2" >
                                        <option value="" {{ (old('user') == '' ? 'selected' : '') }}>Selecione um
                                            Setor
                                        </option>
                                        @foreach($sectors as $sector)
                                            @if (!empty($selected))
                                                <option value="{{ $sector->id }}" {{ ($sector->id === $selected->id ? 'selected' : '') }} >{{ $sector->title}}</option>
                                            @else
                                                <option value="{{ $sector->id }}">{{ $sector->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </label>

                            </div>


                            <label class="label">
                                <span class="legend">Descrição do Atendimento:</span>
                                <textarea name="description" cols="30" rows="10"
                                          class="mce">{{ old('description') }}</textarea>
                            </label>



                        </div>
                    </div>


                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Atendimento</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection