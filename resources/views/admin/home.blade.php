@extends('layouts.app')

@section('title', 'Bienvenue dans la page des Admin')

@section('content')
    <div class="container text-center mt-4">
        <h2>Bienvenue dans la page des Admin</h2>
        <p>Gérer les membres et les recettes.</p>
        <a href="{{ route('manage.members') }}" class="btn btn-success btn-lg mr-2">Gérer membres</a>
        <a href="{{ route('manage.recipes') }}" class="btn btn-success btn-lg">Gérer recettes</a>
    </div>

    <style>
        /* Container Styles */
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        h2 {
            color: #333333;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Button Styles */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 15px 30px;
            font-size: 1.2rem;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
@endsection
