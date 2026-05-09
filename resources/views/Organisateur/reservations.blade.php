@extends('layouts.app')

@section('content')

    {{-- Bouton retour vers le dashboard --}}
    <a href="/organisateur" class="btn btn-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

    <h1 class="mb-4">
        <i class="bi bi-ticket-perforated"></i> Toutes les réservations
    </h1>

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
                    {{-- @forelse affiche les réservations ou un message si vide --}}
                    @forelse($reservations as $reservation)
                        <tr>
                            {{-- Nom complet du spectateur --}}
                            <td>{{ $reservation->spectateur->prenom }} {{ $reservation->spectateur->nom }}</td>
                            <td>{{ $reservation->spectateur->email }}</td>
                            <td>{{ $reservation->spectateur->telephone }}</td>
                            <td>{{ $reservation->tour->sport->nom }}</td>
                            <td>
                                {{-- Badge rouge pour finale, jaune pour qualifications --}}
                                <span class="badge {{ $reservation->tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($reservation->tour->type) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($reservation->tour->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $reservation->tour->lieu->nom }}</td>
                        </tr>
                    @empty
                        {{-- Message si aucune réservation en base --}}
                        <tr>
                            <td colspan="7" class="text-center">
                                <i class="bi bi-inbox"></i> Aucune réservation pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection