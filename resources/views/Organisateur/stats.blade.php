@extends('layouts.app')

@section('content')
    <a href="/organisateur" class="btn btn-secondary mb-4">⬅️ Retour</a>
    <h1 class="mb-4">📊 Statistiques</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Sport</th>
                        <th>Type</th>
                        <th>Lieu</th>
                        <th>Date</th>
                        <th>Capacité</th>
                        <th>Spectateurs</th>
                        <th>Places dispo</th>
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
                            <td>{{ $tour->lieu->capacite }}</td>
                            <td>{{ $tour->reservations_count }}</td>
                            <td>
                                <span class="{{ $tour->places_disponibles < 10 ? 'text-danger fw-bold' : 'text-success' }}">
                                    {{ $tour->places_disponibles }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection