<?php $__env->startSection('title'); ?>
Dashboard Siswa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="text-center" style="margin-top: 40px">
	<img class="center" src="<?php echo e(url('assets/image/alert.png')); ?>" width="10%">
</div>

<h3 class="text-center" style="color: #343C47; font-weight: bold;">
	MASUKKAN KODE TEST
	<br><small style="color: #343C47;">
	(Kode test ujian diberikan oleh pengawas ujian)
	</small>
</h3>

<div class="card2 card-container">
	<form class="form-signin" method="post" action="<?php echo e(action('StudentController@masuk')); ?>">
    	<?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	    <?php echo csrf_field(); ?>

		<input type="text" name="test_code" id="inputPassword" class="form-control" placeholder="Kode Test" required>
		<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">MULAI</button>
	</form><!-- /form -->
</div><!-- /card-container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>