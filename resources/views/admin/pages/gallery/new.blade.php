<?php

$active['gallery'] = 'imactive';
$jslinks = ['dropzone.js', 'mdz.js'];
$csslinks = ['dropzone.css','mdz.css'];
$url = route('console.gallery');
$pagename = "<a href='$url'>Gallery</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>


@extends('admin.layouts.admin')

@section('content')
    <br>
    <small>
        Drag and drop files into the blue field below. Tap blue field if using a mobile dvice
    </small>
    <br>
    <h5 class="text-center"><span class="xupload"> 0 </span> <b>File(s) Uploaded</b></h5>
    <br>
    @include('admin.includes.dropzone')


@endsection


