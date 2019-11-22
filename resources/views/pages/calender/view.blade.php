<?php
$jslinks = ['main.js'];
$pagename = $calender->theme; //in page
$titlename = $calender->theme; // in tab title
?>

@extends('includes.app')

@section('content')

    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="t-color"><b>{{ $calender->theme }}</b></h1>

        <hr>
        @include('includes.error')
        <br>
        <h4 class="purple3"><b>Date</b></h4>

        {{ date('F d, Y ', strtotime($calender->date))}}
        <hr>
        <h4 class="purple3"><b>Time</b></h4>
        {{ date('h:i', strtotime($calender->time)) }}
        <hr>
        <h4 class="purple3"><b>Venue</b></h4>
        {{ $calender->venue }}
        <hr>
        <h4 class="purple3"><b>Organizers</b></h4>
        {{ $calender->organizer }}

    </div>



@endsection
