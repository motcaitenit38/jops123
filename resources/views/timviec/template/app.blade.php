<!DOCTYPE html>
<html>
@include('timviec.template.head')
<body>
<div id="wrapper">
@include('timviec.template.nav-top')
<!-- /. NAV TOP  -->
    @include('timviec.template.nav-left')
    <div id="page-wrapper">

        <div class="row bg-title">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="page-title">@yield('title')</h4>
            </div>

        <!-- /.col-lg-12 -->
        </div>
        <!-- /. ROW  -->
        <div id="page-inner">
            @include('timviec.template.error')
            @yield('content')

        </div>
    </div>
    <!-- /. PAGE WRAPPER  -->
    @include('timviec.template.footer')
</div>
<!-- /. WRAPPER  -->
@include('timviec.template.script')
@yield('script')
<script>
    window.setTimeout(function() {
        $("#thongbao").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>

</body>
</html>