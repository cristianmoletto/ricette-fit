@extends('layouts.create')

@section('title', "Modifica il pasto")

@section("content")

{{-- Card form base --}}
<x-form-card title="Modifica il pasto" :cancelRoute="route('meals.index')">

    <form action="{{ route('meals.update', $meal) }}" method="POST" class="card-body">
        @csrf
        @method('PUT')

        <div class="d-flex flex-column">
            <label for="type" class="form-label">Nome del Pasto</label>
            <input type="text" name="type" id="type" class="form-control mb-3" value="{{ $meal->type }}" required>

            <input type="submit" value="Salva" class="btn btn-success mb-3">
        </div>

    </form>

</x-form-card>

@endsection
