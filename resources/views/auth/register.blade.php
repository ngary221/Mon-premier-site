@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card transparent-card" style="width: 25rem;">
            <div class="card-body">
                <h2 class="card-title text-center text-white">Inscription</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-white">Nom</label>
                        <input type="text" class="form-control rounded-input" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="text-white">Prenom</label>
                        <input type="text" class="form-control rounded-input" id="prenom" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" class="form-control rounded-input" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Mot de passe</label>
                        <input type="password" class="form-control rounded-input" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="sexe" class="text-white">Sexe</label>
                        <select class="form-control rounded-input" id="sexe" name="sexe">
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 15px;">Enregistrer</button>
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
        .rounded-input {
            border-radius: 50px;
        }
    </style>
@endsection
