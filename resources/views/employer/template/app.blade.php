<!DOCTYPE html>
<html>
@include('employer.template.head')
<body>
<div id="wrapper">
@include('employer.template.nav-top')
<!-- /. NAV TOP  -->
    @include('employer.template.nav-left')
    <div id="page-wrapper">

        <div class="row bg-title">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="page-title">@yield('title')</h4>
            </div>

        <!-- /.col-lg-12 -->
        </div>
        <!-- /. ROW  -->
        <div id="page-inner">
            @include('employer.template.error')
            @yield('content')

        </div>
    </div>
    <!-- /. PAGE WRAPPER  -->
    @include('employer.template.footer')
</div>
<!-- /. WRAPPER  -->
@include('employer.template.script')
@yield('script')
</body>
</html>