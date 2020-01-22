@extends('v2.layout.appv2')

@section('content')

    <div class="courses" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section_title text-center"><h2>Courses</h2></div>
                    <div class="section_subtitle">At Smile Planet HUB, We enrich your knowledge base with up to date information, train and empower you with relevant skills and mentor you in your endeavours. </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="course_search">
                        <form action="{{ route('all.course') }}" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between" method="get">
                            <div style="width: 100%;" >
                                <input type="text" class="course_input" placeholder="Course title" name="needle" required="required" value="{{ $needle }}">
                            </div>
                            <button class="course_button"><span>search course</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </form>

                        <br>

                        <div class="row mt-5">
                            @foreach($courses as $course)
                                <div class="col-md-4 col-sm-6 mb-5">
                                    <div class="course">
                                        <div class="course_image h-200p img-bg">
                                            <img src="{{ url('uploads/'.$course->image) }}" alt="course_img_{{ $course->title }}" class="img-fit">
                                        </div>
                                        <div class="course_body">
                                            <div class="course_header d-flex flex-row align-items-center justify-content-start">
                                                @if($course->use_reg==='yes')

                                                    <div class="course_tag">
                                                        @if($course->pay)
                                                            <a href="{{ route('detail.course.reg', [$course->link, $course->type])  }}">Enroll - ₦ {{ $course->price }}</a>
                                                        @else
                                                            <a href="{{ route('detail.course.reg', [$course->link, $course->type])  }}">Enroll</a>
                                                        @endif
                                                    </div>



                                                @else
                                                    <div class="course_tag"><a href="{{ route('home.about',['type'=>$course->type, 'link'=>$course->link ])  }}">More</a></div>
                                                @endif
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
                    </div>


                </div>
            </div>


        </div>
    </div>

@endsection
