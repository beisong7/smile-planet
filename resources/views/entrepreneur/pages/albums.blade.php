<?php
    $pagename = 'Gallery'
?>

@extends('includes.entrepreneur')

@section('content')
    @include('includes.preload')


    <div style="margin: 0 15px">

        <div class="row" style="margin-top: 110px">
            <div class="container">
                @include('entrepreneur.includes.breadcrumb')
            </div>


        </div>
        <br>


        <div class="row">
            <div class="container">
                <h5 style="margin-bottom: 30px">Select an album to view photos.</h5>
                <div class="row" style="">
                    @include('entrepreneur.includes.galleryloop')
                </div>

            </div>
        </div>

        <br>
        {{ $albums->links() }}

    </div>


@endsection
