@extends('layouts.app')

@section('title', 'Modifier Recette')

@section('content')
    <div class="container mt-5">
        <h2>Modifier Recette</h2>
        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $recipe->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $recipe->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="ingredients">Ingrédients</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required>{{ $recipe->ingredients }}</textarea>
            </div>
            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea class="form-control" id="instructions" name="instructions" rows="3" required>{{ $recipe->instructions }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
