@extends('layouts.app')

@section('title', 'Bienvenue sur Toggu')

@section('content')
    <header class="text-center bg-orange py-4">
        <h1>Bienvenue sur Toggu</h1>
        <p>Explorez, cuisinez et savourez des recettes délicieuses qui raviront vos papilles!</p>
    </header>
    <div class="container mt-5">
        <h2 class="text-center">RECETTE</h2>
        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-md-4 mb-4">
                    <div class="card recipe-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->name }}</h5>
                            <p class="card-text">{{ $recipe->description }}</p>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-warning">Voir Recette</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* General Styles */
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        .bg-orange {
            background-color: #ff6600;
            color: white;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: bold;
        }

        header p {
            margin: 10px 0 0;
            font-size: 1.2rem;
        }

        /* Container Styles */
        .container {
            margin-top: 20px;
        }

        /* Recipe Card Styles */
        .recipe-card {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .recipe-card .card-body {
            padding: 20px;
        }

        .recipe-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .recipe-card .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .recipe-card .btn {
            background-color: #ff6600;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
        }

        .recipe-card .btn:hover {
            background-color: #e65c00;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #ff6600;
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }

        .navbar-light .navbar-brand:hover,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #ffffff !important;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
        }

        .navbar-brand .highlight {
            color: #000000;
        }

        .btn-success {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #45a049;
            border-color: #45a049;
            color: #ffffff;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .recipe-card {
                margin-bottom: 15px;
            }

            .recipe-card .card-body {
                padding: 15px;
            }

            .recipe-card .card-title {
                font-size: 1.25rem;
            }

            .recipe-card .card-text {
                font-size: 0.875rem;
            }
        }
    </style>
@endsection
