<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - Events Registration Listing';
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
            <h3 class="title"><b>Event Registration Listing</b></h3>
            <p><small class="gray">Select an event to view those registered</small></p>
            <small class="gray">Pages</small>
            <br style="margin: 0;padding: 0;">
            {{ $events->links() }}
            <br>

            <div class="panel panel-default ">
                <div class="panel-heading">
                    Events
                </div>
                <div class="panel-body" style="">
                    <table id="mtable" class="table table-hover table-striped table-bordered">

                        <thead class="">
                        <tr>
                            {{--<th>#</th>--}}
                            <th title="Device Used">Event Title</th>
                            <th title="Time">Time</th>
                            <th title="Venue">Venue</th>
                            <th title="Number of Registered People">Registered</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($events as $event)
                            <tr>

                                <td>
                                    <b>{{ $event->title }}</b>
                                </td>

                                <td>
                                    {{ date('F d, Y', strtotime($event->date)) .', time: '. $event->time  }}
                                </td>

                                <td>
                                    {{ $event->venue  }}
                                </td>

                                <td>
                                    {{ count($event->users) }} registered
                                </td>

                                <td>
                                    <a href="{{ route('event.showreg', $event->id) }}" class="btn btn-xs btn-primary" >Show</a>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Records Found.
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