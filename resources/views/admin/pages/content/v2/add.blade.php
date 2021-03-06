<?php
$active['contentz'] = 'imactive';
$csslinks = [''];
$jslinks = ['main.js', 'newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];
$kurl = route('console.content');
$pagename = '<a href="'.$kurl.'"><b>Edit Contents</b></a>  <span style="margin-left: 15px">Contents (New) / Create</span>';



?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div style="margin-top: 30px">

        <div class="container">

            <form action="{{route('new.detail.save')}}" method="post" class="form-horizontal" role="form" id="wysiwyg" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group" >
                    <p>Title</p>
                    <input type="text" class="form-control" name="title" placeholder="Title" autocomplete="off" value="{{ old('title') }}">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" style="padding-right:5px">
                            <p>Type</p>
                            <input type="text" class="form-control" name="type" placeholder="Type: about or courses or vocations" autocomplete="off" value="{{ old('type') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" style="padding-left:5px">
                            <p>Relative</p>
                            <input type="text" class="form-control" name="relative" placeholder="Relative: people " autocomplete="off" value="{{ old('type') }}">
                        </div>
                    </div>


                </div>
                <div class="form-group">

                    <div class="col-sm-3">
                        <input type="file" name="image" onchange="shwimg()" id="imgInp">
                        <br>
                        <div class="" style="max-height: 250px">
                            <img src="{{ url('img/default.png') }}" alt="" class="image_src img-fit" id="imgtoshow" style="max-height: 250px">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p></p>
                    </div>
                    <div class="col-sm-3">
                        <p><b>Content Configurations</b></p>
                        <hr>
                        <div class="" style="padding-left: 30px">
                            <p class="text-muted"><b>Use Registration?</b></p>
                            <input type="radio" name="use_reg" value="no"> No
                            <input type="radio" name="use_reg" value="yes"> Yes
                        </div>
                        <div class="" style="padding-left: 30px">
                            <hr>
                            <p><b>Payment Configuration</b></p>
                            <input type="radio" name="pay" value="no" onclick="$('.pricer').hide()"> No
                            <input type="radio" name="pay" value="yes" checked onclick="$('.pricer').show()"> Yes

                            <div class="pricer">
                                <small>enter price, eg 1500, 2000, 20000. only digits allowed</small>
                                <input type="text" class="form-control" name="price" placeholder="Price for Content">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="form-group" >
                    <p>Details of Title</p>
                    <textarea class="form-control abt_field" name="info" id="" cols="30" rows="10">{{ old('info') }}</textarea>
                </div>
                <div class="form-group" >
                    <button class="btn btn-lg btn-block btn-info">Create</button>
                </div>
            </form>

            {{--@include('admin.pages.content.vision')--}}

            {{--@include('admin.pages.content.core')--}}
        </div>
    </div>
    @include('admin.includes.tinymce')
@endsection