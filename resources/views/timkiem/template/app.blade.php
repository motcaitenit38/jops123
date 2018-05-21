<!DOCTYPE html>
<html class="no-js" lang="zxx">
    @include('timkiem.template.head')
    <body>
        <div class="wrapper">
            @include('timkiem.template.menu');
            <div class="clearfix"></div>
            <div class="banner">
                <div class="container">
                    <div class="banner-caption">
                        <div class="col-md-12 col-sm-12 banner-text">
                            <h1>7,000+ Browse Jobs</h1>
                            @yield('formtimkiem')
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @include('timkiem.template.modal')
        </div>
        @include('timkiem.template.script')
    </body>
</html>