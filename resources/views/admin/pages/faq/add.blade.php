<?php $active['people'] = 'imactive';


$url = route('faq.index');
$pagename = "<a href='$url'>FAQ</a> <span style='margin-left: 10px'> <b>New</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="">
        <br>
        <small class="gray">
            Create a new entry for an FAQ into the system.
        </small>
        <br>

        <hr>

        <div class="col-md-12">
            <form class="form-horizontal" role="form" action="{{ route('faq.store') }}" method="POST">
                {{ csrf_field() }}

                <fieldset>

                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="textinput">Question</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="qst" placeholder="Question" class="form-control" required>{{ old('qst') }}</textarea>
                        </div>

                    </div >

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="textinput">Answer</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="ans" placeholder="Answer" class="form-control" required>{{ old('ans') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-info">Complete</button>
                        </div>
                    </div>

                </fieldset>

            </form>
        </div>

    </div>


@endsection


