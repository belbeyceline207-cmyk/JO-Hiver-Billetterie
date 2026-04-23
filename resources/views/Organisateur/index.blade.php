@extends('layouts.app')

@section('content')
    <h1 class="mb-4">🏅 Espace Organisateur</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Ajouter une compétition --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ Ajouter une compétition</h5>
        </div>
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

    {{-- Liste des compétitions --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">📋 Compétitions programmées</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Sport</th>
                        <th>Type</th>
                        <th>Lieu</th>
                        <th>Date</th>
                        <th>Horaires</th>
                        <th>Prix</th>
                        <th>Réservations</th>
                        <th>Places dispo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tours as $tour)
                        <tr>
                            <td>{{ $tour->sport->nom }}</td>
                            <td>
                                <span class="badge {{ $tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($tour->type) }}
                                </span>
                            </td>
                            <td>{{ $tour->lieu->nom }}</td>
                            <td>{{ \Carbon\Carbon::parse($tour->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $tour->heure_debut }} - {{ $tour->heure_fin }}</td>
                            <td>{{ $tour->prix }}€</td>
                            <td>{{ $tour->reservations_count }}</td>
                            <td>
                                <span class="{{ $tour->places_disponibles < 10 ? 'text-danger fw-bold' : 'text-success' }}">
                                    {{ $tour->places_disponibles }}
                                </span>
                            </td>
                            <td>
                                {{-- Bouton modifier --}}
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $tour->id }}">
                                    ✏️
                                </button>
                                {{-- Bouton supprimer --}}
                                <form method="POST" action="/organisateur/competitions/{{ $tour->id }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette compétition ?')">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal modifier --}}
                        <div class="modal fade" id="modal{{ $tour->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">✏️ Modifier la compétition</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/organisateur/competitions/{{ $tour->id }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">Sport</label>
                                                <select name="sport_id" class="form-select">
                                                    @foreach($sports as $sport)
                                                        <option value="{{ $sport->id }}" {{ $tour->sport_id == $sport->id ? 'selected' : '' }}>
                                                            {{ $sport->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Lieu</label>
                                                <select name="lieu_id" class="form-select">
                                                    @foreach($lieux as $lieu)
                                                        <option value="{{ $lieu->id }}" {{ $tour->lieu_id == $lieu->id ? 'selected' : '' }}>
                                                            {{ $lieu->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select name="type" class="form-select">
                                                    <option value="qualifications" {{ $tour->type == 'qualifications' ? 'selected' : '' }}>Qualifications</option>
                                                    <option value="finale" {{ $tour->type == 'finale' ? 'selected' : '' }}>Finale</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" value="{{ $tour->date }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Heure début</label>
                                                <input type="time" name="heure_debut" class="form-control" value="{{ $tour->heure_debut }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Heure fin</label>
                                                <input type="time" name="heure_fin" class="form-control" value="{{ $tour->heure_fin }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Prix (€)</label>
                                                <input type="number" name="prix" class="form-control" value="{{ $tour->prix }}">
                                            </div>
                                            <button type="submit" class="btn btn-warning w-100">✏️ Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Réservations --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">🎟️ Toutes les réservations</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Spectateur</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Sport</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Lieu</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->spectateur->prenom }} {{ $reservation->spectateur->nom }}</td>
                            <td>{{ $reservation->spectateur->email }}</td>
                            <td>{{ $reservation->spectateur->telephone }}</td>
                            <td>{{ $reservation->tour->sport->nom }}</td>
                            <td>
                                <span class="badge {{ $reservation->tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($reservation->tour->type) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($reservation->tour->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $reservation->tour->lieu->nom }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucune réservation pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection