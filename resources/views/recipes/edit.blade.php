@extends('layouts.create')

@section('title',"Modifica la ricetta")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("recipes.show",$recipe) }}"><i class="bi bi-x-lg"></i> Annulla</a>

<form action="{{ route("recipes.update",$recipe) }}" method="POST" class="card shadow-sm">
    @csrf

    <!-- Metodo Put -->
     @method('PUT')


    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Aggiungi una ricetta</h5>
    </div>

    <div class="form-control  d-flex flex-column">
        <label for="name">Nome Ricetta</label>
        <input type="text" name="name" id="name" class="mb-3" value="{{ $recipe->name }}">

        <label for="image">Immagine</label>
        <input type="text" name="image" id="image" class="mb-3" value="{{ $recipe->image }}">

        <label for="description">Descrizione</label>
        <textarea type="text" name="description" id="description" width="100%" rows="4" class="mb-3" >{{ $recipe->description }}</textarea>

        <label for="prep_time">Tempo di preparazione (min)</label>
        <input type="number" name="prep_time" id="prep_time" class="mb-3" value="{{ $recipe->prep_time }}">

        <label for="kcal">Calorie</label>
        <input type="number" name="kcal" id="kcal" class="mb-3" value="{{ $recipe->kcal }}">

        <label for="pro">Proteine</label>
        <input type="number" name="pro" id="pro" class="mb-3" value="{{ $recipe->pro }}">

        <label for="carb">Carboidrati</label>
        <input type="number" name="carb" id="carb" class="mb-3" value="{{ $recipe->carb }}">

        <label for="fat">Grassi</label>
        <input type="number" name="fat" id="fat" class="mb-3" value="{{ $recipe->fat }}">


        <input type="submit" value="Salva" class="btn btn-sm btn-success mb-3">

    </div>

</form>

@endsection