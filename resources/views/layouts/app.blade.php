<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/lodash@4.17.15"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- TODO: Add custom JS -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @include('feed::links')
</head>

<body>
    @yield('content')
</body>

</html>