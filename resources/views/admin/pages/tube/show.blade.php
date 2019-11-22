<?php
$url = route('console.tube');
$pagename = "<a href='$url'>Youtube</a> <span style='margin-left: 10px'> <b>Edit</b></span>";
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
            Edit Video. <span style="color: red"><b>copy share url directly from YouTube page. </b></span> URL should be in this format: <b>https://youtu.be/P_OCvefV7fB</b>
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('tube.update', $tube->id) }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Names</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Youtube Video Name" class="form-control" required value="{{ $tube->name }}">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Link</label>
                        <div class="col-sm-10">
                            <input type="text" name="link" placeholder="Youtube Link" class="form-control" value="{{ $tube->link }}" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Update</button>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <div class="col-sm-6 col-xs-12">
                                <div class="row">
                                    <h3>Preview</h3>
                                    <div class="panel-body">
                                        <iframe width="100%" height="240" src="{{  $tube->link }}" style="border: none" frameborder="0" allow="encrypted-media" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>

                            </div>
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


