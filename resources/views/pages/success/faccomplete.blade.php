@extends('includes.app')

@section('content')
    <br>
    <span class="breadcrumb">
        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a> <b> > </b> <span>Facilitate</span>
    </span>
    <br>
    <h1 class="t-color"><b> Facilitate </b></h1>
    <br>
    @include('includes.error')
    <h3><b>Your Application has been received and is being processed!</b></h3>
    <p> </p>

    <p> Thank you for applying as a facilitator in SPEH & SPF.
        An email has been sent to {{ $email }} to enable the completion of your application. <small><b style="color: red;">kindly check your inbox or spam for the email</b></small>

    </p>
    <h4>Thank You</h4>
    <a href="{{ route('home') }}" class="btn btn-sm btn-info"><b>Proceed</b></a>

@endsection
