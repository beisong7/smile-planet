<?php $active['dashboard'] = 'imactive';
    $pagename = '<b>Youtube Video</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Youtube</b></h3>

        <small class="gray">Showing list of youtube Videos at smileplanetef.org domain. </small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $tubes->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                YouTube Videos

                <a href="{{ route('tube.new') }}" class="btn btn-xs btn-default">New Video</a>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="">Name</th>
                        <th title=""></i> Link </th>
                        <th title="">Date Added</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($tubes as $tube)
                        <tr>

                            <td>
                                <input class="visits_id" type="checkbox" value="{{ $tube->id }}">
                            </td>

                            <td>
                                {{ $tube->name }}
                            </td>

                            <td>
                                {{ $tube->link }}
                            </td>

                            <td>
                                {{ $tube->created_at->diffForHumans() }}
                            </td>

                            <td>


                                <a href="{{ route('tube.delete', $tube->id) }}" class="btn btn-xs btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
                                <a href="{{ route('tube.show', $tube->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Video found! click <a href="{{ route('tube.new') }}">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


