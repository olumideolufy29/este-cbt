<?php $__env->startSection('title'); ?>
Daftar Ujian
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">Daftar Ujian</h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">
                    <a href="<?php echo e(action('Make\TestController@create')); ?>" class="btn btn-sm btn-primary btn-create">Tambah Ujian</a>
                  </div>
                  <div class="col col-xs-5 text-right">
                    <input type="search" name="" id="input" class="form-control" value="" required="required" title="" placeholder="Cari Mata Pelajaran..">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
          <thead>
          <tr>
              <th><i class="glyphicon glyphicon-cog"></i></th>
              <th>Name</th>
              <th>Code</th>
              <th>Duration</th>
<!--               <th>Type</th> -->
              <th>Subject</th>
              <?php if(auth()->user()->role == "admin"): ?>
              <th>Created By</th>
              <?php endif; ?>
              <th>Soal</th>
          </tr> 
          </thead>
          <tbody>
            <?php foreach($tests as $test): ?>
            <tr>
            <td align="center">
              <form action="<?php echo e(url('/test-management/'.$test->id)); ?>" method="POST">
                  <?php echo csrf_field(); ?>

                  <?php echo method_field('DELETE'); ?>

                    <a href="<?php echo e(url('/test-management/'.$test->id.'/edit')); ?>" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                  <button type="submit" class="btn btn-danger">
                      <i class="glyphicon glyphicon-trash"></i>
                  </button>
              </form>
            </td>
            <td><?php echo e($test->name); ?></td>
            <td><?php echo e($test->code); ?></td>
            <td><?php echo e($test->duration); ?> menit<br/>
                <?php echo e($test->questions->count()); ?> soal
            </td>
<!--             <td><?php echo e($test->type); ?></td> -->
            <td><?php echo e($test->subject->name); ?></td>
            <?php if(auth()->user()->role == "admin"): ?>
            <td><?php echo e($test->created_by->name); ?></td>
            <?php endif; ?>
            <td align="center">            
              <form action="<?php echo e(url('/question-management/'.$test->id)); ?>" method="POST">
                  <?php echo csrf_field(); ?>

                  <?php echo method_field('DELETE'); ?>

                    <a href="<?php echo e(url('/question-management/'.$test->id.'/edit')); ?>" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit Soal</a>
                    <a href="<?php echo e(url('/result/'.$test->id)); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Lihat Hasil</a>
<!-- 
                                    <button type="submit" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                   -->                  
              </form>        
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