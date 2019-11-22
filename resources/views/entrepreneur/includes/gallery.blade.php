<div class="ongoin_sec" >
    <div class="container" style="padding: 20px 0 15px 0">


        <h3 class="col-sm-12"><span class="likeh1 gray"><b>GALLERIES</b></span></h3>
        <br>
        @forelse($albums as $album)
            <div class="col-sm-4 " style="margin-bottom: 10px;">
                <a href="{{ route('e.album_view', $album->title) }}" class="list-group-item h-shadow">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{url('uploads/'.$album->gallery->url)}}" alt="" style="width: 100%;min-height: 115px; max-height: 120px;">
                        </div>
                        <div class="col-sm-6">
                            <b>{{ $album->title }}</b>
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


        @if(count($nalbums)  > 3)
            <div class="col-sm-12">
                <br>
                <a href="{{ route('e.albums') }}" class="btn btn-sm btn-dark">view all</a>
            </div>

        @endif


    </div>
</div>