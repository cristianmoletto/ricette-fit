@extends('layouts.create')

@section('title', "Modifica l'ingrediente")

@section("content")

{{-- Card form con pulsante annulla e header scuro --}}
<x-form-card title="Modifica l'ingrediente" :cancelRoute="route('ingredients.index')">

    <form action="{{ route('ingredients.update', $ingredient) }}" method="POST" class="card-body">
        @csrf
        @method('PUT')

        <div class="d-flex flex-column">
            <label for="name" class="form-label">Nome Ingrediente</label>
            <input type="text" name="name" id="name" class="form-control mb-3" value="{{ $ingredient->name }}" required>

            <input type="submit" value="Salva" class="btn btn-success mb-3">
        </div>

    </form>

</x-form-card>

@endsection
