<?php $__env->startSection('title'); ?>
Edit Ujian
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">EDIT DATA UJIAN
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="<?php echo e(action('Make\TestController@update', $test->id)); ?>">
    <?php echo csrf_field(); ?>

    <?php echo method_field('PUT'); ?>


    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="form-group">
        <label class="col-xs-3 control-label">Kode Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="code_test" value="<?php echo e(isset($test->code) ? $test->code : old('code_test')); ?>"  placeholder="Masukkan Kode Test" disabled/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Nama Test</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" name="name_test" placeholder="Masukkan Nama Test" required value="<?php echo e(isset($test->name) ? $test->name : old('name')); ?>" />
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
                <?php if($subject->id == $test->subject_id): ?>
                <option value="<?php echo e($subject->id); ?>" selected><?php echo e($subject->name); ?></option>
                <?php else: ?>
                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                <?php endif; ?>
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
<!--                 <option value="essay">Essay</option> -->
                <option value="multiple_choice" selected>Pilihan Ganda</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Durasi (menit)</label>
        <div class="col-xs-7 selectContainer">
            <input type="number" class="form-control" name="duration" placeholder="Masukkan Menit" required value="<?php echo e(isset($test->duration) ? $test->duration : old('duration')); ?>" />
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-4 col-xs-offset-4">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIMPAN</button>
        </div>
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>