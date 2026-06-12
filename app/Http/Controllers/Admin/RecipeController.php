<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newRecipe = new Recipe();

        $newRecipe->name = $data['name'];
        $newRecipe->description = $data['description'];
        $newRecipe->prep_time = $data['prep_time'];
        $newRecipe->image = $data['image'];
        $newRecipe->kcal = $data['kcal'];
        $newRecipe->pro = $data['pro'];
        $newRecipe->carb = $data['carb'];
        $newRecipe->fat = $data['fat'];

        $newRecipe->save();

        return redirect()->route('recipes.show',$newRecipe);

    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
