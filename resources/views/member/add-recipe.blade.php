@extends('layouts.app')

@section('title', 'Ajouter Recette')

@section('content')
    <div class="container mt-5">
        <div class="card transparent-card" style="width: 100%; max-width: 800px; margin: 0 auto;">
            <div class="card-body">
                <h2 class="card-title text-center text-white">Ajouter Recette</h2>
                <form action="{{ route('add.recipe') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-white">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-white">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ingredients" class="text-white">Ingrédients</label>
                        <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="instructions" class="text-white">Instructions</label>
                        <textarea class="form-control" id="instructions" name="instructions" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 15px;">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .text-white {
            color: #ffffff; /* Blanc */
        }
        .transparent-card {
            background-color: rgba(0, 0, 0, 0.6); /* Fond noir avec transparence */
            border-radius: 15px; /* Coins arrondis */
            border: none; /* Pas de bordure */
            padding: 20px; /* Espacement intérieur */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Ombre */
        }
        .card-body {
            border-radius: 15px; /* Coins arrondis */
        }
    </style>
@endsection
