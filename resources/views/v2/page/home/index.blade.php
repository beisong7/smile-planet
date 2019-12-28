@extends('v2.layout.appv2')

@section('content')
    <!-- Home -->

    @include('v2.page.home.slider')


    <!-- Featured Course -->

    @include('v2.page.home.featured')


    <!-- Courses -->

    @include('v2.page.home.course_slider')


    <!-- Milestones -->

    @include('v2.page.home.milestone')


    <!-- Sections -->

    @include('v2.page.home.group_section')


    <!-- Video -->

    @include('v2.page.home.video')


    <!-- Join -->


    @include('v2.page.home.partner_slider')


    @include('v2.page.home.join')
@endsection
