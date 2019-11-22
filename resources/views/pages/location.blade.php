<?php
$jslinks = ['countdown.js', 'main.js'];
$pagename = 'Locations';
$titlename = 'Locations';
?>

@extends('includes.app')

@section('content')

    <div class="col-sm-10 col-sm-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        @include('includes.error')
        <h1 class="t-color"><b>Location</b></h1>
        <br>
        <div class="v-top ">
            <div class="col-md-12">
               @if(!empty($content->f_reach_img))
                   <div class="row">
                       <img class="img-fit" src="{{ url('uploads/'.$content->f_reach_img) }}" alt="">
                   </div>
                @endif

            </div>
        </div>

        <br>
        
    </div>



@endsection
