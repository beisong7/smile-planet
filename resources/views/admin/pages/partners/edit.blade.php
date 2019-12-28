<?php $active['partner'] = 'imactive';

    $jslinks = ['newbanner.js'];

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <h3 class="title"><b><a href="{{ route('console.partner') }}">Partner</a></b> <small> - Edit Partner</small> </h3>
        <hr>

        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" role="form" action="{{ route('partner.update', $partner->id) }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Partner's Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Partners Name" class="form-control" required value="{{ $partner->name }}">
                        </div>
                    </div >
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Type</label>
                        <div class="col-sm-10">
                            <select name="type" id="" required class="form-control">
                                <option value="" disabled>Select an option</option>
                                <option value="event" {{ $partner->type==='event'?'selected':'' }}>Event</option>
                                <option value="hub" {{ $partner->type==='hub'?'selected':'' }}>Hub</option>
                                <option value="foundation" {{ $partner->type==='foundation'?'selected':'' }}>Foundation</option>
                                <option value="all" {{ $partner->type==='all'?'selected':'' }}>All</option>
                            </select>
                        </div>
                    </div >

                    <input type="text" name="gallery_id" value="{{ $partner->gallery->id }}" style="display: none" class="new_event_img " required>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                            <div class="list-group-item">
                                <img src="{{ url('uploads/'.$partner->gallery->url) }}" alt="" class="image_src img-fit">
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <span class="btn btn-sm btn-primary get_pimg" data-toggle="modal" data-target="#myModal">Change Image</span>
                            <button type="submit" class="btn btn-sm btn-info">Update</button>
                        </div>

                    </div>

                </fieldset>

            </form>
        </div>

    </div>


@endsection


