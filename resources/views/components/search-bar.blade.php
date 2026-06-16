@props([
    'action',
    'value' => '',
    'placeholder' => 'Cerca...',
    'resetRoute' => null,
])

{{-- Barra di ricerca --}}
<div class="container mb-3">

    {{-- form get per ottenere gli elementi --}}
    <form action="{{ $action }}" method="GET">

        <div class="input-group">
            <input type="search" name="search" class="form-control"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}">

            <button class="btn btn-success" type="submit">
                <i class="bi bi-search"></i>
            </button>

            {{-- bottone per azzerare la ricerca --}}
            @if($value && $resetRoute)
                <a href="{{ $resetRoute }}" class="btn btn-outline-secondary">Tutti</a>
            @endif

        </div>
    </form>
</div>
