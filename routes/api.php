<?php

use App\Http\Controllers\Api\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('recipes',[RecipeController::class, 'index']);

Route::get('recipes/{recipe}', [RecipeController::class, 'show']);