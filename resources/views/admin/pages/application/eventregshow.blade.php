<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - <b>EventRegistration</b> - Preview';
$li_active['eventreg'] = 'active';
$jslinks = ['print.js?v='.$req['version']=0.03];

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div class="">
        @include('admin.layouts.application_nav')
    </div>

    <div style="margin-top: 30px">

        <div class="col-sm-12">
            <h3 class="title"><b>{{ $eventreg->title .' '. $eventreg->fname.' '.$eventreg->lname}}</b></h3>

            <br style="margin: 0;padding: 0;">

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-sm btn-primary" href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a>
                </div>
            </div>
            <br>

            <div class="panel panel-default paper">
                <div class="panel-heading">
                    <p><small class="gray" > Registered {{ $eventreg->created_at->diffForHumans() }}</small></p>
                </div>
                <div class="panel-body" style="">

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Personal Details / Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Names : </b>{{ $eventreg->title .' '. ucfirst($eventreg->fname).' '.ucfirst($eventreg->lname) }}
                            </td>

                            <td style="width: 33%">
                                <b>Gender : </b>{{ ucfirst($eventreg->gender) }}
                            </td>

                            <td style="width: 33%">
                                <b>Mobile : </b>{{ ucfirst($eventreg->telephone) }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Date of Birth : </b>
                                @if($eventreg->dob)
                                    {{ date('M, Y', strtotime($eventreg->dob))  }}
                                @else
                                    No records found
                                @endif

                            </td>

                            <td style="width: 33%">
                                <b>Email : </b>{{ $eventreg->email}}
                            </td>

                            <td style="width: 33%">

                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Location : </b>{{ $eventreg->location}}
                            </td>

                            <td colspan="2">
                               <b>Expectation : </b>{{ $eventreg->expectation }}
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>How you heard of this event</b></p>
                                <br>
                                @foreach(explode('_', $eventreg->hearhow) as $value)
                                    <li class="col-sm-4">{{ $value }}</li>
                                @endforeach
                            </td>
                        </tr>

                    </table>
                </div>
                <br>

            </div>

        </div>
    </div>
@endsection