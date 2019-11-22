<?php $pagename = 'About Us'; ?>

@extends('v2.layout.appv2')

@section('content')
    <!-- Home -->

    <div class="col-md-10 col-md-offset-1 container" style="margin-top: 200px">

        <div class="" style="display:none;">
            <a href="{{ route('home.about') }}" class="btn btn-outline-dark btn-sm">About</a>
            <a href="#" class="btn btn-outline-dark btn-sm">Who We Are</a>
            <a href="#" class="btn btn-outline-dark btn-sm">Vision</a>
            <a href="#" class="btn btn-outline-dark btn-sm">Mission</a>
            <a href="#" class="btn btn-outline-dark btn-sm">Team</a>
            <a href="#" class="btn btn-outline-dark btn-sm">Facilitator</a>
            <a href="#" class="btn btn-outline-dark btn-sm">Volunteer</a>
        </div>

        <h3 class="purple2 "><b> ABOUT US </b></h3>
        <br>
        <div class="panel panel-default" style="padding: 0;">
            <div class="breadcrumb" style="padding: 10px 20px; margin: 0; line-height: 30px">
                {!! $content->aboutus !!}
            </div>
        </div>

        @if(!empty($content->f_reach_img))
            <div class="mt-4">
                <h1 class="purple2"><b> Our Presence </b></h1>
                <br>

                <div class="col-md-12" style="">
                    <div class="row">
                        <img class="img-fit" src="{{ url('uploads/'.$content->f_reach_img) }}" alt="">
                    </div>
                </div>
            </div>

        @endif

        <br>
        @if(!empty($content->f_reach))
            <div class="panel panel-default mt-5" style="padding: 0;">
                <div class="breadcrumb" style="padding: 10px 20px; margin: 0; line-height: 30px">
                    {!! $content->f_reach !!}
                </div>
            </div>
        @endif

    </div>

@endsection

