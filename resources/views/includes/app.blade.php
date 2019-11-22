<?php $version = 0.115; ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#511650">

    <title>SPEF <?php if(isset($titlename)){echo ' - '. $titlename;}?> </title>

    <!-- app icon -->
    <link rel="shortcut icon" href="{{ url('img/icon1.png') }}" type="image/x-icon"/>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css'.'?v='.$version) }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick-theme.css') }}" rel="stylesheet">
</head>

<body>
    @include('includes.preload')
    @include('includes.preview')
    {{--@include('includes.topnav')--}}

    <div class="container" id="body_main">
        @yield('content')
    </div>

    @include('foundation.includes.footer')

    {{--<nav class="navbar navbar-default navbar-inverse" id="sm-foot"></nav>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/preload.js'.'?v='.$version) }}"></script>
    <script src="{{ asset('js/main.js'.'?v='.$version) }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('css/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/brand_slides.js'.'?v='.$version) }}"></script>

    @if(isset($jslinks))
        @foreach($jslinks as $link)
            <script src="{{ asset('js/'.$link) }}"></script>
        @endforeach
    @endif

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5c09b99a7caeaa513b91a697/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
