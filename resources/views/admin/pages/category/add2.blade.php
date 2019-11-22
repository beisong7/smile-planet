<?php
$url = route('blog.index');
$pagename = "<a href='$url'>Blog</a> <span style='margin-left: 10px'> <b>New Category</b></span>";
$active['dashboard'] = 'imactive';
?>
@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new Blog Category Detail.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('blogcat.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Category name" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" placeholder="example : foundation, humanitarian, etc" class="form-control" disabled>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="group">Group</label>
                        <div class="col-sm-4">
                            <input type="text" name="group" placeholder="Group" class="form-control" value="blog" disabled>
                        </div>

                        <label class="col-sm-2 control-label" for="group">Topic</label>
                        <div class="col-sm-4">
                            <input type="text" name="" placeholder="Topic" class="form-control" disabled>
                        </div>

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="content">Content Info</label>
                        <div class="col-sm-10">
                            <input name="content" type="text" placeholder="Category Information" class="form-control abt_field">
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Create Category</button>
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


