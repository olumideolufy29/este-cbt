                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">

                    <?php if(auth()->user()->role == "teacher"): ?>
                    <img src="<?php echo e(asset('assets/image/admin-flat.png')); ?>" class="img-responsive" alt="">
                    <?php elseif(auth()->user()->role == "admin"): ?>
                    <img src="<?php echo e(asset('assets/image/admin-flat.png')); ?>" class="img-responsive" alt="">
                    <?php elseif(auth()->user()->role == "student"): ?>
                    <img src="<?php echo e(URL::asset('assets/image/person-flat.png')); ?>" class="img-responsive" alt="">
                    <?php endif; ?>

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo e(ucwords(auth()->user()->name)); ?>

                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo e(ucwords(auth()->user()->role)); ?>

                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a href="<?php echo e(url('change-password')); ?>" class="btn btn-success btn-sm">Ganti Sandi</a>
                    <a href="<?php echo e(url('logout')); ?>" class="btn btn-danger btn-sm">Keluar</a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">

                    <?php if(auth()->user()->role == "teacher"): ?>
                    <ul class="nav">
                        <li>
                            <a href="<?php echo e(url('/test-management')); ?>">
                            <i class="glyphicon glyphicon-ok"></i>
                            Daftar Ujian </a>
                        </li>
                        
<!--                         <li>
    <a href="#">
    <i class="glyphicon glyphicon-user"></i>
    Daftar Jawaban Siswa </a>
</li>
 -->
                        <li>
                            <a href="<?php echo e(url('/credits')); ?>">
                            <i class="glyphicon glyphicon-flag"></i>
                            Credits </a>
                        </li>
                    </ul>
                    <?php elseif(auth()->user()->role == "admin"): ?>
                    <ul class="nav">
                        <li>
                            <a href="<?php echo e(url('/test-management')); ?>">
                            <i class="glyphicon glyphicon-ok"></i>
                            Manajemen Ujian </a>
                        </li>

                        <li>
                            <a href="<?php echo e(url('admin/teacher-management')); ?>">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Guru </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/student-management')); ?>">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Siswa </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/subject-management')); ?>">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Mata Pelajaran </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('admin/class-management')); ?>">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Kelas </a>
                        </li>

                        <li>
                            <a href="<?php echo e(url('/credits')); ?>">
                            <i class="glyphicon glyphicon-flag"></i>
                            Credits </a>
                        </li>
                    </ul>
                    <?php else: ?>

                    <?php endif; ?>
                </div>
                <!-- END MENU -->
