@extends('layouts.create')

@section('title',"Aggiungi un ingrediente")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("ingredients.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<form action="{{ route("ingredients.store") }}" method="POST" class="card shadow-sm">
    @csrf


    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Aggiungi un nuovo ingrediente</h5>
    </div>

    <div class="form-control  d-flex flex-column">
        <label for="name">Nome Ingrediente</label>
        <input type="text" name="name" id="name" class="mb-3">

        <input type="submit" value="Salva" class="btn btn-sm btn-success mb-3">

    </div>

</form>

@endsection