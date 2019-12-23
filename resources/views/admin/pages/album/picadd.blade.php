<?php $active['album'] = 'imactive';

$jslinks = ['newbanner.js'];
$url = route('album.index');

$pagename = "<a href='$url'>Albums</a> <span style='margin-left: 10px'> <b>$album->title</b></span> - <span class='gray' style='margin-left: 10px'> <b>Add Photos</b></span>";

?>

@extends('admin.layouts.admin')

@section('content')

    @include('admin.includes.gallery')

    @include('includes.error')

    <!--                first div panel for greeting and important messages-->

    <div class="" style="margin-bottom: 100px">
        <br>
        <small class="gray">
            Add photos into {{ $album->title }}'s Album.
        </small>
        <br>
        <br>

        <button class="btn btn-primary gallery_loader" data-toggle="modal" data-target="#galleryModal">Add Photos <i class="fa fa-plus-circle"></i></button>

        <hr>

        <input type="number" style="visibility: hidden" value="{{ $album->id }}" class="albums_id">

        <div class="col-md-12">
            <div class="row">
                @forelse($pics as $pic)

                    <div class="col-sm-3" data-id="{{ $pic->id }}" style='margin-top:5px; margin-bottom: 5px'>
                        <div class="panel panel-default no-padding no-margin shadow-l1">
                            <div class="panel-body no-margin no-padding relative">
                                <input type="checkbox"  class="selector absolute" value="{{ $pic->id }}">
                                <img class="banner-fit" src="{{ url('uploads/' . $pic->gallery->url) }}" alt="">
                            </div>
                            <div class="panel-footer">
                                <small style="font-size: 9px" class="gray"><b>{{ $pic->title }}</b></small>

                                <a href="{{ route('ablum.pic.delete', $pic->id) }}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="text-center"> NO ITEMS AT THE MOMENT </h2>
                @endforelse
            </div>
        </div>
        <div class="col-sm-12">
            <hr>
            <button class="btn btn-primary gallery_loader" data-toggle="modal" data-target="#galleryModal">Add Photos <i class="fa fa-plus-circle"></i></button>
            <br>
            <br>
            <br>
            <br>
        </div>


    </div>


@endsection


