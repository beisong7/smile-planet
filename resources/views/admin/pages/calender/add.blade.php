<?php $active['dashboard'] = 'imactive';

$jslinks = ['newbanner.js'];
$url = route('console.calender');
$pagename = "<a href='$url'>Calender Dates</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new Date Event.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('calender.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Event Theme</label>
                        <div class="col-sm-10">
                            <input type="text" name="theme" placeholder="Event Theme" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Organizer</label>
                        <div class="col-sm-10">
                            <input type="text" name="organizer" placeholder="Organizer" class="form-control" >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Date</label>
                        <div class="col-sm-4">
                            <input type="date" name="date" placeholder="Title" class="form-control" >
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Time</label>
                        <div class="col-sm-4">
                            <input type="time" placeholder="" class="form-control" name="time" >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Venue</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="venue" placeholder="Event Venue" class="form-control" ></textarea>
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


@endsection


