<?php $active['people'] = 'imactive';

$jslinks = ['newbanner.js'];
$url = route('people.index');
$pagename = "<a href='$url'>People</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new entry for a PERSON into the system.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('people.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="textinput">Full Names</label>
                        <div class="col-sm-4">
                            <input type="text" name="names" placeholder="Names" class="form-control" required>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Office</label>
                        <div class="col-sm-4">
                            <select name="office" id="" class="form-control" required>
                                <option value=""></option>
                                <option value="trustee">Trustee</option>
                                <option value="exco">Executive Council</option>
                                <option value="facilitator">Facilitator</option>
                                <option value="volunteer">Volunteer</option>
                            </select>
                        </div>

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Position</label>
                        <div class="col-sm-4">
                            <input type="text" name="pos" placeholder="Position" class="form-control">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Telephone</label>
                        <div class="col-sm-4">
                            <input type="number" placeholder="" class="form-control" name="telephone" >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" placeholder="Email address" class="form-control" >
                        </div>
                        <label class="col-sm-2 control-label" for="textinput">Related</label>
                        <div class="col-sm-4">
                            <input type="text" name="related" placeholder="Related: people" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">More Info</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="o_details" placeholder="Other Relevant Information" class="form-control" ></textarea>
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

                                    <input type="text" name="gallery_id" value="" style="display: none" class="new_event_img">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Complete</button>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>

                </fieldset>

            </form>
        </div>

    </div>


@endsection


