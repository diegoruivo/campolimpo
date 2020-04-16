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
                            <small><i class="fa fa-user-edit"></i></small>
                            Cadastrar Cliente
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item active">Cadastrar Cliente</li>
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

            <form role="form"
                  action="{{ route('admin.users.store') }}"
                  method="post" enctype="multipart/form-data">

                @csrf

                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-user"></i>
                            Dados do Cliente
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                     aria-orientation="vertical">

                                    <a class="nav-link active" id="vert-tabs-prymary-tab" data-toggle="pill"
                                       href="#vert-tabs-primary" role="tab" aria-controls="vert-tabs-primary"
                                       aria-selected="true">Dados Primários</a>
                                </div>


                            </div>
                            <div class="col-7 col-sm-9">

                                <div class="tab-content" id="vert-tabs-tabContent">

                                    {{-- Dados Primários --}}
                                    <div class="tab-pane text-left fade show active" id="vert-tabs-primary"
                                         role="tabpanel"
                                         aria-labelledby="vert-tabs-primary-tab">

                                        <div class="card-header mb-4">
                                            <h3 class="card-title">Dados Primários</h3>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>*Nome</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Nome completo"
                                                           value="{{ old('name') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Genero</label>
                                                    <select name="genre" class="custom-select">
                                                        <option value="" {{ (old('genre') == '') }}>
                                                            Escolha o Genero
                                                        </option>
                                                        <option value="male" {{ (old('genre') == 'male') }}>
                                                            Masculino
                                                        </option>
                                                        <option value="female" {{ (old('genre') == 'female') }}>
                                                            Feminino
                                                        </option>
                                                        <option value="other" {{ (old('genre') == 'other') }}>
                                                            Outros
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>CPF</label>
                                                    <input type="text" class="form-control"
                                                           name="document" placeholder="CPF do Cliente"
                                                           value="{{ old('document') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Data de Nascimento</label>
                                                    <input type="text" class="form-control"
                                                           name="date_of_birth" placeholder="Data de Nascimento"
                                                           value="{{ old('date_of_birth') }}"/>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Naturalidade</label>
                                                    <input type="text" name="place_of_birth" class="form-control"
                                                           placeholder="Cidade de Nascimento"
                                                           value="{{ old('place_of_birth') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Estado Civil</label>
                                                    <select name="civil_status" class="custom-select">
                                                        <option value="" {{ (old('civil_status') == '') }}>
                                                            Escolha o Estado Civil
                                                        </option>

                                                        <optgroup label="Cônjuge Obrigatório">
                                                            <option value="married" {{ (old('civil_status') == 'married') }}>
                                                                Casado
                                                            </option>
                                                            <option value="separated" {{ (old('civil_status') == 'separated') }}>
                                                                Separado
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Cônjuge não Obrigatório">
                                                            <option value="single" {{ (old('civil_status') == 'single') }}>
                                                                Solteiro
                                                            </option>
                                                            <option value="divorced" {{ (old('civil_status') == 'divorced') }}>
                                                                Divorciado
                                                            </option>
                                                            <option value="widower" {{ (old('civil_status') == 'widower') }}>
                                                                Viúvo
                                                            </option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>RG</label>
                                                    <input type="text" name="document_secondary" class="form-control"
                                                           placeholder="RG do Cliente"
                                                           value="{{ old('document_secondary') }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Órgão Expedidor</label>

                                                    <input type="text" name="document_secondary_complement"
                                                           class="form-control" placeholder="Expedição"
                                                           value="{{ old('document_secondary_complement') }}"/>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    {{-- Fim Dados Primários --}}


                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->


                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i class="fa fa-long-arrow-alt-right"></i> Cadastrar</button>

                        </div>
                        <!-- /.card-footer-->


                    </div>

            </form>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection


<script src="{{ url(mix('backend/assets/plugins/inputmask.js')) }}"></script>



@section('js')

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