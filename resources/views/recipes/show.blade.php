@extends("layouts.recipes")

@section("title", )

@section("content")

<div class="mb-3">
    <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary btn-sm">
        &larr; Torna all'elenco
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">{{ $recipe->name }}</h5>
    </div>
    <div class="card-body">
        <dl class="row mb-0">

            <dt class="col-sm-3">Image</dt>
            <dd class="col-sm-9">{{ $recipe->image }}</dd>

            <dt class="col-sm-3">Descrizione</dt>
            <dd class="col-sm-9">{{ $recipe->description }}</dd>

            <dt class="col-sm-3">Tempo di preparazione</dt>
            <dd class="col-sm-9">{{ $recipe->prep_time }} min</dd>
        </dl>

        <dl class="row mb-0">
            <dt class="col-sm-3">Valori nutrizionali</dt>
            <dd class="col-sm-9">
                <span class="badge rounded-pill text-bg-warning">Kcal {{ $recipe->kcal }}</span> 
                <span class="badge rounded-pill text-bg-secondary">Pro {{ $recipe->pro }}</span>
                <span class="badge rounded-pill text-bg-secondary">Carb {{ $recipe->carb }}</span>
                <span class="badge rounded-pill text-bg-secondary">Fat {{ $recipe->fat }}</span>
        </dl>
    </div>
</div>

@endsection