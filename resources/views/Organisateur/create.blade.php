@extends('layouts.app')

@section('content')
    <a href="/organisateur" class="btn btn-secondary mb-4">⬅️ Retour</a>
    <h1 class="mb-4">➕ Ajouter une compétition</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="/organisateur/competitions">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Sport</label>
                        <select name="sport_id" class="form-select">
                            @foreach($sports as $sport)
                                <option value="{{ $sport->id }}">{{ $sport->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Lieu</label>
                        <select name="lieu_id" class="form-select">
                            @foreach($lieux as $lieu)
                                <option value="{{ $lieu->id }}">{{ $lieu->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="qualifications">Qualifications</option>
                            <option value="finale">Finale</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Heure début</label>
                        <input type="time" name="heure_debut" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Heure fin</label>
                        <input type="time" name="heure_fin" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Prix (€)</label>
                        <input type="number" name="prix" class="form-control" min="0">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">➕ Ajouter</button>
            </form>
        </div>
    </div>
@endsection