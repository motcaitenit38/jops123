<!DOCTYPE html>
<html>
@include('seeker.template.head')
<body>
<div id="wrapper">
@include('seeker.template.nav-top')
<!-- /. NAV TOP  -->
    @include('seeker.template.nav-left')
    <div id="page-wrapper">

        <div class="row bg-title">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="page-title">@yield('title')</h4>
            </div>

        <!-- /.col-lg-12 -->
        </div>
        <!-- /. ROW  -->
        <div id="page-inner">
            @include('seeker.template.error')
            @yield('content')

        </div>
    </div>
    <!-- /. PAGE WRAPPER  -->
    @include('seeker.template.footer')
</div>
<!-- /. WRAPPER  -->
@include('seeker.template.script')
<script>
    window.setTimeout(function() {
        $("#thongbao").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>
@yield('script')
</body>
</html>