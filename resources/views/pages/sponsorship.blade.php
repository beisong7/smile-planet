<?php
$jslinks = ['countdown.js', 'main.js'];
$pagename = 'Sponsorship';
$titlename = 'Sponsorship';
?>

@extends('includes.app')

@section('content')

    <div class="col-sm-8 col-sm-offset-2">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="t-color"><b>Partnership & Sponsorship </b></h1>
        <br>
        <div class="v-top ">
            <p class="purple text-justify">
                For <span class="purple2"><b>PARTNERSHIP / SPONSORSHIP / VOLUNTEERING / ENQUIRIES,</b></span>
                 as an organization we are always open to positive growth through the listed avenues, because we believe
                that one of the most effective and efficient way to grow is to be open and welcome to new creative,
                innovative ideas, with this ideology in us, We welcome you to
                <b>SMILE PLANET ENTREPRENEURS HUB/FOUNDATION. </b> Kindly call
                <span class="purple3"><b>+2347032998069, +2347033461426</b></span> or <span class="purple3"><b>{{ 'mails@smileplanetef.org' }}</b></span>
            </p>
            <br>

        </div>

        <br>
        <hr>
        @include('includes.error')
        <br>
        <div style="display: block">
            <h4 class="t-color">Subscribe to our weekly news letters</h4>
            <div class=" dform" style="margin: 15px 0 100px 0;">
                <div class="">
                    <form class="form-horizontal purple" role="form" method="POST" action="{{ route('form.subscribe') }}" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="email" placeholder="email address" class="form-control" name="email">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-sm btn-purple" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>



@endsection
