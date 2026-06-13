<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $ingredients = Ingredient::all();
        $meals = Meal::all();

        return view('recipes.create', compact('ingredients', 'meals'));
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
        // $newRecipe->image = $data['image'];
        $newRecipe->kcal = $data['kcal'];
        $newRecipe->pro = $data['pro'];
        $newRecipe->carb = $data['carb'];
        $newRecipe->fat = $data['fat'];

        if(array_key_exists('image',$data)){

            // carico nuova img
            $img_url = Storage::putFile('recipes', $data['image']);

            // aggiorno il db
            $newRecipe->image = $img_url;
        }


        $newRecipe->save();

        if ($request->has('ingredients')) {
            $newRecipe->ingredients()->attach($data['ingredients']);
        }

        $newRecipe->meals()->sync($data['meals'] ?? []);

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
    public function edit(Recipe $recipe)
    {
        $ingredients = Ingredient::all();
        $meals = Meal::all();
        return view('recipes.edit', compact('recipe', 'ingredients', 'meals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $data = $request->all();

        $recipe->name = $data['name'];
        $recipe->description = $data['description'];
        $recipe->prep_time = $data['prep_time'];
        $recipe->kcal = $data['kcal'];
        $recipe->pro = $data['pro'];
        $recipe->carb = $data['carb'];
        $recipe->fat = $data['fat'];

        // if ($request->hasFile('image')) {
        //     $recipe->image = Storage::disk('public')->putFile('recipes_images', $request->file('image'));
        // }

        if(array_key_exists('image',$data)){

            // elimino l'immagine precedente
            Storage::delete($recipe->image);

            // carico nuova img
            $img_url = Storage::putFile('recipes', $data['image']);

            // aggiorno il db
            $recipe->image = $img_url;
        }

        $recipe->save();

        $recipe->ingredients()->sync($data['ingredients'] ?? []);
        $recipe->meals()->sync($data['meals'] ?? []);

        return redirect()->route('recipes.show', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->meals()->detach();
        $recipe->ingredients()->detach();
        $recipe->delete();

        return redirect()->route('recipes.index');

    }
}
