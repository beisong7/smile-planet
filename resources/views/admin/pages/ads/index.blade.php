<?php $active['contentz'] = 'imactive';
    $pagename = '<b>Ads</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b> Ads Information</b></h3>

        <small class="gray">Showing list of ads. </small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $ads->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Ads</b>
                <br>
                <a href="{{ route('ads.create') }}" class="btn btn-xs btn-default">New Ads</a>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="">Created At</th>
                        <th title="">Status</th>
                        <th title="">Target</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($ads as $item)
                        <tr>

                            <td>
                                <input class="visits_id" type="checkbox" value="{{ $item->id }}">
                            </td>

                            <td>
                                {{ $item->created_at->diffForHumans()}}
                            </td>

                            <td>
                                {{ $item->status?'Active':'Inactive' }}
                            </td>

                            <td>
                                <a href="{{ route('home').'/'. $item->target }}" class="" target="_blank">{{ $item->target }}</a>
                            </td>
                            <td>
                                @if($item->active)
                                    <a href="{{ route('ads.deactivate', $item->id) }}" class="btn btn-xs btn-danger btn-xs">Deactivate</a>
                                @else
                                    <a href="{{ route('ads.activate', $item->id) }}" class="btn btn-xs btn-success btn-xs">Activate</a>
                                @endif

                                <a href="{{ route('ads.show', $item->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No Item found!
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


