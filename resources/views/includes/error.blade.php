@if(count($errors) > 0)
    <br>
    <div >
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li class="alert alert-danger">
                    <i class="fa fa-warning" style="margin: 0px 9px"></i> {{ $error }}</li>
                <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
            @endforeach
        </ul>
    </div>

@endif

{{--@if(Session::has('flash_message'))--}}
    {{--<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>--}}
{{--@endif--}}

{{--<div class="flash-message">--}}
    {{--@foreach (['danger', 'warning', 'success', 'info'] as $msg)--}}
        {{--@if(Session::has('alert-' . $msg))--}}

            {{--<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>--}}
        {{--@endif--}}
    {{--@endforeach--}}
{{--</div>--}}

@if(session('message'))
    <br>
    <div class="alert alert-success">

        {!! session('message') !!}
        <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif