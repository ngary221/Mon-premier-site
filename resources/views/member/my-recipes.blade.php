@extends('layouts.app')

@section('title', 'Mes Recettes')

@section('content')
    <div class="container mt-5">
        <div class="title-bar text-center">
            <h2 class="title">Mes Recettes</h2>
        </div>
        <div class="row">
            @forelse ($recipes as $recipe)
                <div class="col-md-4 mb-4">
                    <div class="card recipe-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->name }}</h5>
                            <p class="card-text">{{ $recipe->description }}</p>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-warning">Voir Recette</a>
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Vous n'avez pas encore créé de recettes.</p>
            @endforelse
        </div>
    </div>

    <style>
        /* Title Bar Styles */
        .title-bar {
            background-color: #2ca02c; /* Bande orange */
            padding: 20px 0;
            margin-bottom: 20px;
            border-radius: 15px; /* Coins arrondis */
        }

        .title-bar .title {
            color: #ffffff; /* Texte en blanc */
            font-size: 2rem;
            font-weight: bold;
        }

        /* Container Styles */
        .container {
            margin-top: 20px;
        }

        /* Recipe Card Styles */
        .recipe-card {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .recipe-card .card-body {
            padding: 20px;
        }

        .recipe-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .recipe-card .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .recipe-card .btn {
            background-color: #ff6600;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            margin-right: 5px;
        }

        .recipe-card .btn-primary {
            background-color: #007bff;
        }

        .recipe-card .btn-danger {
            background-color: #dc3545;
        }

        .recipe-card .btn:hover {
            background-color: #e65c00;
        }

        .recipe-card .btn-primary:hover {
            background-color: #0056b3;
        }

        .recipe-card .btn-danger:hover {
            background-color: #c82333;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #ff6600;
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }

        .navbar-light .navbar-brand:hover,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #ffffff !important;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
        }

        .navbar-brand .highlight {
            color: #000000;
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #45a049;
            border-color: #45a049;
            color: #ffffff;
        }
    </style>
@endsection
