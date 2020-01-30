






@if(intval(Auth::user()->who)===4 || Auth::user()->job==='AO')
    <a href="{{ route('console.app.fac') }}" class="btn btn-default btn-sm <?=@$li_active['fac']?>">Facilitator</a>
@endif

@if(intval(Auth::user()->who)===4 || Auth::user()->job==='AO')
    <a href="{{ route('console.app.vol') }}" class="btn btn-default btn-sm <?=@$li_active['vol']?>">Volunteer</a>
@endif

@if(intval(Auth::user()->who)===4 || Auth::user()->job==='AO')
    <a href="{{ route('console.app.event') }}" class="btn btn-default btn-sm <?=@$li_active['eventreg']?>">Events</a>
@endif

@if(intval(Auth::user()->who)===4 || Auth::user()->job==='AO')
    <a href="{{ route('console.courseRegister') }}" class="btn btn-default btn-sm <?=@$li_active['courses']?>">Courses</a>
@endif


<a href="{{ route('console.enrollment') }}" class="btn btn-default btn-sm <?=@$li_active['enrollment']?>">Enrollments</a>
<a href="{{ route('console.consultation') }}" class="btn btn-default btn-sm <?=@$li_active['consultation']?>">Consultation</a>
