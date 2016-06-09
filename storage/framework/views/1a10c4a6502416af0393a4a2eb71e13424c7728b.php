<?php $__env->startSection('title'); ?>
Tambah Mata Pelajaran
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">TAMBAH DATA MATA PELAJARAN
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="<?php echo e(action('Admin\SubjectController@store')); ?>">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="form-group">
        <label class="col-xs-4 control-label">Kode Mata Pelajaran</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="code" placeholder="Masukkan Kode Mata Pelajaran" value="<?php echo e(old('code')); ?>" required />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Mata Pelajaran</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Mata Pelajaran" value="<?php echo e(old('name')); ?>" required />
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-4 col-xs-offset-4">
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">BUAT</button>
        </div>
    </div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>