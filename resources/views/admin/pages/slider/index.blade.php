<?php $active['slider'] = 'imactive';
    $pagename = '<b>Slider Management</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b> Slider Management</b></h3>

        <small class="gray"></small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $sliders->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">


                <a href="{{ route('slider.create') }}" class="btn btn-sm btn-info">New Slider</a>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="" style="width: 400px">Image</th>
                        <th title="" style="width: 400px">Created By</th>
                        <th title="">Date</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($sliders as $slider)
                        <tr>
                            <td style="width: 400px">
                                <div class="text-center" style="max-width: 100px">
                                    <img src="{{ url($slider->image) }}" alt="" class="img-fit">
                                </div>
                            </td>

                            <td style="width: 400px">
                                {{ $slider->user->fullname }}
                            </td>

                            <td>
                                {{ $slider->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <a href="{{ route('slider.edit', $slider->id) }}" class="btn bt-sm btn-primary "> Edit </a>
                                <button class="btn bt-sm btn-danger " onclick="event.preventDefault(); document.getElementById('form_'{{ $slider->id }})">
                                    Delete
                                    <form action="{{ route('slider.destroy', $slider->id) }}" method="post" class="" id="form_{{ $slider->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Item found! click <a href="{{ route('slider.create') }}">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


