<?php
$url = route('slider.index');
$pagename = "<a href='$url'>Slider</a> <span style='margin-left: 10px'> <b>Edit</b></span>";
$active['slider'] = 'imactive';

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
            Edit Slider
        </small>

        <br>

        <hr>

        <div class="col-md-12">
            <form action="{{ route('slider.update', $slider->id) }}" class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Image</label>
                        <div class="input-group col-sm-6">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            <input id="thumbnail" class="form-control" type="text" name="filepath" value="{{ $slider->image }}">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;" class="col-md-offset-2">

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Show Logo</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="show_logo" class="" {{ $slider->show_logo?'checked':'' }}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Show Buttons</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="show_btn" class="" {{ $slider->show_btn?'checked':'' }}>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Main Writeup</label>
                        <div class="col-sm-10">
                            <input type="text" autocomplete="off" name="writeup1" class="form-control" placeholder="main writeup on banner" value="{{ $slider->writeup1 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Mini Writeup</label>
                        <div class="col-sm-10">
                            <input type="text" autocomplete="off" name="writeup2" class="form-control" placeholder="mini writeup on banner" value="{{ $slider->writeup2 }}">
                        </div>
                    </div>

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
    @include('admin.pages.slider.tinymyce')


@endsection


