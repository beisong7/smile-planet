<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - Volunteer';
$li_active['vol'] = 'active';
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
            <h3 class="title"><b>Volunteer</b></h3>
            <p><small class="gray">Find Volunteer on the smileplanetef.org domain. </small></p>
            <small class="gray">Pages</small>
            <br style="margin: 0;padding: 0;">
            {{--{{ $volunteers->links() }}--}}
            <br>
            <div class="btn-group ">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('get.excel.others', 'volunteer') }}" id="download_excell">Download Excel <i class="fa fa-file-excel-o"></i></a></li>
                    {{--<li><a href="#NotWorkingYt">Download PDF <i class="fa fa-file-pdf-o"></i></a></li>--}}
                    {{--<li><a href="#NotWorkingYt">Mail to</a></li>--}}
                    <li role="separator" class="divider"></li>
                    <li><a href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a></li>
                </ul>
            </div>
            <hr>

            <div class="panel panel-default paper">
                <div class="panel-heading">
                    Volunteers

                </div>

                <div class="panel-body" style="">
                    <table id="mtable" class="table table-hover table-striped table-bordered">

                        <thead class="">
                        <tr>
                            {{--<th>#</th>--}}
                            <th title=""> <i class="fa fa-user-circle"></i> Names </th>
                            <th title="Device Used"><i class="fa fa-phone"></i> Tel</th>
                            <th title="Country"><i class="fa fa-map"></i> Country/State</th>
                            <th title="Region"><i class="fa fa-envelope"></i> Email </th>
                            <th class="noprint"><span class="">Action</span></th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($volunteers as $volunteer)
                            <tr>

                                {{--<td>--}}
                                {{--<input class="visits_id" type="checkbox" value="{{ $visits->id }}">--}}
                                {{--</td>--}}

                                <td>
                                    {{ $volunteer->title . ' '. $volunteer->fname ." ".  $volunteer->lname }}
                                </td>

                                <td>
                                    {{ $volunteer->tel1 }}
                                </td>

                                <td>
                                    {{ $volunteer->country .",  ".$volunteer->city  }}
                                </td>

                                <td>

                                    {{ $volunteer->email }}

                                    @if($volunteer->verify === "no" )

                                        <span style="color: red;"> ✖ </span>

                                    @else

                                        <span style="color: green;"> ✔ </span>

                                    @endif

                                </td>

                                <td class="noprint">
                                    <div class="">
                                        <a href="{{ route('volunteer.preview', $volunteer->id) }}" class="btn btn-xs btn-info"> Preview </a>

                                        <form action="{{ route('volunteer.delete', $volunteer->id) }}" method="post" style="display: inline;">
                                            {{ csrf_field() }}
                                            <input name="volunteer" value="{{ $volunteer->id }}" type="text" class="hidden" >
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