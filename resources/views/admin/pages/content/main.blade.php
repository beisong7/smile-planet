<?php
$active['contentz'] = 'imactive';
$pagename = '<b>Edit Contents</b> ';


?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div style="margin-top: 30px">
        <a href="{{ route('console.content.about') }}" class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>Edit Contents</b></h5>
                </div>
            </div>
        </a>
        <a href="{{ route('console.content.efocus') }}" class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>Edit Focus</b></h5>
                </div>
            </div>

        </a>
        <a href="{{ route('category.index') }}" class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>Edit Our Works</b></h5>
                </div>
            </div>

        </a>

        <a href="{{ route('ads.manage') }}" class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>Manage ADS</b></h5>
                </div>
            </div>

        </a>

        <a href="{{ route('content.v2') }}" class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>New Contents</b></h5>
                </div>
            </div>

        </a>
    </div>
    @include('admin.includes.tinymce')
@endsection