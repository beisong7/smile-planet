@if(count($errors) > 0)
    <br>
    <div >
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li class="alert alert-danger">
                    <i class="fa fa-warning" style="margin: 0px 9px"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

@if(session('message'))
    <br>
    <div class="alert alert-success">
        <i class="fa fa-info-circle"></i>
        {!! session('message') !!}
    </div>

@endif