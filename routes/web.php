<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

// Route search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Other routes
Route::get('/', [HomeController::class, 'index']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('member-home', [MemberController::class, 'index'])->name('member.home');
    Route::get('profile', [MemberController::class, 'profile'])->name('profile');
    Route::get('add-recipe', [MemberController::class, 'addRecipe'])->name('add.recipe');
    Route::post('add-recipe', [RecipeController::class, 'store']);
    Route::post('favorites/{recipe}', [MemberController::class, 'toggleFavorite'])->name('toggle.favorite');
    Route::get('my-recipes', [MemberController::class, 'myRecipes'])->name('member.my-recipes');
    Route::get('favorites', [RecipeController::class, 'favorites'])->name('member.favorites'); // Define the route here

    Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::post('recipes/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::delete('recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Routes for editing and updating recipes
    Route::get('recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');

    // Favorite and Unfavorite Routes
    Route::post('/recipes/{id}/favorite', [RecipeController::class, 'favorite'])->name('recipes.favorite');
    Route::post('/recipes/{id}/unfavorite', [RecipeController::class, 'unfavorite'])->name('recipes.unfavorite');

    // Profile routes
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('admin-home', [AdminController::class, 'index'])->name('admin.home');
Route::get('manage-members', [AdminController::class, 'manageMembers'])->name('manage.members');
Route::delete('manage-members/{id}', [AdminController::class, 'destroyMember'])->name('delete.member');
Route::patch('manage-members/{id}/toggle-block', [AdminController::class, 'toggleBlockMember'])->name('toggle.block.member');
Route::get('manage-recipes', [AdminController::class, 'manageRecipes'])->name('manage.recipes');
Route::delete('manage-recipes/{id}', [RecipeController::class, 'destroy'])->name('delete.recipe');
