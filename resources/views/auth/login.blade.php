<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('asset_application/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{url('asset_application/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('asset_application/login/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{url('asset_application/login/css/style.css')}}">

    <link rel="icon" type="image/x-icon" href="{{url('asset_application/images/graduated.webp')}}">
    <link rel="stylesheet" type="text/css" 
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <title>Login | SimWida</title>
  </head>
  <style type="text/css">
    input,
      input::placeholder {
          font: 12px sans-serif;
      }
  </style>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{url('asset_application/images/wisuda.webp')}}');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 align="center">Selamat Datang Di <strong>SimWida</strong></h3>
            <p class="mb-4" align="center">Sistem Informasi Manajemen Wisuda <br> <n style="color: black;">Silahkan masukkan username dan password</n></p>
            <form action="{{url('login_user')}}" method="post">
              @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Contoh : titis_okta" name="username_input" 
                       autocomplete="chrome-off" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" required placeholder="*****" name="password" 
                       autocomplete="new-password">
              </div>
              
              <div class="d-flex mb-2 align-items-center">
                <span class="ml-auto"><a href="#" onclick="return alert('Silahkan hubungi admi puskom untuk mereset password anda')" class="forgot-pass">Lupa Password ?</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-default" style="background-color: #2D1B6B;color: white;">

            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script src="{{url('asset_application/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('asset_application/login/js/popper.min.js')}}"></script>
    <script src="{{url('asset_application/login/js/bootstrap.min.js')}}"></script>
    <script src="{{url('asset_application/login/js/main.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
      @if($message=Session::get('success'))
         toastr.options.timeOut = 6000; // How long the toast will display without user interaction
         //toastr.options.extendedTimeOut = 60; // How long the toast will display after a user hovers over it
         toastr.success("{{ $message }}");
      @endif
      @if($message=Session::get('error'))
         toastr.error("{{$message}}");
      @endif
     </script>
  </body>
</html>