<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard Siswa</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/este.css') }}">
<!--        <link rel="stylesheet" type="text/css" href="chpass2.css"> -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ESTE (Electonic School Test)</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
<!--                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{ URL::asset('assets') }}/image/person-flat.png" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ucwords(auth()->user()->name)}}
                    </div>
                    <div class="profile-usertitle-job">
                        {{ucwords(auth()->user()->role)}}

                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            Pengaturan Akun </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                            <i class="glyphicon glyphicon-ok"></i>
                            Riwayat Test </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                            Bantuan </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                    <div class="text-center" style="margin-top: 75px">
                    <img class="center" src="{{ URL::asset('assets') }}/image/alert.png" width="10%">
                    </div>
                    <h1 class="text-center" style="color: #343C47; font-weight: bold;">MASUKKAN KODE TEST
                    <br><small style="color: #343C47;">(Kode test ujian diberikan oleh pengawas ujian)</small></h1>

                    
                        <div class="card2 card-container">
                            <form class="form-signin">
                                <span id="reauth-email" class="reauth-email"></span>
                                <input type="password" id="inputPassword" class="form-control" placeholder="Kode Test" required>
                                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">MULAI</button>
                            </form><!-- /form -->
                        </div><!-- /card-container -->
                    <!-- /container -->
            </div>
        </div>
    </div>
</div>

        <!-- jQuery -->
        <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="Hello World"></script>
    </body>
</html>
