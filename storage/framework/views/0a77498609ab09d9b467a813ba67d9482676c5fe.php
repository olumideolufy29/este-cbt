<?php $__env->startSection('title'); ?>
Tambah Guru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">TAMBAH DATA GURU
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="<?php echo e(action('Admin\TeacherController@store')); ?>">
    <?php echo csrf_field(); ?>

    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="form-group">
        <label class="col-xs-4 control-label">Nomor Induk</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="no_induk" placeholder="Masukkan Nomor Induk" value="<?php echo e(old('no_induk')); ?>" required/>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Guru</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Guru" value="<?php echo e(old('name')); ?>" required />
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
        <label class="col-xs-4 control-label">Mata Pelajaran</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="subject" required>
                <option value="">Pilih Mata Pelajaran</option>
                <?php foreach($subjects as $subject): ?>
                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
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