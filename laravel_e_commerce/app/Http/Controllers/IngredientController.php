<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    // Method to display all ingredients
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    // Method to store a new ingredient
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients',
        ]);

        Ingredient::create([
            'name' => $request->name,
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient added successfully!');
    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);

        return view('ingredients.edit', compact('ingredient'));
    }

    // Method to update an existing ingredient
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name,' . $id,
        ]);

        $ingredient->update([
            'name' => $request->name,
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully!');
    }

    // Method to delete an existing ingredient
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully!');
    }
}
