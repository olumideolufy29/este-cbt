<?php $__env->startSection('title'); ?>
Manajemen Soal
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">MANAJEMEN SOAL </h3>
<p></p>
<br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="<?php echo e(action('Make\QuestionsController@create',$id_test)); ?>" class="btn btn-sm btn-primary btn-create">Tambah Soal</a>
                  </div>
                  <div class="col col-xs-5 text-right">
                    <input type="search" name="" id="input" class="form-control" value="" required="required" title="" placeholder="Cari Soal..">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
					<thead>
					<tr>
					    <th><i class="glyphicon glyphicon-cog"></i></th>
					    <th>Soal</th>
					    <th>Kunci Jawaban</th>
					</tr> 
					</thead>
					<tbody>
						<?php foreach($questions as $question): ?>
						<tr>
						<td align="center">
	                        <form action="<?php echo e(url('test-management/'.$id_test.'questions/'.$question->id)); ?>" method="POST">
	                            <?php echo csrf_field(); ?>

	                            <?php echo method_field('DELETE'); ?>

								<a href="<?php echo e(url('/test-management/'.$id_test.'questions/'.$question->id.'/edit')); ?>" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
								<?php /* <a href="<?php echo e(url('/admin/test-management/'.$id_test)); ?>"class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a> */ ?>
	                            <button type="submit" class="btn btn-danger">
	                                <i class="glyphicon glyphicon-trash"></i>
	                            </button>
	                        </form>
						</td>
						<td><b><?php echo e($question->question); ?></b>
							<br/>a. <?php echo e($question->a); ?>

							<br/>b. <?php echo e($question->b); ?>

							<br/>c. <?php echo e($question->c); ?>

							<br/>d. <?php echo e($question->d); ?>

							<br/>e. <?php echo e($question->e); ?>

						</td>
						<td><?php echo e($question->correct_answer); ?></td>
						<td>
							<a href="<?php echo e(url('/test-management/'.$id_test.'/questions')); ?>" class="btn btn-default"><i class="glyphicon  glyphicon-eye-open"></i> Lihat Soal</a>
							
						</td>
						</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
					<?php echo $questions->links(); ?>	
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>