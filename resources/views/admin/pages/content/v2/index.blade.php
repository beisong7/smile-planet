<?php
$active['contentz'] = 'imactive';
$csslinks = [''];
$jslinks = ['newbanner.js', 'js/tinymce/jquery.tinymce.min.js', 'js/tinymce/tinymce.min.js', ];
$kurl = route('console.content');
$pagename = '<a href="'.$kurl.'"><b>Edit Contents</b></a>  <span style="margin-left: 15px">Contents (New)</span>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>All Contents</b></h3>

        <small class="gray">Showing list of all Contents </small>


        <div class="panel panel-default">
            <div class="panel-heading">

                @if(intval(Auth::user()->who)===4)
                    <a href="{{ route('new.detail') }}" class="btn btn-xs btn-default">New Content</a>
                    <a href="{{ route('content.v2') }}" class="btn btn-xs btn-default">All Content</a>
                @endif

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="">Title</th>
                        <th title=""><i class="fa fa-link"></i> Link</th>
                        <th title="">Type </th>
                        <th title="">Creator</th>
                        <th title="">Created</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($details as $detail)
                        <tr>

                            <td>
                                <input class="_id" type="checkbox" value="{{ $detail->id }}">
                            </td>

                            <td>
                                {{ $detail->title }}
                            </td>

                            <td>
                                <a href="{{ route('home.about', ['type'=>$detail->type, 'link'=>$detail->link ])}}" class="">preview</a>
                            </td>

                            <td>
                                <a title="View only {{ $detail->type }}" href="{{ route('content.v2', ['type'=>$detail->type])  }}">{{ $detail->type }}</a>
                            </td>
                            <td title="">
                                {{ $detail->creator->fullname }}
                            </td>

                            <td title="">
                                {{ $detail->created_at->diffForHumans() }}
                            </td>

                            <td>

                                {{--<form action="" method="post" style="display: inline;">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<input name="id" value="{{ $admin->id }}" type="text" class="hidden">--}}
                                {{--<button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>--}}
                                {{--</form>--}}
                                <a href="{{ route('edit.detail', $detail->link  ) }}" class="btn btn-sm btn-info ">Edit</a>
                                <a href="{{ route('edit.detail.toggle',  $detail->link ) }}" class="btn btn-sm btn-default ">{{ $detail->active?'Deactivate':'Activate' }}</a>
                                <a href="{{ route('edit.delete', $detail->link  ) }}" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Record found! click <a href="">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        <br style="margin: 0;padding: 0;">
        {{ $details->links() }}
        <br>



    </div>



@endsection


