<?php $__env->startSection('title'); ?>
Manajemen Ujian
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN UJIAN</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="<?php echo e(action('Make\TestController@create')); ?>" class="btn btn-sm btn-primary btn-create">Tambah Ujian</a>
                  </div>
                  <div class="col col-xs-5 text-right">
                    <input type="search" name="" id="input" class="form-control" value="" required="required" title="" placeholder="Cari Ujian..">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					    <th>Kode</th>
					    <th>Nama Ujian</th>
					    <th>Mata Pelajaran</th>
						<th>Soal</th>
					</tr> 
					</thead>
					<tbody>
						<?php foreach($tests as $test): ?>
						<tr>
						<td align="center">
	                        <form action="<?php echo e(url('test-management/'.$test->id)); ?>" method="POST">
	                            <?php echo csrf_field(); ?>

	                            <?php echo method_field('DELETE'); ?>

								<a href="<?php echo e(url('/test-management/'.$test->id.'/edit')); ?>" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								<?php /* <a href="<?php echo e(url('/admin/test-management/'.$test->id)); ?>"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> */ ?>
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
						<td><?php echo e($test->code); ?></td>
						<td><?php echo e($test->name); ?></td>
						<td><?php echo e($test->subject->name); ?></td>
						<td>
							<a href="<?php echo e(url('/test-management/'.$test->id.'/questions')); ?>" class="btn btn-default"><i class="glyphicon  glyphicon-eye-open"></i> Lihat Soal</a>
							
						</td>
						</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					<?php echo $tests->links(); ?>	
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>