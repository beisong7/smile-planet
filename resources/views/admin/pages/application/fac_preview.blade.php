<?php
$active['application'] = 'imactive';
$csslinks = [''];
$url1 = route('console.app.fac');
$pagename = '<a href="'.$url1.'">Applications</a> - previewing';
$li_active['vol'] = 'active';
$jslinks = ['print.js?v='.$req['version']=0.03];
?>


@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-sm btn-primary" href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a>
        </div>
    </div>

    <div style="margin-top: 30px" class="paper">

        <div class="col-sm-12">
            <h3 class="title"><b>{{ $person->title .' '. $person->fname.' '.$person->lname}}</b></h3>
            <p><small class="gray" title="{{ $person->created_at }}"> Applied {{ $person->created_at->diffForHumans() }}</small></p>
            <br style="margin: 0;padding: 0;">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <b>
                    This Application has
                        @if($person->status==='no')
                            Not Been Attended to.
                        @elseif($person->status==='accepted' )
                            Been Attended to.
                        @endif
                    </b>
                        <br>

                </div>
                <div class="panel-body" style="">

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Personal Details / Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="list-group-item" style="width: 150px">
                                    <img class="img-fit" src="{{ url('uploads/'.$person->passport) }}" alt="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Names : </b>{{ $person->title .' '. ucfirst($person->fname).' '.ucfirst($person->lname) }}
                            </td>

                            <td style="width: 33%">
                                <b>Gender : </b>{{ ucfirst($person->gender) }}
                            </td>

                            <td style="width: 33%">
                                <b>Mobile : </b>{{ ucfirst($person->tel1) }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Date of Birth : </b>
                                @if($person->dob)
                                    {{ date('M, Y', strtotime($person->dob))  }}
                                @else
                                    No records found
                                @endif

                            </td>

                            <td style="width: 33%">
                                <b>Email : </b>{{ $person->email}}
                                @if($person->verify === "no" )

                                    <small style="color: red; border: 1px solid red; padding: 3px; border-radius: 16px"> not verified </small>

                                @else

                                    <small style="color: green; border: 1px solid green; padding: 3px; border-radius: 16px"> verified </small>

                                @endif
                            </td>

                            <td style="width: 33%">
                                <b>Telephone : </b>{{ $person->tel2 }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Country : </b>{{ $person->country}}
                            </td>

                            <td style="width: 33%">
                                <b>City : </b>{{ $person->state}}
                            </td>

                            <td style="width: 33%">
                                <b>Address : </b>{{ $person->address }}
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b> Educational Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Undergraduate? : </b>{{ $person->edu_grad}}
                            </td>

                            <td colspan="2">
                                <b>Discipline : </b>{{ $person->edu_course}}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Post Graduate? : </b>{{ $person->edu_pgrad }}
                            </td>

                            <td colspan="2">
                                <b>Post Graduate Course : </b>{{ $person->edu_pcourse }}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b> Job Description</b></p>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 33%">
                                <b>Current Job Role: </b>{{ $person->jobrole}}
                            </td>

                            <td style="width: 33%">
                                <b>Current Workplace: </b>{{ $person->cur_busname}}
                            </td>

                            <td style="width: 33%">
                                <b>Other Skills </b>{{ $person->other_skill }}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Other Information</b></p>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 33%">
                                <b>Available for Monthly Seminars/Outreach: </b>{{ $person->oavailable}}
                            </td>

                            <td colspan="2">
                                <b>Available For : </b>{{ $person->oavailable2}}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 33%">
                                <b>Commit to Duties: </b>{{ $person->fduty}}
                            </td>

                            <td colspan="2">
                                <b>Committed For : </b>{{ $person->fduty2}}
                            </td>
                        </tr>


                        <tr>
                            <td colspan="3">
                                <b>Skill Requirement :</b> {{ $person->skilreq }}
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 33%">
                                <b>Hobbies </b>{{ $person->skilnhobby}}
                            </td>

                            <td style="width: 33%">
                                <b>Counselling Reason </b>{{ $person->rea4app}}
                            </td>

                            <td style="width: 33%">
                                <b>Role Expectations </b>{{ $person->exp4role }}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Heard About Us Through</b></p><br>
                                @foreach(explode('_', $person->hearhow) as $value)
                                    <li class="text-center col-xs-4">{{ $value }}</li>
                                @endforeach

                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Heard Through Other Means</b></p><br>
                                <p class="text-center">{{ $person->hearhow2 }}</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Socials</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Facebook : </b>{{ $person->fbook}}
                            </td>

                            <td style="width: 33%">
                                <b>Instagram : </b>{{ $person->igram}}
                            </td>

                            <td style="width: 33%">
                                <b>Twitter : </b>{{ $person->tweeta }}
                            </td>


                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Website : </b>{{ $person->website }}
                            </td>
                        </tr>
                        <tr class="noprint">
                            <td colspan="3">
                                <p class="text-center"><b>Action</b></p>
                            </td>
                        </tr>
                        <tr class="noprint">
                            <td class="text-center">
                                <a href="" class="btn btn-xs btn-success">Accept Applciation</a>

                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-xs btn-warning">Deny Application</a>
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-xs btn-danger">Delete Application</a>
                            </td>
                        </tr>

                    </table>
                </div>
                <br>

            </div>
            <br>
            @if(!empty($person->extra))
            <div class="panel panel-default">
                <div class="panel-body" style="">

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Extra Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Areas of Interest at SPEC</b></p>
                                <hr>
                                @foreach(explode('_', $person->extra->areatofac) as $value)
                                    <li class="col-sm-4">{{ $value }}</li>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Convenient Days</b></p>
                                <hr>
                                @foreach(explode('_', $person->extra->yourdays) as $value)
                                    <li class="col-sm-4">{{ ucfirst($value) }}</li>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Available Immediately?</b></p>
                                <hr>
                                <?php
                                    if($person->extra->beava!=='yes'){?>
                                        No
                                        <br>
                                    <?php
                                echo !empty($person->extra->beava2) ? 'I will be available on ' . date('F d, Y', strtotime($person->extra->beava2)): '';
                                    }else{
                                        ?>
                                Yes, I will be available
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>State Available to Facilitate</b></p>
                                <hr>
                                {{ $person->extra->state }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Functional Areas of Strength for SPEC Support</b></p>
                                <hr>
                                @foreach(explode('_', $person->extra->areaqualify) as $value)
                                    <li class="col-sm-4">{{ $value }}</li>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Sector/Industry Areas More Competent for SPEC Support</b></p>
                                <hr>
                                @foreach(explode('_', $person->extra->areasector) as $value)
                                    <li class="col-sm-4">{{ $value }}</li>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Courses Able To Teach</b></p>
                                <hr>
                                @foreach(explode('_', $person->extra->courset) as $value)
                                    <li class="col-sm-4">{{ $person->courseTitle($value) }}</li>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class=""><b>Courses Not Available at SPEC</b></p>
                                <hr>
                                <p class="col-sm-12">{{ $person->extra->courset2 }}</p>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
            <br>
            @endif

            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
@endsection