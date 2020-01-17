<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - Free Consultation';
$li_active['consultation'] = 'active';
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
            <h3 class="title"> Free Consultations registered </h3>

            <br>
            <div class="btn-group ">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('get.excel.others', ['consultation', 'datef'=>@$datef,'datet'=>@$datet]) }}" id="download_excell">Download Excel <i class="fa fa-file-excel-o"></i></a></li>
                    {{--<li><a href="#NotWorkingYt">Download PDF <i class="fa fa-file-pdf-o"></i></a></li>--}}
                    {{--<li><a href="#NotWorkingYt">Mail to</a></li>--}}
                    <li role="separator" class="divider"></li>
                    <li><a href="#Print" id="printlist"> Print <i class="fa fa-print"></i></a></li>
                </ul>
            </div>

            <div class="col-md-8 pull-right">
                <form action="{{ route('console.consultation') }}" method="get">
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="datef" value="{{ @$datef }}" >
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="datet" value="{{ @$datet }}" >
                    </div>

                    <button type="submit" class="btn btn-info">Update</button>

                </form>
            </div>


            <hr>
            <br>

            <div class="panel panel-default paper">
                <div class="panel-heading">
                    Consultations
                </div>

                <div class="panel-body" style="">
                    <table id="mtable" class="table table-hover table-striped table-bordered">

                        <thead class="">
                        <tr>
                            {{--<th>#</th>--}}
                            <th title="I P Address">Names</th>
                            <th title="Device Used">Telephone</th>
                            <th title="the visited url">Email</th>
                            <th title="Time Visited">Registered</th>
                            <th class="noprint">

                                <span class="">Action</span>

                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($consultation as $person)
                            <tr>

                                <td>{{ $person->first_name . ' '. $person->surname ." ".  $person->other_name }}</td>

                                <td>{{ $person->phone }}</td>

                                <td>{{ $person->email }}</td>

                                <td>{{ date('F d, Y ', $person->time)}}</td>

                                <td class="noprint">
                                    <div class="">
                                        <a href="{{  route('console.app.consultation.info', $person->id)  }}" class="btn btn-xs btn-info"> Preview </a>
                                        <a href="{{  route('console.app.consultation.delete', $person->id)  }}" class="btn btn-xs btn-danger"> Delete </a>
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
                <br>

                <div class="" style="padding: 20px">
                    @if(empty($datef) and empty($datet))
                        <small class="gray">Pages</small>
                        {{ $consultation->links() }}
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection