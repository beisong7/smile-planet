@extends('includes.app')

@section('content')
    <br>
    <span class="breadcrumb">
        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a> <b> > </b> <span>Volunteer</span>
    </span>
    <br>
    <h1 class="t-color"><b> Volunteer </b></h1>
    <br>
    @include('includes.error')
    <h3><b>Your Application has been received and is being processed!</b></h3>
    <p> </p>
    <p> Thank you for applying to volunteer with Smile Planet Entrepreneurs Foundation (SPEF).
        An email has been sent to {{ $email }} about your registration details.
        You will receive another email with confirmation of your application when processed.
        We will respond via phone and/or email within 42 hours of a complete application. <small><b style="color: red;">Kindly check your inbox or spam for the email.</b></small>
    </p>
    {{--<p> Thank you for applying to volunteer with Smile Planet Entrepreneurs Foundation (SPEF).--}}
        {{--An email has been sent to {{ $email }} about your registration details.--}}
        {{--You will receive an automated email with confirmation of your application when processed--}}
        {{--in which you will be provided the opportunity to upload your current Curriculum Vitae and a profile picture. --}}
        {{--These are required before your application is complete. We will respond via phone and/or email within a week of a complete application.--}}
    {{--</p>--}}
    <h4>Thank You</h4>
    <a href="{{ route('home') }}" class="btn btn-sm btn-info"><b>Proceed</b></a>

@endsection
