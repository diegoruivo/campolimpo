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
                            <small><i class="fa fa-newspaper"></i></small>
                            Editar Post
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active">Editar Post</li>
                            <a href="{{ route('admin.posts.create') }}">
                                <button type="button" class="btn btn-xs bg-gradient-primary ml-3"><i
                                            class="fa fa-plus"></i> Cadastrar Post
                                </button>
                            </a>
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


            <form role="form" action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Post</h3>

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
                                           aria-controls="custom-content-below-home" aria-selected="true">Post</a>
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
                                            <h3 class="card-title">Post</h3>
                                        </div>


                                        <div class="row">


                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>*Categoria de Post</label>
                                                <select name="category" class="custom-select" required>
                                                    <option value="" {{ (old('category_post') == '' ? 'selected' : '') }}>
                                                        Selecione a Categoria do Post
                                                    </option>
                                                    @foreach($categories_post as $category)
                                                        <option value="{{ $category->id }}" {{ ($category->id === $post->category ? 'selected' : '') }}>{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                                <p style="margin-top: 4px;">
                                                    <a href="{{ route('admin.categories_post.index') }}"
                                                       class="text-orange icon-link" style="font-size: .8em;" target="_blank">Editar
                                                        Categorias Post</a> |
                                                    <a href="{{ route('admin.categories_post.create') }}"
                                                       class="text-orange icon-link" style="font-size: .8em;" target="_blank">Cadastrar
                                                        Categoria Post</a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" name="title" class="form-control"
                                                       placeholder="Título"
                                                       value="{{ old('title') ?? $post->title }}"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Subtítulo</label>
                                                <input type="text" name="subtitle" class="form-control"
                                                       placeholder="Subtítulo"
                                                       value="{{ old('subtitle') ?? $post->subtitle }}"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Descrição</label>
                                                <textarea class="textarea" name="description"
                                                          style="width: 100%; height: 600px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                    {{ old('description') ?? $post->description }}
                                                </textarea>
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
                                                <div class="property_image">
                                                    @foreach($post->images()->get() as $image)
                                                        <div class="property_image_item">
                                                            <img src="{{ $image->url_cropped}}" alt="">
                                                            <div class="property_image_actions">
                                                                <a href="javascript:void(0)" class="btn btn-primary btn-small {{ ($image->cover == true ? 'btn-success' : '') }} icon-check icon-notext image-set-cover" data-action="{{ route('admin.properties.imageSetCover', ['image' => $image->id]) }}"><i class="fa fa-check"></i></a>
                                                                <a href="javascript:void(0)" class="btn btn-danger btn-small icon-times icon-notext image-remove" data-action="{{ route('admin.properties.imageRemove', ['image' => $image->id])  }}"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>

                                        </div>



                            </div>

                                <!-- /.row -->

                        </div>
                        <!-- /.card -->


                        <!-- /.card-body -->
                        <div class="card-footer">

                            Última atualização: {{ date('d/m/Y', strtotime($post->updated_at)) }}

                            <button type="submit" class="btn btn-lg bg-gradient-primary" style="float:right;"><i
                                        class="fa fa-long-arrow-alt-right"></i> Atualizar Post
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