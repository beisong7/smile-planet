<h3 class="text-shadow gray"> <b> Home Banners </b></h3>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#alerts">Foundation</a></li>
    <li><a data-toggle="tab" href="#message">Entrepreneur</a></li>
</ul>

<div class="tab-content">
    <div id="alerts" class="tab-pane fade in active">
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-primary baner_f" data-toggle="modal" data-target="#myModal">Add Banner <i class="fa fa-plus-circle"></i></button>
            </div>
            <div class="panel-body for_foundation">

                @forelse($banner as $ban)
                    @if($ban->target === 'foundation')
                        <div class="col-sm-6 {{ $ban->id . $ban->type . $ban->target }}">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <img class="banner-fit" src="{{ url('uploads/'.$ban->gallery->url) }}" alt="">
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>Title <small>{{ $ban->title }}</small></h4>
                                        <button class="btn btn-info btn-sm slide_rm" data-id="{{ $ban->id }}">Remove <i class="fa fa-trash"></i> </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
                    {{--<h2 class="text-center">NO BANNERS AT THE MOMENT</h2>--}}
                @endforelse


            </div>

        </div>
        <hr>
    </div>
    <div id="message" class="tab-pane fade">
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-primary baner_e" data-toggle="modal" data-target="#myModal">Add Banner <i class="fa fa-plus-circle"></i></button>
            </div>
            <div class="panel-body for_entrepreneur">
                @forelse($banner as $ban)
                    @if($ban->target === 'entrepreneur')

                        <div class="col-sm-6 {{ $ban->id . $ban->type . $ban->target }}">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <img class="banner-fit" src="{{ url('uploads/'.$ban->gallery->url) }}" alt="">
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>Title <small>{{ $ban->title }}</small></h4>
                                        <button class="btn btn-info btn-sm slide_rm" data-id="{{ $ban->id }}">Remove <i class="fa fa-trash"></i> </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
                    {{--<h2 class="text-center">NO BANNERS AT THE MOMENT</h2>--}}
                @endforelse
            </div>

        </div>
        <hr>
    </div>

</div>
<br>