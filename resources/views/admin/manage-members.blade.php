@extends('layouts.app')

@section('title', 'Gérer les membres')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Gérer les membres</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Sexe</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->prenom }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->sexe }}</td>
                    <td>{{ $member->role }}</td>
                    <td>
                        <form action="{{ route('delete.member', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <style>
        /* Container Styles */
        .container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table Styles */
        .table {
            margin-top: 20px;
            background-color: #ffffff;
        }

        .table thead {
            background-color: #343a40;
            color: #ffffff;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styles */
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Heading Styles */
        h2 {
            color: #333333;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
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
    </style>
@endsection
