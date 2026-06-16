@extends("layouts.recipes")

@section("title", $recipe->name)

@section("content")

{{-- Bottone indietro --}}
<div class="mb-3">
    <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary btn-sm">
        &larr; Torna all'elenco
    </a>
</div>

<div class="card shadow-sm overflow-hidden">

    {{-- Immagine hero (se presente) --}}
    @if($recipe->image)
    <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top object-fit-cover" style="max-height:200px;" alt="{{ $recipe->name }}">
    @endif

    {{-- Header con nome ricetta e tempo di preparazione --}}
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-1 text-uppercase">{{ $recipe->name }}</h5>
        <span class="badge bg-success"><i class="bi bi-alarm me-1"></i>{{ $recipe->prep_time }} min</span>
    </div>

    <div class="card-body">

        {{-- Griglia valori nutrizionali --}}
        <x-nutrition-grid
            :kcal="$recipe->kcal"
            :pro="$recipe->pro"
            :carb="$recipe->carb"
            :fat="$recipe->fat"
        />

        {{-- Descrizione --}}
        <h6 class="text-muted"><i class="bi bi-text-paragraph me-1"></i> Descrizione</h6>
        <p class="mb-4">{{ $recipe->description }}</p>

        {{-- Pasti associati (badge per tipo pasto) --}}
        @if($recipe->meals->isNotEmpty())
        <h6 class="text-muted"><i class="bi bi-egg-fried me-1"></i> Pasti</h6>
        <div class="d-flex flex-wrap gap-2 mb-4">
            @foreach($recipe->meals as $meal)
            <span class="badge text-bg-secondary">{{ $meal->type }}</span>
            @endforeach
        </div>
        @endif

        {{-- Ingredienti associati (card griglia) --}}
        @if($recipe->ingredients->isNotEmpty())
        <h6 class="text-muted"><i class="bi bi-fork-knife me-1"></i> Ingredienti</h6>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-2 mb-4">
            @foreach($recipe->ingredients as $ingredient)
            <div class="col">
                <div class="card text-center border-success h-100">
                    <div class="card-body py-2 px-1">
                        <span class="small fw-semibold">{{ $ingredient->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Azioni: modifica ed elimina --}}
        <div class="d-flex gap-2 justify-content-end">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('recipes.edit', $recipe) }}">
                <i class="bi bi-pencil-square"></i> Modifica
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteRecipe">
                <i class="bi bi-trash3"></i> Elimina
            </button>
        </div>

    </div>
</div>

{{-- Modal di conferma eliminazione ricetta --}}
<x-delete-modal
    id="deleteRecipe"
    title="Elimina ricetta"
    :itemName="$recipe->name"
    :route="route('recipes.destroy', $recipe)"
/>

@endsection
