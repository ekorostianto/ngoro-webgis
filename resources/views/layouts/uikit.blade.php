<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ngoro') }}</title>
    <!-- Styles -->
    <link href="{{ asset('/css/uikit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/uikit.min.js') }}" type="text/javascript" defer></script>
</head>
<body>
@include('layouts.components.navbar')

<header class="bg-header uk-light uk-position-relative">
    <div id="particles-js"></div>
    <div class='uk-section uk-section-xlarge uk-position-z-index' uk-height-viewport="expand: true">
        @yield('content')
    </div>
</header>

@include('layouts.components.offcanvas')

<script src="{{ asset('/js/uikit-icons.min.js') }}" type="text/javascript" defer></script>
<script src="{{ asset('/js/particles.js') }}" type="text/javascript" defer></script>
</body>
</html>