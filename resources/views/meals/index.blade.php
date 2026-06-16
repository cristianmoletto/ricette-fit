@extends('layouts.meals')

@section('title', "Pasti")

@section("content")

{{-- Griglia card pasti --}}
<div class="container">
    <div class="row g-3">
        @foreach ($meals as $meal)
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body position-relative">

                    {{-- Icona e nome del pasto --}}
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-2 bg-success bg-opacity-10 p-3 fs-3 text-success">
                            <i class="bi bi-fork-knife"></i>
                        </div>
                        <div class="fs-5 fw-bold text-dark lh-1">{{ $meal->type }}</div>
                    </div>

                    {{-- Azioni: modifica e apertura modal eliminazione --}}
                    <div class="position-absolute bottom-0 end-0 p-2 d-flex gap-1">
                        <a class="btn btn-outline-secondary btn-sm opacity-50" style="border-radius:50%" href="{{ route('meals.edit', $meal) }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
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

{{-- Modal di conferma eliminazione (usa l'ultimo $meal del foreach) --}}
<x-delete-modal
    id="deleteMeal"
    title="Elimina pasto"
    :itemName="$meal->type"
    :route="route('meals.destroy', $meal)"
/>

@endsection
