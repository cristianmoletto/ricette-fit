@props(['icon', 'color', 'value', 'label', 'link'])

{{-- Card --}}
<div class="col-sm-6 col-lg-4">
    <a href="{{ $link }}" class="text-decoration-none">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center gap-4 p-4">

                {{-- Icona con sfondo colorato --}}
                <div class="rounded-3 bg-{{ $color }} bg-opacity-10 p-3 fs-2 text-{{ $color }}">
                    <i class="bi {{ $icon }}"></i>
                </div>

                {{-- Numero e label --}}
                <div>
                    <div class="fs-1 fw-bold text-dark lh-1">{{ $value }}</div>
                    <div class="text-muted mt-1">{{ $label }}</div>
                </div>

            </div>
        </div>
    </a>
</div>
