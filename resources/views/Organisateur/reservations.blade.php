@extends('layouts.app')

@section('content')

    <a href="/organisateur" class="btn btn-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

    <h1 class="mb-4">
        <i class="bi bi-ticket-perforated"></i> Toutes les réservations
    </h1>

    {{-- Formulaire de recherche --}}
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="/organisateur/reservations">
                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                        <label class="form-label mb-0">Rechercher un spectateur :</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="search" class="form-control" placeholder="Nom, prénom ou email..." value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Rechercher
                        </button>
                    </div>
                    <div class="col-auto">
                        <a href="/organisateur/reservations" class="btn btn-secondary">
                            <i class="bi bi-arrow-counterclockwise"></i> Réinitialiser
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th><i class="bi bi-person"></i> Spectateur</th>
                        <th><i class="bi bi-envelope"></i> Email</th>
                        <th><i class="bi bi-telephone"></i> Téléphone</th>
                        <th><i class="bi bi-trophy"></i> Sport</th>
                        <th><i class="bi bi-flag"></i> Type</th>
                        <th><i class="bi bi-calendar3"></i> Date</th>
                        <th><i class="bi bi-geo-alt"></i> Lieu</th>
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
                            <td colspan="7" class="text-center">
                                <i class="bi bi-inbox"></i> Aucune réservation trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection