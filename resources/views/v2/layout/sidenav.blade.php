<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="search">
        <form action="#" class="header_search_form menu_mm">
            <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
            <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                <i class="fa fa-search menu_mm" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <nav class="menu_nav">
        <ul class="menu_mm">
            <li class="menu_mm"><a href="{{ route('home') }}">Home</a></li>
            <li class="menu_mm dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About
                </a>
                <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown0">
                    @foreach($abouts as $about)
                        <a class="dropdown-item" href="{{ route('home.about',['type'=>$about->type, 'link'=>$about->link ]) }}">{{ ucwords($about->title) }}</a>
                    @endforeach
                </div>
            </li>
            <li class="menu_mm dropdown">
                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                    @foreach($services as $service)
                        <a class="dropdown-item" href="{{ route('home.about',['type'=>$service->type, 'link'=>$service->link ]) }}">{{ ucwords($service->title) }}</a>
                    @endforeach
                    <!--
                    <a class="dropdown-item" href="#">Training</a>
                    <a class="dropdown-item" href="#">Business coaching</a>
                    <a class="dropdown-item" href="#">Business consulting</a>
                    <a class="dropdown-item" href="#">Accounting consulting</a>
                    <a class="dropdown-item" href="#">Digital marketing</a>
                    <a class="dropdown-item" href="#">Cooporate training</a>
                    <a class="dropdown-item" href="#">Human Resource MGT</a>
                    -->

                </div>
            </li>
            <li class="menu_mm dropdown">
                <a class=" dropdown-toggle" href="#" id="navbarDropdownCourse" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Courses
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

            </li>
            <li class=" menu_mm dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdownx" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vocation <b class="caret"></b>
                </a>

                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdownx">
                    @foreach($vocations as $vocation)
                        <a class="dropdown-item" href="{{ route('home.about',['type'=>$vocation->type, 'link'=>$vocation->link ]) }}">{{ ucwords($vocation->title) }}</a>
                    @endforeach

                </div>

            </li>
            <li class="menu_mm dropdown">
                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Eco-System
                </a>
                <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://foundation.smileplanetef.org">Smile Planet Foundation</a>
                    <a class="dropdown-item" href="http://events.smileplanetef.org">Smile Planet Events</a>
                </div>
            </li>
            <li class="menu_mm dropdown">
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
            <li class="menu_mm"><a href="{{ route('home.contact') }}">Contact</a></li>

        </ul>
    </nav>
    <div class="menu_extra">
        <div class="menu_phone"><span class="menu_title">phone:</span>+234 703 346 1426</div>
        <div class="menu_social">
            <span class="menu_title">follow us</span>
            <ul>
                <li><a href="http://web.facebook.com/smileplanethf" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="http://twitter.com/smileplanethf" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="http://www.instagram.com/smileplanethf" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="http://www.youtube.com/channel/UCgZKzHDFOubmM017mVp0Ipw" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>