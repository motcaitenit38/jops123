<!DOCTYPE html>
<html lang="vi">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <base href=".">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Quản trị hệ thống</title>
   <link rel="shortcut icon" href="{{ asset('template/favicon.png') }}">
   <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/admin.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/introjs.min.css') }}" rel="stylesheet">
   <link href="{{ asset('template/css/select2.min.css') }}" rel="stylesheet">
   
   <!--Hỗ trợ IE nhận dạng thẻ HTML5-->
      <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
       <![endif]-->
    </head>
    <body>
      <nav class="navbar navbar-inverse" role="navigation">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-cogs"></i> Quản trị hệ thống</a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     <li><a href="{{ route('info.create') }}"><i class="fa fa-user"></i> Thông tin công ty</a></li>
                     <li><a href="{{ route('tuyendung.logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                     {{ __('Đăng xuất') }}</a></li>
                     <form id="logout-form" action="{{ route('tuyendung.logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form>
                 </ul>
              </li>
           </ul>
        </div>
        <!-- /.navbar-collapse -->
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
                     <i class="fa fa-envelope-o"></i> <span>Phản hồi<span class="badge pull-right">1</span></span>
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

      @yield('noidung')

      <!--END #main-->
   </div>

   <script type="text/javascript" src="{{ asset('template/js/jquery-1.10.2.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('template/js/bootstrap.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('template/js/intro.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('template/js/select2.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('template/js/admin.js') }}"></script>
   

   @yield('script')
</body>
</html>
