<?php $pagename = 'Volunteers'; $titlename = 'Volunteer'; ?>
@extends('includes.app')

@section('content')


    <div class="col-md-10 col-md-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="purple2"><b> Volunteers </b>

        </h1>
        <hr>
        <div class="row">
            <?php $tag = 'volunteer'; ?>
            @include('includes.teamload')

        </div>
        <br>
        <hr>
        <div>
            <span class="col-xs-2 pull-left text-right" style="font-size: 11px;padding-top: 4px"><a href="{{ route('home.fac') }}"> << Facilitator </a></span>
        </div>
    </div>







@endsection
