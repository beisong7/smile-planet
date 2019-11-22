<nav class="navbar navbar-default navbar-fixed-top" id="sm-nav">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" id="" href="/">
                SmilePlanet <img src="{{ url('img/spef_1.png') }}" class="brand_img" alt="" style="margin-right: 8px">
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right" id="rmenu">
                <!-- dropdown Links -->
                <li><a href="{{ route('home') }}"><span class="" ></span> <b>Home</b> </a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                        <b>About</b><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('home.about') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('home.vision') }}">Vision & Mission</a>
                        </li>
                        <li>
                            <a href="{{ route('home.corevals') }}">Core Values</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                        <b>Our Team</b><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('home.trustee') }}">Board of Trustees</a>
                        </li>
                        <li>
                            <a href="{{ route('home.exco') }}">Executive Council</a>
                        </li>
                        <li>
                            <a href="{{ route('home.fac') }}">Facilitators</a>
                        </li>
                        <li>
                            <a href="{{ route('home.vol') }}">Volunteers</a>
                        </li>




                    </ul>
                </li>


                <li><a href="{{ route('home.project') }}"><b>Project</b> </a></li>
                <li><a href="{{ route('blog.project') }}"><b>Blog</b> </a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                        <b>Gallery</b><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('e.albums') }}"> Entrepreneurs </a></li>
                        <li><a href="{{ route('f.albums') }}"> Foundation </a></li>
                        <li><a href="http://www.youtube.com/channel/UCgZKzHDFOubmM017mVp0Ipw"> Videos </a></li>
                    </ul>
                </li>


                <li><a href=""><span class="badge hidden">NEW</span> <b>Blog</b> </a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="false">
                        <b>Get Involved</b><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('home.facilitator') }}"> <i class="fa fa-user-circle"></i> Facilitator </a>
                        </li>
                        <li>
                            <a href="{{ route('home.volunteer') }}"> <i class="fa fa-user"></i> Volunteer </a>
                        </li><li>
                            <a href="{{ route('home.sponsorship') }}"> <i class="fa fa-money"></i> Sponsorship </a>
                        </li>
                        <div class="divider" style="background: #E833C6"></div>
                        <li>
                            <a href="{{ route('staff.login') }}">STAFF</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>