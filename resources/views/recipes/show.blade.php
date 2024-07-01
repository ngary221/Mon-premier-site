@extends('layouts.app')

@section('title', $recipe->name)

@section('content')
    <div class="card bg-dark text-white rounded">
        <div class="card-body">
            <h2>{{ $recipe->name }}</h2>
            <p>{{ $recipe->description }}</p>
            <ul>
                @foreach (explode("\n", $recipe->ingredients) as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <p>{{ $recipe->instructions }}</p>

            <!-- Favorites Buttons -->
            @auth
                @if (Auth::user()->favorites->contains($recipe->id))
                    <form action="{{ route('recipes.unfavorite', $recipe->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Retirer des favoris</button>
                    </form>
                @else
                    <form action="{{ route('recipes.favorite', $recipe->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Ajouter aux favoris</button>

                    </form>
                @endif
            @endauth

            <h4 class="mt-4">Commentaires</h4>
            <div class="list-group comments-section">
                @if ($recipe->comments->isEmpty())
                    <p>Pas de commentaire pour le moment.</p>
                @else
                    @foreach ($recipe->comments as $comment)
                        <div class="list-group-item comment-item">
                            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                            <p><small>{{ $comment->created_at }}</small></p>
                            @if (Auth::check() && Auth::user()->isAdmin())
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="delete-comment-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer le commentaire</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>

            @auth
                <form method="POST" action="{{ route('comments.store', $recipe->id) }}" class="add-comment-form mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="content">Ajouter un commentaire</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Envoyer</button>
                </form>
            @endauth
        </div>
    </div>

    <style>
        .comments-section {
            margin-top: 20px;
        }

        .comment-item {
            background-color: #f8f9fa;
            color: #212529;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
        }

        .comment-item p {
            margin: 0;
        }

        .delete-comment-form {
            margin-top: 10px;
        }

        .add-comment-form {
            margin-top: 20px;
        }

        .add-comment-form .form-group {
            margin-bottom: 15px;
        }

        .add-comment-form textarea {
            border-radius: 5px;
            padding: 10px;
        }
    </style>
@endsection
