<?php $active['dashboard'] = 'imactive';
    $url = route('console.home');
    $pagename = "<a href='$url'>Dashboard</a> <span style='margin-left: 10px'> <b>New Mail</b></span>";
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    @include('admin.includes.modal')

    <!--                first div panel for greeting and important messages-->

    <div class="col-md-8 col-md-offset-2">
        <br>
        <small class="gray">
            Create a Custom Email.
        </small>
        <hr>

        <div>

            <form class="form-horizontal" role="form" action="{{ route('newmail.send') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="">Email (required)</label>
                    <textarea cols="30" rows="2" type="email" class="form-control" placeholder="email address (required) *add multiple emails seperated with comma ','" name="email"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Title (required) </label>
                    <input type="text" class="form-control" placeholder="Title of the email (Required)" name="title" required>
                </div>
                <div class="form-group">
                    <label for="">Subject (required) </label>
                    <input type="text" class="form-control" placeholder="Subject of the email (Required)" name="subject" required>
                </div>

                <div class="form-group">
                    <textarea name="body" id="" cols="30" rows="10" class="form-control" required placeholder="Message (Required)"></textarea>
                </div>

                <br>
                <button class="btn btn-primary" type="submit">Send Emails</button>

            </form>
        </div>

    </div>


@endsection


