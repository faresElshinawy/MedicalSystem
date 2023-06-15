<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist')}}/css/adminlte.min.css">
  </head>
  <body class="login-page" style="min-height: 496.781px;">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if ($errors->any)
        @foreach ($errors->all() as $error)
        {{$error}}
        @endforeach
        @endif
        <form action="{{route('doctor.login')}}" method="post">
            @csrf
            @error('email')
            <span class="text-danger">{{$message}}</span>
          @enderror
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name='email'>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
        </div>
        @error('password')
        <span class="text-danger">{{$message}}</span>
      @enderror
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name='password'>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
        </div>
          <div class="row">
            {{-- <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div> --}}
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-info  btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{asset('assets/plugins')}}/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/dist')}}/js/adminlte.min.js"></script>
@include('sweetalert::alert')

  </body></html>
