<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $system->title }} | ERP | Login</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ url(mix('backend/assets/css/libs.css')) }}">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../resources/views/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <link rel="stylesheet" href="{{ url(mix('backend/assets/css/login.css')) }}"/>
  <link rel="stylesheet" href="{{ url(mix('backend/assets/css/style.css')) }}"/>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome Kit -->
  <script src="https://kit.fontawesome.com/cde8c0fee9.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


  <link rel="icon" type="image/png" href="{{ url('storage/' . $system->favico) }}"/>


</head>
<body class="hold-transition login-page">

<div class="ajax_response"></div>


<div class="login-box">
  <div class="login-logo">
    <img src="{{ url('storage/' . $system->logo) }}">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <form name="login" action="{{ route('admin.login.do') }}" method="post">

        <div class="input-group mb-3">
          <input type="email" class="form-control"  name="email" placeholder="E-mail" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_check" placeholder="Senha" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-1">
              <a href="">Esqueci minha senha</a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acessar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1" style="text-align: center; margin-top:40px; zoom: 80%;">
      Desenvolvido por <a href="https://www.ruivooffice.com.br">www.<b>ruivooffice</b>.com.br</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="{{ url(mix('backend/assets/js/libs.js')) }}"></script>
<script src="{{ url(mix('backend/assets/js/jquery.js')) }}"></script>
<script src="{{ url(mix('backend/assets/js/login.js')) }}"></script>

</body>
</html>