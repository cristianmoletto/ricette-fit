@extends('layouts.ingredients')

@section('title', "Tutti gli ingredienti")

@section("content")
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
                <td> Azioni >> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection