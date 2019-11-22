@extends('includes.app')

@section('content')
    <br>
    <span class="breadcrumb">
        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a>
    </span>
    <br>
    <h1 class="t-color"><b> Validation Error </b></h1>
    <br>
    @include('includes.error')
    <h3 class="text-center">
        V A L I D A T I O N ____ E R R O R
    </h3>
    <P class="text-center">unable to validate, please try again later</P>
    <h4>Thank You</h4>
    <a href="{{ route('home') }}" class="btn btn-sm btn-info"><b>Proceed</b></a>

@endsection
