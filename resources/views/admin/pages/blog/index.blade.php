<?php $active['blog'] = 'imactive';
    $pagename = '<b>Blog Management</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b> Blog Management</b></h3>

        <small class="gray"></small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $blogs->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Blog

                <a href="{{ route('blog.create') }}" class="btn btn-xs btn-default">New Blog</a>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="" style="width: 400px">Title</th>
                        <th title="" style="width: 400px">Description</th>
                        <th title="">Type</th>
                        <th title="">Status</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td style="width: 400px">
                                {{ $blog->title }}
                            </td>

                            <td style="width: 400px">
                                {{ $blog->desc }}
                            </td>

                            <td>
                                {{ $blog->type }}
                            </td>
                            <td>
                                {{ $blog->status() }}
                            </td>
                            <td>

                                <form id="dform" onclick="
                                    event.preventDefault();
                                    var person = prompt('Type DELETE to complete: ', '');
                                        if (person == null || person == '') {

                                        } else {
                                            if(person==='DELETE'){
                                                document.getElementById('dform').submit();
                                            }
                                        }
                                    " action="{{ route('blog.delete', $blog->id) }}" method="post" style="display: inline;" >
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Item found! click <a href="{{ route('blog.create') }}">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


