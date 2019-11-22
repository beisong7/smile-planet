<?php $pagename = 'Board of Trustees'; $titlename = 'Board of Trustees';?>
@extends('includes.app')

@section('content')


    <div class="col-md-10 col-md-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="purple2"><b> Trustees </b>

        </h1>
        <hr>
        <div class="row">
            <?php $tag = 'trustee'; ?>
            @include('includes.teamload')
        </div>
        <br>
        <hr>
        <div>
            {{--<span class="col-xs-2 pull-left" style="font-size: 11px;padding-top: 4px"><a href="{{ route('home.exco') }}">  << Executive Councis  </a></span>--}}
            <span class="col-xs-2 pull-right text-right" style="font-size: 11px;padding-top: 4px"><a href="{{ route('home.exco') }}">  Executive Council >> </a></span>
        </div>
    </div>







@endsection
