<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
        <div class="navbar-header"> <a class="navbar-brand" href="{{ asset('/') }}"><img src="{{ asset('search/img/logo.png') }}" class="logo logo-display" alt=""><img src="{{ asset('search/img/logo-white.png') }}" class="logo logo-scrolled" alt=""></a> </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                @if(Auth::guard('web')->check())
                <li><a href="{{ route('info-timviec.index') }}"><i class="fa fa-pencil" aria-hidden="true"></i>Thông tin cá nhân</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng xuất</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>                
                @else

                {{-- <li class="left-br"><a href="javascript:void(0)" data-toggle="modal" data-target="#signup" class="signin">Đăng nhập</a></li> --}}
                <li class="left-br"><a href="{{ route('info-timviec.index') }}" class="signin">Người tìm việc</a></li>

                <li class="left-br"><a href="{{ route('tuyendung.index') }}" class="signin">Nhà tuyển dụng</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>