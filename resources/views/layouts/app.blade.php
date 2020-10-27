<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if(View::hasSection('title'))
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @yield('meta_tags')

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div id="app">
    <v-app>
        <v-app-bar app flat>

            <v-img
                :contain="true"
                max-height="48px"
                src="/branding/sde/sde-logo-large.png"></v-img>

            <v-tabs centered class="ml-9" color="grey darken-1">
                <v-tab href="/">Hjem</v-tab>
                <v-tab href="#">Uddannelserne</v-tab>
                <v-tab href="#">SDE</v-tab>
            </v-tabs>
        </v-app-bar>

        <v-main>
            @yield('content')
        </v-main>

        <v-footer app>

        </v-footer>
    </v-app>
</div>
</body>
</html>