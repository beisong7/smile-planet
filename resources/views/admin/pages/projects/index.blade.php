<?php $active['event'] = 'imactive';
    $pagename = '<b>Events</b>';
    use Illuminate\Support\Str;


?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <small>pages</small>
    {{ $programs->links() }}

    <div class="">
        <h3 class="title"><b>Events</b></h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('console.event.new') }}" class="btn btn-default btn-xs">New Event</a>
            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th style="width: 200px;">Theme</th>
                        <th style="width:200px">Date/Time</th>
                        <th style="min-width: 120px">Added</th>
                        <th title="Hover over image to see type">Image</th>
                        <th style="width: 333px">Details / Venue</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($programs as $program)
                        <tr>

                            <td>
                                <input class="program_id" type="checkbox" value="{{ $program->id }}">
                            </td>

                            <td>
                                <b>{{ $program->title }}</b>
                            </td>

                            <td>{{ date('F d, Y', strtotime($program->date)) }} <b>@</b>  - {{ $program->time }} </td>
                            <td>
                                {{ date('F d, Y', strtotime($program->created_at)) }}
                            </td>

                            <td style="width: 110px" title="{{ $program->type }}">
                                <div class="" style="width: 100%;margin: 0 auto;">
                                    <img src="{{ url('uploads/'.$program->gallery->url) }}" alt="" class="img-fit">
                                </div>
                            </td>

                            <td>
                                {{ Str::words($program->detail, 26, ' ...') }}
                                <br>
                                <b>venue:</b> {{ $program->venue }}
                                {{--{{ str_limit(, $limit = 130, $end = ' ...') }}--}}

                            </td>


                            <td>

                                <a href="{{ route('console.event.edit',$program->id ) }}" class="btn btn-xs btn-info" style="margin: 10px">Edit</a>

                                <form action="{{ route('event.remove', $program->id) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input name="id" value="{{ $program->id }}" type="text" class="hidden">
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>

                                <a href="{{ route('console.event.reemail',$program->id ) }}" class="btn btn-xs btn-info" style="margin: 10px">re-email</a>

                                <a href="{{ route('console.event.c_email',$program->id ) }}" class="btn btn-xs btn-info" style="margin: 10px">custom - mail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Programmes  available at the moment.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{ $programs->links() }}



@endsection


