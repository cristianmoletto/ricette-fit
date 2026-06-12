@extends('layouts.app')

@section('content')
<div class="container">

    <div class="py-4 mb-4">
        <h2 class="fw-bold text-success mb-1">
            <i class="bi bi-heart-pulse-fill me-2"></i>Dashboard Ricette Fit
        </h2>
        <p class="text-muted mb-0">Panoramica dell'archivio admin</p>
    </div>

    <div class="row g-4">

        <div class="col-sm-6 col-lg-4">
            <a href="{{ url('/recipes') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-4 p-4">
                        <div class="rounded-3 bg-success bg-opacity-10 p-3 fs-2 text-success">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <div>
                            <div class="fs-1 fw-bold text-dark lh-1">{{ $recipesCount }}</div>
                            <div class="text-muted mt-1">Ricette</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-4">
            <a href="{{ url('/ingredients') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-4 p-4">
                        <div class="rounded-3 bg-warning bg-opacity-10 p-3 fs-2 text-warning">
                            <i class="bi bi-basket"></i>
                        </div>
                        <div>
                            <div class="fs-1 fw-bold text-dark lh-1">{{ $ingredientsCount }}</div>
                            <div class="text-muted mt-1">Ingredienti</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-4">
            <a href="{{ url('/meals') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-4 p-4">
                        <div class="rounded-3 bg-info bg-opacity-10 p-3 fs-2 text-info">
                            <i class="bi bi-egg-fried"></i>
                        </div>
                        <div>
                            <div class="fs-1 fw-bold text-dark lh-1">{{ $mealsCount }}</div>
                            <div class="text-muted mt-1">Pasti</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
