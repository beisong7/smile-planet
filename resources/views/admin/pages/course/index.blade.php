<?php $active['dashboard'] = 'imactive';
    $pagename = '<b>Courses</b>';

?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Course List</b></h3>

        <small class="gray">Showing list of Courses for the smileplanetef.org domain. </small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $courses->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Courses
                <span><a href="{{ route('console.courses.new') }}" class="btn btn-sm btn-default">Add Course</a></span>

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        {{--<th>#</th>--}}
                        <th title="">#</th>
                        <th title="">Course Title</th>
                        <th title=""> Status </th>
                        <th title="">Starting </th>
                        <th title="">Duration</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($courses as $course)
                        <tr>

                            <td>
                                <input class="visits_id" type="checkbox" value="{{ $course->id }}">
                            </td>

                            <td>
                                {{ $course->title }}
                            </td>

                            <td>
                                {{ $course->status }}
                            </td>

                            <td>
                                {{ $course->start }}
                            </td>
                            <td>
                                {{ $course->duration }} week(s)
                            </td>
                            <td>

                                <form action="{{ route('course.destroy', $course->id) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input name="id" value="{{ $course->id }}" type="text" class="hidden">
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>

                                <a href="{{ route('course.edit',$course->id  ) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Course found! click <a href="{{ route('console.courses.new') }}">here </a> to add now
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


