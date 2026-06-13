@extends('layouts.ingredients')

@section('title', "Ingredienti")

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
                <td>
                    <span>
                        <a class="btn btn-outline-secondary btn-sm opacity-75" href="{{ route('ingredients.edit',$ingredient) }}"><i class="bi bi-pencil-square"></i></a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-sm opacity-75" data-bs-toggle="modal" data-bs-target="#deleteIngredient">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteIngredient" tabindex="-1" aria-labelledby="deleteIngredient" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Elimina ingrediente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare <span class="fw-semibold">{{ $ingredient->name }}</span>? L'operazione non è reversibile.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST">
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