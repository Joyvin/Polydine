<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.head')
    <title>PolyDine</title>
</head>
<body style="padding-top: 120px">
    <div class="" id="app">
        <div class=""><polyheader/></div>
        @yield('page')
    </div>
    @vite('resources/js/app.js')
    @include('layouts.scripts')
</body>
</html>