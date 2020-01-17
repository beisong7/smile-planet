<footer class="footer pb-0">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-lg-3 footer_col">
                <div class="footer_about">
                    <div class="logo_container">
                        <a href="#">
                            <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                <div class="logo_img"><img src="{{ url('v2/images/logo.png') }}" alt=""></div>
                                <div class="logo_text">SPEH</div>
                            </div>
                        </a>
                    </div>
                    <div class="footer_about_text">
                        <p>Smile Planet Entrepreneurs Hub is a podium that helps bridge and connect the dots for SMEs . . .
                            <a href="#">read more</a></p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="http://web.facebook.com/smileplanethf" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="http://twitter.com/smileplanethf" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="http://www.instagram.com/smileplanethf" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="http://www.youtube.com/channel/UCgZKzHDFOubmM017mVp0Ipw" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 footer_col">
                <div class="footer_links">
                    <div class="footer_title">Quick menu</div>
                    <ul class="footer_list">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <!--<li><a href="#">Services</a></li>-->
                        <li><a href="{{ route('home.contact') }}">Contact</a></li>
                        <li><a href="{{ route('free.consultation') }}">Free Consultation</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 footer_col">
                <div class="footer_links">
                    <div class="footer_title">Useful Links</div>
                    <ul class="footer_list">
                        <?php $numCos = 1; ?>
                        @foreach($courses as $course)
                            @if($numCos <=1)
                                <?php $numCos++; ?>
                                <li><a href="{{ route('home.about',['type'=>$course->type, 'link'=>$course->link ]) }}">Courses</a></li>

                            @endif
                        @endforeach

                        <li><a href="http://events.smileplanetef.org">Events</a></li>
                        <li><a href="http://foundation.smileplanetef.org">Foundation</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 footer_col">
                <div class="footer_contact">
                    <div class="footer_title">Contact Us</div>
                    <div class="footer_contact_info">
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Address:</div>
                            <div class="footer_contact_line">Suite BA 11, Apo Spark Mall, Opposite Living Faith Church, Durumi II by Area 3 Junction, Abuja.</div>
                        </div>
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Phone:</div>
                            <div class="footer_contact_line">+234 703 324 1426</div>
                        </div>
                        <div class="footer_contact_item">
                            <div class="footer_contact_title">Email:</div>
                            <div class="footer_contact_line">{{ 'mails@smileplanetef.org' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar p-3 mt-3" style="background: #2E3436;">
        <div class="container">
            <h5 class="" style="width: 100%;color: #ff8dd5"><small>&copy; Copyright {{ date('Y') }}</small></h5>
            <p class="m-0"><small><a href="https://smileplanetef.org/webmail">Mails</a></small></p>
        </div>
    </nav>
</footer>