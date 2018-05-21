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
    <link rel="stylesheet" href="{{ asset('timkiem/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('timkiem/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('timkiem/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('timkiem/css/bootstrap-wysihtml5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('timkiem/css/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('timkiem/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('timkiem/css/owl.theme.css') }}">
    <link href="{{ asset('timkiem/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('timkiem/css/line-font.css') }}" rel="stylesheet">
    <link href="{{ asset('timkiem/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('timkiem/css/bootsnav.css') }}" rel="stylesheet">
    <link href="{{ asset('timkiem/css/style.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ asset('timkiem/css/colors/green-style.css') }}">
    <link href="{{ asset('timkiem/css/responsiveness.css') }}" rel="stylesheet"> 
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-transparent white bootsnav">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
                <div class="navbar-header"> <a class="navbar-brand" href="index.html"><img src="img/logo.png" class="logo logo-display" alt=""></a> </div>
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
       
        @yield('noidung')
        
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
                                <div role="tabpanel" class="tab-pane fade in active" id="login"><img src="img/logo.png" class="img-responsive" alt="" />
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
                                <div role="tabpanel" class="tab-pane fade" id="register"><img src="img/logo.png" class="img-responsive" alt="" />
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
        <div class="modal fade" id="apply-job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="apply-job-box"><img src="img/com-1.jpg" class="img-responsive" alt="">
                            <h4>Product Designer</h4>
                            <p>Google Pvt.</p>
                        </div>
                        <div class="apply-job-form">
                            <form class="form-inline" method="post">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                                        <textarea class="form-control" placeholder="About You / Paste your CV"></textarea>
                                        <div class="fileUpload"><span>Upload CV</span>
                                            <input type="file" class="upload" /> </div>
                                        <div class="center">
                                            <button type="submit" id="subscribe" class="submit-btn"> Apply Now </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
        <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
            <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
            <ul id="styleOptions" title="switch styling">
                <li> <a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a> </li>
                <li> <a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a> </li>
            </ul>
        </div>
       <script type="text/javascript" src="{{ asset('timkiem/js/jquery.min.js') }}"></script>
<script src="{{ asset('timkiem/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('timkiem/js/bootsnav.js') }}"></script>
<script src="{{ asset('timkiem/js/viewportchecker.js') }}"></script>
<script src="{{ asset('timkiem/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('timkiem/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('timkiem/js/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('timkiem/js/jQuery.style.switcher.js') }}"></script>
<script type="text/javascript" src="{{ asset('timkiem/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('timkiem/js/custom.js') }}"></script>
        
    </div>
</body>

</html>