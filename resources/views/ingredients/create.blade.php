@extends('layouts.create')

@section('title', "Aggiungi un ingrediente")

@section("content")

{{-- Card form con pulsante annulla e header scuro --}}
<x-form-card title="Aggiungi un nuovo ingrediente" :cancelRoute="route('ingredients.index')">

    <form action="{{ route('ingredients.store') }}" method="POST" class="card-body">
        @csrf

        <div class="d-flex flex-column">
            <label for="name" class="form-label">Nome Ingrediente</label>
            <input type="text" name="name" id="name" class="form-control mb-3" required>

            <input type="submit" value="Salva" class="btn btn-success mb-3">
        </div>

    </form>

</x-form-card>

@endsection
