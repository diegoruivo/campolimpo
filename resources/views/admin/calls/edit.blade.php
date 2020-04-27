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
                        <h3 class="card-title">Escolha o(s) serviço(s)</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.calls.index') }}">
                                <button type="button" class="btn btn-lg bg-gradient-success" style="float:right;"><i
                                            class="fa fa-long-arrow-alt-right"></i> Encaminhar Atendimento
                                </button>
                            </a>
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
                                                <b>Atendimentos</b> <a class="float-right">1,322</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Serviços Contrados</b> <a class="float-right">543</a>
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

                                <div class="row">

                                    <div class="col-md-8 col-sm-8 col-12">
                                        <div class="info-box bg-gradient-primary">
                                            <span class="info-box-icon"><h1><big><i class="fa fa-headset"></i></big></h1></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Atendimento n° <b>{{ $call->id }}</b></span>
                                                <span class="progress-description" style="float:right"><small>Tempo:</small> {{ $call->status }}</span>
                                                <span class="info-box-number"><small>Senha:</small> <h3>{{ $call->password }}</h3></span>

                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 10%"></div>
                                                </div>
                                                <span class="progress-description" style="float:right"><small>Status:</small> {{ $call->status }}</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>



                                    <div class="col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label>Status do Atendimento</label>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($call->status == 0) checked
                                                       @endif id="0" value="0">
                                                <label for="0">Inicial
                                                </label>
                                            </div>


                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($call->status == 1) checked
                                                       @endif id="1" value="1">
                                                <label for="1">Encaminhado
                                                </label>
                                            </div>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($call->status == 2) checked
                                                       @endif id="2" value="2">
                                                <label for="2">Finalizado
                                                </label>
                                            </div>

                                            <div class="icheck-primary">
                                                <input type="radio" name="status" @if($call->status == 3) checked
                                                       @endif id="3" value="3">
                                                <label for="3">Cancelado
                                                </label>
                                            </div>

                                        </div>
                                    </div>



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
                                    class="fa fa-long-arrow-alt-right"></i> Atualizar Atendimento
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
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
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

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>
@endsection