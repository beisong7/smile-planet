<?php
$url = route('ads.manage');
$jslinks = ['imgToPage.js'];
$pagename = "<a href='$url'>Categories</a> <span style='margin-left: 10px'> <b>New</b></span>";
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
            Create a new Category Detail. <span style="color: red">(target url must match topic field)</span>
        </small>
        <br>

        <hr>

        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Target</label>
                        <div class="col-sm-10">
                            <input type="text" name="target" placeholder="Target Link or URL" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Landscape</label>
                        <div class="col-sm-4">
                            <input id="imgInp"  type="file" placeholder="" class="" name="l_img" style="" onchange="shwimg($(this))" accept="image/*" required>
                            <p><small style="color: red;"> * </small> <small>max 9mb ( .jpeg, .jpg, .png, .bmp )</small></p>
                            <div class="childimg list-group-item" style="max-width: 200px">
                                <img id="imgtoshow"  src="{{ url('img/person_default.png') }}" class="img-fit " alt="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Portrait</label>
                        <div class="col-sm-4">
                            <input id="imgInp"  type="file" placeholder="" class="" name="p_img" style="" onchange="shwimg($(this))" accept="image/*" required>
                            <p><small style="color: red;"> * </small> <small>max 9mb ( .jpeg, .jpg, .png, .bmp )</small></p>
                            <div class="childimg list-group-item" style="max-width: 200px">
                                <img id="imgtoshow"  src="{{ url('img/person_default.png') }}" class="img-fit " alt="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
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
    @include('admin.includes.tinymce')


@endsection


