<?php

$pagename = 'About Us';
$livejs = ['https://www.google.com/recaptcha/api.js']

?>

@extends('v2.layout.appv2')

@section('content')
    <!-- Home -->

    <div class="col-md-10 col-md-offset-1 container mb-5" style="margin-top: 200px">


        <div class="row ">
            <div class="col-md-4 col-lg-3">
                <div class="shadow-mild mb-5">
                    <div>
                        <img src="{{ url('img/consultation.jpg') }}" alt="" class="img-fit">
                    </div>
                    <div class=" " style="padding: 0;">
                        <div class="" style="padding: 10px 20px; margin: 0; line-height: 30px">
                            <h5 class="mt-3 mb-3"><b> Free Consultations </b></h5>
                            <hr>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">


                <div class="shadow-mild mb-5">
                    <div class="p-5">
                        @include('admin.layouts.error')
                        <h3 class="text-muted mb-0">
                            Get free consultations today!
                        </h3>
                        <p>Smile Planet Consultation Registration Form</p>

                        <form action="{{ route('free.consult') }}" method="post">
                            {{ csrf_field() }}


                            <hr>
                            <small>Personal Information | Information About Yourself</small>
                            <br>
                            <hr>
                            <div class="form-group mt-4 mb-5">
                                <div class="row">
                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>* First Name </b>
                                        <input type="text" class="form-control" placeholder="First Name" name="first_name" autocomplete="off" required>
                                    </div>
                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>* Surname </b>
                                        <input type="text" class="form-control" placeholder="Surname" name="surname" autocomplete="off" required>
                                    </div>
                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>Other Name</b>
                                        <input type="text" class="form-control" placeholder="Other Name" name="other_name" autocomplete="off">
                                    </div>
                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>* Your Email </b>
                                        <input type="email" class="form-control" placeholder="Your Email" name="email" autocomplete="off" required>
                                    </div>
                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>* Phone Number </b>
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone" autocomplete="off" required>
                                    </div>
                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>* Location </b> <small>City</small>
                                        <input type="text" class="form-control" placeholder="Location" name="location" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-5">
                            <small>Business / Company Information | Tell us about your business</small>
                            <br>
                            <hr>

                            <div class="form-group mt-4">
                                <div class="row">

                                    <div class="mb-2 col-md-6 col-sm-12">
                                        <b>Business Category</b>
                                        <select name="bus_category" id="" class="form-control">
                                            <option value="" disabled selected>please select</option>
                                            <option value="Automotive">Automotive</option>
                                            <option value="Agro – Allied">Agro – Allied</option>
                                            <option value="Business Support and Supplies">Business Support and Supplies</option>
                                            <option value="Computer & Electronics">Computer & Electronics</option>
                                            <option value="Constructions & Contractors">Constructions & Contractors</option>
                                            <option value="Education">Education</option>
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Fashion & Beauty">Fashion & Beauty</option>
                                            <option value="Food & Beverages">Food & Beverages</option>
                                            <option value="Furnitures">Furnitures</option>
                                            <option value="Government">Government</option>
                                            <option value="Health & Medicine">Health & Medicine</option>
                                            <option value="Home and Gardens">Home and Gardens</option>
                                            <option value="Professional, Legal & Financial">Professional, Legal & Financial</option>
                                            <option value="Manufacturing, Wholesale & Distribution">Manufacturing, Wholesale & Distribution</option>
                                            <option value="Media & Communication">Media & Communication</option>
                                            <option value="Medical">Medical</option>
                                            <option value="Merchants">Merchants</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Sports & Recreation">Sports & Recreation</option>
                                            <option value="Travel & Transportation">Travel & Transportation</option>
                                        </select>

                                    </div>
                                    <div class=" col-md-6 col-sm-12">
                                        <b>* Is your business a startup or Existing already?</b>
                                        <br>
                                        Idea <input type="radio" value="idea" name="bus_type" style="margin-right: 10px" required>
                                        Start-Up <input type="radio" value="start_up" name="bus_type" style="margin-right: 10px" required>
                                        Existing <input type="radio" value="existing" name="bus_type" style="margin-right: 10px" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="row">
                                    <div class="mb-2 col-sm-12">
                                        <b>* Business / Idea Challenge </b> <small>Not more than 1000 words!</small>
                                        <textarea type="text" class="form-control" placeholder="Not more than 1000 words" name="bus_ideal" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>



                            @if(env('GOOGLE_RECAPTCHA_KEY'))
                                <div class="g-recaptcha"
                                     data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                                </div>
                            @endif

                            <br>
                            <div class="form-group mt-5">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-secondary btn-block" style="border-radius: 0">Submit </button>

                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>



    </div>

@endsection

