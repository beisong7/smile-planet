<?php
$active['contentz'] = 'imactive';
$csslinks = [''];
$jslinks = ['newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];
$kurl = route('console.content');
$pagename = '<a href="'.$kurl.'"><b>Edit Contents</b></a>  <span style="margin-left: 15px">About Us</span>';
$li_active['about'] = 'li-active';


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
                        <textarea class="form-control abt_field" name="aboutus" id="" cols="30" rows="10">
                            {{ $content['aboutus'] }}
                        </textarea>
                </div>
                <div class="form-group" >
                    <button class="btn btn-sm btn-info abt_update">Update</button>
                </div>
            </form>

            {{--@include('admin.pages.content.vision')--}}

            {{--@include('admin.pages.content.core')--}}
        </div>
    </div>
    @include('admin.includes.tinymce')
@endsection