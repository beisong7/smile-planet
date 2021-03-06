<?php
    $jslinks = ['main.js'];
    $pagename = 'About Entrepreneur';
    $titlename = 'About';

?>

@extends('includes.entrepreneur')


@section('content')
    @include('includes.preload')
    @include('includes.preview')

    <div class="container" style="margin-top: 90px">

        <br>
        @include('entrepreneur.includes.breadcrumb')
        <br>

        <h1 class="purple2"><b> Entrepreneurs Centre </b></h1>
        <br>
        <div class="panel panel-default" style="padding: 0;">
            <div class="breadcrumb" style="padding: 10px 20px; margin: 0; line-height: 30px">
                {!! $content->e_aboutus !!}
            </div>
        </div>

        <br>
        <hr>

    </div>

    
@endsection
