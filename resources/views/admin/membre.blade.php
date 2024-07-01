<!DOCTYPE html>
<html>
<head>
    <title>Gérer les Membres - Toggu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Liste des Membres</h2>
    <ul>
        @foreach($membres as $membre)
            <li>{{ $membre->utilisateur->nom }} {{ $membre->utilisateur->prenom }} - {{ $membre->utilisateur->email }}
                <form action="{{ url('/admin/membres/'.$membre->id) }}" method="POST" class="d-inline">
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
