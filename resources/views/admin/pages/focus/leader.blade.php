<?php
$active['contentz'] = 'imactive';
$csslinks = [''];
$jslinks = ['newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];
$pagename = '<b>Edit Contents</b> <span style="margin-left: 15px">Carrer</span>';
$li_active['govt'] = 'li-active';

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div style="margin-top: 30px">

        <div class="col-sm-2">

            @include('admin.includes.efocusnav')

        </div>

        <div class="col-sm-10">

            <form action="{{route('console.focus.save')}}" method="post" class="form-horizontal" role="form" id="wysiwyg">
                {{csrf_field()}}
                <div class="form-group" >
                        <textarea class="form-control abt_field" name="l_gov" id="" cols="30" rows="10">
                            {{ $content['l_gov'] }}
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