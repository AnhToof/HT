<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><b>Health Tracking</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><b>Đăng nhập</b></p>

        <form action="{{route('login')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                       required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>

        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('layouts.script');
</body>
</html>