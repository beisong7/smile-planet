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
                           @if($course->pay)
                               <h5 class="mt-3 mb-0"><b>{!! $pay !!}</b></h5>
                               <hr>
                               <h5 class="mt-3 mb-0"><b>Paid : ₦ {{ ucfirst($course->price) }}  </b></h5>
                               <br>
                           @endif

                       </div>


                   </div>
               </div>
           </div>
           <div class="col-md-8 col-lg-9">


               <div class="shadow-mild mb-5">
                   <div class="p-5">
                       @include('admin.layouts.error')

                       <div class="">
                           <h3 class="text-muted mb-0">
                               Confirm Payment for {{ $course->title }}
                           </h3>
                           <hr>
                           <h3>{!! $pay !!}</h3>
                           <p>{{ $message }}</p>

                           <hr>
                           <small>Personal Information | Information About Yourself</small>
                           <br>
                           <hr>
                           <div class="form-group mt-4 mb-5">
                               <div class="row">
                                   <div class="mb-2 col-md-12 col-sm-12">
                                       <b> Full Name </b>
                                       <input type="text" class="form-control" placeholder="Full Names" name="fullname" autocomplete="off"  value="{{ $client->names }}" disabled>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b> Email </b>
                                       <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="off" value="{{ $client->email }}" disabled>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Phone Number</b>
                                       <input type="text" class="form-control" placeholder="Phone Number" name="other_name" autocomplete="off" value="{{ $client->phone }}" disabled>
                                   </div>
                                   <div class="mb-2 col-md-6 col-sm-12">
                                       <b>Price for Course</b>
                                       <input type="email" class="form-control" placeholder="Your Email" name="email" autocomplete="off" value="NGN {{ $course->price }}" disabled>
                                   </div>

                               </div>
                           </div>

                           <div class="form-group ">
                               <div class="row">
                                   <div class="col-6">
                                       <a href="{{ route('home') }}" class="btn btn-secondary btn-block" style="border-radius: 0">Continue</a>

                                   </div>
                               </div>
                           </div>
                       </div>


                   </div>
               </div>

           </div>
       </div>



    </div>

@endsection

