<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Toggu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-text {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="center-text">Admin Dashboard</h2>
    <ul class="list-unstyled center-text">
        <li><a href="{{ url('/admin/membres') }}">Liste des Membres</a></li>
        <li><a href="{{ url('/admin/categories') }}">Gérer les Catégories</a></li>
        <li><a href="{{ url('/admin/recettes') }}">Gérer les Recettes</a></li>
    </ul>
</div>
</body>
</html>

