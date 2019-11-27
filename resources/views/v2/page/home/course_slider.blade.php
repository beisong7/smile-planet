<div class="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="section_title text-center"><h2>Preview A Course</h2></div>
                <div class="section_subtitle">At Smile Planet HUB, We enrich your knowledge base with up to date information, train and empower you with relevant skills and mentor you in your endeavours. </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="course_search">
                    <form action="#" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
                        <div><input type="text" class="course_input" placeholder="Course" required="required"></div>
                        <div><input type="text" class="course_input" placeholder="Level" required="required"></div>
                        <button class="course_button"><span>search course</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Courses Slider -->
                <div class="courses_slider_container">
                    <div class="owl-carousel owl-theme courses_slider">

                    @foreach($featured as $course)
                        <!-- Slider Item -->
                            <div class="owl-item">
                                <div class="course">
                                    <div class="course_image"><img src="{{ url('uploads/'.$course->image) }}" alt="course_img_{{ $course->title }}"></div>
                                    <div class="course_body">
                                        <div class="course_header d-flex flex-row align-items-center justify-content-start">
                                            <div class="course_tag"><a href="{{ route('detail.course.reg', [$course->link, $course->type])  }}">Enroll</a></div>
                                            {{--<div class="course_price ml-auto">Price: <span>$35</span></div>--}}
                                        </div>
                                        <div class="course_title"><h3><a href="{{ route('home.about',['type'=>$course->type, 'link'=>$course->link ]) }}">{{ $course->title }}</a></h3></div>
                                        <div class="course_text">{{ $course->info(20) }}</div>
                                        <div class="course_footer d-flex align-items-center justify-content-start">
                                            <div class="course_author_image"><img src="{{ url('v2/images/logo.png') }}" alt="logo"></div>
                                            <div class="course_author_name">By <a href="#">Smile Planet Hub</a></div>
                                            {{--<div class="course_sales ml-auto"><span>352</span> Sales</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <!-- Courses Slider Nav -->
                    <div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                    <div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>