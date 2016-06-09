<?php $__env->startSection('title'); ?>
Tambah Siswa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">TAMBAH DATA SISWA
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="<?php echo e(action('Admin\StudentController@store')); ?>">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="form-group">
        <label class="col-xs-4 control-label">Nomor Induk</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="no_induk" placeholder="Masukkan Nomor Induk" value="<?php echo e(old('no_induk')); ?>" required/>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Siswa</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Siswa" value="<?php echo e(old('name')); ?>" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Jenis Kelamin</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="gender" required>
                <option value="">Pilih Jenis Kelamin</option>
                <?php 
                $genders = ['Laki-laki', 'Perempuan'];
                 ?>
                <?php foreach($genders as $gender): ?>
                <option value="<?php echo e($gender); ?>" checked><?php echo e($gender); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Kelas</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="class" required>
                <option value="">Pilih Kelas</option>
                <?php foreach($classes as $class): ?>
                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                <?php endforeach; ?>
            </select>
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