<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ricette Fit') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light min-vh-100 d-flex flex-column">
    <div id="app" class="d-flex flex-column min-vh-100">

        @auth
        <nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <i class="bi bi-heart-pulse-fill fs-5"></i>
                    Ricette Fit
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="bi bi-house me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/recipes') }}">
                                <i class="bi bi-journal-text me-1"></i>Ricette
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/meals') }}">
                                <i class="bi bi-egg-fried me-1"></i>Pasti
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/ingredients') }}">
                                <i class="bi bi-basket me-1"></i>Ingredienti
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <li><span class="dropdown-item-text text-muted small">{{ Auth::user()->name }}</span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        <i class="bi bi-person me-2 text-success"></i>Il mio profilo
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endauth

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        @auth
        <footer class="bg-dark text-secondary py-3 mt-auto">
            <div class="container text-center small">
                <i class="bi bi-heart-pulse-fill text-success me-1"></i>
                Ricette Fit &mdash; La tua app per il benessere
            </div>
        </footer>
        @endauth

    </div>
</body>

</html>
