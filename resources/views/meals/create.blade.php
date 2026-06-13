@extends('layouts.create')

@section('title',"Aggiungi un pasto")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("meals.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Aggiungi un nuovo pasto</h5>
    </div>
    <form action="{{ route("meals.store") }}" method="POST" class="card-body">
        @csrf

        <div class="d-flex flex-column">
            <label for="type" class="form-label">Nome Pasto</label>
            <input type="text" name="type" id="type" class="form-control mb-3" required>

            <input type="submit" value="Salva" class="btn btn-success mb-3">

        </div>

    </form>
</div>

@endsection