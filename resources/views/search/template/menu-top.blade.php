<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ asset('/') }}">
                <img src="{{ asset('search/img/logo.png') }}" class="logo logo-display" alt="">
                <img src="{{ asset('search/img/logo-white.png') }}" class="logo logo-scrolled" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                @if(Auth::guard('web')->check())
                <li><a href="{{ url('timviec') }}"><i class="fa fa-pencil" aria-hidden="true"></i>Tài khoản</a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                    <li class="left-br"><a href="{{ route('tuyendung.index') }}" target="_blank"
                                           class="signin">Nhà tuyển dụng</a></li>
               @else
                    <li class="left-br"><a href="javascript:void(0)" data-toggle="modal" data-target="#signup" class="signin">Đăng nhập</a></li>
                    <li class="left-br"><a href="{{ route('tuyendung.index') }}" target="_blank"
                                           class="signin">Nhà tuyển dụng</a></li>
                    @endif
            </ul>
        </div>
    </div>
</nav>
<div class="clearfix"></div>