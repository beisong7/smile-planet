<?php use Illuminate\Support\Str; ?>
<div class="gray-bg1 ash h3h" >
    <div class="container">
        <div class="col-sm-8">
            <h2><b>Aims & Objectives</b></h2>
            <p>

                {!! Str::words($content->f_aims_obj, 170, '  . . . ') !!} <a href="{{ route('foundation.obj') }}"> read more. </a>

            </p>
        </div>
        <div class="col-sm-4" style="padding: 20px;">
            <img src="{{url('uploads/'.$content->f_aims_obj_img)}}" alt="" style="width: 100%">
        </div>
    </div>
</div>