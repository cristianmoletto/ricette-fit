<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <title>Pasti &mdash; Ricette Fit</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    {{-- header --}}
    @auth
    <x-app-header active="meals" />
    @endauth

    {{-- Banner intestazione sezione Pasti --}}
    <x-page-header
        icon="bi-fork-knife"
        title="Pasti"
        :createRoute="route('meals.create')"
        createLabel="Nuovo pasto"
    />

    {{-- content --}}
    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    {{-- footer --}}
    @auth
    <x-app-footer />
    @endauth

</body>

</html>
