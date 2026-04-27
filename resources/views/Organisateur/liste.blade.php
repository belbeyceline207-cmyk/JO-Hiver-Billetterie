@extends('layouts.app')

@section('content')
    <a href="/organisateur" class="btn btn-secondary mb-4">⬅️ Retour</a>
    <h1 class="mb-4">📋 Gérer les compétitions</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
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
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $tour->id }}">✏️</button>
                                <form method="POST" action="/organisateur/competitions/{{ $tour->id }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑️</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal modifier --}}
                        <div class="modal fade" id="modal{{ $tour->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">✏️ Modifier</h5>
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
                                                        <option value="{{ $sport->id }}" {{ $tour->sport_id == $sport->id ? 'selected' : '' }}>{{ $sport->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Lieu</label>
                                                <select name="lieu_id" class="form-select">
                                                    @foreach($lieux as $lieu)
                                                        <option value="{{ $lieu->id }}" {{ $tour->lieu_id == $lieu->id ? 'selected' : '' }}>{{ $lieu->nom }}</option>
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
@endsection