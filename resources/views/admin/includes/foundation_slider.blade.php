<h3 class="text-shadow gray"> <b> Section Sliders </b></h3>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#slide_foundation">Foundation</a></li>
    <li><a data-toggle="tab" href="#slide_ecenter">Entrepreneur</a></li>
</ul>

<div class="tab-content">
    <div id="slide_foundation" class="tab-pane fade in active">
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-primary slider_f" data-toggle="modal" data-target="#myModal">Add Sliders <i class="fa fa-plus-circle"></i></button>
            </div>
            <div class="panel-body slide_foundation">

                @forelse($slider as $slide)
                    @if($slide->target === 'foundation')
                        <div class="col-sm-6 {{ $slide->id . $slide->type . $slide->target }}" data-id="{{ $slide->id }}" style="margin-bottom: 15px;">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <img class="banner-fit" src="{{ url('uploads/'.$slide->gallery->url) }}" alt="">
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>Title <small>{{ $slide->title }}</small></h4>
                                        <button class="btn btn-info btn-sm slide_rm" data-id="{{ $slide->id }}" data-type="{{ $slide->type }}"
                                                data-target="{{ $slide->target }}">Remove <i class="fa fa-trash"></i> </button>

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
    <div id="slide_ecenter" class="tab-pane fade">
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-primary slider_e" data-toggle="modal" data-target="#myModal">Add Sliders <i class="fa fa-plus-circle"></i></button>
            </div>
            <div class="panel-body slide_entrepreneur">
                @forelse($slider as $slide)
                    @if($slide->target === 'entrepreneur')

                        <div class="col-sm-6 {{ $slide->id . $slide->type . $slide->target }}" style="margin-bottom: 15px;">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <img class="banner-fit" src="{{ url('uploads/'.$slide->gallery->url) }}" alt="">
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>Title <small>{{ $slide->title }}</small></h4>
                                        <button class="btn btn-info btn-sm slide_rm" data-id="{{ $slide->id }}">Remove <i class="fa fa-trash"></i> </button>

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