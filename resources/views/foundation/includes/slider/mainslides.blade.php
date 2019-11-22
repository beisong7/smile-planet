<div class="f-slides" id="f_slides">
    @forelse($banner as $ban)
        @if($ban->target === 'foundation')

            <div style="width: 100%" class="box2">
                <div class="contentslider">
                    <img class="fdslide" src="{{ url('uploads/'.$ban->gallery->url) }}" alt="">
                </div>
            </div>
            {{--<div><img class="fdslide" src="{{ url('uploads/'.$ban->gallery->url) }}" alt=""></div>--}}

        @endif
    @empty

    @endforelse

</div>