<?php
$jslinks = ['countdown.js', 'main.js'];
$pagename = 'Contact';
$titlename = 'Contact';
?>

@extends('includes.app')

@section('content')

    <div class="col-sm-8 col-sm-offset-2">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="t-color"><b> Contact Us </b></h1>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="v-top ">
                    <h3><b> Abuja</b></h3>
                    <p class="purple text-justify">
                        Suite 202 Abiding Grace Plaza, by Federal Boy College, Gudu District Abuja Nigeria.
                    </p>
                    <p><i class="fa fa-phone"></i> +2348070920250,+2347032998069 </p>
                    <br>


                </div>
            </div>
            <div class="col-sm-6">
                <div class="v-top ">
                    <h3><b> Lagos</b></h3>
                    <p class="purple text-justify">
                        Suite 45A,Hope Plaza,Km 2 Addo Road Ajah,Lekki Lagos Nigeria.
                    </p>
                    <p><i class="fa fa-phone"></i> +2348070920250,+2347032998069 </p>
                    <br>


                </div>
            </div>
        </div>

        <br>
    </div>



@endsection
