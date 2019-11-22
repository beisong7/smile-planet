<?php $pagename = 'Executive Council'; $titlename = 'Executive Council'; ?>
@extends('includes.app')

@section('content')


    <div class="col-md-10 col-md-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="purple2"><b> Executive Council </b></h1>
        <hr>
        <div class="row">
            <?php $tag = 'exco'; ?>
            @include('includes.teamload')

        </div>

        <br>
        <hr>
        <div>
            <span class="col-xs-2 pull-left" style="font-size: 11px;padding-top: 4px"><a href="{{ route('home.trustee') }}">  << Board of Trustees  </a></span>
            <span class="col-xs-2 pull-right text-right" style="font-size: 11px;padding-top: 4px"><a href="{{ route('home.fac') }}">  Facilitators >> </a></span>
        </div>
    </div>







@endsection
