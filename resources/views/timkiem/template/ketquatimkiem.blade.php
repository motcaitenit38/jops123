<!DOCTYPE html>
<html class="no-js" lang="zxx">

@include('timkiem.template.head')

<body>
    <div class="wrapper">
        @include('timkiem.template.menu')
        <div class="clearfix"></div>
       
        @yield('noidung')
        
        <div class="clearfix"></div>
       @include('timkiem.template.modal')
        
       @include('timkiem.template.script')
        
    </div>
</body>

</html>