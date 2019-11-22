<?php
$active['application'] = 'imactive';
$csslinks = [''];
$pagename = '<b>Applications</b> - Events Registration Listing';
$li_active['courses'] = 'active';


?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.modal')

    @include('admin.layouts.error')

    <div class="">
        @include('admin.layouts.application_nav')
    </div>

    <div style="margin-top: 30px">

        <div class="col-sm-12">
            <h3 class="title"><b>Course Registration Listing</b></h3>
            <p><small class="gray">Select a course to view those registered</small></p>

            <br>

            <div class="panel panel-default ">
                <div class="panel-heading">
                    Courses
                </div>
                <div class="panel-body" style="">
                    <table id="mtable" class="table table-hover table-striped table-bordered">

                        <thead class="">
                        <tr>
                            {{--<th>#</th>--}}
                            <th title="Device Used">Course Title</th>
                            <th title="Number of Registered People">Registered</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($courses as $course)
                            <tr>

                                <td>
                                    <b>{{ $course->title }}</b>
                                </td>

                                <td>
                                    {{ count($course->applicants()) }} registered
                                </td>

                                <td>
                                    <a href="{{ route('course.app.regstudent',$course->id) }}" class="btn btn-xs btn-primary" >Show</a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Records Found.
                                </td>
                            </tr>

                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection