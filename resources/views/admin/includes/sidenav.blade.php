<div id="sidepart" class="col-xs-3 list-group" style="overflow-y: auto; padding-bottom: 50px">

    <a href="{{ route('console.home') }}" class="list-group-item <?=@$active['dashboard'] ?>"><span class="fa fa-dashboard"></span> <span class="linkname">Dashboard</span> </a>

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='BL')
    <a href="{{ route('blog.index') }}" class="list-group-item <?=@$active['blog'] ?>"><span class="fa fa-newspaper-o"></span> <span class="linkname">Blog</span></a>
    @endif
    <a href="{{ route('console.visitors') }}" class="list-group-item <?=@$active['visitors'] ?>"><span class="fa fa-user"></span> <span class="linkname">Visitors</span></a>

    <a href="{{ route('console.admins') }}" class="list-group-item <?=@$active['admin'] ?>"><span class="fa fa-lock"></span> <span class="linkname">Admins</span></a>

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('people.index') }}" class="list-group-item <?=@$active['people'] ?>"><span class="fa fa-user-circle"></span> <span class="linkname">People</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('console.app.fac') }}" class="list-group-item <?=@$active['application'] ?>"><span class="fa fa-external-link-square"></span> <span class="linkname">Applications</span></a>
    @else
        <a href="{{ route('console.enrollment') }}" class="list-group-item <?=@$active['application'] ?>"><span class="fa fa-external-link-square"></span> <span class="linkname">Applications</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('console.banner') }}" class="list-group-item <?=@$active['banners'] ?>"><span class="fa fa-product-hunt"></span> <span class="linkname">Banners</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='AO')
        <a href="{{ route('console.gallery') }}" class="list-group-item <?=@$active['gallery'] ?>"><span class="fa fa-image"></span> <span class="linkname">Gallery</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('album.index') }}" class="list-group-item <?=@$active['album'] ?>"><span class="fa fa-image"></span> <span class="linkname">Albums</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('console.content') }}" class="list-group-item <?=@$active['contentz'] ?>"><span class="fa fa-list"></span> <span class="linkname">Manage Content</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('console.event') }}" class="list-group-item <?=@$active['event'] ?>"><span class="fa fa-info-circle"></span> <span class="linkname">Events</span></a>
    @endif

    @if(intval(Auth::user()->who)===4 || Auth::user()->job==='')
        <a href="{{ route('console.partner') }}" class="list-group-item <?=@$active['partner'] ?>"><span class="fa fa-suitcase"></span> <span class="linkname">Partners</span></a>
    @endif


</div>