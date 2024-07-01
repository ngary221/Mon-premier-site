<!DOCTYPE html>
<html>
<head>
    <title>{{ $recette->titre }} - Toggu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>{{ $recette->titre }}</h2>
    <img src="{{ asset('images/'.$recette->image) }}" class="img-fluid" alt="{{ $recette->titre }}">
    <p>{{ $recette->description }}</p>
    <h3>Ingrédients</h3>
    <p>{{ $recette->ingredients }}</p>
    <h3>Instructions</h3>
    <p>{{ $recette->instructions }}</p>
    <h3>Commentaires</h3>
    @foreach($recette->commentaires as $commentaire)
        <p>{{ $commentaire->contenu }}</p>
        <form action="{{ url('/admin/commentaires/'.$commentaire->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
        </form>
    @endforeach
    <form action="{{ url('/admin/recettes/'.$recette->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Supprimer la recette</button>
    </form>
</div>
</body>
</html>
