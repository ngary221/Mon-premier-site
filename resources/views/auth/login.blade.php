@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card transparent-card" style="width: 25rem;">
            <div class="card-body">
                <h2 class="card-title text-center text-white">Connexion</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 15px;">Connexion</button>
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
