@extends('layouts.recipes')

@section('title', "Tutte le ricette")

@section("content")

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Ricetta</th>
            <th scope="col">Preparazione</th>
            <th scope="col">kcal</th>
            <th scope="col">pro</th>
            <th scope="col">carb</th>
            <th scope="col">fat</th>
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
        </tr>
        @endforeach
    </tbody>
</table>

@endsection