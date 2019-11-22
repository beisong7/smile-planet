<?php use Illuminate\Support\Str; ?>
<div class="row">
    <div class="col-md-12">
        <h3 class="t-color"><b> E V E N T S </b> </h3>

        <hr>
        <div>
            <div class="col-md-12">

                @forelse($upcoming as $program)
                    <?php $date =  date('F d, Y ', strtotime($program->date)) . '' . date('h:i:s', strtotime($program->time))?>
                    <div class="row sm_event" data-date="{{ $date }}" data-target="timer_{{ $program->id }}" style="margin-bottom: 18px">
                        <div class="col-sm-3">
                            <div class="row">

                                @if($program->gallery->type === '.mp4')
                                    <video src="{{ url('uploads/'.$program->gallery->url) }}"></video>
                                @else
                                    <a href="{{ route('home.project.show', $program->title) }}">
                                        <img class="img-fit " src="{{ url('uploads/'.$program->gallery->url) }}" data-src="{{ url('uploads/'.$program->gallery->url) }}" alt="" style="width: 100%" >
                                    </a>

                                @endif

                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">

                                <div class="row" style="padding: 7px 0">
                                    <div class="col-sm-8">
                                        <h5 class="titles moderate" style="text-transform: capitalize">
                                            <a href="{{ route('home.project.show', $program->title) }}" class=""> <i class="fa fa-link"></i> </a>
                                            <b>
                                                <a href="{{ route('home.project.show', $program->title) }}" class="t-color">
                                                    {{ $program->title }}
                                                </a>

                                            </b>
                                        </h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="date-holder"> <i class="fa fa-calendar"></i>
                                            <small class="gray">{{ date('F jS, Y ', strtotime($program->date)) }} at {{ date('h:i:s A', strtotime($program->time)) }} </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="myline"></div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="text-justify">
                                            {{ Str::words($program->detail, 45, '  . . . ') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" style="padding-bottom: 10px">


                                        <span class="gray"><b>Time to Event</b></span>
                                        {{--<h3 class="text-shadow" style="margin: 4px"><b id="timer_{{ $program->id }}"></b></h3>--}}
                                        <h3 class="text-shadow" style="margin: 4px"><b id="timer_{{ $program->id }}">{{ strtotime('now')>$program->dates?'CLOSED':'00d 00h 00m 00s'  }}</b></h3>
                                        <div class="content_timer_{{ $program->id }}">
                                            @if($program->type==='entrepreneur')
                                                @if(strtotime('now') < $program->dates)
                                                    <a href="{{ route('eventreg', $program->title ) }}" class="btn btn-xs btn-info sm_reg_{{ $program->id }}"><b>Register Now</b></a>
                                                    <a href="{{ route('home.sponsorship') }}" class="btn btn-xs btn-purple sm_fac_{{ $program->id }}"><b>Partnership</b></a>
                                                @endif
                                            @elseif($program->type==='humanitarian')
                                                <a href="{{ route('home.volunteer' ) }}" class="btn btn-xs btn-info }"><b>Volunteer</b></a>
                                                <a href="{{ route('home.sponsorship') }}" class="btn btn-xs btn-dark "><b>Support</b></a>
                                            @endif




                                        </div>


                                    </div>
                                    <div class="col-sm-6" style="padding-bottom: 10px">

                                        <span class="gray"><b>Venue</b></span>
                                        <hr style="margin: 0;">
                                        <p class="text-shadow">
                                            {{ $program->venue }}
                                        </p>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">Events Will Soon Be Posted . . . </h4>
                @endforelse

                    <div class="row">
                        <br>
                        @if(count(\App\Program::all()) > 3)
                            <div class="breadcrumb">
                                <a href="{{ route('home.project') }}" class="btn btn-xs btn-dark"> view more </a>
                            </div>
                        @endif
                        <hr>
                    </div>

            </div>


        </div>


    </div>
</div>