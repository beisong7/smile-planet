<?php
$pagename = 'Facilitator';
?>

@extends('includes.app')

@section('content')
    <br>
    @include('includes.homecrumb')

    <br>
    <h1 class="t-color"><b> Facilitator </b></h1>
    <h3 class="purple text-center">SPEH’s FACILITATOR /COUNSELLOR APPLICATION FORM </h3>
    <p class="text-center"><small> (LEARN, CONNECT & GROW PROGRAM) </small></p>
    <p>
        <small style="color: red">
            * Please kindly read through before filling, any wrong information/data will render this application
            invalid and ensure you upload a passport photograph of yourself.
        </small>
    </p>
    <hr>
    <p class="text-justify" style="line-height: 30px;">
        We appreciate your interest to join our team & to be a Professional career Facilitator /Counsellor (Mentor)
        your role as a professional Facilitator /Counsellor (mentor) will involve supporting a mentee studying in our
        paid HUB trainings or Free FOUNDATION programs. All mentees are participants in our trainings & outreach
        program which is either paid/free Employability skill development, Career mentoring, Technical, Life Coaching,
        Vocation & Skills, Entrepreneurship, Leadership & Governance ,Educational support to participants for a specific
        duration. We welcome mentors from all career fields with minimum 3years experience, who have a good communication
        skill.
    </p>
    <br>
    <p>
        <b class="purple">WHAT IS REQUIRED TO BE A FACILITATOR /COUNSELLOR</b>
    </p>
    <div class="text-justify">
        <p> 1) Facilitator /Counsellor are to attend our quarterly seminar training.</p>
        <p> 2) Facilitator /Counsellor must have an active email and a reachable contact phone line 24/7.</p>
        <p> 3) Facilitator /Counsellor are to have minimum 3years experience and have a good communication skill.</p>
        <p> 3) Facilitator /Counsellor will be sent a mentoring starter guide including participant’s protection rules, mentoring objectives, the communication procedure and all other questions about the mentoring process.</p>
        <p> 4) Facilitator /Counsellor are to maintain close professional training & first contact with participants (mentees).</p>
        <p> 5) Facilitator /Counsellor are to give a summary report weekly by email on discussions had with the mentee and support offered in case of secondary school students only.</p>
        <p> 6) Facilitator /Counsellor are automatic members of the general assembly which holds every month to determine the impact of the mentoring relationship and re-assess if need be for any changes or restructuring.</p>
        <p> 7) Facilitator /Counsellor are expected to have a clear insight about Smile Planet Entrepreneurs Hub (Paid trainings) & Smile Planet Foundation (Free trainings).</p>
        <p> 8) Facilitator /Counsellor Contract with the HUB/FOUNDATION is for a duration of minimum one year which is subject to renewal (but can be terminated before the one year elapse, on grounds of gross misconduct). </p>
        <p> 9) Facilitator /Counsellor must demonstrate a high level of knowledge in their area of specialization and are to prepare their training materials in line with the HUB/FOUNDATION requirement.</p>

    </div>
    @include('includes.error')

    <br>
    <div class="col-md-12">
        <form class="form-horizontal purple" role="form" method="POST" action="{{ route('form.facilitator') }}" enctype="multipart/form-data">
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
                    <label class="col-sm-2 control-label" for="textinput">Title *</label>
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
                        <input type="radio" placeholder="" class="" name="gender" value="Female" checked required> Female
                        <input type="radio" placeholder="" class="" name="gender" value="Male" style="margin-left: 20px" required> Male
                    </div>
                </div>

                <div class="form-group">
                    <label title="Date of Birth" class="col-sm-2 control-label" for="textinput">Age * </label>
                    <div class="col-sm-4">

                        <div class="form-inline col-md-12">
                            <div class="form-group">
                                <select name="dob_d" class="form-control" required>
                                    <option value="">Day</option>
                                    <?php
                                    for($i = 1; $i <= 31; $i++){
                                    if(@$_POST['d'] == $i){
                                    echo '<option selected value="'.$i.'">'.sprintf('%02d', $i).'</option>';
                                    } else {
                                    echo '<option value="'.$i.'">'.sprintf('%02d', $i).'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="dob_m" class="form-control" required>
                                    <option value="">Month</option>
                                    <?php
                                    for($i = 1; $i <= 12; $i++){
                                    if(@$_POST['m'] == $i){
                                    echo '<option selected value="'.$i.'">'.sprintf('%02d', $i).'</option>';
                                    } else {
                                    echo '<option value="'.$i.'">'.sprintf('%02d', $i).'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" >
                                <select name="dob_y" class="form-control" required>
                                    <option value="0">Year</option>
                                    <?php
                                    $curY = (date('Y', time()) - 13);
                                    for($i = $curY; $i >= 1900; $i--){
                                        if(@$_POST['y'] == $i){
                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                    } else {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <label class="col-sm-2 control-label" for="textinput">Passport *</label>
                    <div class="col-sm-4">
                        <input id="imgInp"  type="file" placeholder="" class="" name="passport" style="" onchange="shwimg()" accept="image/*" required>
                        <p><small style="color: red;"> * </small> <small>max 9mb ( .jpeg, .jpg, .png, .bmp )</small></p>
                        <div class=" list-group-item" style="max-width: 200px">
                            <img id="imgtoshow"  src="{{ url('img/person_default.png') }}" class="img-fit " alt="">
                        </div>
                    </div>

                </div>


                <br>

                <!-- Form Name -->

                <legend>
                    <h4><b>Educational Information</b></h4>
                </legend>



                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Discipline/Course at University (Undergraduate) *</label>
                    <div class="col-sm-9">
                        <input type="text" name="edu_course" placeholder="" class="form-control" required>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">University (Undergraduate) *</label>
                    <div class="col-sm-9">
                        <select name="edu_grad" id="" required class="form-control">
                            <option value=""></option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textarea">Discipline/Course at University (Postgraduate)</label>
                    <div class="col-sm-9">
                        <input type="text" name="edu_pcourse" placeholder="" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">University (Postgraduate) *</label>
                    <div class="col-sm-9">
                        <select name="edu_pgrad" id="" required class="form-control">
                            <option value=""></option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Current Job Role * </label>
                    <div class="col-sm-9">
                        <input type="text" name="jobrole" placeholder="" class="form-control" required>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Name of Current Organisation/Enterprise/Non-profit/Partnership/Business *</label>
                    <div class="col-sm-9">
                        <input type="text" name="cur_busname" placeholder="" class="form-control" required>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Other Professional Courses and Training</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="other_skill" placeholder="" class="form-control" required></textarea>
                    </div>
                </div>


                <legend>
                    <h4><b>Other Information</b></h4>
                </legend>



                <!-- Text input-->

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textarea">Will you be available for our monthly & quarterly seminar training and outreaches ? *</label>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <input type="radio" placeholder="" class="" required name="oavailable" value="Yes"> Yes
                            <input type="radio" placeholder="" class="" required name="oavailable" value="No" style="margin-left: 20px"> No
                            <input type="radio" placeholder="" class="" required name="oavailable" value="Other" style="margin-left: 20px"> Other
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Other" name="oavailable2">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textarea"> Can you commit to the duties required? * </label>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <input type="radio" required placeholder="" class="" name="fduty" value="Yes"> Yes
                            <input type="radio" required placeholder="" class="" name="fduty" value="No" style="margin-left: 20px"> No
                            <input type="radio" required placeholder="" class="fduty_other" name="fduty" value="Other" style="margin-left: 20px"> Other
                        </div>
                        <div class="col-sm-8">
                            <input type="text"  class="form-control" placeholder="Other" name="fduty2">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Skills requirements </label>
                    <div class="col-sm-9">
                        <label class="control-label" for="textinput">Please explain how you meet the skills requirements with examples *</label>
                        <p>The Skills Requirements are: 1) One-to-one coaching and counselling 2) Communication and listening 3) Interpersonal and Relationship building</p>
                        <div class="">
                            <textarea type="text" name="skilreq" placeholder="" class="form-control" ></textarea>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Skills and Hobbies</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="skilnhobby" placeholder="" class="form-control" required ></textarea>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Why are you applying to become a Professional career counsellor (Mentor)? </label>
                    <div class="col-sm-9">
                        <textarea type="text" name="rea4app" placeholder="" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">What are your expectations of the role? *</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="exp4role" placeholder="" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">How did you hear about Us? *</label>
                    <div class="col-sm-9">
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
                    <label class="col-sm-2 control-label" for="textinput">State *</label>
                    <div class="col-sm-10">

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
                        <input type="text" placeholder="example: www.example.com" name="website" class="form-control">
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
                        <input type="text" placeholder="Twitter" name="twitter" class="form-control">
                    </div>
                </div>

                <legend>
                    <h4><b>Referee Information</b></h4>
                </legend>
                <b>Academic Referees *</b>
                <div class="form-group">
                    <label class="col-sm-1 control-label" for="textinput"><small>Name</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="arname" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Organisation</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="arorganisation" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Position</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="arposition" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Email</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="aremail" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Phone</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="arphone" class="form-control">
                    </div>
                </div>

                <b>Professional Referees *</b>
                <div class="form-group">
                    <label class="col-sm-1 control-label" for="textinput"><small>Name</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="prname" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Organisation</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="prorganisation" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Position</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="prposition" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Email</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="premail" class="form-control">
                    </div>
                    <label class="col-sm-1 control-label" for="textinput"><small>Phone</small></label>
                    <div class="col-sm-5 form-group">
                        <input required type="text" placeholder="" name="prphone" class="form-control">
                    </div>
                </div>

                <hr>


                <p class="text-justify">
                    Thank you for applying as a Facilitator in <span class="purple3">Smile Planet Entrepreneurs Hub (SPEH)</span>. Please remember
                    to click the Submit Application button below. You will receive an email to complete your application process.
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
    </div>





@endsection
