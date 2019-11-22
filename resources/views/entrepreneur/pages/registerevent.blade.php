<?php
$jslinks = ['main.js'];

$pagename = "<b>" .$program->title . "</b> - Registration" ;
$titlename = 'Event Registration - '.$program->title;

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
            <div class="col-sm-3" ><img class="img-fit" src="{{ url('uploads/'.$program->gallery->url) }}" alt="image"></div>
        </div>

        <br>
        <h1 class="purple2"><b> {{ $program->title }} Registration</b></h1>
        <br>
        <p class="purple3"><b>Guidelines</b></p>

        <p>1. Kindly come along with your writing materials.</p>

        <p>2. Please come on time to the venue for proper registration before kick off time</p>

        <p>3. For more information, kindly call <span class="purple3"><b>07033461426, 07032998069</b></span> or send a mail to <span class="purple3"><b>mails@smileplanetef.org</b></span></p>

        <hr>
        <br>
        <form class="form-horizontal purple" role="form" method="POST" action="{{ route('event.register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>
                <input type="hidden" name="program_id" required value="{{ $program->id }}">
                <!-- Form Name -->
                <legend>
                    <h4><b>Personal Information</b></h4>
                </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Title *</label>
                    <div class="col-sm-4">

                        <select name="title" id="" class="form-control" required>
                            <option value=""></option>
                            <option value="Ms.">Ms.</option>
                            <option value="Miss.">Miss.</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                        </select>
                    </div>

                    <label class="col-sm-2 control-label" for="textinput">First Name * </label>
                    <div class="col-sm-4">
                        <input type="text" name="fname" placeholder="First Name" class="form-control" required>
                    </div>


                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Last Name * </label>
                    <div class="col-sm-4">
                        <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
                    </div>

                    <label class="col-sm-2 control-label" for="textinput">Email * </label>
                    <div class="col-sm-4">

                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>


                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Telephone * </label>
                    <div class="col-sm-4">
                        <input type="text" name="telephone" placeholder="Phone number" class="form-control" required>
                    </div>

                    <label class="col-sm-2 control-label" for="textinput">Location</label>
                    <div class="col-sm-4">
                        <input type="text" name="location" placeholder="Current Location" class="form-control" >
                    </div>

                </div>

                <!-- Form Name -->

                <legend>
                    <h4><b>Other Information</b></h4>
                </legend>



                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Gender </label>
                    <div class="col-sm-4">
                        <input type="radio" placeholder="" class="" name="gender" value="Female" checked> Female
                        <input type="radio" placeholder="" class="" name="gender" value="Male" style="margin-left: 20px"> Male
                    </div>

                    <label title="Date of Birth" class="col-sm-2 control-label" for="textinput">Age </label>
                    <div class="col-sm-4">
                        <div class="form-inline">
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
                                    $curY = (date('Y', time()) - 15);
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

                        {{--<input type="date" name="dob" placeholder="Age" class="form-control">--}}
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">How did you know about this Event?</label>
                    <div class="col-sm-10">

                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" class="" value="Our Website"> Our Website
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Facebook" class=""> Facebook
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Instagram" class=""> Instagram
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Twitter" class=""> Twitter
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Word of Mouth" class=""> Word of Mouth
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Linkedin" class=""> Linkedin
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Television" class=""> Television
                        </div>
                        <div class="col-sm-4">
                            <input type="checkbox" name="hearhow[]" value="Radio" class=""> Radio
                        </div>


                    </div>

                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textarea">What are the expectations from this event? * </label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" placeholder="" name="expectation" required></textarea>
                    </div>

                </div>
                <br>
                <br>
                @if($program->hascert==='yes')
                    <legend>
                        <h4><b>Certification</b></h4>
                    </legend>
                    <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">
                            <p>Would you love to be issued Certificate of Participant & Further Business Leverages?</p>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="">
                                <div class="col-sm-4">
                                    <input onclick="$('.wantcert').slideUp()" type="radio" placeholder="" class="" name="certificate" value="no" checked style="margin-left: 20px"> No
                                    <input onclick="$('.wantcert').slideDown()" type="radio" placeholder="" class="" name="certificate" value="yes"  style="margin-left: 20px"> Yes
                                </div>
                                <br>
                                <br>
                                <div class="row wantcert" style="display: none">
                                    <div class="col-md-12">
                                        <p>
                                            The fee is <b> N2000</b> kindly make payment to <b>SMILE PLANET FOUNDATION ZENITH BANK 1015874358</b> ,
                                            come along to the conference with evidence of payment screen-shot or bank teller
                                            <b>(07033461426 for details)</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif




                <hr>

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
        <a href="{{ route('entrepreneur') }}" class="btn btn-sm btn-info">Home</a>


    </div>
@endsection
