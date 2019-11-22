@extends('includes.foundation')

@section('content')
    @include('foundation.includes.subscribe')
    @include('foundation.includes.nav')
    @include('includes.preload')
    @include('foundation.includes.slider.mainslides')
    @include('foundation.includes.whatwedo')
    @include('foundation.includes.aimsobj')
    {{--@include('foundation.includes.ourreach')--}}
    {{--@include('foundation.includes.events')--}}
    @include('foundation.includes.footer')
    
@endsection
