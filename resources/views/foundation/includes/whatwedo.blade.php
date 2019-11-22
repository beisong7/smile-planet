<?php use Illuminate\Support\Str; ?>
<div class="white-bg1 h3h ash" >
    <div class="container">
        <div class="col-sm-8">
            <h2><b>What We Do</b></h2>
            <p>

                {!! Str::words($content->f_what_we_do, 200, '  . . . ') !!} <a href="{{ route('foundation.wwd') }}"> read more. </a>

            </p>
        </div>
        <div class="col-sm-4" style="padding: 20px;">
            <img src="{{url('uploads/'.$content->f_what_we_do_img)}}" alt="" style="width: 100%">
        </div>
    </div>
</div>