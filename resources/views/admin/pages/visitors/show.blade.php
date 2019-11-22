<?php $active['visitors'] = 'imactive';
    $url = route('console.visitors');
    $pagename = "<b><a href='$url'>Visitors</a></b> <span>Visitor</span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="col-md-12">
        <h3 class="title"><b>Today with {{ $visitor->ip }}</b></h3>

        <div class="row">

            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->today()):'0' }}</span> <span> Today</span></b>
                </a>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->thisweek()):'0' }}</span> <span> This Week</span></b>
                </a>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->thismonth()):'0' }}</span> <span> This Month</span></b>
                </a>
            </div>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="#" class="card radius50" style="padding: 20px">
                    <b class="text-center"> <span class="online">{{ !empty($visitz)?count($visitz->thisyear()):'0' }}</span> <span> This Year</span></b>
                </a>
            </div>
        </div>

        <br>
        <br>

        <small class="gray">Showing list of pages the visitor browsed at smileplanetef.org dormain. </small>

        <br>
        <br style="margin: 0;padding: 0;">
        <div class="panel panel-default">
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="I P Address">IP</th>
                        <th title="Device Used">Device</th>
                        <th title="the visited url" style="max-width: 300px">Visited</th>
                        <th title="Time Visited">Time</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($visitor->hits() as $visits)
                        <tr>

                            {{--<td>--}}
                                {{--<input class="visits_id" type="checkbox" value="{{ $visits->id }}">--}}
                            {{--</td>--}}

                            <td>
                                {{ $visits->ip }}
                            </td>

                            <td>
                                {{ $visits->device }}
                            </td>
                            
                            <td title="visited this link" style="max-width: 300px; overflow: hidden">
                                {{ $visits->url }}
                            </td>
                            <td title="{{ date('F d, Y _ h:i a', strtotime($visits->created_at)) }}">
                                {{ $visits->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Visitors at the moment.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


