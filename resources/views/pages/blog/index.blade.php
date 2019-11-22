<?php
$jslinks = ['main.js'];
$pagename = 'Smile Planet Blog and Articles'; //in page
$titlename = 'Blog'; // in tab title
?>

@extends('includes.app')

@section('content')

    <div class="col-xs-12">
        <br>
        @include('includes.homecrumb')
        <br>
        <br>
        <br>
        <div class="row">


            <div class="col-md-3 col-xs-12 sm-fl pull-right">
                @include('pages.blog.tops')
            </div>

            <div class="col-md-9 col-xs-12 pull-left" style="padding: 0">
                @include('pages.blog.list')

            </div>
        </div>
    </div>




@endsection
