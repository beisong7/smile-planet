<?php
$jslinks = ['countdown.js', 'main.js'];
$pagename = 'Complete Form';
$titlename = 'Complete Form';
?>

@extends('includes.app')

@section('content')

    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        <h1 class="t-color"><b>Complete Facilitator Form</b></h1>
        <p>
            {{ $facilitator->title . ' ' . ucfirst($facilitator->fname) .' ' . ucfirst($facilitator->lname) }}, please complete the forms
            below to help you build your portfolio. Thank you.

        </p>
        <hr>
        @include('includes.error')
        <br>
        <div style="display: block">
            <form class="form-horizontal purple" role="form" method="POST" action="{{ route('fac.complete.form', $facilitator->id) }}" >
                {{ csrf_field() }}
                <div class="form-group">
                    <p class="col-sm-12"><b class="purple3">Please indicate which area(s) you would like to be a facilitator with in SPEH & SPF</b></p>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <input type="checkbox" name="areatofac[]" class="" value="Introduction To SPEF"> Consultant (Introduction To SPEH & SPF)
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areatofac[]" value="Business Advisory" class=""> Consultant (Business Advisory)
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areatofac[]" value="Business Plan Review" class=""> Consultant (Business Plan Review)
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areatofac[]" value="Facilitator" class=""> Facilitator trainings
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areatofac[]" value="Mentor" class=""> Mentor
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areatofac[]" value="other" class=""> other
                        </div>

                    </div>

                </div>
                <div class="form-group">
                    <p class="col-sm-12"><b class="purple3">What days of the week are convenient for you as a facilitator at SPEH & SPF?</b></p>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <input type="checkbox" name="yourdays[]" value="monday"> Monday
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="yourdays[]" value="tuesday" class=""> Tuesday
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="yourdays[]" value="wednesday" class=""> Wednesday
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="yourdays[]" value="thursday" class=""> Thursday
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="yourdays[]" value="friday" class=""> Friday
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="yourdays[]" value="saturday" class=""> Saturday
                        </div>

                    </div>

                </div>
                <div class="form-group">
                    <p class="col-sm-12">
                        <b class="purple3">
                            If accepted as a facilitator, will you be available immediately?
                        </b>
                    </p>
                    <div class="col-sm-12">
                        <input type="radio" placeholder="" class="" name="beava" value="Yes"> Yes
                        <input type="radio" placeholder="" class="" name="beava" value="No" style="margin-left: 20px"> No
                    </div>

                </div>
                <div class="form-group">
                    <p class="col-sm-12">
                        <b class="purple3">
                            If no, when will you be available?
                        </b>
                    </p>
                    <div class="col-md-6 col-xs-12">
                        <input type="date"  name="beava2" class="form-control" >
                    </div>

                </div>
                <div class="form-group">
                    <p class="col-sm-12">
                        <b class="purple3">
                            Please specify which states you can be available to facilitate
                        </b>
                    </p>
                    <div class="col-md-6 col-xs-12">
                        <select name="state" class="form-control" id="" required>
                            <option value=""></option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">FCT</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <p class="col-sm-12">
                        <b class="purple3">
                            Please indicate which of the following TWO (2) functional areas you feel most qualified to offer support to SPEH & SPF?
                        </b>
                    </p>
                    <p><small>Select Only Two Options</small></p>
                    <div class="col-sm-12">

                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Legal"> Legal
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Marketing & Communications"> Marketing & Communications
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Finance & Accounting"> Finance & Accounting
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Human"> Human Resource Management
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Information & Communications Technology"> Information & Communications Technology
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Digital Media"> Digital Media
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Operations"> Operations
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Management"> Management
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Business Strategy"> Business Strategy
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Design Thinking"> Design Thinking
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Taxation"> Taxation
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Financial Services "> Financial Services
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areaqualify[]" value="Project Management "> Project Management
                        </div>


                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-12">
                        <b class="purple3">
                            Please indicate which of the following sector/industry areas you feel most qualified to offer support to SPEH & SPF?
                        </b>
                    </p>
                    <div class="col-sm-12">

                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Agriculture"> Agriculture
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Architecture, Furniture & Interior Decoration"> Architecture, Furniture & Interior Decoration
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Arts & Entertainment"> Arts & Entertainment
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Beauty & Fashion"> Beauty & Fashion
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Consulting & Professional Services"> Consulting & Professional Services
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Education"> Education
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Events Management"> Events Management
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Financial Services"> Financial Services
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Food & Beverages"> Food & Beverages
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Health care"> Health care
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Hospitality"> Hospitality
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Law"> Law
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Manufacturing"> Manufacturing
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Media & Advertising"> Media & Advertising
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Non-Profit"> Non-Profit
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Oil & Gas/ Energy"> Oil & Gas/ Energy
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Photography"> Photography
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Printing & Publishing"> Printing & Publishing
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Project Management"> Project Management
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Real Estate"> Real Estate
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Retail"> Retail
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Social Enterprise"> Social Enterprise
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Sports & Leisure"> Sports & Leisure
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Telecommunications"> Telecommunications
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Vocation and skills"> Vocation and skills
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="areasector[]" value="Other"> Other
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <p class="col-sm-12">
                        <b class="purple3">
                            Please select at most two courses you may wish to be a facilitator
                        </b>
                    </p>

                    <div class="col-xs-12">
                        @forelse($courses as $course)

                            <div class="col-sm-4">
                                <input type="checkbox" name="courset[]" value="{{ $course->id }}"> {{ $course->title }}
                            </div>
                        @empty
                            <p class="text-center">no course currently available</p>
                        @endforelse

                            <br>
                            <br>
                            <div class="col-sm-12">
                                <textarea type="checkbox" name="courset2" class="form-control" placeholder="state course(s) we dont have"></textarea>
                            </div>
                    </div>



                </div>

                <hr>
                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-sm btn-purple" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>


    </div>



@endsection
