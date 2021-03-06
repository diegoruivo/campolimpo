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
                            <small><i class="fa fa-business-time"></i></small>
                            Editar Ordem
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Ordens</a>
                            </li>
                            <li class="breadcrumb-item active">Editar Ordem</li>
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

            <form role="form" action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Ordem</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-3">
                                @include('admin.includes.profile')
                            </div>


                            <div class="col-sm-9">


                                <div class="col-12">
                                    <div class="info-box bg-gradient-primary">
                                            <span class="info-box-icon"><h1><big><i
                                                                class="fa fa-headset"></i></big></h1></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Ordem referente ao Contrato n° <b>{{ $contract->id }}</b></span>
                                            <span class="progress-description" style="float:right">{{ $contract->created_at }}
                                                    <br> Status Contrato:
                                                    @if($call->status == 0)
                                                    <span class="badge badge-warning">Inicial</span>
                                                @endif

                                                @if($call->status == 1)
                                                    <span class="badge badge-warning">Processando</span>
                                                @endif

                                                @if($call->status == 2)
                                                    <span class="badge badge-success">Contratado</span>
                                                @endif

                                                @if($call->status == 3)
                                                    <span class="badge badge-danger">Cancelado</span>
                                                @endif
                                                </span>

                                            <span class="info-box-number"><small>Senha do Atendimento:</small> <h3>{{ $call->password }}</h3></span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 10%"></div>
                                            </div>
                                            <span class="time" style="float:right"><i class="far fa-clock"></i>
                                                    <span id="hora">00h</span><span id="minuto">00m</span><span
                                                        id="segundo">00s</span>
                                                </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>


                                <!-- /.row -->
                                <div class="row">


                                    <div class="col-12">
                                        <div class="card p-4">
                                            <h3 class="card-title">Serviço Contratado</h3>
                                            <h2>Service</h2>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>*Fornecedor</label>
                                            <select name="provider" class="custom-select" required>
                                                <option value="" {{ (old('provider') == '' ? 'selected_provider' : '') }}>
                                                    Selecione o Fornecedor
                                                </option>
                                                @foreach($providers as $provider)
                                                    <option value="{{ $provider->id }}" {{ ($provider->id === $order->provider ? 'selected' : '') }} >{{ $provider->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Data Início</label>
                                            <input type="text" name="start_date" class="form-control"
                                                   data-inputmask-alias="datetime"
                                                   data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                   placeholder="Data Início"
                                                   value="{{ old('start_date') ?? $order->start_date }}"/>
                                        </div>
                                    </div>



                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Hora Início</label>
                                            <input type="time" name="start_time" class="form-control"

                                                   placeholder="Hora Início"
                                                   value="{{ old('start_time') ?? $order->start_time }}"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Data Término</label>
                                            <input type="text" name="end_date" class="form-control"
                                                   data-inputmask-alias="datetime"
                                                   data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                   placeholder="Data Término"
                                                   value="{{ old('end_date') ?? $order->end_date }}"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Hora Término</label>
                                            <input type="time" name="end_time" class="form-control"
                                                   data-inputmask-alias="datetime" data-inputmask-inputformat="HH:mm"
                                                   data-mask
                                                   placeholder="Hora Início"
                                                   value="{{ old('end_time') ?? $order->end_time }}"/>
                                        </div>
                                    </div>


                                    <div class="col-sm-8">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" name="description" cols="30"
                                                      rows="4">{{ old('description') ?? $order->description }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label>Status da Ordem</label>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($order->status == 0) checked
                                                       @endif id="0" value="0">
                                                <label for="0">Inicial
                                                </label>
                                            </div>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($order->status == 1) checked
                                                       @endif id="1" value="1">
                                                <label for="1">Processando
                                                </label>
                                            </div>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($order->status == 2) checked
                                                       @endif id="2" value="2">
                                                <label for="2">Concluída
                                                </label>
                                            </div>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($order->status == 3) checked
                                                       @endif id="3" value="3">
                                                <label for="3">Cancelada
                                                </label>
                                            </div>

                                        </div>
                                    </div>


                                </div>


                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->


                        <!-- /.card-body -->
                        <div class="card-footer">

                            Última atualização: {{ date('d/m/Y H:i', strtotime($order->updated_at)) }}

                            <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                        class="fa fa-long-arrow-alt-right"></i> Atualizar Ordem
                            </button>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

                </div>

            </form>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('js')
    <script type="text/javascript">

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#cpf').inputmask('999.999.999-99', {'placeholder': '999.999.999-99'})
            //Money Euro
            $('[data-mask]').inputmask()

            var $j = jQuery.noConflict();
            $j(document).ready(function () {
                $j("#contract_price").maskMoney({
                    prefix: 'R$ ',
                    allowNegative: true,
                    thousands: '.',
                    decimal: ',',
                    affixesStay: false
                });
            });

        })


        // Cronometro
        var intervalo;

        function tempo(op) {
            if (op == 1) {
                document.getElementById('parar').style.display = "block";
                document.getElementById('comeca').style.display = "none";
            }
            var s = 1;
            var m = 0;
            var h = 0;
            intervalo = window.setInterval(function () {
                if (s == 60) {
                    m++;
                    s = 0;
                }
                if (m == 60) {
                    h++;
                    s = 0;
                    m = 0;
                }
                if (h < 10) document.getElementById("hora").innerHTML = "0" + h + "h"; else document.getElementById("hora").innerHTML = h + "h";
                if (s < 10) document.getElementById("segundo").innerHTML = "0" + s + "s"; else document.getElementById("segundo").innerHTML = s + "s";
                if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + "m"; else document.getElementById("minuto").innerHTML = m + "m";
                s++;
            }, 1000);
        }

        function parar() {
            window.clearInterval(intervalo);
            document.getElementById('parar').style.display = "none";
            document.getElementById('comeca').style.display = "block";
        }

        function volta() {
            document.getElementById('voltas').innerHTML += document.getElementById('hora').firstChild.data + "" + document.getElementById('minuto').firstChild.data + "" + document.getElementById('segundo').firstChild.data + "<br>";
        }

        function limpa() {
            document.getElementById('voltas').innerHTML = "";
        }

        window.onload = tempo;


    </script>
@endsection