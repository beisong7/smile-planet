<?php
    $jslinks = ['main.js','imageloader.js'];
    $url = route('e.albums');
$pagename = '<a href="'.$url.'" style="margin-right: 25px">Gallery</a>  ' . $album->title;
?>

@extends('includes.entrepreneur')

@section('content')

    @include('includes.preview')

    <div class="container">
        <div class="" style="margin-top: 110px">
            @include('entrepreneur.includes.breadcrumb')
            <br>
            <h3>{{ $album->title }} <small style="font-size: 10px;margin-left: 50px;">click image to expand</small></h3>
            <hr>
        </div>

        <div class="row">
            @forelse($picture as $pic)
                <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 10px;">
                    <div class="box">
                        <div class="img-contents">
                            <img class="preview img-match" src="{{url('uploads/'.$pic->gallery->url)}}" alt="" style="margin: 0 auto" data-src="{{ url('uploads/'.$pic->gallery->url) }}" data-toggle="modal" data-target="#picpreview">
                            <div class="loading"></div>
                        </div>
                    </div>
                </div>
            @empty
                <br>
                <div class="col-md-12 gray">
                    <small>No photos currently in this album.</small>
                </div>
            @endforelse

        </div>
    </div>

    
@endsection
