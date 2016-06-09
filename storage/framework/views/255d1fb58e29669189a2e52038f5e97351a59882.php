<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        Edit Soal Ujian
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
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><b>ESTE</b> <small>Electonic School Test</small></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e(ucwords(auth()->user()->name)); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('logout')); ?>">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <br/>

    <div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div id="sidebar">
                <div class="panel panel-default">

                    <div class="progress progress-striped active" style="height:20px">
                        <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:25%">

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row" id="navigasi-soal">
                            <!-- show index exams -->
                            <?php /**/ $i = 1 /**/ ?>
                            <?php if($exam->questions->count() > 0): ?>
                                <?php foreach($exam->questions as $question): ?>
                                    <a title="" class="btn btn-fab">
                                        <?php echo e($i); ?>

                                    </a>
                                    <?php /**/ $i++ /**/ ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a title="" class="btn btn-fab">
                                    <?php echo e($i); ?>

                                </a>
                            <?php endif; ?>
                            <!-- end show index exams -->
                        </div>
                    </div>
                    <div class="panel-footer">
                      <button class="add_exam_button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                        <span class="glyphicon-class">Tambah Soal</span> 
                      </button>
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
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div id="main">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="<?php echo e(action('Make\QuestionsController@update', $exam->id)); ?>" method="POST" class="form-horizontal" role="form">
                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PUT'); ?>


                        <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div id="soal">
                                <!-- show exams -->
                            <?php if($exam->questions->count() > 0): ?>
                                <?php /**/ $i = 1 /**/ ?>
                                <?php foreach($exam->questions as $question): ?>
                                    <div class="soal row">
                                        <div class="col-sm-12">
                                            <div class="container">
                                                <div class="form-group">
                                                Soal <?php echo e($i); ?>

                                                  <textarea name="soal[<?php echo e($i); ?>]" id="textarea<?php echo e($i); ?>" class="form-control" rows="3" required><?php echo e($question->question); ?></textarea>
                                                </div>
                                                <div class="form-group" id="soal<?php echo e($i); ?>">
                                                    <div class="radio form-inline">
                                                        <label>
                                                            A.
                                                            <input name="key[<?php echo e($i); ?>]" value="a" type="radio" <?php echo e($question->correct_answer=='a' ? 'checked' : ''); ?> required> 
                                                            <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" value="<?php echo e($question->a); ?>" required>
                                                        </label>
                                                    </div>
                                                    <div class="radio form-inline">
                                                        <label>
                                                            B.
                                                            <input name="key[<?php echo e($i); ?>]" value="b" type="radio" <?php echo e($question->correct_answer=='b' ? 'checked' : ''); ?> > 
                                                            <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" value="<?php echo e($question->b); ?>" required>
                                                        </label>
                                                    </div>
                                                    <div class="radio form-inline">
                                                        <label>
                                                            C.
                                                            <input name="key[<?php echo e($i); ?>]" value="c" type="radio" <?php echo e($question->correct_answer=='c' ? 'checked' : ''); ?> >
                                                            <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" value="<?php echo e($question->c); ?>" required>
                                                        </label>
                                                    </div>
                                                    <div class="radio form-inline">
                                                        <label>
                                                            D.
                                                            <input name="key[<?php echo e($i); ?>]" value="d" type="radio" <?php echo e($question->correct_answer=='d' ? 'checked' : ''); ?> >
                                                            <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" value="<?php echo e($question->d); ?>" required>
                                                        </label>
                                                    </div>
                                                    <div class="radio form-inline">
                                                        <label>
                                                            E.
                                                            <input name="key[<?php echo e($i); ?>]" value="e" type="radio" <?php echo e($question->correct_answer=='e' ? 'checked' : ''); ?> >
                                                            <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" value="<?php echo e($question->e); ?>" required>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php /**/ $i++ /**/ ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php /**/ $i = 1 /**/ ?>
                                <div class="soal row">
                                    <div class="col-sm-12">
                                        <div class="container">
                                            <div class="form-group">
                                            Soal <?php echo e($i); ?>

                                              <textarea name="soal[<?php echo e($i); ?>]" id="textarea<?php echo e($i); ?>" class="form-control" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group" id="soal<?php echo e($i); ?>">
                                                <div class="radio form-inline">
                                                    <label>
                                                        A.
                                                        <input name="key[<?php echo e($i); ?>]" value="a" type="radio" required> 
                                                        <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" required>
                                                    </label>
                                                </div>
                                                <div class="radio form-inline">
                                                    <label>
                                                        B.
                                                        <input name="key[<?php echo e($i); ?>]" value="b" type="radio"> 
                                                        <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" required>
                                                    </label>
                                                </div>
                                                <div class="radio form-inline">
                                                    <label>
                                                        C.
                                                        <input name="key[<?php echo e($i); ?>]" value="c" type="radio">
                                                        <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" required>
                                                    </label>
                                                </div>
                                                <div class="radio form-inline">
                                                    <label>
                                                        D.
                                                        <input name="key[<?php echo e($i); ?>]" value="d" type="radio">
                                                        <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" required>
                                                    </label>
                                                </div>
                                                <div class="radio form-inline">
                                                    <label>
                                                        E.
                                                        <input name="key[<?php echo e($i); ?>]" value="e" type="radio">
                                                        <input name="jawaban[<?php echo e($i); ?>][]" type="text" class="form-control" placeholder="Text input" required>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                                       
                                
                                <!-- show exams -->
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

       
        // $(wrapper).on("click",".remove_field", function(e){
        //     e.preventDefault(); $(this).parent('div').remove(); x--;
        // })
    });
    </script>

    <script>
    $(document).ready(function() {

        $.material.init();

        var $gallery = $('#soal').flickity({
            cellAlign: "center",
            autoPlay: false,
            wrapAround: false,
            setGallerySize: true,
            draggable: false,
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
        
        var startup = function() {
            for (var i = 1; i <= flkty.cells.length; i++) {
                changeDone(i);
            }
        }
        startup();

        var updateSoal = function() {
            changeDone(currentSoal);

            currentSoal = flkty.selectedIndex + 1;
            beforeSoal = flkty.selectedIndex;
            nextSoal = currentSoal +1;

            $('#id_current').html(currentSoal /*+ "<small>/" + jmlSoal + "</small>"*/);
            $('#navigasi-soal a').removeClass('selected');

            $('#navigasi-soal a:nth-child(' + currentSoal + ')').addClass('selected');


            jmlDone = $('#navigasi-soal .done').length;
            progressPercent = (jmlDone / flkty.cells.length) * 100;
            if (progressPercent == 100) {
                selesai();
            };
            $(".progress-bar").css("width", progressPercent + "%").html(jmlDone + "<small>/" + flkty.cells.length + "</small>");

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

        var validation = function() {
            console.log("auoo");
            for (var i = 1; i <= flkty.cells.length; i++) {

                soal = $('#textarea'+i).val();
                key = $("input[name='key["+i+"]']").is(':checked');
                //key = $("#soal"+i).find('input[type="radio"]:checked').length > 0;

                jawaban = $('input[name="jawaban['+i+'][]"]').each(function(){
                    var value = $(this).val();
                    x = true;
                    if(!value){
                        x = false;
                        return false;
                    }
                    return x;
                });

                if (!soal) {
                    console.log('no soal for '+i);
                    slideTo(i-1);
                    alert('Harap isi soal nomor '+i);
                    break;
                }
                else if (!key) {
                    console.log('no key for '+i);
                    slideTo(i-1);
                    alert('Belum ada kunci jawaban untuk soal nomor '+i);
                    break;
                }
                else if(!x) {
                    console.log('no jawaban for '+i+x);
                    slideTo(i-1);
                    alert('Harap isi jawaban untuk soal nomor '+i);
                    break;
                }
                else {
                    $gallery.hide();
                    $(".selesai").show();
                    $('#id_current').html('fin');
                    $('#navigasi-soal a').removeClass('selected');
                }


            }
        }

        $('#selesai').on('click', function() {
            validation();
        });

        var indexsidebar = $('#navigasi-soal');
        var contentexam = $('.soal.row:not(.selesai)');
        var add_button      = $('.add_exam_button');
       
        $(add_button).click(function(e){
            e.preventDefault();
            x = flkty.cells.length +1;
            var content = '<div class="soal row"><div class="col-sm-12"><div class="container"><div class="form-group">Soal '+x+'<textarea name="soal['+x+']" id="textarea'+x+'" class="form-control" rows="3" required></textarea></div><div class="form-group" id="soal'+x+'"><div class="radio form-inline"><label>A.<input name="key['+x+']" value="a" type="radio" required> <span class="circle"></span><span class="check"></span><input name="jawaban['+x+'][]" type="text" class="form-control" placeholder="Text input" required></label></div><div class="radio form-inline"><label>B.<input name="key['+x+']" value="b" type="radio"> <span class="circle"></span><span class="check"></span><input name="jawaban['+x+'][]" type="text" class="form-control" placeholder="Text input" required></label></div><div class="radio form-inline"><label>C.<input name="key['+x+']" value="c" type="radio"><span class="circle"></span><span class="check"></span><input name="jawaban['+x+'][]" type="text" class="form-control" placeholder="Text input" required></label></div><div class="radio form-inline"><label>D.<input name="key['+x+']" value="d" type="radio"><span class="circle"></span><span class="check"></span><input name="jawaban['+x+'][]" type="text" class="form-control" placeholder="Text input" required></label></div><div class="radio form-inline"><label>E.<input name="key['+x+']" value="e" type="radio"><span class="circle"></span><span class="check"></span><input name="jawaban['+x+'][]" type="text" class="form-control" placeholder="Text input" required></label></div></div></div></div></div>';

            $(indexsidebar).append('<a title="" class="btn btn-fab">'+x+'</a>');

            $gallery.flickity( 'append', $(content) );

        });

    });
    </script>
</body>

</html>
