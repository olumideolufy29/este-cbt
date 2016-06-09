<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ESTE 2016</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(url('assets/este.css')); ?>" >

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
   <div class="container">
        <div class="card card-container" style="margin-top:50px">
        <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo e(url('assets/image/logo.png')); ?>" />
            <p id="profile-name" class="profile-name-card"></p>
                        <form class="form-signin form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">

                        <div class="form-group<?php echo e($errors->has('no_induk') ? ' has-error' : ''); ?>">
                            <div class="col-md-12">
                                <input type="no_induk" class="form-control" name="no_induk" value="<?php echo e(old('no_induk')); ?>" placeholder="Masukkan Nomor Induk">

                                <?php if($errors->has('no_induk')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('no_induk')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                            </div>
                        </div>
            </form><!-- /form -->
 
        </><!-- /card-container -->
    </div><!-- /container -->

<p class="text-center" style="color: white">Copyright @2016  Tim Putih</p>
        <!-- jQuery -->
        <script src="<?php echo e(url('assets/js/jquery.js')); ?>"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </body>
</html>
