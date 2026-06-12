@extends('layouts.meals')

@section('title', "Tutti i pasti")

@section("content")

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Pasto</th>
            <th scope="col">Gestisci</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($meals as $meal)

        <tr>
            <td>{{ $meal->id }}</td>
            <td>{{ $meal->type }}</td>
            <td> Azioni -> </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection