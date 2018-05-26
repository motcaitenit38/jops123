<!DOCTYPE html>

@include('search.template.head')

<body>
<div class="wrapper">
    @include('search.template.menu-top')
    @yield('content')
    @include('search.template.footer')
    @include('search.template.modal-login')
    @include('search.template.script')

</div>
</body>

</html>