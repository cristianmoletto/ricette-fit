
   <!-- * Usa codice JS per la gestione dello script

     * Funzioni:
     *  1. Calcolo automatico delle calorie al cambio di macro
     *  2. Aggiornamento live del valore dello slider prep_time
     *  3. Ricerca ingredienti con dropdown e selezione tramite badge
     *  4. (solo edit) Pre-caricamento degli ingredienti già associati alla ricetta
     *   -->


<script>
    
    // Calcolo calorie
    // ottengo gli input dal dom tramite id 
    const [kcalInput, proInput, carbInput, fatInput] =
      ['kcal', 'pro', 'carb', 'fat'].map(id => document.getElementById(id));

    // funzione di calcolo delle calorie
    function updateKcal() {
        const pro  = parseFloat(proInput.value)  || 0;
        const carb = parseFloat(carbInput.value) || 0;
        const fat  = parseFloat(fatInput.value)  || 0;
        kcalInput.value = (pro * 4) + (carb * 4) + (fat * 9); 
    }

    // Ascolta i cambiamenti su tutti e tre i campi macro
    [proInput, carbInput, fatInput].forEach(el => el.addEventListener('input', updateKcal));


    // SLIDER per tempo di preparazione
    // Mostra il valore corrente dello slider nell'elemento #prep_time_value

    // ottengo gli elementi dal dom
    const [prepRange, prepValue] =
      ['prep_time', 'prep_time_value'].map(id => document.getElementById(id));
    
      // assegno il valore
    prepRange.addEventListener('input', () => prepValue.textContent = prepRange.value);


    // Ricerca e selezione degli ingredienti
    const ingredients = @json($ingredients); 
    const selected = {}; // mappa {id: true} per evitare duplicati nel form

    // ottengo i valori dal dom
    const [searchInput, dropdown, selectedContainer] =
      ['ingredient-search', 'ingredient-dropdown', 'selected-ingredients'].map(id => document.getElementById(id));
    

    // Pre-caricamento (per edit)
    @isset($recipe) // solo se la ricetta esiste, caricamento ingredienti

        @php $preselected = $recipe->ingredients->pluck('id', 'name'); // pluck ricerca per id e nome
        @endphp

        const preselected = @json($preselected);
        Object.entries(preselected).forEach(([name, id]) => addIngredient({ id, name }));
    
    @endisset


    // Filtra gli ingredienti in base al testo digitato e popola il dropdown
    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();
        dropdown.innerHTML = '';

        if (!query) { dropdown.style.display = 'none'; return; }

        // Esclude dal risultato gli ingredienti già selezionati
        const matches = ingredients.filter(i =>
            i.name.toLowerCase().includes(query) && !selected[i.id]
        );

        if (matches.length === 0) { dropdown.style.display = 'none'; return; }

        // Crea un pulsante nel dropdown per ogni risultato trovato
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

    // Chiude il dropdown se si clicca fuori dal campo di ricerca o dal dropdown stesso
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target) && e.target !== searchInput) {
            dropdown.style.display = 'none';
        }
    });

    /**
     * Aggiunge un ingrediente alla lista dei selezionati.
     */
    function addIngredient(ingredient) {
        selected[ingredient.id] = true;

        const badge = document.createElement('span');
        badge.className = 'badge bg-success d-flex align-items-center gap-1'; // crea un badge con nome ingrediente, input hidden per id e pulsante x rimozione
        badge.innerHTML = `${ingredient.name}

            <input type="hidden" name="ingredients[]" value="${ingredient.id}">
            <button type="button" class="btn-close btn-close-white btn-sm" style="font-size:.6rem;" aria-label="Rimuovi"></button>`;

        // Rimuove il badge e deseleziona l'ingrediente al click sulla x
        badge.querySelector('button').addEventListener('click', () => {
            delete selected[ingredient.id];
            badge.remove();
        });

        selectedContainer.appendChild(badge);
        searchInput.value = '';
        dropdown.style.display = 'none';
    }

</script>
