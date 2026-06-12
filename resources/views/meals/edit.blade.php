@extends('layouts.create')

@section('title',"Modifica il pasto")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("meals.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<form action="{{ route("meals.update",$meal) }}" method="POST" class="card shadow-sm">
    @csrf

    <!-- Metodo PUT -->
     @method('PUT')


    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Modifica il pasto</h5>
    </div>

    <div class="form-control  d-flex flex-column">
        <label for="type">Nome Pasto</label>
        <input type="text" name="type" id="type" class="mb-3" value="{{ $meal->type }}">

        <input type="submit" value="Salva" class="btn btn-sm btn-success mb-3">

    </div>

</form>

@endsection