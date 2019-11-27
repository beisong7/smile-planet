<div class="featured">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Home Slider Nav -->
                <div class="home_slider_nav_container d-flex flex-row align-items-start justify-content-between">
                    <div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                    <div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </div>
                <div class="featured_container">
                    <div class="row pt-5 mt-5">
                        @if(!empty($mfeatured))
                            <div class="col-lg-6 featured_col">
                                <div class="featured_content">
                                    <div class="featured_header d-flex flex-row align-items-center justify-content-start">
                                        @if($mfeatured->use_reg==='yes')
                                            <div class="featured_tag"><a href="{{ route('detail.course.reg', [$mfeatured->link, $mfeatured->type])  }}">Enroll</a></div>
                                        @else
                                            <div class="featured_tag"><a href="{{ route('home.about',['type'=>$mfeatured->type, 'link'=>$mfeatured->link ])  }}">More</a></div>
                                        @endif
                                        {{--<div class="featured_price ml-auto">Price: <span>$35</span></div>--}}
                                    </div>
                                    <div class="featured_title"><h3><a href="{{ route('home.about',['type'=>$mfeatured->type, 'link'=>$mfeatured->link ]) }}">{{ $mfeatured->title }}</a></h3></div>
                                    <div class="featured_text"> {{ $mfeatured->info(20) }} </div>
                                    <div class="featured_footer d-flex align-items-center justify-content-start">
                                        <div class="featured_author_image"><img src="{{ url('v2/images/logo.png') }}" alt=""></div>
                                        <div class="featured_author_name">By <a href="#">Smile Planet Hub</a></div>
                                        {{--<div class="featured_sales ml-auto"><span>352</span> Sales</div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 featured_col">
                                <div class="featured_background" style="background-image:url({{ url('uploads/'.$mfeatured->image) }})"></div>
                            </div>
                        @else
                            <div class="col-lg-6 featured_col">
                                <div class="featured_content">
                                    <div class="featured_header d-flex flex-row align-items-center justify-content-start">
                                        <div class="featured_tag"><a href="#">Featured</a></div>
                                        {{--<div class="featured_price ml-auto">Price: <span>$35</span></div>--}}
                                    </div>
                                    <div class="featured_title"><h3><a href="#">Digital Marketing</a></h3></div>
                                    <div class="featured_text">Boost your business with up to date Digital Marketing skills relevant for the modern age.</div>
                                    <div class="featured_footer d-flex align-items-center justify-content-start">
                                        <div class="featured_author_image"><img src="{{ url('v2/images/logo.png') }}" alt=""></div>
                                        <div class="featured_author_name">By <a href="#">Smile Planet Hub</a></div>
                                        {{--<div class="featured_sales ml-auto"><span>352</span> Sales</div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 featured_col">
                                <div class="featured_background" style="background-image:url({{ url('v2/images/featured.jpg') }})"></div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>