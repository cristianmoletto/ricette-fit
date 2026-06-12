@extends('layouts.create')

@section('title',"Aggiungi una ricetta")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("recipes.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<form action="{{ route("recipes.store") }}" method="POST" class="card shadow-sm">
    @csrf


    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Aggiungi una ricetta</h5>
    </div>

    <div class="form-control  d-flex flex-column">
        <label for="name">Nome Ricetta</label>
        <input type="text" name="name" id="name" class="mb-3">

        <label for="image">Immagine</label>
        <input type="text" name="image" id="image" class="mb-3">

        <label for="description">Descrizione</label>
        <textarea type="text" name="description" id="description" width="100%" rows="4" class="mb-3"></textarea>

        <label for="prep_time">Tempo di preparazione (min)</label>
        <input type="number" name="prep_time" id="prep_time" class="mb-3">

        <label for="kcal">Calorie</label>
        <input type="number" name="kcal" id="kcal" class="mb-3">

        <label for="pro">Proteine</label>
        <input type="number" name="pro" id="pro" class="mb-3">

        <label for="carb">Carboidrati</label>
        <input type="number" name="carb" id="carb" class="mb-3">

        <label for="fat">Grassi</label>
        <input type="number" name="fat" id="fat" class="mb-3">


        <input type="submit" value="Salva" class="btn btn-sm btn-success mb-3">

    </div>

</form>

@endsection