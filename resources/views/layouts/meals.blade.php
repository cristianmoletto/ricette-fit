<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <title>Pasti &mdash; Ricette Fit</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    @auth
    <nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                <i class="bi bi-heart-pulse-fill fs-5"></i>
                Ricette Fit
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMeals" aria-controls="navbarMeals"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMeals">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="bi bi-house me-1"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/recipes') }}"><i class="bi bi-journal-text me-1"></i>Ricette</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/meals') }}"><i class="bi bi-fork-knife me-1"></i>Pasti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ingredients') }}"><i class="bi bi-basket me-1"></i>Ingredienti</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus me-1"></i>Registrati</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    onclick="event.preventDefault(); document.getElementById('logout-form-meals').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form-meals" action="{{ route('logout') }}" method="POST" class="d-none">
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

    <div class="bg-success bg-opacity-10 border-bottom border-success border-opacity-25 py-3">
        <div class="container d-flex justify-content-between">
            <h1 class="h4 mb-0 text-success fw-bold">
                <i class="bi bi-fork-knife me-2"></i>@yield('title', 'Pasti')
            </h1>
                <a href="{{ route('meals.create') }}" class="btn btn-success btn-sm">
                    &oplus; Nuovo pasto
                </a>
        </div>
    </div>

    <main class="container py-4 flex-grow-1">
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

</body>

</html>