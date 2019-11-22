@extends('includes.app')

@section('content')
    <br>
    <span class="breadcrumb">
        <a href="{{ route('home') }}"> Home </a>
    </span>
    <br>
    <h5 class="text-center">
        Your Application for Facilitator /Counsellor for SPEH & SPF is currently being processed. Kindly click on the
        button below to let us know your core area of strength. For enquiries, contact +2347033461426,
        +2348070920250 or mail us: <b>trainings@smileplanetef.org.</b> Thank You.
    </h5>

    <h3 class="t-color"><b> Validation Success </b></h3>
    @include('includes.error')
    <br>
    <br>
    <a href="{{ route('completefform', $facilitator->formkey) }}" class="btn btn-sm btn-info"><b>Continue</b></a>

@endsection
