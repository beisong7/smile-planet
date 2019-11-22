<?php
$jslinks = ['main.js'];
$url = route('home.project');
$pagename = "<a href='$url'>Events List</a>";
$titlename = 'Event Registration Success ';

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
        <h1 class="purple2"><b> Event Registration Success</b></h1>
        <br>
        <hr>
        <p>
            {{ $transmission }}
        </p>
        <br>
        <hr>


    </div>
@endsection
