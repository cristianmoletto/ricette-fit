@extends('layouts.create')

@section('title', "Aggiungi una ricetta")

@section("content")

{{-- Card form con pulsante annulla e header scuro --}}
<x-form-card title="Aggiungi una ricetta" :cancelRoute="route('recipes.index')">

    <form action="{{ route('recipes.store') }}" method="POST" class="card-body" enctype="multipart/form-data">
        @csrf

        <div class="d-flex flex-column">

            <label for="name" class="form-label"><i class="bi bi-alphabet" style="color:green"></i> Nome Ricetta</label>
            <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Inserisci il nome della ricetta" required>

            <label for="image" class="form-label"><i class="bi bi-image" style="color:green"></i> Immagine</label>
            <input type="file" name="image" id="image" class="form-control mb-3" required>

            <label for="description" class="form-label"><i class="bi bi-text-paragraph" style="color:green"></i> Descrizione</label>
            <textarea name="description" id="description" rows="4" class="form-control mb-3" placeholder="Scrivi i passaggi per la preparazione" required></textarea>

            {{-- Selettore ingredienti con ricerca live (gestito da script-recipes) --}}
            <label class="form-label"><i class="bi bi-fork-knife" style="color:green"></i> Ingredienti</label>
            <input type="text" id="ingredient-search" class="form-control mb-2" placeholder="Cerca ingrediente...">
            <div id="ingredient-dropdown" class="list-group mb-2" style="display:none; max-height:200px; overflow-y:auto;"></div>
            <div id="selected-ingredients" class="d-flex flex-wrap gap-2 mb-3"></div>

            {{-- Selettore pasti (checkbox multipli) --}}
            <label class="form-label"><i class="bi bi-egg-fried" style="color:green"></i> Pasti</label>
            <div class="d-flex flex-wrap gap-3 mb-3">
                @foreach($meals as $meal)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="meals[]" value="{{ $meal->id }}" id="meal_{{ $meal->id }}">
                    <label class="form-check-label" for="meal_{{ $meal->id }}">{{ $meal->type }}</label>
                </div>
                @endforeach
            </div>
            <hr>

            {{-- Slider tempo di preparazione (valore aggiornato live da script-recipes) --}}
            <div class="col mb-3">
                <label for="prep_time" class="form-label">
                    <i class="bi bi-alarm" style="color:green"></i> Tempo di preparazione:
                    <span id="prep_time_value" class="fw-bold">30</span> min
                </label>
                <input type="range" name="prep_time" min="10" max="90" step="5" id="prep_time" class="form-range" value="30">
            </div>

            {{-- Valori nutrizionali (kcal calcolato automaticamente da script-recipes) --}}
            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="kcal" class="form-label">Calorie</label>
                    <input type="number" name="kcal" id="kcal" class="form-control" readonly value="0">
                </div>
                <div class="col">
                    <label class="form-label" for="pro">Proteine</label>
                    <input type="number" name="pro" id="pro" class="form-control" value="0">
                </div>
                <div class="col">
                    <label class="form-label" for="carb">Carboidrati</label>
                    <input type="number" name="carb" id="carb" class="form-control" value="0">
                </div>
                <div class="col">
                    <label class="form-label" for="fat">Grassi</label>
                    <input type="number" name="fat" id="fat" class="form-control" value="0">
                </div>
            </div>

            <input type="submit" value="Salva" class="btn btn-success mb-3">

        </div>

    </form>

</x-form-card>

@push('scripts')
    @include('partials.script-recipes')
@endpush

@endsection
