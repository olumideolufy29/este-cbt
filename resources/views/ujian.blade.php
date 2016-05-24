<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        Test Page
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('exams/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('exams/css/material.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('exams/css/ripples.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('exams/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('exams/css/test/materialize.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('exams/css/test/flickity.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('exams/css/test/style.css') }}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
</head>

<body class="tes">
    <nav class="navbar navbar-default white black-text z-depth-1" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">
                            Toggle navigation
                        </span>
                    <span class="icon-bar">
                        </span>
                    <span class="icon-bar">
                        </span>
                    <span class="icon-bar">
                        </span>
                </button>
                <a class="navbar-brand" href="#">
                        PAPS <b>UGM</b>
                    </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="nav navbar-nav">
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" title="" class="blue white-text">
                            Waktu Tersisa
                            <b style="font-size:1.2em">20:12</b>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Nama Pengguna
                                <b class="caret">
                                </b>
                            </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                        Logout
                                    </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse  -->
        </div>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success active" style="width:25%">
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-3">
            <div id="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading blue white-text">
                        <h3 class="panel-title">
                                <b>
                                    Navigasi Soal
                                </b>
                            </h3>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="progress progress-striped active" style="height:20px">
                        <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                            5/20
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row" id="navigasi-soal">
                            <a href="#" title="" class="btn btn-fab done">
                                    1
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    2
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    3
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    4
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    5
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    6
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    7
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    8
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    9
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    10
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    11
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    12
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    13
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    14
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    15
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    16
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    17
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    18
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    19
                                </a>
                            <a href="#" title="" class="btn btn-fab">
                                    20
                                </a>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Keterangan :
                        <br/>
                        <a class="btn btn-fab btn-fab-mini green"></a> Soal sudah dijawab
                        <br/>
                        <a class="btn btn-fab btn-fab-mini white"></a> Soal belum dijawab
                        <br/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-9">
            <div id="main">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="" method="POST" class="form-horizontal" role="form">
                            <div id="soal">
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        <div class="container">
                                            Soal 1
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label>
                                                        <input name="sample1" value="option1" type="radio"> <img src="{{ URL::asset('exams/img/ujian.png') }}" height="100" alt="">
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="sample1" value="option1" type="radio"> <img src="{{ URL::asset('exams/img/ujian.png') }}" alt="" height="100">
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="sample1" value="option1" type="radio"> Only when plugged in
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        Soal 2
                                    </div>
                                </div>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        Soal 3
                                    </div>
                                </div>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        Soal 3
                                    </div>
                                </div>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        Soal 3
                                    </div>
                                </div>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        Terakhir
                                    </div>
                                </div>
                            </div>
                            <div class="soal row selesai">
                                <div class="col-sm-12 text-center">
                                    <h1>Selesai?</h1>
                                    <p>Periksa sekali lagi. Apabila sudah yakin, Klik Submit.</p>
                                    <button type="submit" class="btn btn-default btn-large blue white-text">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer text-center">
                        <div class="pull-right">
                            <a class="withripple btn" id="selesai">SELESAI</a>
                        </div>
                        <div class="nav-control">
                            <a href="#" id="first" class="btn btn-fab"><i class="fa fa-angle-double-left"></i></a>
                            <a href="#" id="prev" class="btn btn-fab"><i class="fa fa-angle-left"></i></a>
                            <a href="#" class="btn current" id="id_current">5<small>/20</small></a>
                            <a href="#" id="next" class="btn btn-fab"><i class="fa fa-angle-right"></i></a>
                            <a href="#" id="last" class="btn btn-fab"><i class="fa fa-angle-double-right"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success active" style="width:25%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ URL::asset('exams/js/jquery.js') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{ URL::asset('exams/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('exams/js/material.min.js') }}"></script>
    <script src="{{ URL::asset('exams/js/flickity.pkgd.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $.material.init();
        var $gallery = $('#soal').flickity({
            cellAlign: "center",
            autoPlay: false,
            wrapAround: false,
            setGallerySize: true,
            draggable: true,
            prevNextButtons: true,
            cellSelector: ".soal",
            pageDots: false
        });

        var jmlDone = $('#navigasi-soal .done').length;
        var flkty = $gallery.data('flickity');
        var jmlSoal = flkty.cells.length;
        var currentSoal = flkty.selectedIndex + 1;
        var progress;

        var selesai = function() {
            
        }

        var updateSoal = function() {
            currentSoal = flkty.selectedIndex + 1;
            $('#id_current').html(currentSoal /*+ "<small>/" + jmlSoal + "</small>"*/);
            $('#navigasi-soal a').removeClass('selected');
            $('#navigasi-soal a:nth-child(' + currentSoal + ')').addClass('selected').addClass('done');
            jmlDone = $('#navigasi-soal .done').length;
            progressPercent = (jmlDone / jmlSoal) * 100;
            if (progressPercent == 100) {
                selesai();
            };
            $(".progress-bar").css("width", progressPercent + "%").html(jmlDone + "<small>/" + jmlSoal + "</small>");
            $(".selesai").hide();
            $gallery.show();
        }
        updateSoal();

        $('#navigasi-soal').on('click', '.btn', function() {
            var index = $(this).index();
            $gallery.flickity('select', index, false, false);
            updateSoal();
        });

        $('#next').on('click', function() {
            $gallery.flickity('next');
            updateSoal();
        });

        $('#first').on('click', function() {
            var index = 0;
            $gallery.flickity('select', index, false, false);
            updateSoal();
        });


        $('#last').on('click', function() {
            var index = flkty.cells.length - 1;
            $gallery.flickity('select', index, false, false);
            updateSoal();
        });

        $('#prev').on('click', function() {
            $gallery.flickity('previous');
            updateSoal();
        });

        $gallery.on('cellSelect', function() {
            updateSoal();
        })

        $('#selesai').on('click', function() {
            $gallery.hide();
            $(".selesai").show();
            $('#id_current').html('fin');
            $('#navigasi-soal a').removeClass('selected');
        });



    });
    </script>
</body>

</html>
