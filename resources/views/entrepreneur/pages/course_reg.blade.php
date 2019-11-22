<?php
$jslinks = ['main.js'];
$url = route('e.courses');
$pagename = "<a href='$url'>Course List</a> - <b>" .$course->title . "</b> - Registration" ;
$titlename = 'Register Course - '.$course->title;

?>

@extends('includes.entrepreneur')

@section('content')
    @include('includes.preload')

    <div class="container" style="margin-top: 90px">

        <br>
        @include('entrepreneur.includes.breadcrumb')
        <br>
        @include('includes.error')
        <br>

        <div class="row">
            <div class="col-sm-3" ><img class="img-fit" src="{{ url('uploads/'.$course->gallery->url) }}" alt="image"></div>
        </div>

        <br>
        <h1 class="purple2"><b> {{ $course->title }} Registration</b></h1>
        <br>
        <hr>
        <small>
            * Required
        </small>
        <br>
        <form class="form-horizontal purple" role="form" method="POST" action="{{ route('course.register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>
                <input type="hidden" name="course_id" required value="{{ $course->id }}">
                <!-- Form Name -->
                <legend>
                    <h4><b>Your Information</b></h4>
                </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Email *</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" placeholder="Email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Names * </label>
                    <div class="col-sm-10">
                        <input type="text" name="names" placeholder="Full Names" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Phone * </label>
                    <div class="col-sm-4">
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" required>
                    </div>
                    <label class="col-sm-2 control-label" for="textinput">Sex * </label>
                    <div class="col-sm-4">
                        <select name="gender" required class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>



                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Date of Birth * </label>
                    <div class="col-sm-4">
                        <input type="date" name="dob" placeholder="Date of Birth" class="form-control" required>
                    </div>

                    <label class="col-sm-2 control-label" for="textinput">Coutry * </label>
                    <div class="col-sm-4">
                        <input type="text" name="country" placeholder="Country of Residence" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Address * </label>
                    <div class="col-sm-10">
                        <textarea type="text" name="address" placeholder="Contact Address" class="form-control" required></textarea>
                    </div>
                </div>

                <legend>
                    <h4><b>Other Information</b></h4>
                </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Highest Educational Level * </label>
                    <div class="col-sm-6">
                        <select name="edu_level" required class="form-control">
                            <option value="1">Primary School Certificate</option>
                            <option value="2">Secondary School Certificate</option>
                            <option value="3">University/Higher Institution or Equivalent</option>
                            <option value="4">Masters Degree or Equivalent</option>
                            <option value="5">Doctorate</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Next of Kin's Name* </label>
                    <div class="col-sm-10">
                        <input type="text" name="nok_name" placeholder="Next of kin's name" class="form-control" required>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Next of Kin's Address* </label>
                    <div class="col-sm-10">
                        <textarea type="text" name="nok_address" placeholder="Next of kin's address" class="form-control" required></textarea>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Next of Kin's Phone* </label>
                    <div class="col-sm-10">
                        <input type="text" name="nok_phone" placeholder="Next of kin's phone" class="form-control" required>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Course Training Expctation</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="course_expec" placeholder="What are your expectations from this course training?" class="form-control"></textarea>
                    </div>

                </div>

                <div class="form-group">
                    <p class="col-sm-12"><b>
                            If given a seed capital of N500,000 (Five hundred thousand Naira), what will be your business plan with it?
                        </b></p>
                    <br>
                    <div class="col-sm-12">
                        <textarea type="text" name="course_qst" placeholder="Your Answer" class="form-control"></textarea>
                    </div>

                </div>

                <legend>
                    <h4><b>Attestation</b></h4>
                </legend>


                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-12">
                        I hereby affirm that the information provided on this form is true and correct and I attest to conform to the center ethics,
                        guidelines, regulations and to conduct myself in an orderly manner throughout the duration of the course.
                        <br>
                        <small>A copy of your responses will be emailed to the address you provided.</small>
                    </div>
                </div>

                <!-- Text input-->


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="pull-right">
                            {{--<button type="submit" onclick="window.preventDefault();" class="btn btn-default">Cancel</button>--}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>

            </fieldset>
        </form>
        <br>
        <hr>
        <a href="{{ route('e.courses') }}" class="btn btn-sm btn-info">Course List</a>


    </div>
@endsection
