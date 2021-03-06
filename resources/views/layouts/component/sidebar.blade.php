                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">

                    @if(auth()->user()->role == "teacher")
                    <img src="{{ asset('assets/image/admin-flat.png') }}" class="img-responsive" alt="">
                    @elseif(auth()->user()->role == "admin")
                    <img src="{{ asset('assets/image/admin-flat.png') }}" class="img-responsive" alt="">
                    @elseif(auth()->user()->role == "student")
                    <img src="{{ URL::asset('assets/image/person-flat.png') }}" class="img-responsive" alt="">
                    @endif

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ucwords(auth()->user()->name)}}
                    </div>
                    <div class="profile-usertitle-job">
                        {{ucwords(auth()->user()->role)}}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <a href="{{url('change-password')}}" class="btn btn-success btn-sm">Ganti Sandi</a>
                    <a href="{{url('logout')}}" class="btn btn-danger btn-sm">Keluar</a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">

                    @if(auth()->user()->role == "teacher")
                    <ul class="nav">
                        <li>
                            <a href="{{url('/test-management')}}">
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
                            <a href="{{url('/credits')}}">
                            <i class="glyphicon glyphicon-flag"></i>
                            Credits </a>
                        </li>
                    </ul>
                    @elseif(auth()->user()->role == "admin")
                    <ul class="nav">
                        <li>
                            <a href="{{url('/test-management')}}">
                            <i class="glyphicon glyphicon-ok"></i>
                            Manajemen Ujian </a>
                        </li>

                        <li>
                            <a href="{{url('admin/teacher-management')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Guru </a>
                        </li>
                        <li>
                            <a href="{{url('admin/student-management')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Siswa </a>
                        </li>
                        <li>
                            <a href="{{url('admin/subject-management')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Mata Pelajaran </a>
                        </li>
                        <li>
                            <a href="{{url('admin/class-management')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Manajemen Kelas </a>
                        </li>

                        <li>
                            <a href="{{url('/credits')}}">
                            <i class="glyphicon glyphicon-flag"></i>
                            Credits </a>
                        </li>
                    </ul>
                    @else

                    @endif
                </div>
                <!-- END MENU -->
