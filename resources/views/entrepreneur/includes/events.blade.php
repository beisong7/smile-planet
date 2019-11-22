<div class="events_sec" >
    <br>
    <div class="container">

        <br>
        <div class="row" style="margin-bottom: 120px">
            <div class="event-slides" style="">
                @forelse($events as $event)
                    <div style="padding-top: 75px">
                        <div class="col-md-6">

                            <h3>{{ $event->title }}</h3>
                            <br>
                            <p>{{ $event->detail }}</p>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3" >
                            <div style="">

                                <img src="{{url('uploads/'.$event->gallery->url)}}" alt="" style="width: 100%">

                            </div>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>

        </div>


    </div>
</div>