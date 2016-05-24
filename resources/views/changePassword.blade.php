<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ganti Password Anda</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/este.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="text-center" style="margin-top: 150px">
    <img class="center" src="{{ URL::asset('assets/image/alert.png') }}" width="10%">
    </div>
    <h1 class="text-center" style="color: #343C47; font-weight: bold;">GANTI KATA SANDI ANDA
    <br><small style="color: #343C47;">(Untuk pertama kali silahkan ganti kata sandi akun ada)</small></h1>
   <div class="container">
        <div class="card2 card-container">
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password Lama" required>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password Baru" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">GANTI</button>
            </form><!-- /form -->
            <div class="text-center" style="font-weight: bold;"><a href="_blank">LEWATI</a></div>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

  </body>
</html>
