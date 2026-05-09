@extends('layouts.app')

@section('content')

    {{-- Bouton retour vers le dashboard --}}
    <a href="/organisateur" class="btn btn-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

    <h1 class="mb-4">
        <i class="bi bi-clipboard-check"></i> Gérer les compétitions
    </h1>

    {{-- Message de succès après modification ou suppression --}}
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
                                {{-- Badge rouge pour finale, jaune pour qualifications --}}
                                <span class="badge {{ $tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($tour->type) }}
                                </span>
                            </td>
                            <td>{{ $tour->lieu->nom }}</td>
                            <td>{{ \Carbon\Carbon::parse($tour->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $tour->heure_debut }} - {{ $tour->heure_fin }}</td>
                            <td>{{ $tour->prix }}€</td>
                            <td>
                                {{-- Bouton qui ouvre la modale de modification --}}
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $tour->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                {{-- Formulaire de suppression avec confirmation --}}
                                <form method="POST" action="/organisateur/competitions/{{ $tour->id }}" class="d-inline">
                                    @csrf
                                    @method('DELETE') {{-- Laravel utilise DELETE via un champ caché --}}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modale de modification — une par tour --}}
                        <div class="modal fade" id="modal{{ $tour->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">
                                            <i class="bi bi-pencil"></i> Modifier
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- Formulaire de modification --}}
                                        <form method="POST" action="/organisateur/competitions/{{ $tour->id }}">
                                            @csrf
                                            @method('PUT') {{-- Laravel utilise PUT via un champ caché --}}

                                            <div class="mb-3">
                                                <label class="form-label">Sport</label>
                                                {{-- 'selected' pré-sélectionne le sport actuel du tour --}}
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
                                                {{-- 'selected' pré-sélectionne le lieu actuel du tour --}}
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
                                                <label class="form-label">
                                                    <i class="bi bi-calendar3"></i> Date
                                                </label>
                                                {{-- valeur pré-remplit la date actuelle --}}
                                                <input type="date" name="date" class="form-control" value="{{ $tour->date }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="bi bi-clock"></i> Heure début
                                                </label>
                                                <input type="time" name="heure_debut" class="form-control" value="{{ $tour->heure_debut }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="bi bi-clock-history"></i> Heure fin
                                                </label>
                                                <input type="time" name="heure_fin" class="form-control" value="{{ $tour->heure_fin }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="bi bi-tag"></i> Prix (€)
                                                </label>
                                                <input type="number" name="prix" class="form-control" value="{{ $tour->prix }}">
                                            </div>

                                            <button type="submit" class="btn btn-warning w-100">
                                                <i class="bi bi-pencil"></i> Modifier
                                            </button>

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