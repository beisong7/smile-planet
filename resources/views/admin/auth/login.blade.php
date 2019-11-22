@extends('admin.layouts.app')

@section('content')

    <div class="holder-signin">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel " style="margin-top: 45%">
                    <div class="panel-body">
                        <h3 class="text-center" style="color: #333 !important;"><b>SMILE - PLANET - DASHBOARD</b></h3>
                        <hr>
                        <div class="smspace">
                            {{--{{ route('adminlogin') }}--}}
                            <form action="{{ route('adminlogin') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="" style="color: #333 !important;">Username or Phone</label>
                                    <input name="access" class="form-control" type="text" placeholder="username or phone" required value="{{ old('access') }}">
                                </div>
                                <div class="form-group">
                                    <label for="" style="color: #333 !important;">Password</label>
                                    <input name="password" class="form-control" type="password" placeholder="password" required value="{{ old('password') }}">
                                </div>
                                <button class="btn btn btn-primary btn-block" type="submit">Login</button>
                                <a href="#" class="pull-right white" >Forgot Credentials</a>

                            </form>


                        </div>

                        <p style="margin-top: 14px; color: #333 !important; " class="text-center">Supported By <a class="" href="https://synergynode.com"><b>Synergy Node</b></a></p>
                    </div>
                </div>

                @include('admin/layouts/error')

            </div>
        </div>

    </div>

@endsection


