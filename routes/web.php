<?php

use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RecipeController;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'recipesCount'     => Recipe::count(),
        'ingredientsCount' => Ingredient::count(),
        'mealsCount'       => Meal::count(),
    ]);
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('recipes', RecipeController::class)
    ->middleware(['auth', 'verified']);

Route::resource('meals', MealController::class)
    ->middleware(['auth', 'verified']);

Route::resource('ingredients', IngredientController::class)
    ->middleware(['auth', 'verified']);
    

require __DIR__.'/auth.php';
