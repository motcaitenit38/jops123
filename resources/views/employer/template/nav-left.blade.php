<nav class="navbar navbar-side">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="active">
                <a href="index.html"><i class="fa fa-cog" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
                <a href="messages.html"><i class="fa fa-envelope-open" aria-hidden="true"></i>Messages</a>
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
            <li>
                <a href="candidate.html"><i class="fa fa-user-circle-o" aria-hidden="true"></i>My Candidate</a>
            </li>
            <li>
                <a href="create-company.html"><i class="fa fa-file-text" aria-hidden="true"></i>Create Company</a>
            </li>
            <li>
                <a href="add-job.html"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Jobs</a>
            </li>
            <li>
                <a href="my-profile.html"><i class="fa fa-user-circle" aria-hidden="true"></i>My Profile</a>
            </li>
            <li>
                <a href="chatting.html"><i class="fa fa-comments-o" aria-hidden="true"></i>Chatting</a>
            </li>
            <li class="log-off">
                <a href="log-off.html"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->