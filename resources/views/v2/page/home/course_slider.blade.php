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

                    <?php $x = 1; $course = array(
                        '1' => ['Time Management', 'Management of Time leads to better productivity. Learn how to improve your productivity by managing your every hour on the hour!'],
                        '2' => ['Business Fundamentals','Business is more that just starting a company. Learn the basic things that even renown business tycoons still err in.'],
                        '3' => ['Customer Relationship','Customer Relationship Management, CRM, Has become a major component for the modern business in keeping track of customers behavior.'],
                    ); ?>

                    @for($x; $x <= 3; $x++)
                        <!-- Slider Item -->
                            <div class="owl-item">
                                <div class="course">
                                    <div class="course_image"><img src="{{ url('v2/images/course_'.$x.'.jpg') }}" alt="course_img_{{ $x }}"></div>
                                    <div class="course_body">
                                        <div class="course_header d-flex flex-row align-items-center justify-content-start">
                                            <div class="course_tag"><a href="#">Featured</a></div>
                                            {{--<div class="course_price ml-auto">Price: <span>$35</span></div>--}}
                                        </div>
                                        <div class="course_title"><h3><a href="#">{{ $course[$x][0] }}</a></h3></div>
                                        <div class="course_text">{{ $course[$x][1] }}</div>
                                        <div class="course_footer d-flex align-items-center justify-content-start">
                                            <div class="course_author_image"><img src="{{ url('v2/images/logo.png') }}" alt="logo"></div>
                                            <div class="course_author_name">By <a href="#">Smile Planet Hub</a></div>
                                            {{--<div class="course_sales ml-auto"><span>352</span> Sales</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor


                    </div>

                    <!-- Courses Slider Nav -->
                    <div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                    <div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>