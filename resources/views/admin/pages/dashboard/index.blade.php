<?php $active['dashboard'] = 'imactive';  ?>

@extends('admin.layouts.admin')

@section('content')



    <div class="panel panel-default material-panel lite-gray-bg">
        <div class="panel-body">
            <div class="col-sm-3" style="min-width: 200px;">
                <a href="{{ route('console.visitors') }}" class="">
                    <div class="mpann bg-gray">
                        <h4 class="text-center"> <i class="fa fa-line-chart"></i> <span>Analytics</span></h4>
                        <h4>Visitors Today: <span style="margin-left: 13px">{{ count($visits) }}</span> </h4>
                    </div>
                </a>

            </div>

            <div class="col-sm-3" style="min-width: 200px;">
                <div class="mpann bg-blue">
                    <h1 class="text-center"> <i class="fa fa-ticket"></i> <span>TICKETS</span></h1>
                </div>
            </div>

            <div class="col-sm-3 " style="min-width: 200px;">
                <div class="mpann bg-orange">
                    <h1 class="text-center"> <i class="fa fa-suitcase"></i> <span>JOBS</span></h1>
                </div>
            </div>

            <div class="col-sm-3" style="min-width: 200px;">
                <a href="{{ route('console.makemail') }}" class="" style="">
                    <div class="mpann" style="background: #ffffff; border: 1px solid #cdcdcd">
                        <h1 class="text-center"><i class="fa fa-envelope"></i> </h1>
                        <p class="text-center">SEND MAILS</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('console.courses') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-book" style="font-size: 50px;"></i></p>
                        <br>
                        <h1 class="text-center">Courses</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('console.calender') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-calendar" style="font-size: 50px;"></i></p>
                        <br>
                        <h1 class="text-center">Calender</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('console.tube') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-youtube-play" style="font-size: 50px; color: red"></i></p>
                        <br>
                        <h1 class="text-center">Video</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('ticketer') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-ticket" style="font-size: 50px; color: green"></i></p>
                        <br>
                        <h1 class="text-center">Tickets</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('blog.index') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-newspaper-o" style="font-size: 50px; color: green"></i></p>
                        <br>
                        <h1 class="text-center">Manage Blog</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('slider.index') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-image" style="font-size: 50px; color: rgba(33,33,33,0.92)"></i></p>
                        <br>
                        <h1 class="text-center">Home Sliders</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default material-panel lite-gray-bg">
                <a href="{{ route('faq.index') }}">
                    <div class="panel-body">

                        <p class="text-center" style="margin: 0;padding: 0"><i class="fa fa-question-circle" style="font-size: 50px; color: rgba(33,33,33,0.92)"></i></p>
                        <br>
                        <h1 class="text-center">F A Q</h1>
                    </div>
                </a>
            </div>
        </div>

    </div>





@endsection


