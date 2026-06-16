<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RicetteFit') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light min-vh-100 d-flex flex-column">
    <div id="app" class="d-flex flex-column min-vh-100">

        {{-- header --}}
        @auth
        <x-app-header active="home" />
        @endauth

        {{-- main --}}
        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        {{-- footer --}}
        @auth
        <x-app-footer />
        @endauth

    </div>
</body>

</html>
