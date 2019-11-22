<?php $active['contentz'] = 'imactive';
    $pagename = '<b>Categories</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b> Categories Details</b></h3>

        <small class="gray">Showing list of categories. Choose which topic you wish to edit, Add one where not available</small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $categories->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Categories

                <a href="{{ route('category.create') }}" class="btn btn-xs btn-default">New Category Detail</a>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="">Name</th>
                        <th title="">Topic</th>
                        <th title="">Group</th>
                        <th title="">Status</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($categories as $item)
                        <tr>

                            <td>
                                <input class="visits_id" type="checkbox" value="{{ $item->id }}">
                            </td>

                            <td>
                                {{ $item->name}}
                            </td>

                            <td>
                                {{ $item->topic }}
                            </td>

                            <td>
                                {{ $item->group }}
                            </td>
                            <td>
                                {{ $item->status }}
                            </td>
                            <td>

                                <form action="{{ route('category.destroy', $item->id) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input name="id" value="{{ $item->id }}" type="text" class="hidden">
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('category.show', $item->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Item found! click <a href="">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


