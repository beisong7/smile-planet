<?php $pagename = ucfirst($details->name); ?>
@extends('includes.foundation')

@section('content')
    @include('foundation.includes.subscribe')
    @include('foundation.includes.nav')
    @include('includes.preload')

    <div class=" ash h3h" style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <br>
                    @include('foundation.includes.homecrumb')
                    <br>
                    <h2 class="purple2"><b>{{ ucfirst($details->name) }}</b></h2>
                    <br>
                    <div class="breadcrumb" style="padding: 10px 20px; margin: 0; line-height: 30px">

                        {!! $details->content !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('foundation.includes.footer')

@endsection
