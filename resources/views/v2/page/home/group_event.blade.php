<div class="col-lg-4 grouped_col">
    <div class="grouped_title">Upcoming Events</div>
    <div class="events">

        <!-- Event -->
        @forelse($events as $event)
        <div class="event d-flex flex-row align-items-start justify-content-start">
            <div>
                <div class="event_date d-flex flex-column align-items-center justify-content-center">
                    <div class="event_day">{{ date('d', $event->dates) }}</div>
                    <div class="event_month">{{ date('M', $event->dates) }}</div>
                    <div class="event_month">{{ date('Y', $event->dates) }}</div>
                </div>
            </div>
            <div class="event_body">
                <div class="event_title"><a href="{{ route('home.project.show', $event->title  ) }}">{{ $event->title }}</a></div>
                <div class="event_subtitle">Location: {{ $event->venue }}</div>
            </div>
        </div>
        @empty
            {{--<h5 class="text-center" style="width: 100%">No Events Found.</h5>--}}
            <div class="event d-flex flex-row align-items-start justify-content-start">
                <div>
                    <div class="event_date d-flex flex-column align-items-center justify-content-center">
                        <div class="event_day">{{ date('d') }}</div>
                        <div class="event_month">{{ date('M') }}</div>
                    </div>
                </div>
                <div class="event_body">
                    <div class="event_title"><b>No Event Found</b></div>
                    <div class="event_subtitle">Check Back Later</div>
                </div>
            </div>
        @endforelse

    </div>
</div>