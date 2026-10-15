@extends('layouts.app')

@section('content')

    {{-- Bouton retour vers le dashboard --}}
    <a href="/organisateur" class="btn btn-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

    <h1 class="mb-4">
        <i class="bi bi-plus-circle"></i> Ajouter une compétition
    </h1>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Formulaire d'ajout d'une compétition --}}
            <form method="POST" action="/organisateur/competitions">
                @csrf {{-- Protection contre les attaques CSRF --}}

                <div class="row g-3">

                    {{-- Menu déroulant des sports --}}
                    <div class="col-md-4">
                        <label class="form-label">Sport</label>
                        <select name="sport_id" class="form-select">
                            @foreach($sports as $sport)
                                <option value="{{ $sport->id }}">{{ $sport->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Menu déroulant des lieux --}}
                    <div class="col-md-4">
                        <label class="form-label">Lieu</label>
                        <select name="lieu_id" class="form-select">
                            @foreach($lieux as $lieu)
                                <option value="{{ $lieu->id }}">{{ $lieu->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Type => qualifications ou finale --}}
                    <div class="col-md-4">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="qualifications">Qualifications</option>
                            <option value="finale">Finale</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="bi bi-calendar3"></i> Date
                        </label>
                        <input type="date" name="date" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="bi bi-clock"></i> Heure début
                        </label>
                        <input type="time" name="heure_debut" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="bi bi-clock-history"></i> Heure fin
                        </label>
                        <input type="time" name="heure_fin" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">
                            <i class="bi bi-tag"></i> Prix (€)
                        </label>
                        {{-- min="0" empêche de saisir un prix négatif --}}
                        <input type="number" name="prix" class="form-control" min="0">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-lg"></i> Ajouter
                </button>

            </form>
        </div>
    </div>

@endsection