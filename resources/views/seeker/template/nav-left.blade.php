<nav class="navbar navbar-side">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="active">
                <a href="{{ route('seeker.index') }}"><i class="fa fa-cog" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>Quản lý công việc <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('seeker.daungtuyen') }}"><i class="active-job fa fa-circle-o-notch" aria-hidden="true"></i>Công việc đang ứng tuyển</a>
                    </li>
                    <li>
                        <a href="{{ route('seeker.daluu') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>Công việc đã lưu</a>
                    </li>
                    <li>
                        <a href="{{ route('seeker.lienquan') }}"><i class="expire-job fa fa-circle-o-notch" aria-hidden="true"></i>Công việc liên quan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>Quản lý CV <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('cv.index') }}"><i class="active-job fa fa-circle-o-notch" aria-hidden="true"></i>Danh sách CV</a>
                    </li>
                    <li>
                        <a href="{{ route('cv.create') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>Tạo mới CV</a>
                    </li>

                </ul>
            </li>
            <li class="log-off">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->