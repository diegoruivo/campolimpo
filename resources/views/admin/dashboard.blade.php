@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Monitoramento</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Monitoramento</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">


                    <div class="col-md-8">


                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Atendimento</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                                            data-toggle="tab">Ordens</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Mensagens</a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">




                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                        email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                        kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                        accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on
                                                        your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                            comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                        photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>




                                    </div>
                                    <!-- /.tab-pane -->











                                    <div class="tab-pane" id="settings">


                                        <!-- TABLE: LATEST ORDERS -->
                                        <div class="card">

                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Item</th>
                                                            <th>Status</th>
                                                            <th>Popularity</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                            <td>Call of Duty IV</td>
                                                            <td><span class="badge badge-success">Shipped</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00a65a"
                                                                     data-height="20">
                                                                    90,80,90,-70,61,-83,63
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                            <td>Samsung Smart TV</td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f39c12"
                                                                     data-height="20">
                                                                    90,80,-90,70,61,-83,68
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                            <td>iPhone 6 Plus</td>
                                                            <td><span class="badge badge-danger">Delivered</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f56954"
                                                                     data-height="20">
                                                                    90,-80,90,70,-61,83,63
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                            <td>Samsung Smart TV</td>
                                                            <td><span class="badge badge-info">Processing</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00c0ef"
                                                                     data-height="20">
                                                                    90,80,-90,70,-61,83,63
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                                            <td>Samsung Smart TV</td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f39c12"
                                                                     data-height="20">
                                                                    90,80,-90,70,61,-83,68
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                                            <td>iPhone 6 Plus</td>
                                                            <td><span class="badge badge-danger">Delivered</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f56954"
                                                                     data-height="20">
                                                                    90,-80,90,70,-61,83,63
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                            <td>Call of Duty IV</td>
                                                            <td><span class="badge badge-success">Shipped</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00a65a"
                                                                     data-height="20">
                                                                    90,80,90,-70,61,-83,63
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place
                                                    New Order</a>
                                                <a href="javascript:void(0)"
                                                   class="btn btn-sm btn-secondary float-right">View All
                                                    Orders</a>
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!-- /.card -->


                                    </div>
                                    <!-- /.tab-pane -->














                                    <div class="tab-pane" id="timeline">


                                        C


                                    </div>
                                    <!-- /.tab-pane -->








                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->


                    </div>









































































                    <div class="col-md-4">


                        <a href="{{ route('admin.calls.create') }}">
                            <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i
                                                class="fas fa-headset"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><h4 style="margin-top:13px;">CRIAR ATENDIMENTO</h4></span>
                                </div>
                            </div>
                        </a>


                        <!-- ÚLTIMOS POSTS -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Últimos Posts</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">


                                @foreach($posts as $post)
                                    <li class="item">
                                        <div class="product-img">
                                            <img class="img-circle img-bordered-sm"
                                                 src="{{  url('storage/' . $post->author()->first()->cover) }}" title="{{ $post->author()->first()->name }}">
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-title">{{ $post->title }}</a>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{ route('admin.posts.index') }}" class="uppercase">Todos os Posts</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                        {{-- FIM POSTS --}}





                    <!-- BOTÕES -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Atalhos e Links</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                <!-- Application buttons -->
                                @foreach($buttons as $button)
                                    <a href="{{ $button->url }}" class="btn btn-app">
                                        <i class="fa fa-{{ $button->icon }}"></i> {{ $button->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card -->

                        {{-- FIM Botões --}}








                    </div>


                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection