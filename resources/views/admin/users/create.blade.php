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
            $('#cpf').inputmask('999.999.999-99', { 'placeholder': '999.999.999-99' })
            //Money Euro
            $('[data-mask]').inputmask()

        })
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#zipcode").mask("99999-999",{completed:function(){
                    var zipcode = $(this).val().replace(/[^0-9]/, "");

                    // Validação do CEP; caso o CEP não possua 8 números, então cancela
                    // a consulta
                    if(zipcode.length != 8){
                        return false;
                    }



                    // A url de pesquisa consiste no endereço do webservice + o cep que
                    // o usuário informou + o tipo de retorno desejado (entre "json",
                    // "jsonp", "xml", "piped" ou "querty")
                    var url = "http://viacep.com.br/ws/"+zipcode+"/json/";

                    $.getJSON(url, function(dadosRetorno){
                        try{
                            // Preenche os campos de acordo com o retorno da pesquisa
                            $("#street").val(dadosRetorno.logradouro);
                            $("#neighborhood").val(dadosRetorno.bairro);
                            $("#city").val(dadosRetorno.localidade);
                            $("#state").val(dadosRetorno.uf);
                            $("#nr_end").focus();
                        }catch(ex){}
                    });
                }});

        });
    </script>
@endsection