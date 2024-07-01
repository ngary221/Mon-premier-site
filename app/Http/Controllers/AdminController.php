<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function manageMembers()
    {
        $members = User::where('role', 'user')->get();
        return view('admin.manage-members', compact('members'));
    }

    public function manageRecipes()
    {
        $recipes = Recipe::all();
        return view('admin.manage-recipes', compact('recipes'));
    }

    public function destroyMember($id)
    {
        User::destroy($id);
        return back()->with('success', 'Membre supprimé avec succès.');
    }
}
