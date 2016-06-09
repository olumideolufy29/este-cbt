<?php $__env->startSection('title'); ?>
Hasil Ujian <?php echo e($test->name); ?> <?php echo e($test->subject->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h3 class="text-center" style="color: #343C47; font-weight: bold;">Hasil Ujian <?php echo e($test->name); ?> <?php echo e($test->subject->name); ?> </h3><br>
 <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-7">

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
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Nilai</th>
          </tr> 
          </thead>
          <tbody>
            <?php foreach($results as $result): ?>
            <tr>
            <td><?php echo e($result->user->no_induk); ?></td>
            <td><?php echo e($result->user->name); ?></td>
            <td><?php echo e(isset($result->user->student->inClass->name) ? $result->user->student->inClass->name : ""); ?></td>
            <td><?php echo e($result->score); ?></td>
            </tr>
            <?php endforeach; ?>
                    </tbody>
                </table>
            
              </div>
            <div class="panel-footer">
                <div class="row">
          <?php echo $results->links(); ?>  
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>