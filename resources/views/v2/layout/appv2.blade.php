<?php $version = 1.17; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Elearn project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#511650">

    <title>Smile Planet [ Hub | Entrepreneur  | Foundation ]</title>

    <!-- app icon -->
    <link rel="shortcut icon" href="{{ url('img/icon1.png') }}" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('v2/styles/bootstrap4/bootstrap.min.css'.'?v='.$version) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/plugins/font-awesome-4.7.0/css/font-awesome.min.css'.'?v='.$version) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/plugins/OwlCarousel2-2.2.1/animate.css'.'?v='.$version) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/plugins/video-js/video-js.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/styles/main_styles.css'.'?v='.$version) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/styles/responsive.css'.'?v='.$version) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/styles/shared.css'.'?v='.$version) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('v2/styles/plugins.css'.'?v='.$version) }}">
</head>
<body>

<div class="super_container">

    <!-- Preloader -->
    @include('v2.layout.preload')
    <!-- Header -->
    @include('v2.layout.topnav')


    <!-- Menu -->

    @include('v2.layout.sidenav')


    @yield('content')

    <!-- Footer -->

    @include('v2.layout.footer')

</div>

<script src="{{ asset('v2/js/jquery-3.2.1.min.js'.'?v='.$version) }}"></script>
<script src="{{ asset('v2/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('v2/styles/bootstrap4/bootstrap.min.js'.'?v='.$version) }}"></script>
<script src="{{ asset('v2/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('v2/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('v2/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('v2/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('v2/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('v2/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('v2/plugins/easing/easing.js'.'?v='.$version) }}"></script>
{{--<script src="{{ asset('v2/plugins/video-js/video.min.js') }}"></script>--}}
{{--<script src="{{ asset('v2/plugins/video-js/Youtube.min.js') }}"></script>--}}
<script src="{{ asset('v2/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('v2/js/custom.js'.'?v='.$version) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="{{ asset('v2/js/main.js'.'?v='.$version) }}"></script>
<script src="{{ asset('v2/js/plugins.js'.'?v='.$version) }}"></script>

@include('v2.component.liveurl')

</body>
</html>