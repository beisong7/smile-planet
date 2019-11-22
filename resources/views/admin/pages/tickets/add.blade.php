<?php
$url = route('console.admins');
$pagename = "<a href='$url'>Tickets</a> <span style='margin-left: 10px'> <b>New</b></span>";
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
            Create a New Ticket.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Full Names</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" placeholder="Full Names" class="form-control" required>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" placeholder="Username" class="form-control" >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Telephone</label>
                        <div class="col-sm-4">
                            <input type="number" name="tel" placeholder="Telephone" class="form-control" >
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Email</label>
                        <div class="col-sm-4">
                            <input type="email" placeholder="email" class="form-control" name="email" >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-4">
                            <span class="btn btn-default btn-xs secure"><i class="fa fa-eye-slash"></i></span>
                            <input name="password" type="password" placeholder="Password" class="form-control pform secured" value="smileplanetadmin">
                            <small><i>it is advisable to allow the owner set a desired password else, leave the default password</i></small>
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


