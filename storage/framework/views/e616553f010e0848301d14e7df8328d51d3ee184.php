<?php $__env->startSection('title'); ?>
Edit Siswa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">EDIT DATA SISWA
<br><small style="color: #343C47;">(Isikan kolom berikut dengan benar)</small></h3><br>
<form id="productForm" method="post" class="form-horizontal" action="<?php echo e(action('Admin\StudentController@update', $student->id)); ?>">
    <?php echo csrf_field(); ?>

    <?php echo method_field('PUT'); ?>


    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="form-group">
        <label class="col-xs-4 control-label">Nomor Induk</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="no_induk" placeholder="Masukkan Kode Siswa" value="<?php echo e(isset($student->user->no_induk) ? $student->user->no_induk : old('no_induk')); ?>" disabled />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-4 control-label">Nama Siswa</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Siswa" value="<?php echo e(isset($student->user->name) ? $student->user->name : old('name')); ?>" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Jenis Kelamin</label>
        <div class="col-xs-6 selectContainer">
            <select class="form-control" name="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <?php 
                $genders = ['Laki-laki', 'Perempuan'];
                 ?>
                <?php foreach($genders as $gender): ?>
                <?php if($gender == $student->gender): ?>
                <option value="<?php echo e($gender); ?>" selected><?php echo e($gender); ?></option>
                <?php else: ?>
                <option value="<?php echo e($gender); ?>"><?php echo e($gender); ?></option>
                <?php endif; ?>
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
                <?php if($class->id == $student->class_id): ?>
                <option value="<?php echo e($class->id); ?>" selected><?php echo e($class->name); ?></option>
                <?php else: ?>
                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
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