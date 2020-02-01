<?php
$url = route('console.admins');
$pagename = "<a href='$url'>Administrators</a> <span style='margin-left: 10px'> <b>$admin->fullname </b></span>";
$active['admin'] = 'imactive';
?>
@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            {{ $admin->fullname }}
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.update', $admin->id) }}" method="POST">
                {{ csrf_field() }}


                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Full Names</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" placeholder="Full Names" class="form-control" required value="{{ $admin->fullname }}">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" placeholder="Username" class="form-control" value="{{ $admin->username }}" >
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Telephone</label>
                        <div class="col-sm-4">
                            <input type="number" name="tel" placeholder="Telephone" class="form-control" value="{{ $admin->tel }}">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Email</label>
                        <div class="col-sm-4">
                            <input type="email" placeholder="email" class="form-control" name="email" value="{{ $admin->email }}">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-4">
                            <span class="btn btn-default btn-xs secure"><i class="fa fa-eye-slash"></i></span>
                            <input name="op" type="password" placeholder="old password" class="form-control pform secured">

                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Password</label>
                        <div class="col-sm-4">
                            <span class="btn btn-default btn-xs secure"><i class="fa fa-eye-slash"></i></span>
                            <input name="np" type="password" placeholder="New Password" class="form-control pform secured" >

                        </div>



                    </div >

                    <div class="form-group">


                        @if(Auth::user()->who ===4)
                            <label class="col-sm-2 control-label" for="textinput">Level</label>
                            <div class="col-sm-4">
                                <select name="who" id="" class="form-control">
                                    <option value="4" {{ $admin->who===4?'selected':'' }}>Admin</option>
                                    <option value="3" {{ $admin->who===3?'selected':'' }}>Staff</option>
                                </select>
                            </div>

                            <label class="col-sm-2 control-label" for="textinput">Role</label>
                            <div class="col-sm-4">
                                <select name="job" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="AO"{{ $admin->job==='AO'?'selected':'' }}>Admin Officer</option>
                                    <option value="HRO"{{ $admin->job==='HRO'?'selected':'' }}>Human Resource Officer</option>
                                    <option value="BL"{{ $admin->job==='BL'?'selected':'' }}>Blogger</option>
                                </select>
                            </div>
                        @endif
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
