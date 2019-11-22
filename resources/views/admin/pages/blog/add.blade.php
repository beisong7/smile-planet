<?php
$url = route('blog.index');
$pagename = "<a href='$url'>Blog</a> <span style='margin-left: 10px'> <b>New</b></span>";
$active['blog'] = 'imactive';

$jslinks = ['main.js'];


?>
@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new Blog.
        </small>

        <small class="gray"><a href="{{ route('blogcat.create') }}"><b>Add Category</b></a></small>
        <br>

        <hr>

        <div class="col-md-12">
            <form action="{{ route('blog.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Slug</label>
                        <div class="col-sm-4">
                            <input type="text" name="slug" placeholder="slug. e.g: how-to-make-money (no spaces)" class="form-control" required value="{{ old('slug') }}">
                        </div>
                        <label class="col-sm-2 control-label" for="textinput">Category</label>
                        <div class="col-sm-4">
                            <select name="category_id" class="form-control" id="" required>
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div >


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Type</label>
                        <div class="col-sm-4">
                            <select name="type" id="" class="form-control">
                                <option value="{{ old('type') }}">{{ ucfirst(old('type')) }}</option>
                                <option value="entrepreneur">Entrepreneur</option>
                                <option value="foundation">Foundation</option>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Banner</label>
                        <div class="col-sm-4">
                            <input class="form-input form-control" type="file" name="banner" accept="image/*" onchange="shwimg()" id="imgInp" required >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput"></label>
                        <div class="col-sm-10">
                            <p><small style="color: red">note: dimensions must be 950 x 400 pixels </small></p>
                            <div class="text-center" style="max-height: 400px; padding: 0; border-radius: 5px; margin: 0 auto; background: #333">
                                <img id="imgtoshow"  src="{{ url('image/default.png') }}" class="img-h-fit" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Title</label>
                        <div class="col-sm-10">
                            <textarea type="text" rows="2" name="title" placeholder="Blog Title" class="form-control" required>{{ old('title') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" rows="2" name="desc" placeholder="Blog Description" class="form-control" required>{{ old('desc') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Tags</label>
                        <div class="col-sm-10">
                            <p><small>please separate each tag with a space and each tag must be one word</small></p>
                            <textarea type="text" rows="2" name="tags" placeholder="Blog tags related. e.g: #Money #Training #Housing" class="form-control" required>{{ old('tags') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Detail</label>
                        <div class="col-sm-10">
                            <textarea rows="20" name="detail" class="myfield form-control">{!! old('detail') !!}</textarea>
                        </div>

                    </div >

                    <div class="form-group" style="margin-bottom: 50px">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Save</button>
                        </div>

                    </div>

                </fieldset>

            </form>
        </div>
        <br>
        <br>
        <br>



    </div>
    @include('admin.pages.blog.tinymyce')


@endsection


