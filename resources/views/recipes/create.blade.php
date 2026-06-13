@extends('layouts.create')

@section('title',"Aggiungi una ricetta")

@section("content")

<a class="btn btn-outline-secondary my-3" href="{{ route("recipes.index") }}"><i class="bi bi-x-lg"></i> Annulla</a>

<div class="card">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Aggiungi una ricetta</h5>
    </div>

    <form action="{{ route("recipes.store") }}" method="POST" class="card-body">
        @csrf

        <div class="d-flex flex-column">
            <label for="name" class="form-label"><i class="bi bi-alphabet" style="color:green"></i> Nome Ricetta</label>
            <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Inserisci il nome della ricetta">

            <label for="image" class="form-label"> <i class="bi bi-image" style="color:green"></i> Immagine</label>
            <input type="text" name="image" id="image" class="form-control mb-3" placeholder="Inserisci l'url dell'immagine">

            <label for="description" class="form-label"><i class="bi bi-text-paragraph" style="color:green"></i> Descrizione</label>
            <textarea type="text" name="description" id="description" width="100%" rows="4" class="form-control mb-3" placeholder="Scrivi i passaggi per la preparazione"></textarea>

            <!-- Selettore ingredienti -->
            <label class="form-label"><i class="bi bi-fork-knife" style="color:green"></i> Ingredienti</label>
            <input type="text" id="ingredient-search" class="form-control mb-2" placeholder="Cerca ingrediente...">

            <div id="ingredient-dropdown" class="list-group mb-2" style="display:none; max-height:200px; overflow-y:auto;"></div>

            <div id="selected-ingredients" class="d-flex flex-wrap gap-2 mb-3"></div>

            <!-- Selettore pasti -->
            <label class="form-label"><i class="bi bi-egg-fried" style="color:green"></i> Pasti</label>
            <div class="d-flex flex-wrap gap-3 mb-3">
                @foreach($meals as $meal)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="meals[]" value="{{ $meal->id }}" id="meal_{{ $meal->id }}">
                    <label class="form-check-label" for="meal_{{ $meal->id }}">{{ $meal->type }}</label>
                </div>
                @endforeach
            </div>
            <hr>

            <div class="col mb-3">
                <label for="prep_time" class="form-label"><i class="bi bi-alarm" style="color:green"></i> Tempo di preparazione: <span id="prep_time_value" class="fw-bold">30</span> min</label>
                <input type="range" name="prep_time" min="10" max="90" step="5" id="prep_time" class="form-range" value="30">
            </div>

            <div class="row g-3 mb-3">

                <div class="col">
                    <label for="kcal" class="form-label">Calorie</label>
                    <input type="number" name="kcal" id="kcal" class="form-control" readonly>
                </div>
                <div class="col">
                    <label class="form-label" for="pro">Proteine</label>
                    <input type="number" name="pro" id="pro" class="form-control" value="0">
                </div>
                <div class="col">
                    <label class="form-label" for="carb">Carboidrati</label>
                    <input type="number" name="carb" id="carb" class="form-control" value="0">
                </div>
                <div class="col">
                    <label class="form-label" for="fat">Grassi</label>
                    <input type="number" name="fat" id="fat" class="form-control" value="0">
                </div>
            </div>


            <input type="submit" value="Salva" class="btn btn-success mb-3">

        </div>

    </form>
</div>

@push('scripts')
<script>
    const kcalInput = document.getElementById('kcal');
    const proInput = document.getElementById('pro');
    const carbInput = document.getElementById('carb');
    const fatInput = document.getElementById('fat');

    function updateKcal() {
        const pro = parseFloat(proInput.value) || 0;
        const carb = parseFloat(carbInput.value) || 0;
        const fat = parseFloat(fatInput.value) || 0;
        kcalInput.value = (pro * 4) + (carb * 4) + (fat * 9);
    }

    [proInput, carbInput, fatInput].forEach(el => el.addEventListener('input', updateKcal));

    const prepRange = document.getElementById('prep_time');
    const prepValue = document.getElementById('prep_time_value');
    prepRange.addEventListener('input', () => prepValue.textContent = prepRange.value);

    const ingredients = @json($ingredients);
    const selected = {};

    const searchInput = document.getElementById('ingredient-search');
    const dropdown = document.getElementById('ingredient-dropdown');
    const selectedContainer = document.getElementById('selected-ingredients');

    searchInput.addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        dropdown.innerHTML = '';

        if (!query) {
            dropdown.style.display = 'none';
            return;
        }

        const matches = ingredients.filter(i =>
            i.name.toLowerCase().includes(query) && !selected[i.id]
        );

        if (matches.length === 0) {
            dropdown.style.display = 'none';
            return;
        }

        matches.forEach(i => {
            const item = document.createElement('button');
            item.type = 'button';
            item.className = 'list-group-item list-group-item-action';
            item.textContent = i.name;
            item.addEventListener('click', () => addIngredient(i));
            dropdown.appendChild(item);
        });

        dropdown.style.display = 'block';
    });

    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target) && e.target !== searchInput) {
            dropdown.style.display = 'none';
        }
    });

    function addIngredient(ingredient) {
        selected[ingredient.id] = true;

        const badge = document.createElement('span');
        badge.className = 'badge bg-success d-flex align-items-center gap-1';
        badge.innerHTML = `${ingredient.name}
            <input type="hidden" name="ingredients[]" value="${ingredient.id}">
            <button type="button" class="btn-close btn-close-white btn-sm" style="font-size:.6rem;" aria-label="Rimuovi"></button>`;

        badge.querySelector('button').addEventListener('click', () => {
            delete selected[ingredient.id];
            badge.remove();
        });

        selectedContainer.appendChild(badge);
        searchInput.value = '';
        dropdown.style.display = 'none';
    }
</script>
@endpush

@endsection