<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Catégories - Toggu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Gérer les Catégories</h2>
    <form action="{{ url('/admin/categories') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de la catégorie</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    <h3 class="mt-5">Liste des Catégories</h3>
    <ul>
        @foreach($categories as $categorie)
            <li>{{ $categorie->nom }}
                <form action="{{ url('/admin/categories/'.$categorie->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
