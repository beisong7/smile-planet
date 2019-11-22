<div class="row">
    @if(count($tubes) > 0)
        <div class="col-md-12">

        <h3 class="t-color"><b> V I D E O S </b> </h3>

        <br>
        <div class="row">
            @forelse($tubes as $tube)
                <div class="col-sm-4 col-xs-12">
                    <div class="row">
                        <div class="panel-body">
                            <iframe width="100%" height="240" src="{{ $tube->link }}" style="border: none" frameborder="0" allow="encrypted-media" allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                </div>
            @empty

            @endforelse
        </div>
        <br>
        <a target="_blank" href="http://www.youtube.com/channel/UCgZKzHDFOubmM017mVp0Ipw" class="btn btn-danger "><i class="fa fa-youtube-play"></i> more</a>

    </div>
    @endif
</div>