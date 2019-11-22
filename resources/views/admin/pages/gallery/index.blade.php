<?php

    $active['gallery'] = 'imactive';
    $jslinks = ['dropzone.js', 'mdz.js'];
    $csslinks = ['dropzone.css','mdz.css'];
    $pagename = '<b>Gallery</b>';
?>


@extends('admin.layouts.admin')

@section('content')

    <!--                first div panel for greeting and important messages-->
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Galleries
                    <small> showing {{ count($media) }} of {{ count(\App\Gallery::all()) }} files </small>
                    <a href="{{ route('console.gallery.add') }}" class="btn btn-xs btn-default">Add New</a>


                    <span class="pull-right" style="margin-right: 80px">
                        <span class="dropdown form-control " style="margin: -10px 0 0 0;" id="g_set">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Actions <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="" href="">Delete</a></li>

                            </ul>
                        </span>
                    </span>

                    <span class="pull-right" style="margin-right: 10px"> <small> <b>all</b> </small> <input type="checkbox" class="checkall">  </span>
                </h4>
            </div>
            <div class="panel-body gallerybox">

                @forelse($media as $item)
                    <div class="col-md-3 col-sm-6 col-xs-6" data-id="{{ $item->id }}" style='margin-top:5px; margin-bottom: 5px'>
                        <div class="panel panel-default no-padding no-margin shadow-l1">
                            <div class="panel-body box no-margin no-padding img-center">
                                <div class="contents">
                                    <input type="checkbox"  class="selector flex-tl" value="{{ $item->id }}">
                                    @if($item->type === 'mp4')
                                        <video class="img-sit">
                                            <source src="{{ url('uploads/'. $item->url) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <img class="img-sit" src="{{ url('uploads/'. $item->url) }}" alt="">
                                    @endif
                                </div>

                            </div>
                            <div class="panel-footer">
                                <div class="row" style="padding: 0 5px">
                                    <p class="truncate pull-left">
                                        <small style="font-size: 9px" class="gray"><b>{{ $item->file_name }}</b></small>
                                    </p>
                                    <p style="width: 40%;" class="pull-right text-right">
                                        <button title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                        <button title="Download" class="btn btn-xs btn-success"><i class="fa fa-download"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="text-center"> NO ITEMS AT THE MOMENT </h2>
                @endforelse


            </div>

        </div>
    </div>
    {{ $media->links() }}
    <br>

    <br>


@endsection


