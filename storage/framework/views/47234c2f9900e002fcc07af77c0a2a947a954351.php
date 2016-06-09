<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        <?php echo e($test->name); ?> - 
        <?php echo e($test->subject->name); ?>

    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/material.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/ripples.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/font-awesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/test/materialize.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/test/flickity.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('exams/css/test/style.css')); ?>" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
</head>

<body class="tes orange darken-3">
    <nav class="navbar white black-text z-depth-1" role="navigation">
        <div class="container">
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
                        <b>ESTE</b> <small>Electronic School Test</small>
                    </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="nav navbar-nav">
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#">
                                <b><?php echo e($test->name); ?></b>
                                <?php echo e($test->subject->name); ?>

                            </a>
                    </li>

                    <li>
                        <a href="#" title="" class="orange white-text">
                            Waktu Tersisa
                            <b style="font-size:1.2em" id="clock">
                                <span class="minutes"></span>:<span class="seconds"></span>
                            </b>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse  -->
        </div>
<!--         <div class="progress progress-striped active">
    <div class="progress-bar progress-bar-success active" style="width:25%">
    </div>
</div> -->
    </nav>
    <br/>

    <div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div id="main">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="<?php echo e(action('StudentController@submit')); ?>" method="post" class="form-horizontal" role="form" id="form-ujian">
                        <?php echo csrf_field(); ?>


                            <div id="soal">
                                <?php 
                                $i=0;
                                 ?>
                                <?php foreach($questions as $question): ?>
                                <?php $i++; ?>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        <div class="container">
                                            <div class="form-group">
                                                Soal <?php echo e($i); ?><br/>
                                                <?php echo $question->question; ?>

                                                <input type="hidden" name="question[<?php echo e($i); ?>]" value="<?php echo e($question->id); ?>">
                                            </div>
                                            <div class="form-group" id="soal<?php echo e($i); ?>">
                                                <div class="radio">
                                                    <label>
                                                        A.
                                                        <input name="answer[<?php echo e($i); ?>]" value="a" type="radio"> 
                                                        <?php echo $question->a; ?>

                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        B.
                                                        <input name="answer[<?php echo e($i); ?>]" value="b" type="radio">
                                                        <?php echo $question->b; ?>


                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        C.
                                                        <input name="answer[<?php echo e($i); ?>]" value="c" type="radio">
                                                        <?php echo $question->c; ?>


                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        D.
                                                        <input name="answer[<?php echo e($i); ?>]" value="d" type="radio"> 
                                                        <?php echo $question->d; ?>

                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        E.
                                                        <input name="answer[<?php echo e($i); ?>]" value="e" type="radio"> 
                                                        <?php echo $question->e; ?>


                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div id="sidebar">
                <div class="panel panel-default">
                    <div class="progress progress-striped active" style="height:20px">
                        <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            0/0
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row" id="navigasi-soal">

                            <?php for($i = 1; $i <= count($questions); $i++): ?>
                            <a title="" class="btn btn-fab">
                                <?php echo e($i); ?>

                            </a>                            
                            <?php endfor; ?>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-fab btn-fab-mini green"></a> Soal sudah dijawab
                        <br/>
                        <a class="btn btn-fab btn-fab-mini white"></a> Soal belum dijawab
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="white card" style="padding:32px;text-align:center;bottom:0;">
        <b>Ilmu Komputer</b> Universitas Gadjah Mada
    </div>
    <!-- jQuery -->
    <script src="<?php echo e(URL::asset('exams/js/jquery.js')); ?>"></script>
    <!-- Bootstrap JavaScript -->
    <script src="<?php echo e(URL::asset('exams/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('exams/js/material.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('exams/js/flickity.pkgd.min.js')); ?>"></script>
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

        $('#navigasi-soal a:nth-child(1)').removeClass('done');

        var selesai = function() {
            
        }

        var changeDone = function(number) {

            if($("#soal"+number).find('input[type="radio"]:checked').length > 0){
                $('#navigasi-soal a:nth-child(' + number + ')').addClass('done');
            }
        }

        var updateSoal = function() {
            changeDone(currentSoal);

            currentSoal = flkty.selectedIndex + 1;
            beforeSoal = flkty.selectedIndex;
            nextSoal = currentSoal +1;

            $('#id_current').html(currentSoal /*+ "<small>/" + jmlSoal + "</small>"*/);
            $('#navigasi-soal a').removeClass('selected');

            $('#navigasi-soal a:nth-child(' + currentSoal + ')').addClass('selected');


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

        var slideTo = function (index) {
            $gallery.flickity('select', index, false, false);
        }

        $('#navigasi-soal').on('click', '.btn', function() {
            var index = $(this).index();
            slideTo(index);
            updateSoal();
        });

        $('#next').on('click', function() {
            $gallery.flickity('next');
            updateSoal();
        });

        $('#first').on('click', function() {
            var index = 0;
            slideTo(index);
            updateSoal();
        });


        $('#last').on('click', function() {
            var index = flkty.cells.length - 1;
            slideTo(index);
            updateSoal();
        });

        $('#prev').on('click', function() {
            $gallery.flickity('previous');
            updateSoal();
        });

        $gallery.on('cellSelect', function() {
            updateSoal();
        })

        var waktuHabis = function () {  
            $(".selesai h1").text('Waktu Sudah Habis!');
            $(".selesai p").text('Sistem akan secara otomatis submit hasil pekerjaan kamu dalam 5 detik.');
            $(".selesai button").hide();
            $(".selesai").show();

            $gallery.hide();
            $gallery = null;
            $('#id_current').html('fin');
            $('#navigasi-soal a').removeClass('selected');
            setTimeout(function () {
                $('#form-ujian').submit();
            }, 5000);
        }

        $('#selesai').on('click', function() {
            $gallery.hide();
            $(".selesai").show();
            $('#id_current').html('fin');
            $('#navigasi-soal a').removeClass('selected');
        });

        /**
        * COUNTDOWN TIMER
        *
        */
        function getTimeRemaining(endtime) {
          var t = Date.parse(endtime) - Date.parse(new Date());
          var seconds = Math.floor((t / 1000) % 60);
          var minutes = Math.floor((t / 1000 / 60) % 60);
          var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
          var days = Math.floor(t / (1000 * 60 * 60 * 24));
          return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
          };
        }

        function initializeClock(id, endtime) {
          var clock = document.getElementById(id);
          var minutesSpan = clock.querySelector('.minutes');
          var secondsSpan = clock.querySelector('.seconds');

          function updateClock() {
            var t = getTimeRemaining(endtime);

            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
                waktuHabis();
            } else if(t.total == 5 * 60 *  1000) {

                $gallery.prepend('<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Waktu tinggal 5 menit lagi. Segera periksa pekerjaan kamu. Sistem akan secara otomatis mengumpulkan pekerjaanmu setelah waktu habis.</div>');
            }
          }

          updateClock();
          var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse(new Date()) + <?php echo e($test->duration); ?> * 60 * 1000);
        initializeClock('clock', deadline);
    });
    </script>
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Title!</strong> Alert body ...
    </div>
</body>

</html>
