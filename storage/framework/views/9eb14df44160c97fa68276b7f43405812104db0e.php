<?php $__env->startSection('title'); ?>
Manajemen Kelas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN KELAS</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                  	<?php if(auth()->user()->role == 'admin'): ?>
                    <a href="<?php echo e(action('Admin\KelasController@create')); ?>" class="btn btn-sm btn-primary btn-create">Tambah Kelas</a>
                    <?php endif; ?>
                  </div>

                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
                  	<?php if(auth()->user()->role == 'admin'): ?>
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					<?php endif; ?>
					    <th>Nama Kelas</th>
					    <th>Keterangan</th>
					</tr> 
					</thead>
					<tbody>
						<?php foreach($classs as $class): ?>
						<tr>
                  	<?php if(auth()->user()->role == 'admin'): ?>
						<td align="center">
	                        <form action="<?php echo e(url('admin/class-management/'.$class->id)); ?>" method="POST">
	                            <?php echo csrf_field(); ?>

	                            <?php echo method_field('DELETE'); ?>

								<a href="<?php echo e(url('/admin/class-management/'.$class->id.'/edit')); ?>" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								<?php /* <a href="<?php echo e(url('/admin/class-management/'.$class->id)); ?>"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> */ ?>
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
					<?php endif; ?>
						<td><?php echo e($class->name); ?></td>
						<td>
							<a href="<?php echo e(url('/admin/class-management/'.$class->id.'/edit')); ?>" class="btn btn-default"><i class="glyphicon glyphicon-eye"></i> Lihat Siswa</a>
						</td>
						</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					<?php echo $classs->links(); ?>	
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>