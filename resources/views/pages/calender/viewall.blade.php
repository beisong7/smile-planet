<?php
$jslinks = ['main.js'];
$pagename = 'Smile Planet Calender - (best viewed on larger screen)'; //in page
$titlename = 'Calender'; // in tab title
?>

@extends('includes.app')

@section('content')

    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <br>
        @include('includes.homecrumb')
        <br>
        <br>
        <br>
        <br>
        <table id="mtable" class="table table-hover table-striped ">

            <thead class="">
            <tr>
                <th title="" class="purple3" >Theme</th>
                <th title="" class="purple3">Organizer</th>
                <th title="" class="purple3"> Date </th>
                <th title="" class="purple3">Time </th>
                <th title="" class="purple3" >Venue </th>
                <th class="purple3">Action</th>
            </tr>

            </thead>
            <tbody>
            @forelse($calenders as $table)
                <tr >
                    <td>
                        {{ $table->theme }}
                    </td>

                    <td>
                        {{ $table->organizer }}
                    </td>

                    <td>
                        {{ date('F d, Y ', strtotime($table->date))}}
                    </td>
                    <td>
                        {{ date('h:i', strtotime($table->time)) }}
                    </td>
                    <td class="purple3">
                        {{ $table->venue }}
                    </td>
                    <td>
                        <a href="{{ route('calender.front',$table->id  ) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        No Dates found!
                    </td>
                </tr>

            @endforelse

            </tbody>
        </table>
        <hr>

        <br>
        <br>
        <br>

        <span class="purple3"><b>SPEC: </b></span> Smile Planet Entrepreneurs Center
        <hr>
        <span class="purple3"><b>SPF: </b></span> Smile Planet Foundation
        <hr>
        <span class="purple2"><b>For: </b></span>  Partnership/Sponsorship/ Volunteers <a href="{{ route('home.sponsorship') }}" class="purple3">click here.</a>
        <hr>
        <p><span class="purple">Note:</span> The above listed Events & Dates are totally subjected to a 10% chances of change but with minimum one (1) month general public notice through all our available mediums/platforms thanks</p>
    </div>




@endsection
