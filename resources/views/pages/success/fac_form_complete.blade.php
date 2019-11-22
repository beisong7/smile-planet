@extends('includes.app')

@section('content')
    <br>
    <span class="breadcrumb">
        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a> <b> > </b> <span>Facilitator</span>
    </span>
    <br>
    <h1 class="t-color"><b> Facilitator </b></h1>
    <br>
    @include('includes.error')
    <h3><b>Thank you for completing your facilitator registration process. We will contact you shortly.</b></h3>
    <br><hr>
    <a href="{{ route('home') }}" class="btn btn-sm btn-info"><b>Continue</b></a>

@endsection
