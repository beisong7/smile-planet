<?php
$jslinks = ['main.js'];
$url = route('blog.project');
$pagename = "<a href='$url'><b>Blogs</b></a> <span style='margin-left: 15px'>Category - $name</span> "; //in page
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


            <div class="col-md-3 sm-fl pull-right">
                @include('pages.blog.tops')
            </div>

            <div class="col-md-9 pull-left" style="padding: 0">
                @include('pages.blog.list')

            </div>
        </div>
    </div>




@endsection
