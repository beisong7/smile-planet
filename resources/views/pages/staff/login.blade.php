<?php
$pagename = 'Staff Login - smileplanetef';
$jslinks = ['login.js'];
?>

@extends('includes.app')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="staff_login" >
                <h3 class="text-center">LOGIN</h3>
                <hr>
                <form action="{{ route('stafflogin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <p>ID<i class="fa fa-user-circle pull-right"></i></p>
                        <input name="access" type="text" class="form-control" value="{{ old('access') }}" style="border-radius: 0px">
                    </div>

                    <div class="form-group">
                        <p>Password <i class="fa fa-key pull-right"></i></p>
                        <input name="password" type="password" class="form-control" style="border-radius: 0px">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" style="border-radius: 0px" type="submit">LOGIN</button>
                    </div>
                    <p><small><a href="#working" style="color: plum">forgot password</a></small></p>
                </form>
                <br>
                @include('admin.layouts.error')
            </div>
        </div>
    </div>

@endsection
