<?php $pagename = 'Vision & Mission'; $titlename = 'Vision & Mission'; ?>
@extends('includes.app')

@section('content')
    <br>
    @include('includes.homecrumb')

    <div class="col-md-10 col-md-offset-1">
        <br>
        <h1 class="purple2"><b> Vision & Mission</b></h1>
        <br>
        <h3 class="purple"><b>Vision</b></h3>
        <div class="panel panel-default">

            <div class="" style="padding: 10px 20px">
                {!! $vision !!}
            </div>
        </div>

        <br>
        <h3 class="purple"><b>Mission</b></h3>
        <div class="panel panel-default">

            <div class="" style="padding: 10px 20px">
                {!! $mission !!}
            </div>
        </div>
    </div>







@endsection
