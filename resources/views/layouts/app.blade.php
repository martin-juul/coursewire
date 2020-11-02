<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if(View::hasSection('title'))
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @yield('meta_tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="copyright" content="Martin Juul">
    <meta name="author" content="{{ config('app.customer') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script>
        window.__COURSEWIRE_CONFIG__ = "{!! addslashes(json_encode($config, JSON_THROW_ON_ERROR)) !!}"
    </script>

    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div id="app">
    <v-app>

        <wire-masthead></wire-masthead>

        <v-main>
            <router-view></router-view>
        </v-main>

        <wire-impressum></wire-impressum>
    </v-app>
</div>

@include('cookieConsent::index')
</body>
</html>
