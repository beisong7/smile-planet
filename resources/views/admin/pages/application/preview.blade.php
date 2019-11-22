<?php
$active['application'] = 'imactive';
$csslinks = [''];
$url1 = route('console.app.fac');
$url2 = route('console.app.vol');
$pagename = '<a href="'.$url1.'">Applications</a> / <a href="'.$url2.'">Volunteer</a> / previewing';
$li_active['vol'] = 'active';
$jslinks = ['print.js?v='.$req['version']=0.03];
?>


@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <br>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-sm btn-primary" href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a>
        </div>
    </div>

    <div style="margin-top: 30px" class="paper">

        <div class="col-sm-12">
            <h3 class="title"><b>{{ $form->title .' '. $form->fname.' '.$form->lname}}</b></h3>
            <p><small class="gray" title="{{ $form->created_at }}"> Applied {{ $form->created_at->diffForHumans() }}</small></p>
            <br style="margin: 0;padding: 0;">

            <div class="panel panel-default">
                <div class="panel-heading">

                    <b>
                    This Application has
                        @if($form->status==='no')
                            Not Been Attended to.
                        @elseif($form->status==='accepted' )
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
                                    <img class="img-fit" src="{{ url('uploads/'.$form->image) }}" alt="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Names : </b>{{ $form->title .' '. ucfirst($form->fname).' '.ucfirst($form->lname) }}
                            </td>

                            <td style="width: 33%">
                                <b>Gender : </b>{{ ucfirst($form->gender) }}
                            </td>

                            <td style="width: 33%">
                                <b>Mobile : </b>{{ ucfirst($form->tel1) }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Date of Birth : </b>
                                @if($form->dob)
                                    {{ date('M, Y', strtotime($form->dob))  }}
                                @else
                                    No records found
                                @endif

                            </td>

                            <td style="width: 33%">
                                <b>Email : </b>{{ $form->email}}
                                @if($form->verify === "no" )

                                    <small style="color: red; border: 1px solid red; padding: 3px; border-radius: 16px"> not verified </small>

                                @else

                                    <small style="color: green; border: 1px solid green; padding: 3px; border-radius: 16px"> verified </small>

                                @endif
                            </td>

                            <td style="width: 33%">
                                <b>Telephone : </b>{{ $form->tel2 }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Country : </b>{{ $form->country}}
                            </td>

                            <td style="width: 33%">
                                <b>City : </b>{{ $form->city}}
                            </td>

                            <td style="width: 33%">
                                <b>Address : </b>{{ $form->address }}
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Office Details / Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Employer : </b>{{ $form->busemp}}
                            </td>

                            <td style="width: 33%">
                                <b>Position : </b>{{ $form->pos}}
                            </td>

                            <td style="width: 33%">
                                <b>Office Address : </b>{{ $form->oaddress }}
                            </td>

                        </tr>

                        <tr>
                            <td style="width: 33%">
                                <b>Office City : </b>{{ $form->ocity}}
                            </td>

                            <td style="width: 33%">
                                <b>Office State : </b>{{ $form->ostate}}
                            </td>

                            <td style="width: 33%">
                                <b>Office Zip Code : </b>{{ $form->zipcode }}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Socials</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Facebook : </b>{{ $form->fbook}}
                            </td>

                            <td style="width: 33%">
                                <b>Instagram : </b>{{ $form->igram}}
                            </td>

                            <td style="width: 33%">
                                <b>Twitter : </b>{{ $form->tweeta }}
                            </td>


                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Website : </b>{{ $form->website }}
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

        </div>
    </div>
@endsection