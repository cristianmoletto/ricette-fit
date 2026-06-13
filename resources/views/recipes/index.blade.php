@extends('layouts.recipes')

@section('title', )

@section("content")

<div class="d-flex justify-content-between align-items-center mb-4">

</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
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
        @foreach ($recipes as $recipe)

        <tr class="position-relative">

            <td>{{ $recipe->name }}</td>
            <td>{{ count($recipe->ingredients)}}</td>
            <td>{{ $recipe->prep_time }} min</td>
            <td>{{ $recipe->kcal }}</td>
            <td>{{ $recipe->pro }}g</td>
            <td>{{ $recipe->carb }}g</td>
            <td>{{ $recipe->fat }}g</td>
            <td><a href="{{ route('recipes.show', $recipe) }}" class="stretched-link"></a><i class="bi bi-chevron-right"></i></a></td>
            
        </tr>
        @endforeach
    </tbody>
</table>

@endsection