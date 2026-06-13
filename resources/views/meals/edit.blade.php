@extends('layouts.create')

@section('title',"Modifica il pasto")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("meals.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>


<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Modifica il pasto</h5>
    </div>

    <form action="{{ route("meals.update",$meal) }}" method="POST" class="card-body">
        @csrf

        <!-- Metodo PUT -->
        @method('PUT')

        <div class="d-flex flex-column">
            <label for="type" class="form-label">Nome del Pasto</label>
            <input type="text" name="type" id="type" class="form-control mb-3" value="{{ $meal->type }}" required>

            <input type="submit" value="Salva" class="btn btn-success mb-3">

        </div>

    </form>
</div>

@endsection