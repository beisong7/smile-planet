<?php
$active['presence'] = 'imactive';
$csslinks = [''];
$jslinks = ['newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];$kurl = route('console.content');
$pagename = '<a href="'.$kurl.'"><b>Edit Contents</b></a>  <span style="margin-left: 15px">Our Presence</span>';

$li_active['op'] = 'li-active';


?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div style="margin-top: 30px">

        <div class="col-sm-2">
            @include('admin.includes.contentNav')
        </div>

        <div class="col-sm-10">

            <form action="{{route('console.content.save')}}" method="post" class="form-horizontal" role="form" id="wysiwyg">
                {{csrf_field()}}
                <div class="form-group" >
                    <textarea class="form-control abt_field" name="f_reach" id="" cols="30" rows="10">{{ $content['f_reach'] }}</textarea>
                </div>

                <div class="form-group">
                    <div class="col-md-1">
                        <span class="btn btn-sm btn-info evt_add_img" data-toggle="modal" data-target="#myModal">Add Image</span>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <small> * please an image is required! </small>
                        <div class="list-group-item">
                            @if( isset($content['f_reach_img']))
                                <img src="{{ url('uploads/'.$content['f_reach_img']) }}" alt="" class="image_src img-fit">
                            @else
                                <img src="{{ url('img/default.png') }}" alt="" class="image_src img-fit">
                            @endif

                        </div>

                        <input type="text" name="f_reach_img" value="" style="display: none" class="new_event_img ">
                    </div>
                </div>

                <div class="form-group" >
                    <button class="btn btn-sm btn-primary abt_update">Update</button>
                </div>
            </form>

            {{--@include('admin.pages.content.vision')--}}

            {{--@include('admin.pages.content.core')--}}
        </div>
    </div>
    @include('admin.includes.tinymce')
@endsection

