@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-file-text">Cadastrar Novo Contrato</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.contracts.index') }}">Contratos</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Cadastrar Contrato</a></li>
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
                    <a href="#parts" class="nav_tabs_item_link active">Das Partes</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#terms" class="nav_tabs_item_link">Termos</a>
                </li>
            </ul>

            <div class="nav_tabs_content">
                <div id="parts">
                    <form action="{{ route('admin.contracts.store') }}" method="post" class="app_form">

                        @csrf

                        <div class="app_collapse">
                            <div class="app_collapse_header mt-2 collapse">
                                <h3>Partes</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">

                                <div class="label_g2">


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
                                    </label>
                                </div>


                            </div>
                        </div>



                        <div class="app_collapse">
                            <div class="app_collapse_header mt-2 collapse">
                                <h3>Parâmetros do Contrato</h3>
                                <span class="icon-minus-circle icon-notext"></span>
                            </div>

                            <div class="app_collapse_content">

                                <div class="label_g4">

                                    <label class="label">
                                        <span class="legend">Valor do Serviço:</span>
                                        <input type="tel" name="contract_price" class="mask-money"
                                               placeholder="Valor do Serviço"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Dia de Vencimento:</span>
                                        <select name="pay_day" class="select2">
                                            <option value="1">1º</option>
                                            <option value="2">2/mês</option>
                                            <option value="3">3/mês</option>
                                            <option value="4">4/mês</option>
                                            <option value="5">5/mês</option>
                                            <option value="6">6/mês</option>
                                            <option value="7">7/mês</option>
                                            <option value="8">8/mês</option>
                                            <option value="9">9/mês</option>
                                            <option value="10">10/mês</option>
                                            <option value="11">11/mês</option>
                                            <option value="12">12/mês</option>
                                            <option value="13">13/mês</option>
                                            <option value="14">14/mês</option>
                                            <option value="15">15/mês</option>
                                            <option value="16">16/mês</option>
                                            <option value="17">17/mês</option>
                                            <option value="18">18/mês</option>
                                            <option value="19">19/mês</option>
                                            <option value="20">20/mês</option>
                                            <option value="21">21/mês</option>
                                            <option value="22">22/mês</option>
                                            <option value="23">23/mês</option>
                                            <option value="24">24/mês</option>
                                            <option value="25">25/mês</option>
                                            <option value="26">26/mês</option>
                                            <option value="27">27/mês</option>
                                            <option value="28">28/mês</option>
                                            <option value="29">29/mês</option>
                                            <option value="30">30/mês</option>
                                            <option value="31">31/mês</option>
                                        </select>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Prazo do Contrato</span>
                                        <select name="deadline" class="select2">
                                            <option value="1">1 mês</option>
                                            <option value="2">2 meses</option>
                                            <option value="3">3 meses</option>
                                            <option value="4">4 meses</option>
                                            <option value="5">5 meses</option>
                                            <option value="6">6 meses</option>
                                            <option value="7">7 meses</option>
                                            <option value="8">8 meses</option>
                                            <option value="9">9 meses</option>
                                            <option value="10">10 meses</option>
                                            <option value="11">11 meses</option>
                                            <option value="12">12 meses</option>
                                            <option value="24">24 meses</option>
                                            <option value="36">36 meses</option>
                                            <option value="48">48 meses</option>
                                        </select>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Data de Início:</span>
                                        <input type="tel" name="start_date" class="mask-date" placeholder="Data de Início"
                                               value=""/>
                                    </label>

                                </div>


                            </div>
                        </div>

                        <div class="text-right mt-2">
                            <button class="btn btn-large btn-green icon-check-square-o">Salvar Contrato</button>
                        </div>
                    </form>
                </div>

                <div id="terms" class="d-none">
                    <h3 class="mb-2">Termos</h3>

                    <textarea name="terms" cols="30" rows="10" class="mce"></textarea>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection