@props(['active' => ''])

{{-- Navbar principale con brand, voci di menu e dropdown utente --}}
<nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm">
    <div class="container">

        {{-- Icona --}}
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
            <i class="bi bi-heart-pulse-fill fs-5"></i>
            Ricette Fit Admin
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                {{-- Home --}}
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="bi bi-house me-1"></i>Home
                    </a>
                </li>
                {{-- Ricette --}}
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'recipes' ? 'active' : '' }}" href="{{ url('/recipes') }}">
                        <i class="bi bi-journal-text me-1"></i>Ricette
                    </a>
                </li>
                {{-- Pasti --}}
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'meals' ? 'active' : '' }}" href="{{ url('/meals') }}">
                        <i class="bi bi-fork-knife me-1"></i>Pasti
                    </a>
                </li>
                {{-- Ingredienti --}}
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'ingredients' ? 'active' : '' }}" href="{{ url('/ingredients') }}">
                        <i class="bi bi-basket me-1"></i>Ingredienti
                    </a>
                </li>
            </ul>

            {{-- Sezione user / guest --}}
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
                </li>
                
                {{-- Utente non registrato --}}
                @if (Route::has('register')) 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus me-1"></i>Registrati</a>
                </li>
                @endif
                
                {{-- Utente registrato menù dropdown --}}
                @else 
                <li class="nav-item dropdown">

                    {{-- Nome utente sulla navbar --}}
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>{{ Auth::user()->name }}
                    </a>

                    {{-- Lista dropdown --}}
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">

                        {{-- Profilo utente --}}
                        <li>
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                <i class="bi bi-person me-2 text-success"></i>Il mio profilo
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>

                        {{-- Logout --}}
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
