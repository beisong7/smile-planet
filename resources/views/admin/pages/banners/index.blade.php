<?php
    $active['banners'] = 'imactive';
    $jslinks = ['newbanner.js'];
?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    @include('admin.includes.home_banner')

    @include('admin.includes.foundation_slider')



@endsection


