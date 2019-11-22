<?php
$jslinks = ['main.js'];
$url = route('blog.project');
$pagename = "<a href='$url'><b>Blogs</b></a> <span style='margin-left: 15px'>Smile Planet Blog and Articles</span> "; //in page
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
            <div class="col-md-9">
               <div class="" style="height: auto; max-height: 400px; text-align: center">
                   <img src="{{ $blog->banner() }}" class="img-h-fit" alt="" style="width: 100%">
               </div>

                <br>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->created_at->diffForHumans() . ', ' . date('F d, Y', strtotime($blog->created_at)) }}</p>
                        <br>
                        <br>
                        {!! $blog->detail !!}
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                @include('pages.blog.tops')
            </div>
        </div>
    </div>




@endsection
