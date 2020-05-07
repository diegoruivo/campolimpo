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
                            Cadastrar Ordem
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Ordens</a></li>
                            <li class="breadcrumb-item active">Cadastrar Ordem</li>
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

            <form role="form" action="{{ route('admin.orders.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de Ordem</h3>

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
                                            <span class="info-box-text">Ordem referente ao Contrato n° <b>{{ $order->contract }}</b></span>
                                            <span  class="progress-description" style="float:right">{{ $order->created_at }}
                                                    <br> Status:
                                                    @if($call->status == 0)
                                                    <span class="badge badge-warning">Inicial</span>
                                                @endif

                                                @if($call->status == 1)
                                                    <span class="badge badge-warning">Processando</span>
                                                @endif

                                                @if($call->status == 2)
                                                    <span class="badge badge-success">Concluído</span>
                                                @endif

                                                @if($call->status == 3)
                                                    <span class="badge badge-danger">Cancelado</span>
                                                @endif
                                                </span>
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



                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>*Data de Início</label>
                                            <input type="text" name="start_date" class="form-control"
                                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                   placeholder="Data de Início"
                                                   value="{{ old('start_date') }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>*Data de Término</label>
                                            <input type="text" name="end_date" class="form-control"
                                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                   placeholder="Data de Término"
                                                   value="{{ old('end_date') }}" required/>
                                        </div>
                                    </div>





                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Serviço Contratado</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="height: 200px;">
                                                <td>{{ $service->title }}</td>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.row -->


                                <div class="col-12">

                                    <div class="card-header">
                                        <h3 class="card-title">Descrição</h3>
                                    </div>

                                    <p class="p-4">{{ $call->description }}</p>

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