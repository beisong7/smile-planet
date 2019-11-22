<?php $active['dashboard'] = 'imactive';
$pagename = '<b>Tickets</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Tickets</b></h3>

        <small class="gray">Enter Your Ticket ID to show Participant</small>

        <br>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('ticket.check') }}" method="post" >
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="ticket" placeholder="Ticket Number" required style="width: 75%; display: inline;">
                    <button type="submit" class="btn btn-sm btn-info">CHECK</button>
                </form>
            </div>
            <a href="{{ route('ticketer') }}" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> refresh</a>
        </div>
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Ticket Details
            </div>
            <div class="panel-body" style="">
                @if(!$person)
                    <span>No Record Found...</span>
                @else

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>Personal Details / Information</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Names : </b>{{ $person->title .' '. ucfirst($person->fname).' '.ucfirst($person->lname) }}
                            </td>

                            <td style="width: 33%">
                                <b>Gender : </b>{{ ucfirst($person->gender) }}
                            </td>

                            <td style="width: 33%">
                                <b>Mobile : </b>{{ ucfirst($person->telephone) }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Date of Birth : </b>
                                @if($person->dob)
                                    {{ date('M, Y', strtotime($person->dob))  }}
                                @else
                                    No records found
                                @endif

                            </td>

                            <td style="width: 33%">
                                <b>Email : </b>{{ $person->email }}
                            </td>

                            <td style="width: 33%">
                                <b>Ticket : </b>{{ $person->ticket }}
                            </td>

                        </tr>
                        <tr>
                            <td style="width: 33%">
                                <b>Location : </b>{{ $person->location }}
                            </td>

                            <td colspan="2" style="width: 33%">
                                <b>Expectation : </b>{{ $person->expectation }}
                            </td>

                        </tr>

                        <tr>
                            <td colspan="3">
                                <p class="text-center"><b>A C T I O N</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <b>Attendance : </b>{{ $person->tverify }}
                            </td>
                            <td class="">
                                <b>Attend Time : </b>
                                @if($person->tvtime)
                                    {{ date('F jS, Y - h:i:s', $person->tvtime) }}
                                @endif
                            </td>
                            <td class="">
                                @if($person->tverify=='Yes')
                                    <b>Already Confirmed!</b>
                                @else
                                    <a href="{{ route('ticket.confirm',$person->id) }}" class="btn btn-xs btn-success">Comfirm Presence</a>
                                @endif
                                    
                            </td>
                        </tr>

                    </table>

                @endif
            </div>
        </div>



    </div>



@endsection


