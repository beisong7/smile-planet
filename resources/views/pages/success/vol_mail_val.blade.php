@extends('includes.app')

@section('content')
    <br>
    <span class="breadcrumb">
        <a href="{{ route('home') }}"> Home </a>
    </span>
    <br>
    <h3 class="t-color"><b> Validation Success </b></h3>
    <br>
    @include('includes.error')
    <h5 class="text-center">
        Your Application and email <b>({{ $volunteer->email }})</b> has been acknowledged. You will be contacted shortly once verified. Thank you.
    </h5>
    <br>
    <a href="{{ route('home') }}" class="btn btn-sm btn-info"><b>Proceed</b></a>

@endsection
