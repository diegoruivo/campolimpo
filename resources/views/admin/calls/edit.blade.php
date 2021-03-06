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
                            <small><i class="fa fa-headset"></i></small>
                            Atendimento
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.calls.index') }}">Atendimentos</a></li>
                            <li class="breadcrumb-item active">Atendimento</li>
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

            <form role="form" action="{{ route('admin.calls.update', ['call' => $call->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Detalhes do Atendimento</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-3">
                                @include('admin.includes.profile')
                            </div>


                            <div class="col-sm-9">

                                <div class="row">

                                    <div class="col-md-12 col-sm-12 col-12">
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



                                    @if($call->status != 0)
                                        <div class="col-sm-12">
                                        <h5>Serviço(s) Solicitado(s)</h5>
                                        @foreach($services as $service)
                                            @foreach($call_services as $call_service)
                                                {{ ($service->id === $call_service->service ? $service->title . ' | ' : '') }}
                                            @endforeach
                                        @endforeach
                                        </div>

                                        <div class="col-sm-12 mt-3">
                                            <h5>Descrição do Atendimento</h5>
                                            {{ $call->description }}
                                        </div>
                                        @endif

                                    @if($call->status == 0)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Escolha o(s) Serviço(s)</label>
                                            <select class="select2" multiple="multiple" name="services[]"
                                                    data-placeholder="Escolha o(s) Serviço(s)"
                                                    style="width: 100%;">
                                                @foreach($services as $service)
                                                    <option value="{{$service->id}}"
                                                    @foreach($call_services as  $call_service)
                                                        {{ ($service->id === $call_service->service ? 'selected' : '') }}
                                                            @endforeach
                                                    >{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" name="description" cols="30"
                                                      rows="4">{{ old('description') ?? $call->description }}</textarea>
                                        </div>
                                    </div>
                                    @endif


                                </div>


                            </div>


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y H:i', strtotime($call->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                    class="fa fa-long-arrow-alt-right"></i> Encaminhar para Fila de Atendimento
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

    <!-- Page script -->
    <script>
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
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
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