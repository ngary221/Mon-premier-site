@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
    <div class="container mt-4 dark-mode">
        <h2 class="text-white">Recette</h2>
        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="card bg-dark text-white text-decoration-none rounded">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->name }}</h5>
                            <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Styles pour les cartes de recette en mode sombre */
        .dark-mode .card {
            background-color: #333333; /* Fond gris foncé */
            color: #ffffff; /* Texte blanc */
            border: none; /* Supprimer la bordure par défaut */
        }

        /* Styles pour les coins arrondis des cartes de recette */
        .card {
            border-radius: 20px; /* Coins arrondis */
            padding: 15px; /* Espacement intérieur */
            transition: all 0.3s ease; /* Transition douce */
        }

        /* Styles pour le texte dans les cartes */
        .card-title {
            font-size: 1.25rem; /* Taille de police augmentée */
            font-weight: bold; /* Texte en gras */
            font-family: Arial, sans-serif; /* Police de caractères */
        }

        .card-text {
            font-size: 1rem; /* Taille de police normale */
            font-family: Arial, sans-serif; /* Police de caractères */
        }

        /* Assurez-vous que les liens ne changent pas de couleur au survol */
        .card a {
            text-decoration: none; /* Supprimer la décoration de texte */
            color: inherit; /* Conserver la couleur du texte par défaut */
        }

        .card a:hover {
            text-decoration: none; /* Supprimer la décoration de texte au survol */
        }
    </style>
@endsection
