<?php $version = 0.115; ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#511650">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SP Entrepreneur <?php if(isset($titlename)){echo ' - '. $titlename;}?> </title>

    <!-- app icon -->
    <link rel="shortcut icon" href="{{ url('img/icon1.png') }}" type="image/x-icon"/>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/main.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/entrepreneur.css'.'?ver='.$version) }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick/slick-theme.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default" id="sm-et-nav">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button id="e_btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" id="" href="/">
                    SmilePlanet <img src="{{ url('img/spef_1.png') }}" class="brand_img" alt="" style="margin-right: 8px">
                    <i class="fa fa-home purple2" style="margin-left: 30px"></i>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" id="e_nav">
                    <!-- dropdown Links -->
                    <li><a href="{{ route('entrepreneur') }}"><span class="" ></span> Home </a></li>

                    <li><a href="{{ route('entrepreneur.about') }}"><span class="" ></span> About </a></li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                            Our Focus <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('e.focus.preview', 'Career') }}">Career</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Technical' ) }}">Technical</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Mentoring' ) }}">Mentoring</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Life Coaching' ) }}">Life Coaching</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Vocation & Skills' ) }}">Vocation & Skills</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Entrepreneurship' ) }}">Entrepreneurship</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Leadership & Governance' ) }}">Leadership & Governance</a></li>
                            <li><a href="{{ route('e.focus.preview', 'Man (Body, Soul & Spirit) Mind' ) }}">Man (Body, Soul & Spirit) Mind</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                            Courses <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('e.courses') }}">Photography</a></li>
                            <li><a href="{{ route('e.courses') }}">Cinematography</a></li>
                            <li><a href="{{ route('e.courses') }}">3D Wall paper</a></li>
                            <li><a href="{{ route('e.courses') }}">View More</a></li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                            Participant <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">NGOs</a></li>
                            <li><a href="#">S.M.Es</a></li>
                            <li><a href="#">Investors</a></li>
                            <li><a href="#">Academia</a></li>
                            <li><a href="#">Religious Bodies</a></li>
                            <li><a href="#">Corporate Bodies</a></li>
                            <li><a href="#">Government Bodies</a></li>
                            <li><a href="#">CEO’s of Companies</a></li>
                            <li><a href="#">Financial Institutions</a></li>
                            <li><a href="#">NYSC Corp Members</a></li>
                            <li><a href="#">Students Entrepreneurs</a></li>
                            <li><a href="#">Successful Entrepreneurs</a></li>
                            <li><a href="#">Secondary School Students</a></li>

                        </ul>
                    </li>

                    <li><a href="{{ route('blog.project') }}"><span class="" ></span> Blog </a></li>

                    <!--
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        dropdown<span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="/dashboard">Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a href="/setting">Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="" onclick="">Logout</a>
                                                    </li>
                                                </ul>
                                            </li>
                    -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="" id="body_main_e">
        @yield('content')
    </div>

    @include('foundation.includes.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/preload.js') }}"></script>
    <script src="{{ asset('css/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/main.js'.'?v='.$version) }}"></script>
    <script src="{{ asset('js/entrep.js'.'?v='.$version) }}"></script>
    <script src="{{ asset('js/hidenav.js'.'?v='.$version) }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @if(isset($jslinks))
        @foreach($jslinks as $link)
            <script src="{{ asset('js/'.$link.'?v='.$version) }}"></script>
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
