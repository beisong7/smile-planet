<nav class="navbar navbar-default" id="sm-fd-nav">
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
                <i class="fa fa-home" style="margin-left: 30px"></i>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="app-navbar-collapse">
            <!-- Navbar -->
            <ul class="nav navbar-nav"  id="navi-fd">
                <!-- dropdown Links -->
                <li><a href="{{ route('foundation') }}"><span class="" ></span> HOME </a></li>

                <li><a href=""><span class="" ></span> ABOUT US </a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="true">
                        OUR WORK

                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('foundation.ourwork', 'overview') }}">Overview</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'education') }}">Education</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'health') }}">Health</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'livelihood') }}">Livelihood</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'women_emp') }}">Women Empowerment</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'disaster_report') }}">Disaster Response</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'grassroots') }}">Empowering Grassroots</a></li>
                        <li><a href="{{ route('foundation.ourwork', 'privileged_kids') }}">Privileged Children</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="true">
                        CAMPAIGN

                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('foundation.campaign', 'shecanfly') }}">She Can Fly</a></li>
                        <li><a href="{{ route('foundation.campaign', 'platehalffull') }}">Plate Half Full</a></li>
                        <li><a href="{{ route('foundation.campaign', 'everychild') }}">Every Child in School</a></li>
                        <li><a href="{{ route('foundation.campaign', 'behindbars') }}">Entrepreneurs Behind Bars</a></li>
                    </ul>
                </li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="true">
                        MEDIA
                        <!--<span class="caret"></span>-->
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ route('f.albums') }}"> Gallery </a></li>
                        <li><a href="">Press Release</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="true">
                        RESOURCE

                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">Articles</a></li>
                        <li><a href="">Annual Report</a></li>
                        <li><a href="">Testimonies</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="navtext" data-toggle="dropdown" role="button" aria-expanded="true">
                        GET INVOLVED

                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('home.sponsorship') }}">Sponsor</a></li>
                        <li><a href="{{ route('home.volunteer') }}">Volunteer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('blog.project') }}">ARTICLES</a>
                </li>


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