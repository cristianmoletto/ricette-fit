<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $ingredients = Ingredient::orderBy('id')
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->paginate(10)
            ->withQueryString();

        return view('ingredients.index', compact('ingredients', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newIngredient = new Ingredient();
        $newIngredient->name = $data['name'];

        $newIngredient->save();

        return redirect()->route('ingredients.show',$newIngredient);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        return redirect()->route("ingredients.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $data = $request->all();

        $ingredient->name = $data['name'];
        $ingredient->update();

        return redirect()->route('ingredients.show',$ingredient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index');
    }
}
