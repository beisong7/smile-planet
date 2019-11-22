<?php
$jslinks = ['main.js'];
$url = route('e.courses');
$pagename = "<a href='$url'>Course List</a>";
$titlename = 'Course Registration Success ';

?>

@extends('includes.entrepreneur')

@section('content')
    @include('includes.preload')

    <div class="container" style="margin-top: 90px">

        <br>
        @include('entrepreneur.includes.breadcrumb')
        <br>
        @include('includes.error')
        <br>

        <br>
        <h1 class="purple2"><b> Course Registration Success</b></h1>
        <br>
        <hr>
        <p>
            We appreciate your interest in to improve yourself through capacity building training in Smile Planet Entrepreneurs Center.
            We will get back to you shortly via your registered email or contact number. Thank You.
        </p>
        <br>
        <hr>
        <a href="{{ route('e.courses') }}" class="btn btn-sm btn-info">Course List</a>


    </div>
@endsection
