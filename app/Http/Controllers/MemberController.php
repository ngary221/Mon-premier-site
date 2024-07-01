<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('member.home', compact('recipes'));
    }

    public function profile()
    {
        return view('member.profile');
    }

    public function addRecipe()
    {
        return view('member.add-recipe');
    }

    public function myRecipes()
    {
        $user = Auth::user();
        $recipes = $user->recipes; // Ensure this relationship is defined in the User model
        return view('member.my-recipes', compact('recipes'));
    }
}
