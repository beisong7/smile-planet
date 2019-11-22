<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - <b>Course Applicants </b> - Preview';
$li_active['courses'] = 'active';
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
            <h3 class="title"><b>{{ $person->names }}</b></h3>

            <br style="margin: 0;padding: 0;">

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-sm btn-primary" href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a>
                </div>
            </div>
            <br>

            <div class="panel panel-default paper">
                <div class="panel-heading">
                    <small class="gray" > Registered {{ $person->created_at->diffForHumans() }}</small>
                </div>
                <div class="panel-body" style="">

                    <table id="mtable" class="table table-bordered table-responsive">
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Personal Details / Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Names : </b>{{ $person->names }}
                            </td>

                            <td style="width: 33%">
                                <b>Gender : </b>{{ ucfirst($person->gender) }}
                            </td>

                            <td style="width: 33%">
                                <b>Mobile : </b>{{ ucfirst($person->phone) }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Date of Birth : </b>

                                {{ !empty($person->dob)?date('M, Y', strtotime($person->dob)):'No Record Found' }}


                            </td>

                            <td style="width: 33%">
                                <b>Email : </b>{{ $person->email}}
                            </td>

                            <td style="width: 33%">

                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Country : </b>{{ $person->country}}
                            </td>

                            <td colspan="2">
                               <b> Address: </b>{{ $person->address }}
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>EXPECTATION</b></p>
                                <br>
                                {{ $person->course_expec }}

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>Education: </b> {{ $person->setedu() }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>Next of Kin Information</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Name: </b> {{ $person->nok_name }}
                            </td>
                            <td>
                                <b>Address: </b> {{ $person->nok_address }}
                            </td>
                            <td>
                                <b>Phone: </b> {{ $person->nok_phone }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>Questions Asked:</b> {{ $person->course_qst }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Status</b> {{ $person->status }}
                            </td>
                            <td>
                                <b>Course Applying For: </b> {{ $person->course('title') }}
                            </td>
                        </tr>

                    </table>
                </div>
                <br>

            </div>

        </div>
    </div>
@endsection