<?php
$active['application'] = 'imactive';
$csslinks = [''];
$jslinks = ['print.js?v='.$req['version']=0.03];
$url = route('console.app.event');
$pagename = '<b>Applications</b> / <a href="'.$url.'">Event List</a> / '. $title;
$li_active['eventreg'] = 'active';
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
            <h3 class="title"><b>{{ $title }}</b></h3>
            
            <p><small class="gray">Registered members For this events. </small></p>

            {{--<small class="gray">Pages</small>--}}
            {{--<br style="margin: 0;padding: 0;">--}}
            {{--{{ $eventreg->links() }}--}}
            {{--<br>--}}

            <div class="row">
                <div class="col-sm-6">

                    <div class="input-group">
                        <div class="btn">

                        </div>
                    </div>
                    <div class="btn-group ">
                        <button type="button" class="btn btn-primary">Action</button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('get.excel.event', $id) }}" id="download_excell">Download Excel <i class="fa fa-file-excel-o"></i></a></li>
                            <li><a href="#NotWorkingYt">Download PDF <i class="fa fa-file-pdf-o"></i></a></li>
                            <li><a href="#NotWorkingYt">Mail to</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <br>
            <br>
            <div class="panel panel-default paper">
                <div class="panel-heading">

                    <p>
                        <b>List of Applicants</b>
                    </p>

                </div>
                <div class="panel-body" style="">
                    <table id="mtable" class="table table-hover table-striped table-bordered">

                        <thead class="">
                        <tr>
                            {{--<th>#</th>--}}
                            <th title="I P Address">Names</th>

                            <th title="Device Used">Telephone</th>
                            <th title="Country">State/Country</th>

                            <th title="">Email</th>
                            <th title="">Certificate?</th>

                            <th title="Time Visited">Registered</th>
                            <th width="200px">
                                <span class="noprint">Action</span>
                                <span class="doprint">Ticket</span>
                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($eventreg as $person)
                            <tr>

                                <td>
                                    {{ $person->title . ' '. $person->fname ." ".  $person->lname }}
                                </td>

                                <td>
                                    {{ $person->telephone }}
                                </td>

                                <td>
                                    {{ $person->location }}
                                </td>

                                <td>
                                    {{ $person->email }}
                                </td>

                                <td>
                                    {{ @$person->certificate?'Yes':'No' }}
                                </td>

                                <td>
                                    {{ $person->created_at->diffForHumans()  }}
                                </td>

                                <td>
                                    <div class="noprint">
                                        <a href="{{ route('console.app.event.show', $person->id) }}" class="btn btn-xs btn-primary"> Preview </a>
                                        <form action="{{ route('del.eventreg', $person->id) }}" method="post" style="display: inline;">
                                            {{ csrf_field() }}
                                            <input name="id" value="{{ $person->id }}" type="text" class="hidden">
                                            <button class="btn btn-xs btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <button class="btn btn-xs btn-info">re-mail</button>
                                    </div>
                                    <span class="doprint">{{ $person->ticket }}</span>


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