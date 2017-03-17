<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<div class="container-fluid">

    <ul class="nav nav-pills">
        <li class="{{ Request::is('introduction') ? 'active' : '' }}">
            <a href="{{ url('introduction') }}">Introduction</a>
        </li>
        <li class="{{ Request::is('basic-usage') ? 'active' : '' }}">
            <a href="{{ url('basic-usage') }}">Basic usage</a>
        </li>
        <li class="{{ Request::is('converting-images') ? 'active' : '' }}">
            <a href="{{ url('converting-images') }}">Converting images</a>
        </li>
        <li class="{{ Request::is('converting-other-files') ? 'active' : '' }}">
            <a href="{{ url('converting-other-files') }}">Converting other files</a>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-4 markdown">
            @yield('content')
        </div>

        <div class="col-md-8">
            @yield('demo')
        </div>
    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
