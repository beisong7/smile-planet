<?php $versionz = 1.05;?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SmileAdmin</title>

    <!-- app icon -->
    <link rel="shortcut icon" href="{{ url('img/icon1.png') }}" type="image/x-icon"/>



    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminstyle.css?v='.$versionz) }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.structure.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.theme.css') }}" rel="stylesheet">
        @if(isset($csslinks))
            @foreach($csslinks as $link)
                @if(!empty($link))
                    <link href="{{ asset('css/'.$link) }}" rel="stylesheet">
                @endif
            @endforeach
        @endif
</head>
    <body onload="">


    @include('admin.includes.topnav')

    @include('admin.includes.sidenav')


    <div id="bodypart" class="">

        @include('admin.includes.admincrumb')

        @yield('content')

    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>


    @if(isset($jslinks))
        @foreach($jslinks as $link)
                <script src="{{ asset('js/'.$link. '?v='.$versionz) }}"></script>
        @endforeach
    @endif
    <script src="{{ asset('js/admin.js?v='.$versionz) }}"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $('.secure').on('click', function (e) {
            let form = $('.pform');
            if(form.hasClass('secured')){
                form.removeClass('secured');
                form.attr('type', 'text');
                $(this).children('i').addClass('fa-eye');
                $(this).children('i').removeClass('fa-eye-slash');
            }else{
                form.addClass('secured');
                form.attr('type', 'password');
                $(this).children('i').removeClass('fa-eye');
                $(this).children('i').addClass('fa-eye-slash');
            }
        })
    </script>
</body>
</html>