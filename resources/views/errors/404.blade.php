<?php
    $jslinks = ['countdown.js', 'main.js'];
    $titlename = 'smileplanetef.org';

?>

@extends('includes.app')

@section('content')
    <br>
    <div class="row" style="margin: 0 10px">
        <div class="text-center" style="margin-top: 5%;font-size: 100px; color: #9d9d9d">
            <span style="margin-left: 30px">A R E</span>
            <span style="margin-left: 30px">Y O U</span>
            <span style="margin-left: 30px">L O S T?</span>
        </div>

        <p class="text-center" style="color: #9d9d9d">
            let us help you find what you are looking for!
        </p>
        <br>
        <form action="">
            <input type="text" class="form-control">
            <br>
            <button class="btn btn-sm btn-info btn-block" type="submit"> <i class="fa fa-search"></i> Search</button>
        </form>
    </div>




    
@endsection
