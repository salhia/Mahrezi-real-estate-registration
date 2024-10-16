<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>مجموعة المحرزي</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
 <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="{{asset('/')}}"><b>صفحة الدخول</b>Mahrazy</a>
  </div>
  </div>

  <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<div  class="hold-transition login-page">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>

    <div class="card">
    <div class="card-body login-card-body">
            <form action="{{route('login.post')}}" method="POST">
                @csrf
               <div class="input-group mb-3">

                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                    <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
                </div>

                <div class="input-group mb-3">

                    <input type="password" class="form-control" name="password">
                     <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
                </div>

                <button type="submit" class="btn btn-primary">دخول التطبيق</button>
                <a href="/verify-email" class="btn btn-primary">فقدت كلمة السر</a>
            </form>
        </div>
    </div>
</div>
</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

