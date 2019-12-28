<div class="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="section_title text-center"><h2>Our Partners</h2></div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <!-- Courses Slider -->
                <div class="courses_slider_container">
                    <div class="owl-carousel owl-theme courses_slider">

                    @foreach($partners as $partner)
                        <!-- Slider Item -->
                            <div class="owl-item">
                                <p class="text-center" title="{{ $partner->name }}">
                                    <img src="{{ url('uploads/'.$partner->gallery->url) }}" alt="" style="max-height: 100px; width: auto; margin: 0 auto">
                                </p>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>