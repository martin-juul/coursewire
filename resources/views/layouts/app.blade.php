<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#">
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

    <link rel="shortcut icon" type="image/x-icon" href="/branding/sde/favicon.png"/>


    @if(View::hasSection('og.type'))
        <meta property="og:type" content="@yield('og.type')">
    @else
        <meta property="og:type" content="website">
    @endif
    <meta name="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>

    @yield('meta_tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="generator" content="CourseWire by Martin Juul">
    <meta name="author" content="{{ config('branding.customer') }}">
    <meta name="copyright" content="{{ config('branding.name') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <script type="application/ld+json">
        @if(app()->environment('local'))
            {!! json_encode($ldwebpage, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        @else
            {!! json_encode($ldwebpage, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        @endif
    </script>

    <link rel="preconnect dns-prefetch" href="https://fonts.gstatic.com/" crossorigin/>
    <link rel="preconnect dns-prefetch" href="https://cdn.jsdelivr.net"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script>
        window.__COURSEWIRE_CONFIG__ = "{!! addslashes(json_encode($config, JSON_THROW_ON_ERROR)) !!}";
    </script>

    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}" defer async></script>
    <script src="{{ mix('js/app.js') }}" defer async></script>
</head>
<body class="font-sans antialiased" dusk="{{ request()->route()->getName() }}">
@if(View::hasSection('jsonld'))
    @yield('jsonld')
@else
    @isset($ldschema)
        <script type="application/ld+json">
            @if(app()->environment('local'))
                {!! json_encode($ldschema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
            @else
                {!! json_encode($ldschema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
            @endif
        </script>
    @endisset
@endif

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
