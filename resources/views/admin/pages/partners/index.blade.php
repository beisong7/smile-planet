<?php
    $active['partner'] = 'imactive';
    $pagename = '<b>Partners</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <h3 class="title"><b>Partners</b></h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('console.partner.new') }}" class="btn btn-default btn-xs">New Partner</a>
            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Added</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($partners as $partner)
                        <tr>
                            <td>
                                <input class="partner_id" type="checkbox" value="{{ $partner->id }}">
                            </td>

                            <td>{{ $partner->name }}</td>
                            <td style="max-width: 20px">
                                <div class="" style="width: 50px;margin: 0 auto;">
                                    <img src="{{ url('uploads/'.$partner->gallery->url) }}" alt="" class="img-fit">
                                </div>
                            </td>
                            <td>
                                {{  date('F d, Y @ h:i', strtotime($partner->created_at)) }}
                            </td>

                            <td>

                                <form action="{{ route('delete.partner', $partner->id) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input name="partner_id" value="{{ $partner->id }}" type="text" class="hidden">
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Sales available at the moment.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>




@endsection


