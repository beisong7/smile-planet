<div class="home">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider ">

            <!-- Slider Item -->

            <?php $aux =0 ?>
            @foreach($banners as $banner)
                <?php $aux++?>
                <div class="owl-item" >
                    <div class="home_slider_background" style="background-image:url({{ url($banner->image) }}); position: relative">
                        <div class="gradient" style="height: 100%"></div>
                    </div>
                    <div class="home_container ">
                        <div class="container ">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center ">

                                        <div class="home_logo">
                                            @if($banner->show_logo)
                                                <img src="{{ url('v2/images/home_logo.png') }}" alt="">
                                            @endif
                                        </div>


                                        <div class="home_text">
                                            <div class="home_title ml2 {{ 'ml2'.$aux }}">{{ $banner->writeup1 }}</div>
                                            <div class="home_subtitle">{{ $banner->writeup2 }}</div>
                                        </div>
                                        @if($banner->show_btn)
                                            <div class="home_buttons">
                                                <?php $numCos = 1; ?>
                                                @foreach($abouts as $about)
                                                        @if($numCos <=1)
                                                            <?php $numCos++; ?>
                                                            <div class="button home_button"><a href="{{ route('home') }}/info/about/t_What_we_do">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                                        @endif
                                                @endforeach

                                                <div class="button home_button"><a href="{{ route('all.course') }}">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>