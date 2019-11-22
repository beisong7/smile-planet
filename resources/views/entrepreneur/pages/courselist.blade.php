<?php
$jslinks = ['main.js'];
$pagename = 'Course List';
$titlename = 'Courses';

?>

@extends('includes.entrepreneur')

@section('content')
    @include('includes.preload')

    <div class="container" style="margin-top: 90px">

        <br>
        @include('entrepreneur.includes.breadcrumb')
        <br>

        <h1 class="purple2"><b> Courses Currently Available </b></h1>
        <br>

        <div class="row">

            <div class="col-sm-6">
                <h4><b class="purple2">Course Information</b></h4>
                <br>

                <b class="purple3" style="margin-right: 10px">Qualification:</b> Certificate of training
                <br>
                <b class="purple3" style="margin-right: 10px">Objective:</b> Full-time professional
                <br>
                <b class="purple3" style="margin-right: 10px">Duration:</b> Varies (Minimum 1month & Maximum 3months)
                <br>
                <b class="purple3" style="margin-right: 10px">Sessions:</b> Morning & Evening (9am-1pm or 2pm-6pm)
                <br>
                <b class="purple3" style="margin-right: 10px">Program:</b> Full-Time (Tuesday & Thursday)
                Part-Time Saturday (9am-3pm)
                <br>
                <b class="purple3" style="margin-right: 10px">Start Date:</b> First Week of Every Month
            </div>

            <div style="margin-top: 50px" class="col-md-12">
                <div class="row">
                    <hr>

                    @forelse($courses as $course)
                        <div class="col-md-3 col-xs-6" style="margin-bottom: 10px">
                            <div class="list-group-item">
                                <div class="row">
                                    <a href="{{ route('e.courses.details', $course->title) }}" class="">
                                        <div class="col-xs-12">
                                            <div class="box">
                                                <div class="contains">
                                                    <img src="{{ $course->setImage() }}" alt="" class="img-fit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 text-center">
                                            <b>{{ $course->title }}</b>
                                            <br>
                                            @if($course->status==='active')
                                                <a href="{{ route('e.course.reg', $course->title) }}" class="btn btn-xs btn-primary">Register</a>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-12 text-center"><b><h4>No Course Available at this Moment.</h4></b></div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


@endsection
