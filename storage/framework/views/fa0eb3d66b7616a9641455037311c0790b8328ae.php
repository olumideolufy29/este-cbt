<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ganti Password Anda</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets/este.css')); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="text-center" style="margin-top: 100px">
    <img class="center" src="<?php echo e(URL::asset('assets/image/alert.png')); ?>" width="10%">
    </div>
    <h3 class="text-center" style="color: #343C47; font-weight: bold;">GANTI KATA SANDI ANDA
    <br><small style="color: #343C47;">(Untuk pertama kali silahkan ganti kata sandi akun ada)</small></h3>
   <div class="container">
        <div class="card2 card-container">
            <form class="form-signin" method="post">
                        <?php echo csrf_field(); ?>

                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <div class="col-md-12">
                        <input type="password" id="inputEmail" class="form-control" name="password" placeholder="Masukkan Password Baru">

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">

                    <div class="col-md-12">
                        <input type="password" id="inputPassword" class="form-control" name="password_confirmation" placeholder="Masukkan Kembali Password Baru">

                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">
                            GANTI
                        </button>
                    </div>
                </div>

            </form><!-- /form -->
            <div class="text-center" style="font-weight: bold;">
                <a href="<?php echo e(url('first-login/skip')); ?>" style="color:white">LEWATI</a>
            </div>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <!-- jQuery -->
    <script src="<?php echo e(URL::asset('assets/js/jquery.js')); ?>"></script>
    <!-- Bootstrap JavaScript -->
    <script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

  </body>
</html>
