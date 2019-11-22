<div class="mobile-slide" style="position: relative">
    <div class="bg-slides" style="" id="bg_slides">
        @forelse($banner as $ban)
            @if($ban->target === 'entrepreneur')
                <div style="width: 100%" class="box2">
                    <div class="contentslider">
                        <img class="fdslide" src="{{ url('uploads/'.$ban->gallery->url) }}" alt="">
                    </div>
                </div>
            @endif
        @empty

        @endforelse

    </div>
    <div class="sidetext">
        <h2><b>LEARN, CONNECT & GROW</b></h2>
        <a class="btn btn-info btn-sm" href="{{ route('home.facilitator') }}"> Facilitator </a>
        <a class="btn btn-info btn-sm" href="{{ route('home.volunteer') }}"> Volunteer </a>
    </div>

</div>