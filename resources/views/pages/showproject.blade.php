<?php

    $jslinks = ['countdown.js', 'main.js'];
    $url = route('home.project');
    $pagename = "<a class='purple3' href='$url' style='margin-right: 15px'>Project</a> <span class='gray'>$program->title</span>";
    $titlename = 'Projects'
?>

@extends('includes.app')

@section('content')



    <br>
    <div class="col-md-10 col-md-offset-1" style="margin-bottom: 20px">

        <div class="row">
            @include('includes.homecrumb')
            <br>
        </div>

        <br>

        <?php $date =  date('F d, Y ', strtotime($program->date)) . '' . date('h:i:s', strtotime($program->time))?>
        <div class="row sm_event" data-date="{{ $date }}" data-target="timer_{{ $program->id }}" style="margin-bottom: 18px">
            <div class="col-sm-3">
                <div class="row">

                    @if($program->gallery->type === '.mp4')
                        <video src="{{ url('uploads/'.$program->gallery->url) }}"></video>
                    @else
                        <img class="img-fit showthis" src="{{ url('uploads/'.$program->gallery->url) }}" data-src="{{ url('uploads/'.$program->gallery->url) }}" alt="" style="width: 100%" data-toggle="modal" data-target="#imgHolder">
                    @endif

                </div>
            </div>
            <div class="col-sm-9">
                <div class="col-sm-12">

                    <div class="row" style="padding: 7px 0">
                        <div class="col-sm-8">
                            <h5 class="titles moderate" style="text-transform: capitalize"><b><a href="" class="t-color">{{ $program->title }}</a></b></h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="date-holder"> <i class="fa fa-calendar"></i>
                                <small class="gray">{{ date('F d, Y ', strtotime($program->date)) }} at {{ date('h:i:s A', strtotime($program->time)) }} </small>
                            </div>
                        </div>
                    </div>

                    <div class="myline"></div>

                    <div class="row">
                        <div class="col-sm-6" style="padding-bottom: 10px">


                            <span class="gray"><b>Time to Event</b></span>
                            <h3 class="text-shadow" style="margin: 4px"><b id="timer_{{ $program->id }}">00d 00h 00m 00s</b></h3>
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

    </div>

    <br>
    <div class="col-md-10 col-md-offset-1" style="margin-bottom: 100px">
        <div class="row">
            <div class="col-sm-12 " style="background-color: #eee">
                <p class="" style="margin: 20px 0; line-height: 30px;">
                    {{ $program->detail }}
                </p>
            </div>
        </div>
    </div>



@endsection
