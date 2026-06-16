@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Intestazione dashboard --}}
    <div class="py-4 mb-4">
        <h2 class="fw-bold text-success mb-1">
            <i class="bi bi-heart-pulse-fill me-2"></i>Dashboard Ricette Fit
        </h2>
        <p class="text-muted mb-0">Panoramica dell'archivio admin</p>
    </div>

    {{-- Tre stat-card: ricette, ingredienti, pasti --}}
    <div class="row g-4">

        <x-stat-card
            icon="bi-journal-text"
            color="success"
            :value="$recipesCount"
            label="Ricette"
            :link="url('/recipes')"
        />

        <x-stat-card
            icon="bi-basket"
            color="warning"
            :value="$ingredientsCount"
            label="Ingredienti"
            :link="url('/ingredients')"
        />

        <x-stat-card
            icon="bi-fork-knife"
            color="info"
            :value="$mealsCount"
            label="Pasti"
            :link="url('/meals')"
        />

    </div>

</div>
@endsection
