

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> {{ env('APP_NAME') }} </title>



<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width,initial-scale=1">

{{-- <link rel="stylesheet" href="{{asset('se/assets/css/bootstrap.min.css')}}"> --}}

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('alte/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('alte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('alte/dist/css/adminlte.min.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">

<style>
    
    .login-page {
  
  background: #696969;
  
}

.login-logo a, .register-logo a {
  color: #0c4f86;
}

</style>
</head>
<body class="hold-transition login-page">

<div class="login-box">

<div class="login-logo text-white">
  <a href="{{ url('/') }}" class="text-white">{{env('APP_NAME')}}</a>
</div>
<!-- /.login-logo -->
<div class="card rounded-lg" style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 8px 12px -6px #2196f3;">
  <div class="card-body login-card-body rounded" style="background-color: #00008B">
    @if(!empty($item->id))
    <img id="output" style=""  src="{{asset('images/logo/') }}/{{$item->id}}_{{$item->logo??'N/A'}}" class="  " height="45px" width="45px"/>
    @endif
    <p class="login-box-msg text-white"><i class="fa fa-lock"></i> Secure Login </p>

    <form method="POST" action="{{ route('login') }}">
                      @csrf
  <div class="input-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Type Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user text-white"></span>
          </div>
        </div>

        @error('employee_id_no')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror

      </div> 


      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="Password" required="" id="id_password">

        <div class="input-group-text text-white">
            <i class="fa fa-eye text-white" id="togglePassword"></i>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

    </div>


            <input type="hidden" name="remember"  value="on" >


      <div class="input-group mb-3">
        <button type="submit" class="btn btn-success btn-block"><b>Login</b></button>
      </div>
      <div class="text-center text-white">Powered By <strong>Mazharul IT LTD.</strong>.</div>
      
    </form>


    <p class="mb-1">




   
    </p>
 
  </div>
  <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('alte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('alte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('alte/dist/js/adminlte.min.js') }}"></script>
<script class="">

 const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#id_password');
togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye slash icon
  this.classList.toggle('fa-eye-slash');
});

</script>

</body>
</html>