@extends("layouts.recipes")

@section("title", $recipe->name)

@section("content")

<div class="mb-3">
    <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary btn-sm">
        &larr; Torna all'elenco
    </a>
</div>

<div class="card shadow-sm overflow-hidden">

    {{-- Immagine hero --}}
    @if($recipe->image)
    <img src="{{ $recipe->image }}" class="card-img-top object-fit-cover" style="max-height:180px;" alt="{{ $recipe->name }}">
    @endif
    
    {{-- Header --}}
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-1 text-uppercase">{{ $recipe->name }}</h5>
        <span class="badge bg-success"><i class="bi bi-alarm me-1"></i>{{ $recipe->prep_time }} min</span>
    </div>
    

    <div class="card-body">

        {{-- Valori nutrizionali --}}
        <div class="row g-2 mb-4 text-center">
            <div class="col">
                <div class="border rounded py-2 bg-warning bg-opacity-10">
                    <div class="fw-bold text-warning fs-5">{{ $recipe->kcal }}</div>
                    <div class="text-muted small">kcal</div>
                </div>
            </div>
            <div class="col">
                <div class="border rounded py-2 bg-danger bg-opacity-10">
                    <div class="fw-bold text-danger fs-5">{{ $recipe->pro }}g</div>
                    <div class="text-muted small">proteine</div>
                </div>
            </div>
            <div class="col">
                <div class="border rounded py-2 bg-primary bg-opacity-10">
                    <div class="fw-bold text-primary fs-5">{{ $recipe->carb }}g</div>
                    <div class="text-muted small">carboidrati</div>
                </div>
            </div>
            <div class="col">
                <div class="border rounded py-2 bg-secondary bg-opacity-10">
                    <div class="fw-bold text-secondary fs-5">{{ $recipe->fat }}g</div>
                    <div class="text-muted small">grassi</div>
                </div>
            </div>
        </div>

        {{-- Descrizione --}}
        <h6 class="text-muted"><i class="bi bi-text-paragraph me-1"></i> Descrizione</h6>
        <p class="mb-4">{{ $recipe->description }}</p>

        {{-- Ingredienti --}}
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

        {{-- Azioni --}}
        <div class="d-flex gap-2 justify-content-end">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('recipes.edit',$recipe) }}">
                <i class="bi bi-pencil-square"></i> Modifica
            </a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteRecipe">
                <i class="bi bi-trash3"></i> Elimina
            </button>
        </div>

    </div>
</div>

{{-- Modal eliminazione --}}
<div class="modal fade" id="deleteRecipe" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Elimina ricetta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare <strong>{{ $recipe->name }}</strong>? L'operazione non è reversibile.
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3 me-1"></i>Elimina definitivamente
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
