<div class="p-3">
    @if($details->use_reg==='yes')
        <br>
        <hr>
        <div class="button home_button">
            <a href="{{ route('detail.course.reg', [$details->link, $details->type]) }}">Enroll <div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a>
        </div>
    @endif
</div>