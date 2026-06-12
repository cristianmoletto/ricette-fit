@extends('layouts.recipes')

@section('title', )

@section("content")

<div class="d-flex justify-content-between align-items-center mb-4">
    
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Ricetta</th>
            <th scope="col">Preparazione</th>
            <th scope="col">kcal</th>
            <th scope="col">pro</th>
            <th scope="col">carb</th>
            <th scope="col">fat</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recipes as $recipe)

        <tr>
            
                <td>{{ $recipe->name }}</td>
                <td>{{ $recipe->prep_time }} min</td>
                <td>{{ $recipe->kcal }}</td>
                <td>{{ $recipe->pro }}g</td>
                <td>{{ $recipe->carb }}g</td>
                <td>{{ $recipe->fat }}g</td>
                <td><a href="{{ route('recipes.show', $recipe) }}"><i class="bi bi-chevron-right"></i></a></td>
            
        </tr>
        @endforeach
    </tbody>
</table>

@endsection