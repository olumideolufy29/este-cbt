<?php $__env->startSection('title'); ?>
Dashboard Guru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1 class="text-center" style="color: #343C47; font-weight: bold;">INFORMASI TEST
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h1><br>

<form id="productForm" action="<?php echo e(action('Make\TestController@store')); ?>" method="post" class="form-horizontal">


    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label class="col-xs-3 control-label">Kode Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="code_test" value="<?php echo e(old('code_test')); ?>"  placeholder="Kode Test Random" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Nama Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="name_test" placeholder="Masukkan Nama Test" value="<?php echo e(old('name_test')); ?>" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Mata Pelajaran</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="subject">
                <option value="">Pilih Mata Pelajaran</option>
                <option value="<?php echo e(Auth::user()->teacher->subject->id); ?>"><?php echo e(Auth::user()->teacher->subject->name); ?></option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Tipe Test</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="type">
                <option value="">Pilih Tipe Test</option>
                <option value="essay">Essay</option>
                <option value="multiple_choice">Pilihan ganda</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Durasi</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="duration">
                <option value="">Durasi Test</option>
                <option value="30">30 Menit</option>
                <option value="60">60 Menit</option>
                <option value="90">90 Menit</option>
                <option value="120">120 Menit</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-7 col-xs-offset-3">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">BUAT</button>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>