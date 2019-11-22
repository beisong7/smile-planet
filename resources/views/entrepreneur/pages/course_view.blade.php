<?php
$jslinks = ['main.js'];
$url = route('e.courses');
$pagename = "<a href='$url'>Course List</a> - " .$course->title ;
$titlename = 'Course - '.$course->title;

?>

@extends('includes.entrepreneur')

@section('content')
    @include('includes.preload')

    <div class="container" style="margin-top: 90px">

        <br>
        @include('entrepreneur.includes.breadcrumb')
        <br>
        <br>

        <div class="row">
            <div class="col-sm-3" ><img class="img-fit" src="{{ $course->setImage() }}" alt="image"></div>
        </div>

        <br>
        <h1 class="purple2"><b> {{ $course->title }}</b></h1>
        <br>
        <hr>
        <p>{{ $course->info }}</p>
        <br>
        <hr>
        <a href="{{ route('e.courses') }}" class="btn btn-sm btn-info">Back</a>
        @if($course->status==='active')
            <a href="{{ route('e.course.reg', $course->title) }}" class="btn btn-sm btn-primary">Register</a>
        @endif


    </div>
@endsection
