@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        <i class="bi bi-trophy"></i> Espace Organisateur
                    </h4>
                </div>

                <div class="card-body p-4">

                    {{-- Affiche les erreurs si les identifiants sont incorrects --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- Formulaire de connexion --}}
                    <form method="POST" action="/login">
                        @csrf {{-- Protection contre les attaques CSRF --}}

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            {{-- old('email') garde la valeur saisie si le formulaire est resoumis --}}
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right"></i> Se connecter
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection