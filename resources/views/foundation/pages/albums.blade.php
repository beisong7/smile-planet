<?php
    $pagename = 'Gallery'
?>

@extends('includes.foundation')

@section('content')
    @include('foundation.includes.subscribe')
    @include('foundation.includes.nav')
    @include('includes.preload')

    <div style="margin: 0 15px">
        <div class="row" style="margin-top: 40px">
            <div class="container">
                @include('foundation.includes.breadcrumb')

            </div>

        </div>
        <br>

            <div class="row">
            <div class="container">
                <h5 style="margin-bottom: 30px">Select an album to view photos.</h5>
                <div class="row">
                @include('foundation.includes.galleryloop')
                </div>
            </div>
        </div>

        <br>
        {{ $albums->links() }}
    </div>

@endsection
