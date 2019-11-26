<?php $pagename = 'About Us'; ?>

@extends('v2.layout.appv2')

@section('content')
    <!-- Home -->

    <div class="col-md-10 col-md-offset-1 container mb-5" style="margin-top: 200px">


       <div class="row ">
           <div class="col-md-4 col-lg-3">
               <div class="shadow-mild mb-5">
                   <div>
                       <img src="{{ url('uploads/'.$course->image) }}" alt="" class="img-fit">
                   </div>
                   <div class=" " style="padding: 0;">
                       <div class="" style="padding: 10px 20px; margin: 0; line-height: 30px">
                           <h5 class="mt-3 mb-3"><b> {{ ucfirst($course->title) }} </b></h5>
                           <a href="{{ route('home.about',['type'=>$course->type, 'link'=>$course->link ]) }}" class="">back</a>
                       </div>


                   </div>
               </div>
           </div>
           <div class="col-md-8 col-lg-9">


               <div class="shadow-mild mb-5">
                   <div class="p-5">
                       @include('admin.layouts.error')
                       <h3 class="text-muted mb-0">
                           Register for {{ $course->title }}
                       </h3>
                       <p>Smile Planet Course Registration Form</p>

                       @if(empty($end_message))
                       <form action="{{ route('complete.course.reg', [$course->link, $course->type]) }}" method="post">
                           {{ csrf_field() }}


                           <hr>
                           <small>Personal Information | Information About Yourself</small>
                           <br>
                           <hr>
                           <div class="form-group mt-4 mb-5">
                               <div class="row">
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>First Name</b>
                                       <input type="text" class="form-control" placeholder="First Name" name="first_name" autocomplete="off" required>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Surname</b>
                                       <input type="text" class="form-control" placeholder="Surname" name="surname" autocomplete="off" required>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Other Name</b>
                                       <input type="text" class="form-control" placeholder="Other Name" name="other_name" autocomplete="off">
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Your Email</b>Your Email
                                       <input type="email" class="form-control" placeholder="Your Email" name="email" autocomplete="off" required>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Phone Number</b>
                                       <input type="text" class="form-control" placeholder="Phone Number" name="phone" autocomplete="off" required>
                                   </div>
                               </div>
                           </div>

                           <hr class="mt-5">
                           <small>Business/Company Information | Tell us about your business</small>
                           <br>
                           <hr>

                           <div class="form-group mt-4">
                               <div class="row">
                                   <div class=" col-md-6 col-sm-12">
                                       <b>Is your business a startup or Existing already?</b>
                                       <br>
                                       Idea <input type="radio" value="idea" name="bus_type" style="margin-right: 10px" required>
                                       Start-Up <input type="radio" value="start_up" name="bus_type" style="margin-right: 10px" required>
                                       Existing <input type="radio" value="existing" name="bus_type" style="margin-right: 10px" required>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group mt-0">
                               <div class="row">
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Business Name</b>
                                       <input type="text" class="form-control" placeholder="Business Name" name="bus_name" autocomplete="off">
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Business Category</b>
                                       <input type="text" class="form-control" placeholder="Business Category" name="bus_category" autocomplete="off">
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Business Phone Number</b>
                                       <input type="text" class="form-control" placeholder="Business Phone Number" name="bus_phone" autocomplete="off">
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Business Email</b>
                                       <input type="text" class="form-control" placeholder="Business Email" name="bus_email" autocomplete="off">
                                   </div>
                                   <div class="mb-2 col-sm-12">
                                       <b>Business Address</b>
                                       <textarea type="text" class="form-control" placeholder="Business Address" name="bus_address" autocomplete="off"></textarea>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Number of Employee</b>
                                       <input type="text" class="form-control" placeholder="Number of Employee" name="num_employee" autocomplete="off">
                                   </div>

                               </div>
                           </div>

                           <div class="form-group ">
                               <div class="row">
                                   <p class="col-md-12"><b>Which of the following does your business have?</b></p>
                                   <div class="mb-2 col-sm-12">
                                       <input type="checkbox" name="bus_certs[]" value="CAC_Certificae" class="ml-3"> <span>CAC Certificae</span>
                                       <input type="checkbox" name="bus_certs[]" value="NAFDAC_Certificae" class="ml-3"> <span>NAFDAC Certificae</span>
                                       <input type="checkbox" name="bus_certs[]" value="SON_Certificae" class="ml-3"> <span>SON Certificae</span>
                                       <input type="checkbox" name="bus_certs[]" value="TIN_&_FIRS_Certificae" class="ml-3"> <span>TIN & FIRS Certificae</span>
                                   </div>
                                   <div class="mb-2 col-sm-12">
                                       <input type="checkbox" name="bus_certs[]" value="Export/Import_Certificae" class="ml-3"> <span>Export/Import Certificae</span>
                                       <input type="checkbox" name="bus_certs[]" value="Others" class="ml-3"> <span>Others</span>
                                       <input type="checkbox" name="bus_certs[]" value="None" class="ml-3"> <span>None</span>
                                   </div>
                               </div>
                           </div>
                           <div class="form-group ">
                               <div class="row">
                                   <div class="mb-2 col-sm-12">
                                       <b>Have you attended any of our program(s) in the past? (If yes, please specify)</b>
                                       <textarea type="text" class="form-control" placeholder="Programs Attended" name="prog_attended" autocomplete="off"></textarea>
                                   </div>
                               </div>
                           </div>

                           <div class="form-group ">
                               <div class="row">
                                   <div class="col-6">
                                       <button type="submit" class="btn btn-secondary btn-block" style="border-radius: 0">Submit </button>

                                   </div>
                               </div>
                           </div>


                       </form>
                       @else
                           <h5 class="text-center">{{ $end_message }}</h5>
                       @endif
                   </div>
               </div>

           </div>
       </div>



    </div>

@endsection

