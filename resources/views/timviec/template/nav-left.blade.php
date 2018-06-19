<nav class="navbar navbar-side">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="active">
                <a href="{{ route('trangchu.index') }}" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i>Xem trang chủ</a>
            </li>

            <li>
                <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>Quản lý CV <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('cvtimviec.index') }}"><i class="active-job fa fa-circle-o-notch" aria-hidden="true"></i>Danh sách CV</a>
                    </li>
                    <li>
                        <a href="{{ route('cvtimviec.create') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>Tạo mới CV</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-clone" aria-hidden="true"></i>Quản lý công việc <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('timviec.dangungtuyen') }}"><i class="active-job fa fa-circle-o-notch" aria-hidden="true"></i>Đang ứng tuyển</a>
                    </li>
                    <li>
                        <a href="{{ route('timviec.daluu') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>đã lưu</a>
                    </li>
                    <li>
                        <a href="{{ route('timviec.trungtuyen') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>Trúng tuyển</a>
                    </li>
                    <li>
                        <a href="{{ route('timviec.khongtrungtuyen') }}"><i class="pending-job fa fa-circle-o-notch" aria-hidden="true"></i>Không Trúng tuyển</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{ route('thongtintimviec.index') }}"><i class="fa fa-cog" aria-hidden="true"></i>Thông tin công ty</a>
            </li>
            <li>
                <a href="{{ route('form.timiem.nhatuyendung') }}"><i class="fa fa-cog" aria-hidden="true"></i>Tìm kiếm nhà tuyển dụng</a>
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