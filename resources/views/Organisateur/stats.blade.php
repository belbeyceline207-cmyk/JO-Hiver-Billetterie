@extends('layouts.app')

@section('content')

    {{-- Bouton retour vers le dashboard --}}
    <a href="/organisateur" class="btn btn-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

    <h1 class="mb-4">
        <i class="bi bi-bar-chart-line"></i> Statistiques
    </h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th><i class="bi bi-trophy"></i> Sport</th>
                        <th><i class="bi bi-flag"></i> Type</th>
                        <th><i class="bi bi-geo-alt"></i> Lieu</th>
                        <th><i class="bi bi-calendar3"></i> Date</th>
                        <th><i class="bi bi-people"></i> Capacité</th>
                        <th><i class="bi bi-person-check"></i> Spectateurs</th>
                        <th><i class="bi bi-chair"></i> Places dispo</th>
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

                            {{-- Capacité maximale du lieu --}}
                            <td>{{ $tour->lieu->capacite }}</td>

                            {{-- Nombre de réservations enregistrées --}}
                            <td>{{ $tour->reservations_count }}</td>

                            <td>
                                {{-- Alerte rouge si moins de 10 places, vert sinon --}}
                                <span class="{{ $tour->places_disponibles < 10 ? 'text-danger fw-bold' : 'text-success' }}">
                                    @if($tour->places_disponibles < 10)
                                        <i class="bi bi-exclamation-triangle"></i>
                                    @else
                                        <i class="bi bi-check-circle"></i>
                                    @endif
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