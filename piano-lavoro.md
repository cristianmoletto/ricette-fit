# Piano: Ricette Fit - Implementazione 
                                                                                                                                                             
## Contesto

Progetto finale che richiede un backoffice Laravel con autenticazione e CRUD, e un frontend React che consuma API REST. L'argomento scelto sono le ricette fit. Il progetto viene inizializzato con Laravel 13, Vite, MySQL e Bootstrap per lo stile.

---

## FASE 1 — Database & Struttura

- [x] **Step 1: Installa Laravel Breeze**
*composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run build
php artisan migrate

Installazione Bootstrap


**Step 2: Progetta le entità**
Struttura consigliata (3 entità, livello Pro):
- recipes — entità principale (nome, descrizione, calorie, proteine, carboidrati, grassi, tempo_preparazione, immagine)
- categories — es. Colazione, Pranzo, Cena, Spuntino (N-N con recipes)
- ingredients — lista ingredienti (N-N con recipes tramite tabella pivot ingredient_recipe con campo quantity)

Oppure versione semplificata (2 entità):
- recipes — entità principale
- categories — 1-N (una categoria ha molte ricette)

**Step 3: Crea migration, modelli, factory, seeder**
php artisan make:model Category -mfs
php artisan make:model Recipe -mfs

_se 3 entità:_
php artisan make:model Ingredient -mfs
php artisan make:migration create_category_recipe_table

---
## FASE 2 — Backend Laravel (Backoffice)

**Step 4: Crea i Controller per il backoffice**
php artisan make:controller Admin/CategoryController --resource
php artisan make:controller Admin/RecipeController --resource

**Step 5: Definisci le rotte (routes/web.php)**
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('recipes', Admin\RecipeController::class);
});

**Step 6: Implementa i controller CRUD**
- index — lista con paginazione
- create / store — form creazione + validazione
- edit / update — form modifica
- destroy — eliminazione (con cancellazione file immagine)

**Step 7: Implementa upload immagine**
// In store/update del RecipeController
if ($request->hasFile('image')) {
    $path = $request->file('image')->store('recipes', 'public');
}
php artisan storage:link

**Step 8: Crea le Blade views**
Struttura resources/views/:
admin/
layout.blade.php      ← layout base con nav
recipes/
    index.blade.php
    create.blade.php
    edit.blade.php
    show.blade.php
categories/
    index.blade.php
    create.blade.php
    edit.blade.php

---
## FASE 3 — API REST per React

**Step 9: Crea API Controller**
php artisan make:controller Api/RecipeController
php artisan make:controller Api/CategoryController

**Step 10: Definisci le rotte API (routes/api.php)**
Route::get('/recipes', [Api\RecipeController::class, 'index']);
Route::get('/recipes/{recipe}', [Api\RecipeController::class, 'show']);
Route::get('/categories', [Api\CategoryController::class, 'index']);

**Step 11: Crea API Resource (trasformatori JSON)**
php artisan make:resource RecipeResource
php artisan make:resource RecipeCollection

---
## FASE 4 — Frontend React

**Step 12: Crea la React app**
Separata dal progetto Laravel (in una subdirectory o cartella parallela):
npm create vite@latest frontend -- --template react
cd frontend && npm install
npm install react-router-dom axios

**Step 13: Struttura componenti**
src/
pages/
    Home.jsx          ← lista ricette
    RecipeDetail.jsx  ← dettaglio singola ricetta
components/
    RecipeCard.jsx
    Navbar.jsx
api/
    recipes.js        ← chiamate axios
App.jsx
main.jsx

**Step 14: Configura CORS nel backend Laravel**
// config/cors.php — assicurarsi che l'origine React sia permessa
'allowed_origins' => ['http://localhost:5173'],
setting anche di bootstrap -> app.php -> withMiddleware

**Step 15: Implementa le pagine React**
- Home.jsx — fetch lista ricette, mostra RecipeCard in griglia
- Recipe.jsx — fetch ricetta per ID, mostra dettagli + categoria/ingredienti

---
## FASE 5 — Seeding & Test

**Step 16: Popola il database con dati di test**
php artisan db:seed

**Step 17: Testa le API con Postman (o browser)**
- GET /api/recipes
- GET /api/recipes/1
- GET /api/categories

**Step 18: Verifica backoffice**
- Login su /login
- CRUD categories su /admin/categories
- CRUD recipes su /admin/recipes (con upload immagine)

---
### File critici da creare/modificare

- database/migrations/ — migration per tutte le tabelle
- app/Models/Recipe.php, Category.php — con relazioni Eloquent
- app/Http/Controllers/Admin/RecipeController.php
- app/Http/Controllers/Api/RecipeController.php
- routes/web.php, routes/api.php
- resources/views/admin/ — Blade templates
- frontend/src/ — componenti React

### Verifica finale

- Login e logout funzionante
- CRUD ricette con upload immagine
- CRUD categorie
- API rispondono correttamente in JSON
- React mostra lista e dettaglio ricette
- Le relazioni tra entità sono visibili nel frontend