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
                            <small><i class="fa fa-file-signature"></i></small>
                            Editar Contrato
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contracts.index') }}">Contratos</a></li>
                            <li class="breadcrumb-item active">Editar Contrato</li>
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

            <form role="form" action="{{ route('admin.contracts.update', ['contract' => $contract->id]) }}" method="post">

            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edição de Contrato</h3>

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
                                            <span class="info-box-text">Cadastro de Contrato referente ao Atendimento n° <b>{{ $call->id }}</b></span>
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



                                <!-- /.row -->
                                <div class="row">






                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>*Dia do Vencimento</label>
                                            <select name="pay_day" class="custom-select" required>
                                                <option value="1" {{ (old('pay_day') == '1' ? 'selected' : ($contract->pay_day == '1' ? 'selected' : '')) }}>1º</option>
                                                <option value="2" {{ (old('pay_day') == '2' ? 'selected' : ($contract->pay_day == '2' ? 'selected' : '')) }}>2/mês</option>
                                                <option value="3" {{ (old('pay_day') == '3' ? 'selected' : ($contract->pay_day == '3' ? 'selected' : '')) }}>3/mês</option>
                                                <option value="4" {{ (old('pay_day') == '4' ? 'selected' : ($contract->pay_day == '4' ? 'selected' : '')) }}>4/mês</option>
                                                <option value="5" {{ (old('pay_day') == '5' ? 'selected' : ($contract->pay_day == '5' ? 'selected' : '')) }}>5/mês</option>
                                                <option value="6" {{ (old('pay_day') == '6' ? 'selected' : ($contract->pay_day == '6' ? 'selected' : '')) }}>6/mês</option>
                                                <option value="7" {{ (old('pay_day') == '7' ? 'selected' : ($contract->pay_day == '7' ? 'selected' : '')) }}>7/mês</option>
                                                <option value="8" {{ (old('pay_day') == '8' ? 'selected' : ($contract->pay_day == '8' ? 'selected' : '')) }}>8/mês</option>
                                                <option value="9" {{ (old('pay_day') == '9' ? 'selected' : ($contract->pay_day == '9' ? 'selected' : '')) }}>9/mês</option>
                                                <option value="10" {{ (old('pay_day') == '10' ? 'selected' : ($contract->pay_day == '10' ? 'selected' : '')) }}>10/mês</option>
                                                <option value="11" {{ (old('pay_day') == '11' ? 'selected' : ($contract->pay_day == '11' ? 'selected' : '')) }}>11/mês</option>
                                                <option value="12" {{ (old('pay_day') == '12' ? 'selected' : ($contract->pay_day == '12' ? 'selected' : '')) }}>12/mês</option>
                                                <option value="13" {{ (old('pay_day') == '13' ? 'selected' : ($contract->pay_day == '13' ? 'selected' : '')) }}>13/mês</option>
                                                <option value="14" {{ (old('pay_day') == '14' ? 'selected' : ($contract->pay_day == '14' ? 'selected' : '')) }}>14/mês</option>
                                                <option value="15" {{ (old('pay_day') == '15' ? 'selected' : ($contract->pay_day == '15' ? 'selected' : '')) }}>15/mês</option>
                                                <option value="16" {{ (old('pay_day') == '16' ? 'selected' : ($contract->pay_day == '16' ? 'selected' : '')) }}>16/mês</option>
                                                <option value="17" {{ (old('pay_day') == '17' ? 'selected' : ($contract->pay_day == '17' ? 'selected' : '')) }}>17/mês</option>
                                                <option value="18" {{ (old('pay_day') == '18' ? 'selected' : ($contract->pay_day == '18' ? 'selected' : '')) }}>18/mês</option>
                                                <option value="19" {{ (old('pay_day') == '19' ? 'selected' : ($contract->pay_day == '19' ? 'selected' : '')) }}>19/mês</option>
                                                <option value="20" {{ (old('pay_day') == '20' ? 'selected' : ($contract->pay_day == '20' ? 'selected' : '')) }}>20/mês</option>
                                                <option value="21" {{ (old('pay_day') == '21' ? 'selected' : ($contract->pay_day == '21' ? 'selected' : '')) }}>21/mês</option>
                                                <option value="22" {{ (old('pay_day') == '22' ? 'selected' : ($contract->pay_day == '22' ? 'selected' : '')) }}>22/mês</option>
                                                <option value="23" {{ (old('pay_day') == '23' ? 'selected' : ($contract->pay_day == '23' ? 'selected' : '')) }}>23/mês</option>
                                                <option value="24" {{ (old('pay_day') == '24' ? 'selected' : ($contract->pay_day == '24' ? 'selected' : '')) }}>24/mês</option>
                                                <option value="25" {{ (old('pay_day') == '25' ? 'selected' : ($contract->pay_day == '25' ? 'selected' : '')) }}>25/mês</option>
                                                <option value="26" {{ (old('pay_day') == '26' ? 'selected' : ($contract->pay_day == '26' ? 'selected' : '')) }}>26/mês</option>
                                                <option value="27" {{ (old('pay_day') == '27' ? 'selected' : ($contract->pay_day == '27' ? 'selected' : '')) }}>27/mês</option>
                                                <option value="28" {{ (old('pay_day') == '28' ? 'selected' : ($contract->pay_day == '28' ? 'selected' : '')) }}>28/mês</option>
                                                <option value="29" {{ (old('pay_day') == '29' ? 'selected' : ($contract->pay_day == '29' ? 'selected' : '')) }}>29/mês</option>
                                                <option value="30" {{ (old('pay_day') == '30' ? 'selected' : ($contract->pay_day == '30' ? 'selected' : '')) }}>30/mês</option>
                                                <option value="31" {{ (old('pay_day') == '31' ? 'selected' : ($contract->pay_day == '31' ? 'selected' : '')) }}>31/mês</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>*Prazo do Contrato</label>
                                            <select name="deadline" class="custom-select" required>
                                                <option value="1" {{ (old('deadline') == '1' ? 'selected' : ($contract->deadline == '1' ? 'selected' : '')) }}>1 mês</option>
                                                <option value="2" {{ (old('deadline') == '2' ? 'selected' : ($contract->deadline == '2' ? 'selected' : '')) }}>2 meses</option>
                                                <option value="3" {{ (old('deadline') == '3' ? 'selected' : ($contract->deadline == '3' ? 'selected' : '')) }}>3 meses</option>
                                                <option value="4" {{ (old('deadline') == '4' ? 'selected' : ($contract->deadline == '4' ? 'selected' : '')) }}>4 meses</option>
                                                <option value="5" {{ (old('deadline') == '5' ? 'selected' : ($contract->deadline == '5' ? 'selected' : '')) }}>5 meses</option>
                                                <option value="6" {{ (old('deadline') == '6' ? 'selected' : ($contract->deadline == '6' ? 'selected' : '')) }}>6 meses</option>
                                                <option value="7" {{ (old('deadline') == '7' ? 'selected' : ($contract->deadline == '7' ? 'selected' : '')) }}>7 meses</option>
                                                <option value="8" {{ (old('deadline') == '8' ? 'selected' : ($contract->deadline == '8' ? 'selected' : '')) }}>8 meses</option>
                                                <option value="9" {{ (old('deadline') == '9' ? 'selected' : ($contract->deadline == '9' ? 'selected' : '')) }}>9 meses</option>
                                                <option value="10" {{ (old('deadline') == '10' ? 'selected' : ($contract->deadline == '10' ? 'selected' : '')) }}>10 meses</option>
                                                <option value="11" {{ (old('deadline') == '11' ? 'selected' : ($contract->deadline == '11' ? 'selected' : '')) }}>11 meses</option>
                                                <option value="12" {{ (old('deadline') == '12' ? 'selected' : ($contract->deadline == '12' ? 'selected' : '')) }}>12 meses</option>
                                                <option value="24" {{ (old('deadline') == '24' ? 'selected' : ($contract->deadline == '24' ? 'selected' : '')) }}>24 meses</option>
                                                <option value="36" {{ (old('deadline') == '36' ? 'selected' : ($contract->deadline == '36' ? 'selected' : '')) }}>36 meses</option>
                                                <option value="48" {{ (old('deadline') == '48' ? 'selected' : ($contract->deadline == '48' ? 'selected' : '')) }}>48 meses</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>*Data de Início</label>
                                            <input type="text" name="start_date" class="form-control"
                                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                   placeholder="Data de Início"
                                                   value="{{ old('start_date') ?? $contract->start_date }}" required/>
                                        </div>
                                    </div>





                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Serviço(s) Contratado(s)</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="height: 200px;">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                    <tr>
                                                        <th>Serviço</th>
                                                        <th>Preço</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $service->title }}</td>
                                                            <td>R$ {{ $service->price }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
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
                                    class="fa fa-long-arrow-alt-right"></i> Atualizar Contrato
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
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endsection