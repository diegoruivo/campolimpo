@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-file-text">Editar Contrato</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="">Painel de Controle</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.contracts.index') }}">Contratos</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="" class="text-orange">Editar Contrato</a></li>
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
                    <a href="#parts" class="nav_tabs_item_link active">Das Partes</a>
                </li>
                <li class="nav_tabs_item">
                    <a href="#terms" class="nav_tabs_item_link">Termos</a>
                </li>
            </ul>

            <div class="nav_tabs_content">
                <div id="parts">
                    <form action="{{ route('admin.contracts.update', ['contract' => $contract->id]) }}" method="post" class="app_form">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $contract->id }}">

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
                                                <option value="{{ $service->id }}"  {{ ($service->id === $contract->service? 'selected' : '') }}>{{ $service->title }}</option>
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
                                                <option value="{{ $user->id }}"  {{ ($user->id === $contract->user ? 'selected' : '') }}>{{ $user->name }} ({{ $user->document }})</option>
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
                                               placeholder="Valor do Serviço" value="{{ $contract->contract_price }}"/>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Dia de Vencimento:</span>
                                        <select name="pay_day" class="select2">
                                            <option value="1" {{ (old('pay_day') == '1' ? 'selected' : ($contract->pay_day == '1' ? 'selected' : '')) }}>1º</option>
                                            <option value="2" {{ (old('pay_day') == '2' ? 'selected' : ($contract->pay_day == '2' ? 'selected' : '')) }}>2/mês</option>
                                            <option value="3" {{ (old('pay_day') == '3' ? 'selected' : ($contract->pay_day == '3' ? 'selected' : '')) }}>3/mês</option>
                                            <option value="4" {{ (old('pay_day') == '4' ? 'selected' : ($contract->pay_day == '4' ? 'selected' : '')) }}>4/mês</option>
                                            <option value="5" {{ (old('pay_day') == '5' ? 'selected' : ($contract->pay_day == '5' ? 'selected' : '')) }}>5/mês</option>
                                            <option value="6" {{ (old('pay_day') == '6' ? 'selected' : ($contract->pay_day == '6' ? 'selected' : '')) }}>6/mês</option>
                                            <option value="7" {{ (old('pay_day') == '7' ? 'selected' : ($contract->pay_day == '7' ? 'selected' : '')) }}>7/mês</option>
                                            <option value="8" {{ (old('pay_day') == '8' ? 'selected' : ($contract->pay_day == '8' ? 'selected' : '')) }}>8/mês</option>
                                            <option value="9" {{ (old('pay_day') == '9' ? 'selected' : ($contract->pay_day == '9' ? 'selected' : '')) }}>9/mês</option>
                                            <option value="10" {{ (old('pay_day') == '10' ? 'selected' : ($contract->pay_day == '10' ? 'selected' : '')) }}>10/mês</option>
                                            <option value="11" {{ (old('pay_day') == '11' ? 'selected' : ($contract->pay_day == '11' ? 'selected' : '')) }}>11/mês</option>
                                            <option value="12" {{ (old('pay_day') == '12' ? 'selected' : ($contract->pay_day == '12' ? 'selected' : '')) }}>12/mês</option>
                                            <option value="13" {{ (old('pay_day') == '13' ? 'selected' : ($contract->pay_day == '13' ? 'selected' : '')) }}>13/mês</option>
                                            <option value="14" {{ (old('pay_day') == '14' ? 'selected' : ($contract->pay_day == '14' ? 'selected' : '')) }}>14/mês</option>
                                            <option value="15" {{ (old('pay_day') == '15' ? 'selected' : ($contract->pay_day == '15' ? 'selected' : '')) }}>15/mês</option>
                                            <option value="16" {{ (old('pay_day') == '16' ? 'selected' : ($contract->pay_day == '16' ? 'selected' : '')) }}>16/mês</option>
                                            <option value="17" {{ (old('pay_day') == '17' ? 'selected' : ($contract->pay_day == '17' ? 'selected' : '')) }}>17/mês</option>
                                            <option value="18" {{ (old('pay_day') == '18' ? 'selected' : ($contract->pay_day == '18' ? 'selected' : '')) }}>18/mês</option>
                                            <option value="19" {{ (old('pay_day') == '19' ? 'selected' : ($contract->pay_day == '19' ? 'selected' : '')) }}>19/mês</option>
                                            <option value="20" {{ (old('pay_day') == '20' ? 'selected' : ($contract->pay_day == '20' ? 'selected' : '')) }}>20/mês</option>
                                            <option value="21" {{ (old('pay_day') == '21' ? 'selected' : ($contract->pay_day == '21' ? 'selected' : '')) }}>21/mês</option>
                                            <option value="22" {{ (old('pay_day') == '22' ? 'selected' : ($contract->pay_day == '22' ? 'selected' : '')) }}>22/mês</option>
                                            <option value="23" {{ (old('pay_day') == '23' ? 'selected' : ($contract->pay_day == '23' ? 'selected' : '')) }}>23/mês</option>
                                            <option value="24" {{ (old('pay_day') == '24' ? 'selected' : ($contract->pay_day == '24' ? 'selected' : '')) }}>24/mês</option>
                                            <option value="25" {{ (old('pay_day') == '25' ? 'selected' : ($contract->pay_day == '25' ? 'selected' : '')) }}>25/mês</option>
                                            <option value="26" {{ (old('pay_day') == '26' ? 'selected' : ($contract->pay_day == '26' ? 'selected' : '')) }}>26/mês</option>
                                            <option value="27" {{ (old('pay_day') == '27' ? 'selected' : ($contract->pay_day == '27' ? 'selected' : '')) }}>27/mês</option>
                                            <option value="28" {{ (old('pay_day') == '28' ? 'selected' : ($contract->pay_day == '28' ? 'selected' : '')) }}>28/mês</option>
                                            <option value="29" {{ (old('pay_day') == '29' ? 'selected' : ($contract->pay_day == '29' ? 'selected' : '')) }}>29/mês</option>
                                            <option value="30" {{ (old('pay_day') == '30' ? 'selected' : ($contract->pay_day == '30' ? 'selected' : '')) }}>30/mês</option>
                                            <option value="31" {{ (old('pay_day') == '31' ? 'selected' : ($contract->pay_day == '31' ? 'selected' : '')) }}>31/mês</option>
                                        </select>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Prazo do Contrato</span>
                                        <select name="deadline" class="select2">
                                            <option value="1" {{ (old('deadline') == '1' ? 'selected' : ($contract->deadline == '1' ? 'selected' : '')) }}>1 mês</option>
                                            <option value="2" {{ (old('deadline') == '2' ? 'selected' : ($contract->deadline == '2' ? 'selected' : '')) }}>2 meses</option>
                                            <option value="3" {{ (old('deadline') == '3' ? 'selected' : ($contract->deadline == '3' ? 'selected' : '')) }}>3 meses</option>
                                            <option value="4" {{ (old('deadline') == '4' ? 'selected' : ($contract->deadline == '4' ? 'selected' : '')) }}>4 meses</option>
                                            <option value="5" {{ (old('deadline') == '5' ? 'selected' : ($contract->deadline == '5' ? 'selected' : '')) }}>5 meses</option>
                                            <option value="6" {{ (old('deadline') == '6' ? 'selected' : ($contract->deadline == '6' ? 'selected' : '')) }}>6 meses</option>
                                            <option value="7" {{ (old('deadline') == '7' ? 'selected' : ($contract->deadline == '7' ? 'selected' : '')) }}>7 meses</option>
                                            <option value="8" {{ (old('deadline') == '8' ? 'selected' : ($contract->deadline == '8' ? 'selected' : '')) }}>8 meses</option>
                                            <option value="9" {{ (old('deadline') == '9' ? 'selected' : ($contract->deadline == '9' ? 'selected' : '')) }}>9 meses</option>
                                            <option value="10" {{ (old('deadline') == '10' ? 'selected' : ($contract->deadline == '10' ? 'selected' : '')) }}>10 meses</option>
                                            <option value="11" {{ (old('deadline') == '11' ? 'selected' : ($contract->deadline == '11' ? 'selected' : '')) }}>11 meses</option>
                                            <option value="12" {{ (old('deadline') == '12' ? 'selected' : ($contract->deadline == '12' ? 'selected' : '')) }}>12 meses</option>
                                            <option value="24" {{ (old('deadline') == '24' ? 'selected' : ($contract->deadline == '24' ? 'selected' : '')) }}>24 meses</option>
                                            <option value="36" {{ (old('deadline') == '36' ? 'selected' : ($contract->deadline == '36' ? 'selected' : '')) }}>36 meses</option>
                                            <option value="48" {{ (old('deadline') == '48' ? 'selected' : ($contract->deadline == '48' ? 'selected' : '')) }}>48 meses</option>
                                        </select>
                                    </label>

                                    <label class="label">
                                        <span class="legend">Data de Início:</span>
                                        <input type="tel" name="start_date" class="mask-date" placeholder="Data de Início"
                                               value="{{ $contract->start_date }}"/>
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