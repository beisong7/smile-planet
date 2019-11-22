<?php
    $pagename = 'Volunteer';

?>

@extends('includes.app')

@section('content')
    <br>
    @include('includes.homecrumb')
    <br>
    <h1 class="t-color"><b> Volunteer </b></h1>
    <br>
    <div class="v-top">
        <p><small style="color: red">
                * Please kindly read through before filling, any wrong information/data will render this application
                invalid and ensure you upload a passport photograph of yourself.
            </small></p>
        <p class="purple">
            <b>
                We appreciate your interest to join our team as a volunteer which to us it’s highly welcome.
                Kindly fill the form below and lets have fun as we all work to together as a team with the sole arm to put
                smile on faces through redefining the defined. You are once more welcome to Smile Planet
                where we <span class="purple2"><strong>LEARN, CONNECT & GROW.</strong></span>
            </b>
        </p>
        <br>

    </div>
    @include('includes.error')
    <br>
    <div class="row dform" style="margin: 15px 0 100px 0;">
        <div class="col-md-12">
            <form class="form-horizontal purple" role="form" method="POST" action="{{ route('form.volunteer') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>
                        <h4><b>Personal Information</b></h4>
                    </legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">First Name * </label>
                        <div class="col-sm-4">
                            <input type="text" name="fname" placeholder="First Name" class="form-control" required>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Last Name * </label>
                        <div class="col-sm-4">
                            <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Title</label>
                        <div class="col-sm-4">
                            <select name="title" id="" required class="form-control">
                                <option value=""></option>
                                <option value="Ms.">Ms.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Gender * </label>
                        <div class="col-sm-4">
                            <input type="radio" placeholder="" class="" name="gender" value="Female"> Female
                            <input type="radio" placeholder="" class="" name="gender" value="Male" style="margin-left: 20px"> Male
                        </div>
                    </div>

                    <div class="form-group">
                        <label title="Date of Birth" class="col-sm-2 control-label" for="textinput">Age * </label>
                        <div class="col-sm-4">
                            <input type="date" name="dob" placeholder="Age" class="form-control" required>
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Passport </label>
                        <div class="col-sm-4">

                            <input id="imgInp"  type="file" placeholder="" class="btn" name="passport" style="" onchange="shwimg()" accept="image/*" >

                            <p><small style="color: red;"> * </small> <small>max 9mb ( .jpeg, .jpg, .png, .bmp )</small></p>

                            <div class=" list-group-item" style="max-width: 200px">
                                <img id="imgtoshow"  src="{{ url('img/person_default.png') }}" class="img-fit " alt="">
                            </div>
                        </div>

                    </div>


                    <br>

                    <!-- Form Name -->
                    <legend>
                        <h4><b>Business Information</b></h4>
                    </legend>



                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Business/Employer Name * </label>
                        <div class="col-sm-10">
                            <input type="text" name="busemp" placeholder="Business Employees" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Current Position </label>
                        <div class="col-sm-10">
                            <input type="text" name="pos" placeholder="Office Position" class="form-control">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textarea"> Office Address </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="oaddress" placeholder="Office Address" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">City * </label>
                        <div class="col-sm-10">
                            <input type="text" name="ocity" placeholder="City" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">State * </label>
                        <div class="col-sm-10">
                            <select name="ostate" class="form-control" id="" required>
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

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Zip-Code</label>
                        <div class="col-sm-10">
                            <input type="text" name="zipcode" placeholder="Zip - Code" class="form-control">
                        </div>
                    </div>


                    <legend>
                        <h4><b>Contact Information</b></h4>
                    </legend>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Mobile *</label>
                        <div class="col-sm-10">
                            <input type="number" name="tel1" placeholder="Mobile" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Telephone</label>
                        <div class="col-sm-10">
                            <input type="number" name="tel2" placeholder="Telephone" class="form-control">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Email * </label>
                        <div class="col-sm-10">
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Country * </label>
                        <div class="col-sm-10">
                            <input type="text" name="country" placeholder="Country" class="form-control" required>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">City</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" placeholder="City" class="form-control">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Address * </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="address" placeholder="Address" class="form-control" required></textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Website</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Website" name="website" class="form-control">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="textinput">Facebook</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Facebook" name="fbook" class="form-control">
                        </div>

                        <label class="col-sm-1 control-label" for="textinput">Instagram</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Instagram" name="igram" class="form-control">
                        </div>

                        <label class="col-sm-1 control-label" for="textinput">Twitter</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Twitter" name="tweeta" class="form-control">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">How did you hear about Us? *</label>
                        <div class="col-sm-10">
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" class="" value="Current professional mentors"> Current professional mentors
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Facebook" class=""> Facebook
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Twitter" class=""> Twitter
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="LinkedIn" class=""> LinkedIn
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Newspapers and Radio" class=""> Newspapers and Radio
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Volunteer in Nigeria" class=""> Volunteer in Nigeria
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Word of Mouth" class=""> Word of Mouth
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Blogs" class=""> Blogs
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Website" class=""> Website
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Jobberman" class=""> Jobberman
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Googleplus" class=""> Googleplus
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Startsomegood" class=""> Startsomegood
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Changemakers" class=""> Changemakers
                            </div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="hearhow[]" value="Other" class="hearhow_2"> Other
                            </div>

                            <div class="col-sm-12">
                                <br>
                                <input type="text" class="form-control" placeholder="Others" name="hearhow2">
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textarea">Core Competence *</label>
                        <div class="col-sm-10">
                            <p> Briefly tell us your area(s) of core competence which you intend to volunteer with us.</p>
                            <textarea type="text" name="oaddress" placeholder="Core competence" class="form-control" required></textarea>
                        </div>
                    </div>

                    <hr>

                    <p class="text-justify">
                        Thank you for applying to volunteer with Smile Planet Foundation (SPF) Please remember
                        to click the Submit Application button below. You will receive an automated email with confirmation of
                        your application. We will respond via phone and/or email within a week of a complete application.
                    </p>

                    <br>

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
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

@endsection
