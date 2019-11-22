<?php $active['event'] = 'imactive';

    $jslinks = ['newbanner.js'];
$url = route('console.event');
    $pagename = "<a href='$url'>Events</a> <span style='margin-left: 10px'> <b>Editing</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="col-md-8 col-md-offset-2">
        <br>
        <small class="gray">
            Create a Custom Email. <b>NOTE - Do not fill the email except you are sending to just that email!</b>
        </small>
        <hr>
        <h3 class="gray"><b>{{ $program->title }}</b></h3>
        <hr>

        <div>

            <form class="form-horizontal" role="form" action="{{ route('eventmail.send',$program->id) }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="">Email (optional)</label>
                    <input type="email" class="form-control" placeholder="Email ... if sending to just one person" name="semail">
                </div>
                <div class="form-group">
                    <label for="">Subject * </label>
                    <input type="text" class="form-control" placeholder="Subject of the Email (Required)" name="subject" required>
                </div>

                <div class="form-group">
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" required placeholder="Message (Required)"></textarea>
                </div>

                <br>
                <button class="btn btn-primary" type="submit">Send Emails</button>

            </form>
        </div>

    </div>


@endsection


