@extends('layouts.app')

@section('content')
    <h1 class="mb-4">📅 Calendrier des compétitions</h1>

    {{-- Filtre par sport --}}
    <form method="GET" action="/calendrier" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="sport_id" class="form-select">
                    <option value=""> Tous les sports </option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->id }}" {{ request('sport_id') == $sport->id ? 'selected' : '' }}>
                            {{ $sport->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
            <div class ="col-auto">
                <a href="/calendrier" class="btn btn-secondary">Réinitialissation</a>
            </div>
        </div>
    </form>
    {{-- Tableau planning --}}
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>📅 Date</th>
                    @foreach($sports as $sport)
                        <th>{{ $sport->nom }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($tours as $date => $toursduJour)
                    <tr>
                        <td class="fw-bold">
                            {{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}
                        </td>
                        @foreach($sports as $sport)
                            <td>
                                {{-- On cherche si ce sport a un tour ce jour là --}}
                                @php
                                    $tour = $toursduJour->firstWhere('sport_id', $sport->id);
                                @endphp

                                @if($tour)
                                    <span class="badge {{ $tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($tour->type) }}
                                    </span><br>
                                    <small>📍 {{ $tour->lieu->nom }}</small><br>
                                    <small>🕐 {{ $tour->heure_debut }}</small><br>
                                    <small>💶 {{ $tour->prix }}€</small>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ $sports->count() + 1 }}" class="text-center">
                            <div class="alert alert-info mb-0">Aucune compétition trouvée.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
@endsection