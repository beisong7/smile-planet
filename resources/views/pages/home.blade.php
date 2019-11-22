<?php
    $jslinks = ['countdown.js'];
    $titlename = 'smileplanetef.org';

?>

@extends('includes.app')

@section('content')

    @include('includes.error')
    <br>
    <div class="row">
        @forelse($banners as $banner)

            <p class="text-center mobile-only"><b>click image below</b></p>
            <a href="{{ $banner->target==='foundation' ? route('foundation') : route('entrepreneur') }}" class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body box1 bi_parent" style="padding: 0">
                        <div class="contents">
                            <img class="branch_img" src="{{ url('uploads/'.$banner->gallery->url) }}" alt="">
                            <div class="b_title {{ $banner->target==='foundation' ? '' : 'v2' }}">{{ $banner->target==='foundation' ? 'FOUNDATION' : 'ENTREPRENEURS' }}
                                @if($banner->target!=='foundation')
                                    <div>HUB</div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </a>

        @empty

        @endforelse

    </div>

    @include('includes.adds')

    <br>
    <br>

    @include('includes.videoclip')
    <br>
    <br>
    @include('includes.calender')
    <br>
    <br>

    @include('includes.comingevents')

    @include('includes.achievement')

    @include('includes.homebrands')




    
@endsection
