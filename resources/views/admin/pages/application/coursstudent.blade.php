<?php
$active['application'] = 'imactive';
$csslinks = [''];
$jslinks = ['print.js?v='.$req['version']=0.03];
$url = route('console.app.event');
$pagename = '<b>Applications</b> / <a href="'.$url.'">Event List</a> / '. $course['title'];
$li_active['courses'] = 'active';
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
            <h3 class="title"><b>{{ $course['title'] }}</b></h3>
            
            <p><small class="gray">Registered members For this course. </small></p>

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
                            <li><a href="{{ route('get.excel.course', $course->id ) }}" id="download_excell">Download Excel <i class="fa fa-file-excel-o"></i></a></li>
                            <li><a href="#not working" id="download_excell">Download Excel <i class="fa fa-file-excel-o"></i></a></li>
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
                            <th title="">Max Edu</th>

                            <th title="Time Visited">Registered</th>
                            <th width="200px" class="noprint">
                                <span class="">Action</span>
                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($course->applicants() as $person)
                            <tr>

                                <td>
                                    {{ $person->names }}
                                </td>

                                <td>
                                    {{ $person->phone }}
                                </td>

                                <td>
                                    {{ $person->address }}
                                </td>

                                <td>
                                    {{ $person->email }}
                                </td>

                                <td>
                                    {{ @$person->setedu() }}
                                </td>

                                <td>
                                    {{ $person->created_at->diffForHumans()  }}
                                </td>

                                <td class="noprint">
                                    <div class="">
                                        <a href="{{ route('console.app.courseapp.show', $person->id) }}" class="btn btn-xs btn-primary"> Preview
                                        </a>
                                    <form action="{{ route('del.courseapp', $person->id) }}" method="post" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input name="id" value="{{ $person->id }}" type="text" class="hidden">
                                        <button class="btn btn-xs btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                           <button class="btn btn-xs btn-info">re-mail</button>
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