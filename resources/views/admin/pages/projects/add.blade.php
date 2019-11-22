<?php $active['event'] = 'imactive';

    $jslinks = ['newbanner.js'];
$url = route('console.event');
    $pagename = "<a href='$url'>Events</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new event. Date and Time are REQUIRED!
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('event.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Event Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" placeholder="Event Title" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Date</label>
                        <div class="col-sm-4">
                            <input type="date" name="date" placeholder="Title" class="form-control" required>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Time</label>
                        <div class="col-sm-4">
                            <input type="time" placeholder="" class="form-control" name="time" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Event Detail</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="detail" placeholder="Event Detail" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Event Venue</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="venue" placeholder="Event Venue" class="form-control" required ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Type</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-2">
                                    <select name="type" id="" class="form-control" required>
                                        <option value=""></option>
                                        <option value="humanitarian">Humanitarian</option>
                                        <option value="entrepreneur">Entrepreneur</option>
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Ticket</label>
                                <div class="col-sm-2">
                                    <select name="ticket" id="" class="form-control" required>
                                        <option value=""></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Certificate</label>
                                <div class="col-sm-2">
                                    <select name="hascert" id="" class="form-control" required>
                                        <option value=""></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <br>
                                        <div class="col-sm-3">
                                            <span class="btn btn-sm btn-info evt_add_img" data-toggle="modal" data-target="#myModal">Add Image</span>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="list-group-item">
                                                <img src="{{ url('img/default.png') }}" alt="" class="image_src img-fit">
                                            </div>
                                            <small> required </small>

                                            <input type="text" name="gallery_id" value="" style="display: none" class="new_event_img " required>
                                        </div>
                                    </div>

                                </div>
                            </div>
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

    </div>


@endsection


