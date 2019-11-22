<?php
$url = route('console.tube');
$pagename = "<a href='$url'>Youtube List</a> <span style='margin-left: 10px'> <b>New</b></span>";
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
            Import a new Video. <span style="color: red"><b>copy share url directly from YouTube page. </b></span> URL should be in this format: <b>https://youtu.be/P_OCvefV7fB</b>
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('tube.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Names</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Video Name" class="form-control">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Link</label>
                        <div class="col-sm-10">
                            <input type="text" name="link" placeholder="Video youtube link" class="form-control" required>
                        </div>
                    </div >

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


