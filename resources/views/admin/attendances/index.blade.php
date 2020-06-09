@extends('admin.master.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Atendimento</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Atendimento</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

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


                <div class="row">

                    <div class="col-md-8">




                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- the events -->
                                    <div id="external-events">

                                    </div>

                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-body p-0">
                                                <!-- THE CALENDAR -->
                                                <div id="calendar"></div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->



                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#calls" data-toggle="tab">Atendimento</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#contracts"
                                                            data-toggle="tab">Contratos</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">Ordens</a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">







                                    <div class="tab-pane" id="orders">


                                        <!-- TABLE: LATEST ORDERS -->
                                        <div class="card">

                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>ID Ordem</th>
                                                            <th>ID Contrato</th>
                                                            <th>Cliente</th>
                                                            <th>Serviço</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->id }}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->contract }}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->user()->first()->name}}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">{{ $order->service()->first()->title}}</a></td>
                                                                <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">
                                                                        @if($order->status == 0)
                                                                            <span class="badge badge-warning">Inicial</span>
                                                                        @endif

                                                                        @if($order->status == 1)
                                                                            <span class="badge badge-info">Em Andamento</span>
                                                                        @endif

                                                                        @if($order->status == 2)
                                                                            <span class="badge badge-success">Concluído</span>
                                                                        @endif

                                                                        @if($order->status == 3)
                                                                            <span class="badge badge-danger">Cancelado</span>
                                                                        @endif
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <a href="{{ route('admin.orders.index') }}"
                                                   class="btn btn-sm btn-secondary float-right">Ver todas as Ordens</a>
                                            </div>
                                            <!-- /.card-footer -->
                                        </div>
                                        <!-- /.card -->


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
                                    <span class="info-box-text"><h4
                                                style="margin-top:13px;">CRIAR ATENDIMENTO</h4></span>
                                </div>
                            </div>
                        </a>


                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $ncalls }}</h3>

                                <p>Atendimentos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <a href="{{ route('admin.calls.index') }}" class="small-box-footer">Todos os Atendimentos <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>


                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $nclients }}</h3>

                                <p>Clientes</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="small-box-footer">Todos os Clientes <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>


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
                                                     src="{{  url('storage/' . $post->author()->first()->cover) }}"
                                                     title="{{ $post->author()->first()->name }}">
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
                            <li class="breadcrumb-item active">Atendimento</li>
                            <a href="{{ route('admin.calls.create') }}">
                                <button type="button" class="btn bg-gradient-primary ml-3"><i class="fa fa-plus"></i> Cadastrar Atendimento</button>
                            </a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Atendimentos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="10">ID</th>
                            <th>Cliente</th>
                            <th>Senha</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th width="120">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($calls))
                            @foreach($calls as $call)
                                <tr>
                                    <td>{{ $call->id }}</td>
                                    <td>{{ $call->user()->first()->name }}</td>
                                    <td>
                                        <span class="badge badge-secondary" style="zoom:150%;">{{ $call->password }}</span>
                                    </td>
                                    <td>
                                        @if($call->status == 0)
                                            <span class="badge badge-warning">Inicial</span>
                                        @endif

                                        @if($call->status == 1)
                                            <span class="badge badge-info">Processando</span>
                                        @endif

                                        @if($call->status == 2)
                                            <span class="badge badge-success">Contratado</span>
                                        @endif

                                        @if($call->status == 3)
                                            <span class="badge badge-danger">Cancelado</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $call->created_at }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.calls.edit', ['call' => $call->id]) }}">
                                            <button type="button" class="btn bg-gradient-primary btn-xs"><i class="fa fa-edit"></i> Editar</button>
                                        </a>
                                        <a href="{{ route('admin.attendances.edit', ['call' => $call->id]) }}">
                                            <button type="button" class="btn bg-gradient-success btn-xs"><i class="fa fa-headset"></i> Atender</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="no-content">Não foram encontrados registros!</div>
                        @endif
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection


@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>




{{--    <!-- fullCalendar -->--}}
{{--    <link rel="stylesheet" href="../plugins/fullcalendar/main.min.css">--}}
{{--    <link rel="stylesheet" href="../plugins/fullcalendar-daygrid/main.min.css">--}}
{{--    <link rel="stylesheet" href="../plugins/fullcalendar-timegrid/main.min.css">--}}
{{--    <link rel="stylesheet" href="../plugins/fullcalendar-bootstrap/main.min.css">--}}

    <!-- fullCalendar 2.2.5 -->
{{--    <script src="../plugins/fullcalendar/main.min.js"></script>--}}
{{--    <script src="../plugins/fullcalendar-daygrid/main.min.js"></script>--}}
{{--    <script src="../plugins/fullcalendar-timegrid/main.min.js"></script>--}}
{{--    <script src="../plugins/fullcalendar-interaction/main.min.js"></script>--}}
{{--    <script src="../plugins/fullcalendar-bootstrap/main.min.js"></script>--}}
{{--    <!-- Page specific script -->--}}
    <script>
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendarInteraction.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    console.log(eventEl);
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                        borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                        textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                'themeSystem': 'bootstrap',
                //Random default events
                events    : [
                    {
                        title          : 'All Day Event',
                        start          : new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor    : '#f56954', //red
                        allDay         : true
                    },
                    {
                        title          : 'Long Event',
                        start          : new Date(y, m, d - 5),
                        end            : new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor    : '#f39c12' //yellow
                    },
                    {
                        title          : 'Meeting',
                        start          : new Date(y, m, d, 10, 30),
                        allDay         : false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor    : '#0073b7' //Blue
                    },
                    {
                        title          : 'Lunch',
                        start          : new Date(y, m, d, 12, 0),
                        end            : new Date(y, m, d, 14, 0),
                        allDay         : false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor    : '#00c0ef' //Info (aqua)
                    },
                    {
                        title          : 'Birthday Party',
                        start          : new Date(y, m, d + 1, 19, 0),
                        end            : new Date(y, m, d + 1, 22, 30),
                        allDay         : false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor    : '#00a65a' //Success (green)
                    },
                    {
                        title          : 'Click for Google',
                        start          : new Date(y, m, 28),
                        end            : new Date(y, m, 29),
                        url            : 'http://google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor    : '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable  : true,
                droppable : true, // this allows things to be dropped onto the calendar !!!
                drop      : function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            //Color chooser button
            var colorChooser = $('#color-chooser-btn')
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color'    : currColor
                })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                //Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color'    : currColor,
                    'color'           : '#fff'
                }).addClass('external-event')
                event.html(val)
                $('#external-events').prepend(event)

                //Add draggable funtionality
                ini_events(event)

                //Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>



@endsection