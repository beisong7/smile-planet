<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - Facilitators';
$li_active['fac'] = 'active';
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
            <h3 class="title"> Facilitators registered for <b> {{ $course->title }}</b></h3>
            <p><small class="gray">Find Facilitators on the smileplanetef.org domain. </small></p>
            <small class="gray">Pages</small>
            <br>
            <br>
            <div class="btn-group ">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('get.excel.others', 'facilitator') }}" id="download_excell">Download Excel <i class="fa fa-file-excel-o"></i></a></li>
                    {{--<li><a href="#NotWorkingYt">Download PDF <i class="fa fa-file-pdf-o"></i></a></li>--}}
                    {{--<li><a href="#NotWorkingYt">Mail to</a></li>--}}
                    <li role="separator" class="divider"></li>
                    <li><a href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a></li>
                </ul>
            </div>


            <hr>
            {{--{{ $facilitators->links() }}--}}
            <br>

            <div class="panel panel-default paper">
                <div class="panel-heading">
                    Facilitators
                </div>

                <div class="panel-body" style="">
                    <table id="mtable" class="table table-hover table-striped table-bordered">

                        <thead class="">
                        <tr>
                            {{--<th>#</th>--}}
                            <th title="I P Address">Names</th>
                            <th title="Device Used">Telephone</th>
                            <th title="Country">State/Country</th>

                            <th title="the visited url">Email</th>

                            <th title="Time Visited">Registered</th>
                            <th class="noprint">

                                <span class="">Action</span>

                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($facilitators as $person)
                            <tr>

                                <td>
                                    {{ $person->title . ' '. $person->fname ." ".  $person->lname }}
                                </td>

                                <td>
                                    {{ $person->tel1 }}
                                </td>

                                <td>
                                    {{ $person->country .",  ".$person->city  }}
                                </td>

                                <td>

                                    {{ $person->email }}

                                    @if($person->verify === "no" )

                                        <span style="color: red;"> ✖ </span>

                                    @else

                                        <span style="color: green;"> ✔ </span>

                                    @endif

                                </td>

                                <td>
                                    {{ date('F d, Y ', strtotime($person->created_at))}}
                                </td>

                                <td class="noprint">
                                    <div class="">
                                        <a href="{{ route('facilitator.preview', $person->id) }}" class="btn btn-xs btn-info"> Preview </a>

                                        <form action="{{ route('facilitator.delete', $person->id) }}" method="post" style="display: inline;">
                                            {{ csrf_field() }}
                                            <input name="volunteer" value="{{ $person->id }}" type="text" class="hidden" >
                                            <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                        </form>
                                    </div>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    No Application Found.
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection