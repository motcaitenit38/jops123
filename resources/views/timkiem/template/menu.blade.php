<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
        <div class="navbar-header"> <a class="navbar-brand" href="{{ asset('/') }}"><img src="{{ asset('search/img/logo.png') }}" class="logo logo-display" alt=""><img src="{{ asset('search/img/logo-white.png') }}" class="logo logo-scrolled" alt=""></a> </div>
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