<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Ngoro') }}</title>    
</head>
<body>
<iframe width="100%" height="520" frameborder="0" src="https://r140e.carto.com/builder/a3fdce6e-15cd-4d20-b1a5-381cc202e371/embed" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
</body>
</html>