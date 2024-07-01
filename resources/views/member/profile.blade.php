@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h2 class="text-center profile-title">Profile</h2>
    <div class="card transparent-card">
        <div class="card-body text-center">
            <p class="card-text">Prénom: <span class="text-white">{{ Auth::user()->prenom }}</span></p>
            <p class="card-text">Nom: <span class="text-white">{{ Auth::user()->name }}</span></p>
            <p class="card-text">Email: <span class="text-white">{{ Auth::user()->email }}</span></p>
            <p class="card-text">Sexe: <span class="text-white">{{ Auth::user()->sexe }}</span></p>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-success">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <!-- Button to navigate to the edit profile page -->
            <a href="{{ route('profile.edit') }}" class="btn btn-success">Modifier Profil</a>
        </div>
    </div>

    <style>
        .profile-title {
            color: #000000; /* Blanc */
        }
        .transparent-card {
            background-color: rgba(0, 0, 0, 0.6); /* Fond noir avec transparence */
            border-radius: 15px; /* Coins arrondis */
            border: none; /* Pas de bordure */
            padding: 20px; /* Espacement intérieur */
        }
        .card-body {
            border-radius: 15px; /* Coins arrondis */
        }
        .card-text {
            color: #ffffff; /* Blanc */
        }
    </style>
@endsection
