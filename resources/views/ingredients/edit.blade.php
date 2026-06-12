@extends('layouts.create')

@section('title',"Modifica l'ingrediente")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("ingredients.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<form action="{{ route("ingredients.update", $ingredient) }}" method="POST" class="card shadow-sm">
    @csrf

    <!-- Metodo PUT -->
    @method('PUT')

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Modifica l'ingrediente</h5>
    </div>

    <div class="form-control  d-flex flex-column">
        <label for="name">Nome Ingrediente</label>
        <input type="text" name="name" id="name" class="mb-3" value="{{ $ingredient->name }}">

        <input type="submit" value="Salva" class="btn btn-sm btn-success mb-3">

    </div>

</form>

@endsection