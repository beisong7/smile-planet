<?php $pagename = 'About Us'; ?>

@extends('v2.layout.appv2')

@section('content')
    <!-- Home -->

    <div class="col-md-10 col-md-offset-1 container mb-5" style="margin-top: 200px">


       <div class="row ">
           <div class="col-md-4 col-lg-3">
               <div class="card shadow-mild mb-5" style="">
                   <div class="card-body">

                       <h4 class="text-center">{{ ucfirst($details->type) }}</h4>


                       @foreach($members as $member)
                           <a href="{{ route('home.about',['type'=>$member->type, 'link'=>$member->link ]) }}" class=" btn btn-outline-purple btn-sm mb-2 btn-block {{ $details->type===$member->type?'btn-active':'' }}">{{ ucwords($member->title) }}</a>
                       @endforeach

                   </div>
               </div>
           </div>
           <div class="col-md-8 col-lg-9">


               <div class="shadow-mild mb-5">
                   <div>
                       <img src="{{ url('uploads/'.$details->image) }}" alt="" class="img-fit">
                   </div>
                   <div class=" " style="padding: 0;">
                       <div class="" style="padding: 10px 20px; margin: 0; line-height: 30px">
                           <h3 class="mt-3 mb-3"><b> {{ ucfirst($details->title) }} </b></h3>

                           <p class="mb-4">{!! $details->info !!}</p>
                       </div>
                   </div>
                   @include('v2.component.course_reg_btn')
               </div>

               <br>
               @if(!empty($details->relative))
                   <h3 class="text-center">
                       {{ !empty($details->people())?$details->title:'' }}
                   </h3>
                   <div class="row mt-5">
                       @foreach($details->people() as $person)
                           <div class="col-sm-6 col-xs-12">
                               <div class="card shadow-mild">
                                   <div class=" box no-margin no-padding img-center card-img-top">
                                       <div class="contents">
                                           <img class="img-sit" src="{{ url('uploads/'. $person->gallery->url) }}" alt="">
                                       </div>

                                   </div>
                                   {{--<img src="{{ url('uploads/'.$person->gallery->url) }}" class="card-img-top" alt="...">--}}
                                   <div class="card-body">
                                       <h3>{{ $person->names }}</h3>
                                       <h5>{{ !empty($person->pos)?$person->pos:'Team Member' }}</h5>
                                       <p class="card-text">{{ $person->o_details }}</p>
                                   </div>
                               </div>
                           </div>
                       @endforeach
                   </div>
               @endif


           </div>
       </div>



    </div>

@endsection

