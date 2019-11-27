<a href="{{ route('console.app.fac') }}" class="btn btn-default btn-sm <?=@$li_active['fac']?>">Facilitator</a>
<a href="{{ route('console.app.vol') }}" class="btn btn-default btn-sm <?=@$li_active['vol']?>">Volunteer</a>
<a href="{{ route('console.app.event') }}" class="btn btn-default btn-sm <?=@$li_active['eventreg']?>">Events</a>
<a href="{{ route('console.courseRegister') }}" class="btn btn-default btn-sm <?=@$li_active['courses']?>">Courses</a>

<a href="{{ route('console.enrollment') }}" class="btn btn-default btn-sm <?=@$li_active['enrollment']?>">Enrollments</a>