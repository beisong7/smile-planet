@forelse($albums as $album)
    <div class="col-sm-4 col-xs-6" style="margin-bottom: 10px;">
        <a href="{{ route('e.album_view', $album->title) }}" class="list-group-item h-shadow" style="padding: 0;margin: 0">
            <div class="row" style="padding: 0 15px">
                <div class="col-sm-6" style="margin: 0;padding: 0">
                    <div class="box" style="">
                        <div class="contents">
                            <img src="{{url('uploads/'.$album->gallery->url)}}" alt="" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="row">
                        <p class="truncate" style="padding: 5px 15px">
                            <b>{{ $album->title }}</b>
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
@empty
    <br>
    <div class="col-md-12 gray">
        <small>No Album Currently Available. Please check again later.</small>
    </div>
@endforelse