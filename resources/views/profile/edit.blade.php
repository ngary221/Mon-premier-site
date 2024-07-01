@extends('layouts.app')

@section('title', 'Modifier Profil')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card transparent-card" style="width: 25rem;">
            <div class="card-body">
                <h2 class="card-title text-center profile-title">Modifier Profil</h2>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ Auth::user()->prenom }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select class="form-control" id="sexe" name="sexe" required>
                            <option value="Masculin" {{ Auth::user()->sexe == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                            <option value="Feminin" {{ Auth::user()->sexe == 'Feminin' ? 'selected' : '' }}>Feminin</option>
                            <!-- Add other options as needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 15px;">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .profile-title {
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
