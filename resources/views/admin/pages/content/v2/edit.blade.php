<?php
$active['contentz'] = 'imactive';
$csslinks = [''];
$jslinks = ['main.js', 'newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];
$kurl = route('console.content');
$pagename = '<a href="'.$kurl.'"><b>Edit Contents</b></a>  <span style="margin-left: 15px">Contents (New) / Create</span>';



?>

@extends('admin.layouts.admin')

@section('content')

    <div class="container">
        @include('admin.includes.modal')

        @include('admin.layouts.error')
    </div>

    <div style="margin-top: 30px">

        <div class="container">

            <a href="{{ route('detail.make.featured', $detail->link) }}" class="btn btn-info">{{ $detail->featured?'Remove Featured':'Make Featured' }} </a>
            <a href="{{ route('detail.make.mainFeatured', $detail->link) }}" class="btn btn-info">{{ $detail->featured1?'Remove Main Featured':'Make Main Featured' }} </a>
            <hr>

            <form action="{{route('new.detail.update', $detail->link)}}" method="post" class="form-horizontal" role="form" id="wysiwyg" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group" >
                    <p>Title</p>
                    <input type="text" class="form-control" name="title" placeholder="Title" autocomplete="off" value="{{ $detail->title }}">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" style="padding-right:5px">
                            <p>Type</p>
                            <input type="text" class="form-control" name="type" placeholder="Type: about or courses or vocations" autocomplete="off" value="{{ $detail->type }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" style="padding-left:5px">
                            <p>Relative</p>
                            <input type="text" class="form-control" name="relative" placeholder="Relative: people " autocomplete="off" value="{{ $detail->relative }}">
                        </div>
                    </div>


                </div>
                <div class="form-group">

                    <div class="col-sm-3">
                        <input type="file" name="image" onchange="shwimg()" id="imgInp">
                        <br>
                        <div class="" style="max-height: 250px">
                            <img src="{{ url('uploads/'.$detail->image) }}" alt="" class="image_src img-fit" id="imgtoshow" style="max-height: 250px">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p></p>
                    </div>
                    <div class="col-sm-3">
                        <p><b>Content Configurations</b></p>
                        <div class="" style="padding-left: 30px">
                            <p class="text-muted"><b>Use Registration?</b></p>
                            <input type="radio" name="use_reg" value="no" {{ $detail->use_reg==='no'?'checked':'' }}> No
                            <input type="radio" name="use_reg" value="yes" {{ $detail->use_reg==='yes'?'checked':'' }}> Yes
                        </div>
                        <div class="" style="padding-left: 30px">
                            <hr>
                            <p><b>Payment Configuration</b></p>
                            <input type="radio" name="pay" value="no" onclick="$('.pricer').hide()" {{ $detail->pay?'':'checked' }}> No
                            <input type="radio" name="pay" value="yes" onclick="$('.pricer').show()" {{ $detail->pay?'checked':'' }}> Yes

                            <div class="pricer" style="display: {{ $detail->pay?'block':'none'  }}">
                                <small>enter price, eg 1500, 2000, 20000. only digits allowed</small>
                                <input type="text" class="form-control" name="price" placeholder="Price for Content" value="{{ $detail->price }}" >
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <p>Details of Title</p>
                    <textarea class="form-control abt_field" name="info" id="" cols="30" rows="10">{{ $detail->info }}</textarea>
                </div>
                <div class="form-group" >
                    <button class="btn btn-lg btn-block btn-info">Update</button>
                </div>
            </form>

            {{--@include('admin.pages.content.vision')--}}

            {{--@include('admin.pages.content.core')--}}
        </div>
    </div>
    @include('admin.includes.tinymce')
@endsection