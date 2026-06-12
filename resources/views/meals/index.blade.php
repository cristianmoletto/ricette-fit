@extends('layouts.meals')

@section('title', "Pasti")

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
            <td> 
                <span>
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('meals.edit',$meal) }}"><i class="bi bi-pencil-square"></i> Modifica</a>
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMeal">
                            <i class="bi bi-trash3"></i> Elimina
                        </button>
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="deleteMeal" tabindex="-1" aria-labelledby="deleteMeal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteMeal">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare il pasto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('meals.destroy', $meal) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger bi bi-trash3" value="Elimina definitivamente">
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection