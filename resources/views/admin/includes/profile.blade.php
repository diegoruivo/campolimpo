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

        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" target="_blank"
           class="btn btn-primary btn-block"><b>Cadastro do Cliente</b></a>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->