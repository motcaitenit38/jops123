<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Responsive job portal template build on Latest Bootstrap.">
    <meta name="keywords" content="job, nob board, job portal, job listing">
    <meta name="robots" content="index,follow">
    <title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
    <link rel="stylesheet" href="{{ asset('search/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('search/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('search/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('search/css/bootstrap-wysihtml5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('search/css/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('search/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('search/css/owl.theme.css') }}">
    <link href="{{ asset('search/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('search/css/line-font.css') }}" rel="stylesheet">
    <link href="{{ asset('search/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('search/css/bootsnav.css') }}" rel="stylesheet">
    <link href="{{ asset('search/css/style.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ asset('search/css/colors/green-style.css') }}">
    <link href="{{ asset('search/css/responsiveness.css') }}" rel="stylesheet"> 
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
                <div class="navbar-header"> <a class="navbar-brand" href="index.html"><img src="{{ asset('search/img/logo.png') }}" class="logo logo-display" alt=""><img src="{{ asset('search/img/logo-white.png') }}" class="logo logo-scrolled" alt=""></a> </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="active">
                            <input type="text" class="form-control" placeholder="Find Freelancer">
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li><a href="login.html"><i class="fa fa-pencil" aria-hidden="true"></i>SignIn</a></li>
                        <li><a href="pricing.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
                        <li class="left-br"><a href="javascript:void(0)" data-toggle="modal" data-target="#signup" class="signin">Sign In Now</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="clearfix"></div>
        <div class="banner">
            <div class="container">
                <div class="banner-caption">
                    <div class="col-md-12 col-sm-12 banner-text">
                        <h1>7,000+ Browse Jobs</h1>

                        <form class="form-horizontal" action="" method="GET">
                        
                            <div class="col-md-7 no-padd">
                                <div class="input-group">
                                    <input type="text" class="form-control right-bor" placeholder="Skills, Designations, Companies" name="search"> </div>
                            </div>
                            
                            <div class="col-md-3 no-padd">
                                <div class="input-group">
                                    <select class="form-control" name="diachi">
                                    	@foreach($tinh as $tinh)
                                        <option value="{{ $tinh->thanhpho_id }}">{{ $tinh->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 no-padd">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">Search Job</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div>
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tab" role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
                                <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                            </ul>
                            <div class="tab-content" id="myModalLabel2">
                                <div role="tabpanel" class="tab-pane fade in active" id="login"><img src="{{ asset('search/img/logo.png') }}" class="img-responsive" alt="" />
                                    <div class="subscribe wow fadeInUp">
                                        <form class="form-inline" method="post">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="Username" required="">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                    <div class="center">
                                                        <button type="submit" id="login-btn" class="submit-btn"> Login </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="register"><img src="{{ asset('search/img/logo.png') }}" class="img-responsive" alt="" />
                                    <form class="form-inline" method="post">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="Your Name" required="">
                                                <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                                                <input type="email" name="email" class="form-control" placeholder="Username" required="">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                <div class="center">
                                                    <button type="submit" id="subscribe" class="submit-btn"> Create Account </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript" src="{{ asset('search/js/jquery.min.js') }}"></script>
        <script src="{{ asset('search/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('search/js/bootsnav.js') }}"></script>
        <script src="{{ asset('search/js/viewportchecker.js') }}"></script>
        <script src="{{ asset('search/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('search/js/wysihtml5-0.3.0.js') }}"></script>
        <script src="{{ asset('search/js/bootstrap-wysihtml5.js') }}"></script>
        <script src="{{ asset('search/js/jQuery.style.switcher.js') }}"></script>
        <script type="text/javascript" src="{{ asset('search/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('search/js/custom.js') }}"></script>
</body>

</html>