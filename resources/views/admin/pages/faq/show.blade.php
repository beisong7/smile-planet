<?php $active['faq'] = 'imactive';

$url = route('faq.index');
$pagename = "<a href='$url'>FAQ</a> <span style='margin-left: 10px'> <b>Edit</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Edit an entry for this FAQ into the system.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('faq.update', $faq->unid) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <fieldset>

                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="textinput">Question</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="qst" placeholder="Question" class="form-control" required>{{ $faq->qst }}</textarea>
                        </div>
                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Answer</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="ans" placeholder="Answer" class="form-control" required>{{ $faq->ans }}</textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Update</button>
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


