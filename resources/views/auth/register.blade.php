<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Schon Flower | Registro de usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  {!!Html::style('bootstrap/css/bootstrap.min.css')!!}

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  {!!Html::style('dist/css/AdminLTE.min.css')!!}

  <!-- iCheck -->
  {!!Html::style('plugins/iCheck/square/blue.css')!!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Schon</b>Flower</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar un nuevo usuario</p>

    <form method="post" action="{{ url('/register') }}" >
        {{ csrf_field() }}

        <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }} ">
            <input type="text" class="form-control" placeholder="Nombres" name="name" id="name" value="{{ old('name') }}" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <!-- /form-group -->

        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }} ">
            <input type="email" name="email" id="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <!-- /form-group -->

        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }} ">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <!-- /form-group -->
        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }} ">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" id="password_confirmation" >
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <!-- /form-group -->

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="{{ url('/login') }}" class="text-center">Ya tengo un usuario</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
{!!Html::script('plugins/jQuery/jquery-2.2.3.min.js')!!}

<!-- Bootstrap 3.3.6 -->
{!!Html::script('bootstrap/js/bootstrap.min.js')!!}


</body>
</html>


