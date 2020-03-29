@extends('admin.master.master')

@section('content')

    <div style="flex-basis: 100%;">
        <section class="dash_content_app">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Painel de Controle</h2>
            </header>

            <div class="dash_content_app_box">
                <section class="app_dash_home_stats">

                    <article class="blog radius">
                        <h4 class="icon-comments-o"><a href="{{ route('admin.calls.index') }}" class="text-green">Atendimento</a></h4>
                        {{--                        <p><b>Disponíveis:</b> 100</p>--}}
                        {{--                        <p><b>Locados:</b> 100</p>--}}
                        {{--                        <p><b>Total:</b> 200</p>--}}
                    </article>



                    <article class="control radius">
                        <h4 class="icon-users"><a href="{{ route('admin.users.index') }}" class="text-green">Clientes</a></h4>
{{--                        <p><b>Locadores:</b> 100</p>--}}
{{--                        <p><b>Locatários:</b> 100</p>--}}
{{--                        <p><b>Time:</b> 3</p>--}}
                    </article>


                    <article class="users radius">
                        <h4 class="icon-file-text"><a href="{{ route('admin.contracts.index') }}" class="text-green">Contratos</a></h4>
                        <p><b>Oficializados:</b> 455</p>
                    </article>
                </section>
            </div>
        </section>

        <section class="dash_content_app" style="margin-top: 40px;">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Últimos Contratos Cadastrados</h2>
            </header>

            <div class="dash_content_app_box">
                <div class="dash_content_app_box_stage">

                    <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                        <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Valor</th>
                            <th>Início</th>
                            <th width="80">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)

                            <tr>
                                <td>{{ $contract->user()->first()->name }}</td>
                                <td>{{ $contract->service()->first()->title }}</td>
                                <td>R$ {{ $contract->contract_price }}</td>
                                <td>{{ $contract->start_date }}</td>
                                <td>
                                    <a href="{{ route('admin.contracts.edit', ['contract' => $contract->id]) }}" class="btn btn-large btn-blue icon-check">
                                        Editar</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </section>

    </div>

@endsection