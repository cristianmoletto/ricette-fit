
@props(['icon', 'title', 'createRoute', 'createLabel'])

<div class="bg-success bg-opacity-10 border-bottom border-success border-opacity-25 py-3">
    <div class="container d-flex justify-content-between align-items-center">

        {{-- Titolo con icona --}}
        <h1 class="h4 mb-0 text-success fw-bold">
            <i class="bi {{ $icon }} me-2"></i>{{ $title }}
        </h1>

        {{-- Pulsante di creazione --}}
        <a href="{{ $createRoute }}" class="btn btn-success btn-sm">
            &oplus; {{ $createLabel }}
        </a>

    </div>
</div>
