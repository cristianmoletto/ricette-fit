<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <title>@yield('title') &mdash; Ricette Fit</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    @auth
    <x-app-header />
    @endauth


    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    @auth
    <x-app-footer />
    @endauth

    @stack('scripts')
</body>

</html>