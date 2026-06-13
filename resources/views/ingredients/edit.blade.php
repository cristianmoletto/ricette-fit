@extends('layouts.create')

@section('title',"Modifica l'ingrediente")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("ingredients.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<div class="card">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Modifica l'ingrediente</h5>
    </div>

<form action="{{ route("ingredients.update", $ingredient) }}" method="POST" class="card-body">
    @csrf

    <!-- Metodo PUT -->
    @method('PUT')

    <div class="d-flex flex-column">
        <label for="name" class="form-label">Nome Ingrediente</label>
        <input type="text" name="name" id="name" class="form-control mb-3" value="{{ $ingredient->name }}">

        <input type="submit" value="Salva" class="btn btn-success mb-3">

    </div>

</form>
</div>

@endsection