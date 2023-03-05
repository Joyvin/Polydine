<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.head')
    <title>PolyDine</title>
</head>
<body>
    <div class="" id="app">
        <polyheader/>
    </div>
    @vite('resources/js/app.js')
    @include('layouts.scripts')
</body>
</html>