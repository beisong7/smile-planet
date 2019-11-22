<?php $active['admin'] = 'imactive';
    $pagename = '<b>Administrators</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Administrators</b></h3>

        <small class="gray">Showing list of Administrators to the smileplanetef.org domain. </small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $admins->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Administrators
                @if(intval(Auth::user()->who)===4)
                    <a href="{{ route('admin.new') }}" class="btn btn-xs btn-default">New Admin</a>
                @endif

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="">Name</th>
                        <th title=""><i class="fa fa-phone"></i> Tel </th>
                        <th title="">Email </th>
                        <th title="">Last Seen</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($admins as $admin)
                        <tr>

                            <td>
                                <input class="visits_id" type="checkbox" value="{{ $admin->id }}">
                            </td>

                            <td>
                                {{ $admin->fullname }}
                            </td>

                            <td>
                                {{ $admin->tel }}
                            </td>

                            <td>
                                {{ $admin->email }}
                            </td>
                            <td title="">
                                @if($admin->last_seen)
                                    {{ $admin->timeago($admin->last_seen) }}
                                    @else
                                no logs
                                    @endif
                            </td>

                            <td>

                                {{--<form action="" method="post" style="display: inline;">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input name="id" value="{{ $admin->id }}" type="text" class="hidden">--}}
                                    {{--<button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>--}}
                                {{--</form>--}}
                                <a href="{{ route('admin.showing', $admin->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Admin found! click <a href="">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


