<?php $active['album'] = 'imactive';

$jslinks = ['newbanner.js'];
$url = route('album.index');
$pagename = "<a href='$url'>Albums</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new Album.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('album.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" placeholder="Album Title" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Type</label>
                        <div class="col-sm-4">
                            <select name="type" id="" class="form-control" required>
                                <option value=""></option>
                                <option value="entrepreneur" >Entrepreneur</option>
                                <option value="humanitarian"  >Humanitarian</option>

                            </select>
                        </div>

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">More Info</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="info" placeholder="Other Relevant Information" class="form-control" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Image</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <br>
                                <div class="col-sm-3">
                                    <span class="btn btn-sm btn-info evt_add_img" data-toggle="modal" data-target="#myModal">Add Image</span>
                                </div>
                                <div class="col-sm-3">

                                    <div class="list-group-item">
                                        <img src="{{ url('img/default.png') }}" alt="" class="image_src img-fit">
                                    </div>
                                    <small> required </small>

                                    <input type="text" name="gallery_id" value="" style="display: none" class="new_event_img " required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
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


@endsection


