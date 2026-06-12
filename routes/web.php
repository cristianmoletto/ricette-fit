<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group( function (){

        Route::get("/index",[DashboardController::class, 'index'])
            ->name("index");

        Route::get("/profile",[DashboardController::class, 'profile'])
            ->name("profile");

    });


Route::resource('recipes', RecipeController::class);
Route::resource('meals', MealController::class);
Route::resource('ingredients', IngredientController::class);
    

require __DIR__.'/auth.php';
