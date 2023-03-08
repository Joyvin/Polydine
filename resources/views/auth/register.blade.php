<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.head')
    <title>PolyDine</title>
</head>
<body class="bg-soft-primary">
    <div class="" id="app">
        <div class="home-btn d-none d-sm-block">
            <a href="{{ url('dashboard') }}" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <register/>
    </div>
    @vite('resources/js/app.js')
    @include('layouts.scripts')
</body>
</html>