<nav class="navbar navbar-side">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="active">
                <a href="index.html"><i class="fa fa-cog" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>Quản lý công việc <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('jop.create') }}"><i class="active-job fa fa-circle-o-notch" aria-hidden="true"></i>Thêm công việc</a>
                    </li>
                    <li>
                        <a href="{{ route('jop.index') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>Danh sách công việc</a>
                    </li>
                    <li>
                        <a href="{{ route('jop.deadline') }}"><i class="expire-job fa fa-circle-o-notch" aria-hidden="true"></i>Việc làm đã hết hạn</a>
                    </li>
                </ul>
            </li>
            <li class="log-off">
                <a href="{{ route('employer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
                <form id="logout-form" action="{{ route('employer.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->