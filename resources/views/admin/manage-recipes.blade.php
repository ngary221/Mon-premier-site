@extends('layouts.app')

@section('title', 'Gérer les Recettes')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center" style="color: #f0f0f0;">Gérer les Recettes</h2>
        <div class="list-group">
            @foreach ($recipes as $recipe)
                <div class="list-group-item mb-3 p-4 shadow-sm rounded border-0">
                    <h5 class="mb-1">{{ $recipe->name }}</h5>
                    <p class="mb-2">{{ $recipe->description }}</p>
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary btn-sm mr-2">Voir la Recette</a>
                    <form action="{{ route('delete.recipe', $recipe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer la Recette</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .list-group-item {
            background-color: #f8f9fa; /* Fond gris clair */
        }

        .list-group-item h5 {
            font-weight: bold;
            color: #333;
        }

        .list-group-item p {
            color: #666;
        }

        .list-group-item .btn-primary {
            background-color: green;
            border-color: #007bff;
        }

        .list-group-item .btn-primary:hover {
            background-color: green;
            border-color: #004085;
        }

        .list-group-item .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .list-group-item .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
@endsection
