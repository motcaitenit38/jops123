<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Responsive job portal template build on Latest Bootstrap.">
    <meta name="keywords" content="job, nob board, job portal, job listing">
    <meta name="robots" content="index,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
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
    <link href="{{ asset('search/css/green-style.css') }}" rel="stylesheet">
    <link href="{{ asset('search/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('search/css/responsiveness.css') }}" rel="stylesheet">
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