<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <ul class="top_bar_contact_list">
                                <li><div class="question">Have any questions?</div></li>
                                <li>
                                    <div>+234 703 346 1426</div>
                                </li>
                                <li>
                                    <div>{{ 'mails@smileplanetef.org' }}</div>
                                </li>
                            </ul>
                            <div class="top_bar_login ml-auto">
                                <ul>
                                    {{--<li><a href="#">Register</a></li>--}}
                                    <li><a href="{{ route('staff.login') }}">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <a href="{{ route('home') }}">
                                <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                    <div class="logo_img"><img src="{{ url('v2/images/logo.png') }}" alt=""></div>
                                    <div class="logo_text">SPEH</div>
                                </div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <li class="active"><a class="nav-link" href="{{ route('home') }}">home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        about
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown0">
                                        @foreach($abouts as $about)
                                            <a class="dropdown-item" href="{{ route('home.about',['type'=>$about->type, 'link'=>$about->link ]) }}">{{ ucwords($about->title) }}</a>
                                        @endforeach

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        services
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown1">
                                        @foreach($services as $service)
                                            <a class="dropdown-item" href="{{ route('home.about',['type'=>$service->type, 'link'=>$service->link ]) }}">{{ ucwords($service->title) }}</a>
                                        @endforeach
                                        <!--
                                        <a class="dropdown-item" href="#">training</a>
                                        <a class="dropdown-item" href="#">business coaching</a>
                                        <a class="dropdown-item" href="#">business consulting</a>
                                        <a class="dropdown-item" href="#">accounting consulting</a>
                                        <a class="dropdown-item" href="#">digital marketing</a>
                                        <a class="dropdown-item" href="#">cooporate training</a>
                                        <a class="dropdown-item" href="#">Human Resource MGT</a>
                                        -->

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCourse" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        courses
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdownCourse">
                                        <?php $numCos = 0; ?>
                                        @foreach($courses as $course)
                                            @if($numCos <=3)

                                                <?php $numCos++; ?>
                                                <a class="dropdown-item" href="{{ route('home.about',['type'=>$course->type, 'link'=>$course->link ]) }}">{{ ucwords($course->title) }}</a>

                                            @endif
                                        @endforeach
                                            <a class="dropdown-item" href="{{ route('all.course') }}">All Courses</a>

                                    </div>

                                    <!--
                                    <ul class="dropdown-menu dropdown-menu-large row">
                                        <div class="row pl-3 pr -3" >


                                            <a href="#" class="ml-2 mt-2">sales</a>
                                            <a href="#" class="ml-2 mt-2">digital marketing</a>
                                            <a href="#" class="ml-2 mt-2">business branding</a>
                                            <a href="#" class="ml-2 mt-2">business tax law</a>
                                            <a href="#" class="ml-2 mt-2">business fundamentals</a>
                                            <a href="#" class="ml-2 mt-2">business cash flow system</a>
                                            <a href="#" class="ml-2 mt-2">leadership & management</a>
                                            <a href="#" class="ml-2 mt-2">time & money management</a>
                                            <a href="#" class="ml-2 mt-2">business structure & management</a>
                                            <a href="#" class="ml-2 mt-2">customer relationship management</a>
                                            <a href="#" class="ml-2 mt-2">web design, development & coding</a>
                                            <a href="#" class="ml-2 mt-2">business plan development & writing</a>
                                            <a href="#" class="ml-2 mt-2">risk management</a>
                                        </div>
                                    </ul>
                                    -->

                                </li>
                                <li class="dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdownx" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        vocation <b class="caret"></b>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdownx">
                                        @foreach($vocations as $vocation)
                                            <a class="dropdown-item" href="{{ route('home.about',['type'=>$vocation->type, 'link'=>$vocation->link ]) }}">{{ ucwords($vocation->title) }}</a>
                                        @endforeach

                                    </div>

                                    <!--
                                    <ul class="dropdown-menu dropdown-menu-large row">
                                         <div class="row pl-3 pr -3" >

                                             <a href="#" class="ml-2 mt-2">photography</a>
                                             <a href="#" class="ml-2 mt-2">shoe making</a>
                                             <a href="#" class="ml-2 mt-2">soft furniture</a>
                                             <a href="#" class="ml-2 mt-2">interior design</a>
                                             <a href="#" class="ml-2 mt-2">cinematography</a>
                                             <a href="#" class="ml-2 mt-2">cctv installation</a>
                                             <a href="#" class="ml-2 mt-2">branded bag making</a>
                                             <a href="#" class="ml-2 mt-2">paint making & painting</a>
                                             <a href="#" class="ml-2 mt-2">laptop & phone repair</a>
                                             <a href="#" class="ml-2 mt-2">solar inverter & installation</a>
                                             <a href="#" class="ml-2 mt-2">reflector enhancer / metalic floor</a>
                                             <a href="#" class="ml-2 mt-2">wall paper, 3d, wall panel & versace</a>
                                             <a href="#" class="ml-2 mt-2">stamped & engraved concrete flooring</a>
                                         </div>
                                     </ul>

                                     -->

                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        eco-system
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="http://foundation.smileplanetef.org">Smile Planet Foundation</a>
                                        <a class="dropdown-item" href="http://events.smileplanetef.org">Smile Planet Events</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        media
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown3">
                                        <a class="dropdown-item" href="{{ route('faq') }}">FAQ</a>
                                        <a class="dropdown-item" href="{{ route('e.albums') }}">Photos</a>
                                        <a class="dropdown-item" target="_blank" href="http://www.youtube.com/channel/UCgZKzHDFOubmM017mVp0Ipw">Videos</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                            <!-- Hamburger -->

                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Search Panel -->
    <div class="header_search_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#" class="header_search_form">
                            <input type="search" class="search_input" placeholder="Search" required="required">
                            <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>