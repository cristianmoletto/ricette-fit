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
        <div class="d-flex gap-2 my-2 justify-content-end">
            <a class="btn btn-secondary btn-sm" href="{{ route('recipes.edit',$recipe) }}"><i class="bi bi-pencil-square"></i> Modifica</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteRecipe">
                <i class="bi bi-trash3"></i> Elimina
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteRecipe" tabindex="-1" aria-labelledby="deleteRecipe" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteRecipe">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare la ricetta?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger bi bi-trash3" value="Elimina definitivamente">
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection