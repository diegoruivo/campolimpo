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
                            <small><i class="fa fa-gears"></i></small>
                            Sistema
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sistema</li>
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

            <form class="app_form"
                  action="{{ route('admin.system.update', ['system' => $system->id]) }}"
                  method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <!-- Default box -->
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Configurações do Sistema</h3>

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

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nome da Empresa</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="title" placeholder="Título"
                                               value="{{ old('title') ?? $system->title }}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Endereço do Site</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                        </div>
                                        <input type="string" name="site" class="form-control" placeholder="Site"
                                               value="{{ old('site') ?? $system->site }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="tel" name="telephone" class="form-control" class="mask-phone"
                                               data-inputmask="'mask': ['(99) 9999-9999']" data-mask
                                               value="{{ old('telephone') ?? $system->telephone }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="tel" name="cell" class="form-control" class="mask-cell"
                                               data-inputmask="'mask': ['(99) 99999-9999']" data-mask
                                               value="{{ old('cell') ?? $system->cell }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Melhor e-mail"
                                               value="{{ old('email') ?? $system->email }}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                        </div>
                                        <input type="text" name="facebook" class="form-control"
                                               placeholder="Endereço do Facebook"
                                               value="{{ old('facebook') ?? $system->facebook }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                        </div>
                                        <input type="text" name="instagram" class="form-control"
                                               placeholder="Endereço do Instagram"
                                               value="{{ old('instagram') ?? $system->instagram }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                        </div>
                                        <input type="text" name="twitter" class="form-control"
                                               placeholder="Endereço do Twitter"
                                               value="{{ old('twitter') ?? $system->twitter }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                                        </div>
                                        <input type="text" name="youtube" class="form-control"
                                               placeholder="Endereço do Youtube"
                                               value="{{ old('youtube') ?? $system->youtube}}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="tel" name="zipcode" class="form-control"
                                           data-inputmask="'mask': ['99999-999']" data-mask
                                           class="mask-zipcode zip_code_search" placeholder="Digite o CEP"
                                           value="{{ old('zipcode') ?? $system->zipcode }}"/>
                                </div>

                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" name="street" class="form-control" class="street" id="street"
                                           placeholder="Endereço Completo"
                                           value="{{ old('street') ?? $system->street }}"/>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="text" name="number" class="form-control"
                                           placeholder="Número do Endereço"
                                           value="{{ old('number') ?? $system->number }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input type="text" name="complement" class="form-control"
                                           placeholder="Completo (Opcional)"
                                           value="{{ old('complement') ?? $system->complement  }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" name="neighborhood" class="form-control" class="neighborhood"
                                           placeholder="Bairro"
                                           value="{{ old('neighborhood') ?? $system->neighborhood  }}"/>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="state" class="form-control" class="state"
                                           placeholder="Estado" value="{{ old('state') ?? $system->state }}"/>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" name="city" class="form-control" class="city"
                                           placeholder="Cidade" value="{{ old('city') ?? $system->city }}"/>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="description" cols="30"
                                              rows="4">{{ old('description') ?? $system->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Palavras-chave</label>
                                    <textarea class="form-control" name="keywords" cols="30"
                                              rows="4">{{ old('keywords') ?? $system->keywords }}</textarea>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Link do Google Maps</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                                        </div>
                                        <input type="text" name="map" class="form-control"
                                               placeholder="Link do Google Maps"
                                               value="{{ old('map') ?? $system->map }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Logotipo do Site</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                   name="logo">
                                            <label class="custom-file-label" for="exampleInputFile">Escolher
                                                Arquivo</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-sm-12">
                                <img class="img-fluid mb-3" src="{{ $system->url_logo }}" alt="">
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Icone do Site</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                   name="favico">
                                            <label class="custom-file-label" for="exampleInputFile">Escolher
                                                Arquivo</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <img class="img-fluid mb-3" src="{{ $system->url_favico }}" alt="">
                                </div>

                            </div>

                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card-body -->
                    <div class="card-footer">

                        Última atualização: {{ date('d/m/Y', strtotime($system->updated_at)) }}

                        <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                    class="fa fa-long-arrow-alt-right"></i> Atualizar
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
            $('#cpf').inputmask('999.999.999-99', {'placeholder': '999.999.999-99'})
            //Money Euro
            $('[data-mask]').inputmask()

        })
    </script>


{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}

{{--            $("#zipcode").mask("99999-999", {--}}
{{--                completed: function () {--}}
{{--                    var zipcode = $(this).val().replace(/[^0-9]/, "");--}}

{{--                    // Validação do CEP; caso o CEP não possua 8 números, então cancela--}}
{{--                    // a consulta--}}
{{--                    if (zipcode.length != 8) {--}}
{{--                        return false;--}}
{{--                    }--}}


{{--                    // A url de pesquisa consiste no endereço do webservice + o cep que--}}
{{--                    // o usuário informou + o tipo de retorno desejado (entre "json",--}}
{{--                    // "jsonp", "xml", "piped" ou "querty")--}}
{{--                    var url = "http://viacep.com.br/ws/" + zipcode + "/json/";--}}

{{--                    $.getJSON(url, function (dadosRetorno) {--}}
{{--                        try {--}}
{{--                            // Preenche os campos de acordo com o retorno da pesquisa--}}
{{--                            $("#street").val(dadosRetorno.logradouro);--}}
{{--                            $("#neighborhood").val(dadosRetorno.bairro);--}}
{{--                            $("#city").val(dadosRetorno.localidade);--}}
{{--                            $("#state").val(dadosRetorno.uf);--}}
{{--                            $("#nr_end").focus();--}}
{{--                        } catch (ex) {--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}








    <!-- CEP - preenchimento automático de endereço -->
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