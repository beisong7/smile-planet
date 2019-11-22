<?php $active['partner'] = 'imactive';

    $jslinks = ['newbanner.js'];

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <h3 class="title"><b><a href="{{ route('console.partner') }}">Partner</a></b> <small> - Add New partnr</small> </h3>
        <hr>

        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" role="form" action="{{ route('partner.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Partner's Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Partners Name" class="form-control" required>
                        </div>
                    </div >

                    <input type="text" name="gallery_id" value="" style="display: none" class="new_event_img " required>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                            <div class="list-group-item">
                                <img src="{{ url('img/default.png') }}" alt="" class="image_src img-fit">
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <span class="btn btn-sm btn-primary get_pimg" data-toggle="modal" data-target="#myModal">Choose Image</span>
                            <button type="submit" class="btn btn-sm btn-info">Complete</button>
                        </div>

                    </div>

                </fieldset>

            </form>
        </div>

    </div>


@endsection


