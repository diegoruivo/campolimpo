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
                            <small><i class="fa fa-briefcase"></i></small>
                            Cadastrar Contrato
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contracts.index') }}">Contratos</a></li>
                            <li class="breadcrumb-item active">Cadastrar Contrato</li>
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
                    <p class="icon-asterisk">{{ $error }}</p>
                    @endmessage
                @endforeach
            @endif

            <form role="form" action="{{ route('admin.contracts.store', ['call' => $call->id]) }}" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Contrato</h3>

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

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            @if(!empty($user->cover))
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{ $user->cover }}">
                                            @endif
                                        </div>

                                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                        <p class="text-muted text-center">{{ $user->occupation }}</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Atendimentos</b> <a class="float-right">{{ $ncalls }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Serviços Contrados</b> <a class="float-right">{{ $ncontracts }}</a>
                                            </li>
                                        </ul>

                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                           class="btn btn-primary btn-block"><b>Cadastro do Cliente</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>


                            <div class="col-sm-9">


                                <div class="col-12">
                                    <div class="info-box bg-gradient-primary">
                                            <span class="info-box-icon"><h1><big><i
                                                                class="fa fa-headset"></i></big></h1></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Atendimento n° <b>{{ $call->id }}</b></span>
                                            <span  class="progress-description" style="float:right">{{ $call->created_at }}
                                                    <br> Status:
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

                                            <span class="info-box-number"><small>Senha:</small> <h3>{{ $call->password }}</h3></span>
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
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Serviço(s) Contratado(s)</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th>Serviço</th>
                                                        <th>Preço</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($call_services as $service)
                                                        <tr>
                                                        <td>{{ $service->title }}</td>
                                                        <td>R$ {{ $service->price }}</td>
                                                    </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.row -->



                            </div>



                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>*Dia do Vencimento</label>
                                    <select name="pay_day" class="custom-select" required>
                                        <option value="">Selecione a opção</option>
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
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>*Prazo do Contrato</label>
                                    <select name="deadline" class="custom-select" required>
                                        <option value="">Selecione a opção</option>
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
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Data de Início</label>
                                    <input type="text" name="start_date" class="form-control"
                                           data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                           placeholder="Data de Início"
                                           value="{{ old('start_date') }}"/>
                                </div>
                            </div>


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                    class="fa fa-long-arrow-alt-right"></i> Cadastrar Contrato
                        </button>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

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
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#cpf').inputmask('999.999.999-99', { 'placeholder': '999.999.999-99' })
            //Money Euro
            $('[data-mask]').inputmask()

            var $j = jQuery.noConflict();
            $j(document).ready(function(){
                $j("#contract_price").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
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