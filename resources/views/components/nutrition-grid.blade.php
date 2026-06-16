@props(['kcal', 'pro', 'carb', 'fat'])

<div class="row g-2 mb-4 text-center">

    {{-- Calorie --}}
    <div class="col">
        <div class="border rounded py-2 bg-warning bg-opacity-10">
            <div class="fw-bold text-warning fs-5">{{ $kcal }}</div>
            <div class="text-muted small">kcal</div>
        </div>
    </div>

    {{-- Proteine --}}
    <div class="col">
        <div class="border rounded py-2 bg-danger bg-opacity-10">
            <div class="fw-bold text-danger fs-5">{{ $pro }}g</div>
            <div class="text-muted small">proteine</div>
        </div>
    </div>

    {{-- Carboidrati --}}
    <div class="col">
        <div class="border rounded py-2 bg-primary bg-opacity-10">
            <div class="fw-bold text-primary fs-5">{{ $carb }}g</div>
            <div class="text-muted small">carboidrati</div>
        </div>
    </div>

    {{-- Grassi --}}
    <div class="col">
        <div class="border rounded py-2 bg-secondary bg-opacity-10">
            <div class="fw-bold text-secondary fs-5">{{ $fat }}g</div>
            <div class="text-muted small">grassi</div>
        </div>
    </div>

</div>
