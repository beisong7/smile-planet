<?php
$active['application'] = 'imactive';
$csslinks = [''];
$url1 = route('console.app.fac');
$pagename = '<a href="'.$url1.'">Applications</a> / <a href="#">Consults</a> / previewing';
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
            <h3 class="title"><b>{{ $form->fullname()}}</b></h3>
            <p><small class="gray" title="{{ $form->created_at }}"> Applied {{ $form->created_at->diffForHumans() }}</small></p>
            <br style="margin: 0;padding: 0;">

            <div class="panel panel-default">
                <div class="panel-body" style="">

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Personal Details / Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <p><b>First name : </b> {{ $form->first_name}} </p>
                                <p><b>Surname: </b> {{ $form->surname}} </p>
                                <p><b>Other names : </b> {{ $form->other_name}} </p>
                            </td>
                            <td colspan="2">
                                <b>Mobile : </b>{{ ucfirst($form->phone) }}
                            </td>

                        </tr>
                        <tr>

                            <td style="width: 33%">
                                <b>Email : </b>{{ $form->email}}
                            </td>
                            <td colspan="2">
                                <b>Location : </b> {{ ucfirst($form->location) }}
                            </td>

                        </tr>
                        <tr>
                            <td colspan="3"><p class="text-center"><b>Business Information</b></p></td>
                        </tr>

                        <tr>
                            <td style="width: 50%">
                                <b>Business Type : </b> {{ ucfirst(str_replace('_', ' ', $form->bus_type )) }}

                            </td>
                            <td style="width: 50%">
                                <b>Business Category : </b>{{ $form->bus_category}}
                            </td>


                        </tr>
                        <tr>
                            <td colspan="3">
                                <b>Business Idea : </b> <br>
                                <p>
                                    {{ $form->bus_ideal}}
                                </p>
                            </td>

                        </tr>

                    </table>
                </div>
                <br>

            </div>
            <br>

        </div>
    </div>
@endsection