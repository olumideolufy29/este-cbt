<?php $__env->startSection('title'); ?>
Dashboard Guru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">TAMBAHKAN UJIAN
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>

<form id="productForm" action="<?php echo e(action('Make\TestController@store')); ?>" method="post" class="form-horizontal">


    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo csrf_field(); ?>

    <div class="form-group">
        <label class="col-xs-3 control-label">Kode Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="code" value="<?php echo e(old('code')); ?>"  placeholder="Masukkan Kode Test" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Nama Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="name_test" placeholder="Masukkan Nama Test" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Mata Pelajaran</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="subject">
                <option value="">Pilih Mata Pelajaran</option>
                <?php if(auth()->user()->role == 'teacher'): ?>
                <option value="<?php echo e(Auth::user()->teacher->subject->id); ?>" selected><?php echo e(Auth::user()->teacher->subject->name); ?></option>
                <?php endif; ?>
                <?php if(auth()->user()->role == 'admin'): ?>
                <?php foreach($subjects as $subject): ?>
                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Tipe Test</label>
        <div class="col-xs-7 selectContainer">
            <select class="form-control" name="type">
                <option value="">Pilih Tipe Test</option>
                <!-- <option value="essay">Essay</option> -->
                <option value="multiple_choice">Pilihan ganda</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Durasi (menit)</label>
        <div class="col-xs-7 selectContainer">
            <input type="number" class="form-control" name="duration" placeholder="Masukkan Menit" required />
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