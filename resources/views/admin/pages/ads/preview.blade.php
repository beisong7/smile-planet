<?php
$url = route('category.index');
$jslinks = ['newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];
$pagename = "<a href='$url'>Categories</a> <span style='margin-left: 10px'> <b> ". $category->name ." </b></span>";
$active['contentz'] = 'imactive';
?>
@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Edit a Category Detail. <span style="color: red">(target url must match topic field)</span>
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('category.update', $category->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Category name" class="form-control" required value="{{ $category->name }}">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" placeholder="example : foundation, humanitarian, etc" class="form-control" value="{{ $category->status }}">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="group">Group</label>
                        <div class="col-sm-4">
                            <input type="text" name="group" placeholder="Group" class="form-control" value="{{ $category->group }}">
                        </div>

                        <label class="col-sm-2 control-label" for="group">Topic</label>
                        <div class="col-sm-4">
                            <input type="text" name="topic" placeholder="Topic" class="form-control" value="{{ $category->topic }}">
                        </div>

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="content">Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" type="text" placeholder="Content Details" class="form-control abt_field">{{ $category->content }}</textarea>
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Complete</button>
                        </div>

                    </div>

                </fieldset>

            </form>
        </div>
        <br>
        <br>
        <br>



    </div>
    @include('admin.includes.tinymce')


@endsection


