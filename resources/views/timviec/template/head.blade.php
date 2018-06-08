<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Responsive job portal template build on Latest Bootstrap.">
    <meta name="keywords" content="job, nob board, job portal, job listing">
    <meta name="robots" content="index,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('asset-uea/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('asset-uea/css/font-awesome.css') }}" rel="stylesheet"/>
    <!-- Line Font STYLES-->
    <link href="{{ asset('asset-uea/css/line-font.css') }}" rel="stylesheet"/>
    <!-- Dropzone Style-->
    <link href="{{ asset('asset-uea/css/dropzone.css') }}" rel="stylesheet"/>
    <!-- Bootstrap Editor-->
    <link href="{{ asset('asset-uea/css/bootstrap-wysihtml5.css') }}" rel="stylesheet"/>
    <link href="{{ asset('asset-uea/css/select2.min.css') }}" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('asset-uea/css/custom.css') }}" rel="stylesheet"/>
    <style>
        .preloading {
            overflow: hidden;
        }
        .preload-container {
            width: 100%;
            height: 100%;
            background: #ef6e7e;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: 99999999999;
            display: block;
            padding-right: 17px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .preload-icon {
            font-size: 66px;
            color: #fff;
            margin-top: 20%;
        }
        @-webkit-keyframes {
            from {
                -webkit-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes rotating {
            from {
                -ms-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -webkit-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -ms-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .rotating {
            -webkit-animation: rotating 1.5s linear infinite;
            -moz-animation: rotating 1.5s linear infinite;
            -ms-animation: rotating 1.5s linear infinite;
            -o-animation: rotating 1.5s linear infinite;
            animation: rotating 1.5s linear infinite;
        }
    </style>
</head>