<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('View.sidebar')
            <div class="col-9 offset-3 p-0 position-relative">
                @include('View.header')
                @yield('content')
                @include('View.footer')
            </div>
        </div>
    </div>
