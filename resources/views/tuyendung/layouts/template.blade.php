<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href=".">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('template/favicon.png') }}">
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/introjs.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.15.0/slimselect.min.css" rel="stylesheet"></link>
    <!--Hỗ trợ IE nhận dạng thẻ HTML5-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-faded">
      <a class="navbar-brand" href="#"><i class="fa fa-cogs"></i> Quản trị hệ thống</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}">Register</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('info.index') }}"><i class="fas fa-user"></i>Thông tin công ty</a>
              <a class="dropdown-item" href="{{ route('tuyendung.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i>
                {{ __('Đăng xuất') }}
              </a>
              <form id="logout-form" action="{{ route('tuyendung.logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="clearfix">
      <div id="sidebar-bg"></div>
      <div id="sidebar" role="navigation">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
            <i class="fa fa-th"></i><span> Danh mục quản lý</span>
            <b class="fa fa-plus-sign visible-xs pull-right"></b>
            </h3>
          </div>
          <ul id="menu" class="list-group">
            <li class="list-group-item">
              <a href="post.html">
                <i class="fa fa-edit"></i> <span>Tin tức</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="product.html">
                <i class="fa fa-fire"></i><span>Sản phẩm</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="type_product.html">
                <i class="fa fa-bars"></i> <span>Loại sản phẩm</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="contact.html">
                <i class="fas fa-envelope-open"></i> <span>Phản hồi<span class="badge pull-right">1</span></span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="slider.html">
                <i class="fa fa-picture-o"></i> <span>Slider</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="user.html">
                <i class="fa fa-user"></i> <span>Tài khoản</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="setting.html">
                <i class="fa fa-wrench"></i> <span>Cấu hình</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div id="main">
        <div class="container">
          <div class="row text-center">
            @if(isset($alert))
              @if(isset($thongbao))
                  <div class="alert alert-{{ $alert }} col-md-12 thongbao" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Thông báo!</strong> {{ $thongbao }}
                  </div>
              @endif
            @endif
          </div>
        </div>

        @yield('noidung')

      </div>
    </div>
    <script type="text/javascript" src="{{ asset('template/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/intro.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/js/select2/translation/vi.js') }}"></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.15.0/slimselect.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('template/js/admin.js') }}"></script>
    @yield('script')
    <script type="text/javascript">
    window.setTimeout(function() {
    $(".thongbao").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
    });
    }, 4000);
    
    </script>
  </body>
</html>