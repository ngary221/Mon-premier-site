@extends('layouts.app')

@section('title', 'Accueil Membre')

@section('content')
    <div class="d-flex flex-column align-items-center" style="min-height: 100vh; background-image: url('/path/to/your/background/image.png'); background-size: cover; padding-top: 20px;">
        <div class="welcome-overlay text-center mb-4">
            <h2 class="profile-title">Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->name }}</h2>
            <p class="text-white">Explore et gère tes recettes.</p>
            <a href="{{ route('member.favorites') }}" class="btn btn-success mx-2">Mes Favoris</a>
            <a href="{{ route('add.recipe') }}" class="btn btn-success mx-2">Ajouter Recette</a>
            <a href="{{ route('member.my-recipes') }}" class="btn btn-success">Mes Recettes</a>
        </div>

        <div class="container">
            <h2 class="text-center">RECETTE</h2>
            @if($recipes->isEmpty())
                <p class="text-center">Il n'y a pas de recettes disponibles pour le moment.</p>
            @else
                <div class="row">
                    @foreach ($recipes as $recipe)
                        <div class="col-md-4 mb-4">
                            <div class="card recipe-card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $recipe->name }}</h5>
                                    <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                                    <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">Voir Recette</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Styles personnalisés */
        body {
            background-color: #ffffff; /* Blanc */
            color: #000000; /* Noir */
        }

        .navbar {
            background-color: #ff6600; /* Orange */
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important; /* Blanc */
        }

        .navbar-light .navbar-brand:hover,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #ffffff !important; /* Blanc */
        }

        .container {
            margin-top: 20px;
        }

        /* Style pour agrandir le titre */
        .navbar-brand {
            font-size: 2rem; /* Taille de police agrandie */
            font-weight: bold; /* Gras */
        }

        /* Style pour les lettres du milieu */
        .navbar-brand .highlight {
            color: #000000; /* Noir */
        }

        /* Style pour les boutons verts */
        .btn-success {
            background-color: #4CAF50; /* Couleur verte */
            border-color: #4CAF50; /* Couleur de la bordure */
        }

        .btn-success:hover {
            background-color: #45a049; /* Couleur verte légèrement plus sombre au survol */
            border-color: #45a049; /* Couleur de la bordure au survol */
            color: #ffffff; /* Texte en blanc au survol */
        }

        /* Style pour la carte transparente */
        .profile-title {
            color: #ffffff; /* Blanc */
        }
        .welcome-overlay {
            background-color: rgba(0, 0, 0, 0.6); /* Fond noir avec transparence */
            border-radius: 15px; /* Coins arrondis */
            padding: 20px; /* Espacement intérieur */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre */
        }

        .recipe-card {
            background-color: rgba(0, 0, 0, 0.7); /* Dark background with transparency */
            color: #ffffff; /* White text */
            border: none; /* No border */
        }

        .recipe-card .card-title {
            font-size: 1.25rem; /* Larger title font size */
        }

        .recipe-card .card-text {
            font-size: 1rem; /* Regular text font size */
        }

        .recipe-card .btn-primary {
            background-color: #ff6600; /* Orange button */
            border-color: #ff6600; /* Orange border */
        }

        .recipe-card .btn-primary:hover {
            background-color: #e65500; /* Darker orange on hover */
            border-color: #e65500; /* Darker orange border on hover */
        }
    </style>
@endsection
