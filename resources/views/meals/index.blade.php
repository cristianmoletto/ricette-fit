@extends('layouts.meals')

@section('title', "Pasti")

@section("content")

<!-- <table class="table table-striped table-hover">
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
<!-- <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteMeal">
                                <i class="bi bi-trash3"></i> Elimina
                            </button>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> -->


<div class="container">
    <div class="row g-3">
        @foreach ($meals as $meal)
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body position-relative">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 bg-success bg-opacity-10 p-3 fs-3 text-success">
                            <i class="bi bi-fork-knife"></i>
                        </div>
                        <div class="fs-5 fw-bold text-dark lh-1">{{ $meal->type }}</div>
                    </div>
                    <div class="position-absolute bottom-0 end-0 p-2 d-flex gap-1">
                        <a class="btn btn-outline-secondary btn-sm opacity-50" style="border-radius:50%" href="{{ route('meals.edit',$meal) }}"><i class="bi bi-pencil-square"></i></a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-sm opacity-50" style="border-radius:50%" data-bs-toggle="modal" data-bs-target="#deleteMeal">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteMeal" tabindex="-1" aria-labelledby="deleteMeal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Elimina pasto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare <span class="fw-semibold">{{ $meal->type }}</span>? L'operazione non è reversibile.
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