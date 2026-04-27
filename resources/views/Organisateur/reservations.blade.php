@extends('layouts.app')

@section('content')
    <a href="/organisateur" class="btn btn-secondary mb-4">⬅️ Retour</a>
    <h1 class="mb-4">🎟️ Toutes les réservations</h1>

    <div class="card shadow-sm">
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