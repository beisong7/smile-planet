<?php $pagename = 'Aims and Objectives'; ?>
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
                    <h2 class="purple2"><b>Aims & Objectives</b></h2>
                    <br>
                    <div class="breadcrumb" style="padding: 10px 20px; margin: 0; line-height: 30px">

                        {!! $content->f_aims_obj !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('foundation.includes.footer')

@endsection
