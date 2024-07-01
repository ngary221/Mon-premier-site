<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function show($id)
    {
        $recipe = Recipe::with('comments')->findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Associate the recipe with the authenticated user

        Recipe::create($data);

        return redirect()->route('recipes.index');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('recipes.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $recipes = Recipe::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();
        return view('recipes.index', compact('recipes'));
    }

    public function favorite($id)
    {
        $recipe = Recipe::findOrFail($id);
        Auth::user()->favorites()->attach($recipe);

        return redirect()->back()->with('success', 'Recette ajoutée aux favoris!');
    }

    public function unfavorite($id)
    {
        $recipe = Recipe::findOrFail($id);
        Auth::user()->favorites()->detach($recipe);

        return redirect()->back()->with('success', 'Recette retirée des favoris!');
    }

    public function favorites()
    {
        $user = Auth::user();
        $recipes = $user->favorites; // Assumes the relationship is defined in the User model

        return view('recipes.favorites', compact('recipes'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string'
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recette mise à jour avec succès!');
    }
}
