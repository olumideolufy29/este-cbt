                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{ URL::asset('assets/image/person-flat.png') }}" class="img-responsive" alt="">
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
                    <button type="button" class="btn btn-success btn-sm">Ganti Sandi</button>
                    <a href="{{url('logout')}}" class="btn btn-danger btn-sm">Keluar</a>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">

                    @if(auth()->user()->role == "teacher")
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            Pengaturan Akun </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                            <i class="glyphicon glyphicon-ok"></i>
                            Riwayat Test </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                            Bantuan </a>
                        </li>
                    </ul>
                    @elseif(auth()->user()->role == "admin")

                    @else

                    @endif
                </div>
                <!-- END MENU -->