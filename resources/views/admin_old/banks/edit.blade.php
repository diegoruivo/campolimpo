@extends('admin.master.master')

@section('content')


    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2><i class="fa fa-university"></i> Editar Banco</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Painel de Controle</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.banks.index') }}">Bancos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="" class="text-orange">Editar Banco</a></li>
                    </ul>
                </nav>

                <a href="{{ route('admin.banks.create') }}" class="btn btn-orange ml-1"><i class="fa fa-university"></i> Cadastrar Banco</a>


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
                        <a href="#data" class="nav_tabs_item_link active">Banco</a>
                    </li>
                </ul>

                <form action="{{ route('admin.banks.update', ['bank' => $bank->id]) }}"
                      method="post" class="app_form" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                        <div id="data">

                            <div class="label_g2">

                                <label class="label">
                                    <span class="legend">*Nome do Banco</span>
                                    <input type="text" name="bank" placeholder="Nome do Banco"
                                           value="{{ old('bank') ?? $bank->bank }}"/>
                                </label>

                                <label class="label">
                                    <span class="legend">Dígito Verificador</span>
                                    <input type="text" name="bank_dv" placeholder="Digito Verificador do Banco"
                                           value="{{ old('bank_dev') ?? $bank->bank_dv }}"/>
                                </label>

                                <label class="label" style="margin-left: 20px;">
                                    <span class="legend">Logotipo</span>
                                    <input type="file" name="logo">
                                </label>

                            </div>

                            <label class="label">
                                <img src="
                               @if($bank->logo)
                                {{ url('storage/' . $bank->logo)  }}
                                @endif
                                        " alt="">
                            </label>

                        </div>

                        <div class="text-right mt-2">
                            <button class="btn btn-large btn-green icon-check-square-o">Atualizar Banco</button>
                        </div>

                    </div>

                </form>


                    <form action="{{ route('admin.banks.destroy', ['id' => $bank->id]) }}" method="post"
                          class="app_form" onsubmit="confirm('Tem certeza que deseja este cadastro?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-large btn-red icon-trash">Excluir Banco</button>
                    </form>



            </div>
        </div>
    </section>

@endsection