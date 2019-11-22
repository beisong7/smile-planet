<?php $active['people'] = 'imactive';

$jslinks = ['newbanner.js'];
$url = route('people.index');
$pagename = "<a href='$url'>People</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new entry for a PERSON into the system.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('people.update', $person->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <fieldset class="mb-5">

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Full Names</label>
                        <div class="col-sm-4">
                            <input type="text" name="names" placeholder="Names" class="form-control"  value="{{ $person->names }}" required>
                        </div>
                        <label class="col-sm-2 control-label" for="textinput">Office</label>
                        <div class="col-sm-4">
                            <select name="office" id="" class="form-control" required>
                                <option value=""></option>
                                <option value="trustee" <?php if($person->office === 'trustee'){echo "selected";}?> >Trustees</option>
                                <option value="exco" <?php if($person->office === 'exco'){echo "selected";}?>>Executive Council</option>
                                <option value="facilitator" <?php if($person->office === 'facilitator'){echo "selected";}?>>Facilitators</option>
                                <option value="volunteer" <?php if($person->office === 'volunteer'){echo "selected";}?>>Volunteers</option>
                            </select>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Position</label>
                        <div class="col-sm-4">
                            <input type="text" name="pos" placeholder="Position" class="form-control" value="{{ $person->pos }}">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Telephone</label>
                        <div class="col-sm-4">
                            <input type="number" placeholder="" class="form-control" name="telephone"  value="{{ $person->telephone }}">
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" placeholder="Email address" class="form-control"  value="{{ $person->email }}">
                        </div>

                        <label class="col-sm-2 control-label" for="textinput">Related</label>
                        <div class="col-sm-4">
                            <input type="text" name="related" placeholder="Related: people" class="form-control" value="{{ $person->related }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">More Info</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="o_details" placeholder="Other Relevant Information" class="form-control"  >{{ $person->o_details }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Image</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <br>
                                <div class="col-sm-3">
                                    <span class="btn btn-sm btn-info evt_add_img" data-toggle="modal" data-target="#myModal">Add Image</span>
                                </div>
                                <div class="col-sm-3">

                                    <div class="list-group-item">
                                        @if(!empty($person->gallery->url))
                                            <img src="{{ url('uploads/'.$person->gallery->url) }}" alt="" class="image_src img-fit">
                                        @else
                                            <img src="{{ url('img/person_default.png') }}" alt="" class="image_src img-fit">
                                        @endif
                                    </div>
                                    <small> required </small>
                                    @if(!empty($person->gallery->id))
                                        <input type="text" name="gallery_id" value="{{ $person->gallery->id }}" style="display: none" class="new_event_img ">
                                    @else
                                        <input type="text" name="gallery_id" value="" style="display: none" class="new_event_img ">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info btn-block mb-5">Update</button>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>

                    </div>

                </fieldset>

            </form>
        </div>
        <br>
        <br>
        <br>

    </div>


@endsection


