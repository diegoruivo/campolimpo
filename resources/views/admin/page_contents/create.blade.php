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
                            <small><i class="fa fa-file-alt"></i></small>
                            Cadastrar Conteúdo
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Páginas</a></li>
                            <li class="breadcrumb-item active">Cadastrar Conteúdo</li>
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


            <form role="form" action="{{ route('admin.page_contents.store', ['page' => $page->id]) }}" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cadastro de conteúdo da página: <b>{{ $page->title }}</b></h3>

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

                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                   href="#custom-content-below-home" role="tab"
                                   aria-controls="custom-content-below-home" aria-selected="true">Conteúdo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                                   href="#custom-content-below-profile" role="tab"
                                   aria-controls="custom-content-below-profile"
                                   aria-selected="false">Imagens</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="custom-content-below-tabContent">

                            <div class="tab-pane fade show active" id="custom-content-below-home"
                                 role="tabpanel" aria-labelledby="custom-content-below-home-tab">


                                <div class="card-header mb-4">
                                    <h3 class="card-title">Conteúdo</h3>
                                </div>


                                <div class="row">



                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="Título"
                                                   value="{{ old('title') }}"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Subítulo</label>
                                            <input type="text" name="subtitle" class="form-control"
                                                   placeholder="subtítulo"
                                                   value="{{ old('subtitle') }}"/>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="textarea" name="description"
                                                      style="width: 100%; height: 600px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{ old('description') }}
                                    </textarea>
                                        </div>
                                    </div>



                                    <div class="col-md-2 col-sm-3 col-12">
                                        <div class="form-group">
                                            <label>Posição</label>
                                            <input type="number" name="position" class="form-control"
                                                   placeholder="Posição"
                                                   value="{{ old('position') }}"/>
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <label>Status</label>
                                            </div>
                                            <div class="icheck-primary" style="float:left;">
                                                <input type="radio" name="status" id="0" value="0">
                                                <label for="0">Inativo
                                                </label>
                                            </div>


                                            <div class="icheck-primary" style="float:left; margin-left:20px;">
                                                <input type="radio" name="status" id="1" value="1">
                                                <label for="1">Ativo
                                                </label>
                                            </div>

                                        </div>
                                    </div>



                                </div>

                            </div>

                            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                 aria-labelledby="custom-content-below-profile-tab">

                                <div class="card-header mb-4">
                                    <h3 class="card-title">Imagens</h3>
                                </div>

                                <div class="row">


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Imagens</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="files[]" multiple>

                                                    <label class="custom-file-label" for="exampleInputFile">Escolher
                                                        Arquivo</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content_image"></div>


                                    </div>

                                </div>



                            </div>

                            <!-- /.row -->

                        </div>
                        <!-- /.card -->


                        <!-- /.card-body -->
                        <div class="card-footer">


                            <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                        class="fa fa-long-arrow-alt-right"></i> Cadastrar Conteúdo
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
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[name="files[]"]').change(function (files) {

                $('.content_image').text('');

                $.each(files.target.files, function (key, value) {
                    var reader = new FileReader();
                    reader.onload = function (value) {
                        $('.content_image').append(
                            '<div class="property_image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });

            $('.image-set-cover').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.post(button.data('action'), {}, function (response) {
                    if(response.success === true) {
                        $('.property_image').find('a.btn-green').removeClass('btn-green');
                        button.addClass('btn-green');
                    }
                }, 'json');
            });

            $('.image-remove').click(function (event) {
                event.preventDefault();

                var button = $(this);

                $.ajax({
                    url: button.data('action'),
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if(response.success === true) {
                            button.closest('.property_image_item').fadeOut(function () {
                                $(this).remove();
                            })
                        }
                    }
                })
            });

        });
    </script>
@endsection