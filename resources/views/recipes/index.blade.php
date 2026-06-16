@extends('layouts.recipes')

@section('title', )

@section("content")

<!-- Componente search-bar -->
<x-search-bar
    action="{{ route('recipes.index') }}"
    value="{{ $search ?? '' }}"
    placeholder="Cerca ricetta..."
    resetRoute="{{ route('recipes.index') }}" {{-- reset della ricerca --}}
/>

<!-- Tabella index ricette -->
<table class="table table-striped table-hover">
    <thead >
        <tr class="">
            <th scope="col">Ricetta</th>
            <th scope="col">Ingredienti</th>
            <th scope="col">Tempo</th>
            <th scope="col">kcal</th>
            <th scope="col">pro</th>
            <th scope="col">carb</th>
            <th scope="col">fat</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        {{-- Ciclazione delle ricette --}}
        @foreach ($recipes as $recipe)

        <tr class="position-relative">

            <td>{{ $recipe->name }}</td>
            <td>{{ count($recipe->ingredients)}}</td>
            <td>{{ $recipe->prep_time }} min</td>
            <td>{{ $recipe->kcal }}</td>
            <td>{{ $recipe->pro }}g</td>
            <td>{{ $recipe->carb }}g</td>
            <td>{{ $recipe->fat }}g</td>
            <td> {{-- la classe stretched-link permette di rendere cliccabile tutta la riga --}}
                <a href="{{ route('recipes.show', $recipe) }}" class="stretched-link"></a>
                <i class="bi bi-chevron-right"></i>
            </td>
            
        </tr>
        @endforeach

    </tbody>
</table>

<!-- Paginazione da components -->
<div class="d-flex justify-content-center mt-3">
    {{ $recipes->links('components.pagination') }}
</div>

@endsection