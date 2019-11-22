<?php $pagename = 'Core Values'; ?>
@extends('includes.app')

@section('content')
    <br>
    @include('includes.homecrumb')

    <div class="col-md-10 col-md-offset-1">
        <br>
        <h1 class="purple2"><b> Core Values </b></h1>
        <br>
        <div class="panel panel-default">
            <div class="" style="padding: 10px 20px">
                {!! $corevals !!}
            </div>
        </div>
    </div>







@endsection
