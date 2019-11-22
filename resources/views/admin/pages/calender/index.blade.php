<?php $active['dashboard'] = 'imactive';
    $pagename = '<b>Calender</b>';

?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Calender Data</b></h3>

        <small class="gray">Showing list of Calender Dates and Event for the smileplanetef.org domain. </small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $tables->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Courses
                <span><a href="{{ route('console.calender.new') }}" class="btn btn-sm btn-default">Add New Date</a></span>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="" style="max-width: 200px">Theme</th>
                        <th title="">Organizer</th>
                        <th title=""> Date </th>
                        <th title="">Time </th>
                        <th title="" style="max-width: 200px">Venue </th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($tables as $table)
                        <tr>

                            <td>
                                <input class="visits_id" type="checkbox" value="{{ $table->id }}">
                            </td>
                            <td style="max-width: 200px">
                                {{ $table->theme }}
                            </td>

                            <td>
                                {{ $table->organizer }}
                            </td>

                            <td>
                                {{ date('F d, Y ', strtotime($table->date))}}
                            </td>
                            <td>
                                {{ date('h:i', strtotime($table->time)) }}
                            </td>
                            <td style="max-width: 200px">
                                {{ $table->venue }}
                            </td>
                            <td>

                                <form action="{{ route('calender.delete',$table->id) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input name="id" value="{{ $table->id }}" type="text" class="hidden">
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>

                                <a href="{{ route('console.calender.edit',$table->id  ) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Dates found! click <a href="{{ route('console.calender.new') }}">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


