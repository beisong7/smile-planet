<div class="ongoin_sec" >
    <div class="container">

        <span class="likeh1 gray"><b>ONGOING COURSES</b></span>
        <br>
        <div class="row" style="margin-bottom: 120px">
            @forelse($courses as $course)
                <div class="col-sm-3 col-xs-6" style="padding-top: 15px">
                    <a href="{{ route('e.courses.details', $course->title) }}" class="">
                        <div class="box" style="background: #cbcbcb;border-radius: 5px">
                        <div class="contains">
                            <img src="{{ $course->setImage() }}" alt="" class="img-fit">
                        </div>
                    </div>
                        <div class="text-center" style="margin-top: 15px">
                            <p class="text-center">{{ $course->title }}</p>
                            <a href="{{ route('e.course.reg', $course->title) }}" class="btn btn-xs btn-primary">Register</a>
                    </div>
                    </a>
                </div>
            @empty
                <br>
                <div class="col-md-12 gray">
                    <h5>Course registration closed. Will be opened first week of next month. click <a href="{{ route('e.courses') }}"><b>here</b></a> to view courses. </h5>
                </div>

            @endforelse


            @if(count(\App\Course::all()) > 4)

                    <div class="col-md-12 gray">
                        <a href="{{ route('e.courses') }}">View More</a>
                    </div>

                @endif

        </div>


    </div>
</div>