<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="School Market, sket">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ url('img/icon1.png') }}" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMILE ADMIN</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

</head>
<body>

<div class="" id="login" style="background-image: url('{{ url('img/city.jpg') }}');">
        @yield('content')
    </div>

<!-- Scripts -->

@include('admin/layouts/scripts')

</body>
</html>
