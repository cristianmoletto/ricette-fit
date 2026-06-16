@extends('layouts.ingredients')

@section('title', "Ingredienti")

@section("content")

{{-- Barra di ricerca ingredienti --}}
<x-search-bar
    action="{{ route('ingredients.index') }}"
    value="{{ $search ?? '' }}"
    placeholder="Cerca ingrediente..."
    resetRoute="{{ route('ingredients.index') }}" {{-- reset della ricerca --}}
/>

{{-- Tabella elenco ingredienti --}}
<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Ingrediente</th>
                <th scope="col">Gestisci</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td>{{ $ingredient->name }}</td>
                <td>
                    {{-- Azioni riga: modifica e apertura modal eliminazione --}}
                    <a class="btn btn-outline-secondary btn-sm opacity-75" href="{{ route('ingredients.edit', $ingredient) }}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm opacity-75" data-bs-toggle="modal" data-bs-target="#deleteIngredient">
                        <i class="bi bi-trash3"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal di conferma eliminazione (usa l'ultimo $ingredient del foreach) --}}
<x-delete-modal
    id="deleteIngredient"
    title="Elimina ingrediente"
    :itemName="$ingredient->name"
    :route="route('ingredients.destroy', $ingredient)"
/>

{{-- Paginazione --}}
<div class="d-flex justify-content-center mt-3">
    {{ $ingredients->links('components.pagination') }}
</div>

@endsection
