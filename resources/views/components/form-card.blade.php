{{--
    Form riutilizzabile per i form create/edit
    Usato in: recipes/create, recipes/edit, ingredients/create, ingredients/edit, meals/create, meals/edit.
--}}

@props(['title', 'cancelRoute'])

{{-- Pulsante per tornare indietro senza salvare --}}
<a class="btn btn-outline-secondary my-3" href="{{ $cancelRoute }}">
    <i class="bi bi-x-lg"></i> Annulla
</a>

<div class="card">

    {{-- Header della card --}}
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">{{ $title }}</h5>
    </div>

    {{-- Contenuto del form (iniettato tramite slot) --}}
    {{ $slot }}

</div>
