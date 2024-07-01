<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toggu')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome -->
    <style>
        body {
            background-image: url('{{ asset('images/5886494b-51c6-4990-9300-1ceeead449a2.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #000000;
        }
        .navbar {
            background-color: #ff6600;
        }
        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ url('/') }}">Toggu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <form class="form-inline navbar-search" method="GET" action="{{ route('search') }}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
            @else
                @if(Auth::user()->isAdmin())
                    @if(Route::currentRouteName() !== 'admin.home')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">Page Administrateur</a></li>
                    @endif
                @else
                    @if(Route::currentRouteName() !== 'member.home')
                        <li class="nav-item"><a class="nav-link" href="{{ route('member.home') }}">Page Membre</a></li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script> <!-- Font Awesome -->
</body>
</html>
