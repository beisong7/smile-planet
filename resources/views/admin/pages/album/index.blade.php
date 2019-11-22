<?php $active['album'] = 'imactive';
    $pagename = '<b>Albums</b>';



?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Albums</b></h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('album.create') }}" class="btn btn-default btn-xs">New Album</a>
            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th style=""> Title</th>
                        <th style=""> Type</th>
                        <th style="min-width: 120px"> Pics</th>
                        <th style="min-width: 120px"> Cover</th>
                        <th style=""> Status</th>
                        <th style=""> Created</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($albums as $album)
                        <tr>

                            <td>
                                <input class="album_id" type="checkbox" value="{{ $album->id }}">
                            </td>

                            <td>
                                <b>{{ ucfirst($album->title) }}</b>
                            </td>

                            <td>{{ ucfirst($album->type) }}</td>
                            <td>
                                {{ count($album->picture) }} Pic(s)
                                <a href="{{ route('album.pic.add',$album->id) }}" class="btn btn-xs btn-info">Add pic</a>
                            </td>

                            <td style="width: 110px" title="{{ucfirst( $album->title )}}'s album cover photo">
                                <div class="" style="width: 100%;margin: 0 auto;">
                                    <img src="{{ url('uploads/'.$album->gallery->url) }}" alt="" class="img-fit">
                                </div>
                            </td>

                            <td>
                                {{ ucfirst($album->status) }}
                            </td>

                            <td>
                                {{ $album->created_at->diffForHumans() }}
                            </td>

                            <td>

                                <a href="{{ route('album.show',$album->id ) }}" class="btn btn-xs btn-info" style="margin: 10px">Edit</a>

                                <form action="{{ route('album.destroy', $album->id) }}" method="post" style="display: inline;">

                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}

                                    <input name="id" value="{{ $album->id }}" type="text" class="hidden">

                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                No Albums Available at the moment.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection


