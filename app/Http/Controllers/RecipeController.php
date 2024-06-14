<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Category;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all();
        return view('recipes.recipes', ['recipes' => $recipes]);
    }

    public function create(){
        $categories = Category::all(); // Fetch all categories
        return view('recipes.create', ['categories' => $categories]); // Pass categories to the view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'yield' => 'required|string|max:255',
            'selling_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
        ]);

        // Calculate the gross margin
        $grossMargin = $validated['selling_price'] - $validated['cost_price'];

        // Create a new recipe with the calculated gross margin
        Recipe::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'yield' => $validated['yield'],
            'selling_price' => $validated['selling_price'],
            'cost_price' => $validated['cost_price'],
            'gross_margin' => $grossMargin,
        ]);

        // Redirect or respond as needed
        return redirect()->route('recipe.index')->with('success', 'Recipe created successfully.');
    }
    
    
    public function edit(Recipe $recipe){
        $categories = Category::all(); // Fetch all categories
        return view('recipes.edit', ['recipe' => $recipe, 'categories' => $categories]); // Pass categories to the view
    }

    public function update(Recipe $recipe, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'yield' => 'required',
            'selling_price' => 'required|decimal:0,2',
            'cost_price' => 'required|decimal:0,2',
            'gross_margin'  => 'required|decimal:0,2'
        ]);
        $recipe->update($data);

        return redirect(route('recipe.index'))->with('success', 'Recipe Update Succesffully');
    }

    public function hapus(Recipe $recipe){
        $recipe->delete();
        $maxId = Recipe::max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        DB::statement("ALTER TABLE recipes AUTO_INCREMENT = $nextId");

        return redirect(route('recipe.index'))->with('success', 'Recipe Deleted Succesffully');
    }
}