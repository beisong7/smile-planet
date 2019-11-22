<?php
$url = route('blog.index');
$pagename = "<a href='$url'>Blog</a> <span style='margin-left: 10px'> <b> $blog->name </b></span>";
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
            Edit / Preview / Publish Blog.
        </small>

        <small><b>
                <a href="{{ $blog->status? route('blog.unpublish', $blog->id):route('blog.publish', $blog->id) }}">{{ $blog->status?'UN-PUBLISH':'PUBLISH' }}</a>
            </b></small>

        <br>

        <hr>

        <div class="col-md-12">
            <form action="{{ route('blog.update', $blog->id) }}" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Slug</label>
                        <div class="col-sm-4">
                            <input type="text" name="slug" placeholder="slug. e.g: how-to-make-money (no spaces)" class="form-control" required value="{{ $blog->slug }}">
                        </div>
                        <label class="col-sm-2 control-label" for="textinput">Category</label>
                        <div class="col-sm-4">
                            <select name="category_id" class="form-control" id="" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $blog->category_id===$category->id?'selected':'' }} > {{ $category->name }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div >


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Type</label>
                        <div class="col-sm-4">
                            <select name="type" id="" class="form-control">
                                <option value="entrepreneur" {{ $blog->type==='entrepreneur'?'selected':'' }}>Entrepreneur</option>
                                <option value="foundation" {{ $blog->type==='foundation'?'selected':'' }}>Foundation</option>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Banner</label>
                        <div class="col-sm-4">
                            <input class="form-input form-control" type="file" name="banner" accept="image/*" onchange="shwimg()" id="imgInp">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput"></label>
                        <div class="col-sm-10">
                            <p><small style="color: red">note: dimensions must be 950 x 400 pixels </small></p>
                            <div class="text-center" style="max-height: 400px; padding: 0; border-radius: 5px; margin: 0 auto; background: #333">
                                <img id="imgtoshow"  src="{{ $blog->banner() }}" class="img-h-fit" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Title</label>
                        <div class="col-sm-10">
                            <textarea type="text" rows="2" name="title" placeholder="Blog Title" class="form-control" required>{{ $blog->title }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" rows="2" name="desc" placeholder="Blog Description" class="form-control" required>{{ $blog->desc  }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Tags</label>
                        <div class="col-sm-10">
                            <p><small>please separate each tag with a space and each tag must be one word</small></p>
                            <textarea type="text" rows="2" name="tags" placeholder="Blog tags related. e.g: #Money #Training #Housing" class="form-control" required>{{ $blog->tags  }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Detail</label>
                        <div class="col-sm-10">
                            <textarea rows="20" name="detail" class="myfield form-control">{!! $blog->detail !!}</textarea>
                        </div>

                    </div >

                    <div class="form-group" style="margin-bottom: 50px">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Update</button>
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


