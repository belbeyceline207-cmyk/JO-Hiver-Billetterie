@extends('layouts.app')

@section('content')
    <h1 class="mb-4">📅 Calendrier des compétitions</h1>

    {{-- Filtre par sport --}}
    <form methode="GET" action="/calendrier" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="sport_id" class="form-select">
                    <option value="">-- Tous les sports --</option>
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

    {{-- Affichage par jour --}}
    @forelse($tours as $date => $toursduJour)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white fw-bold">
                📆 {{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($toursduJour as $tour)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tour->sport->nom }}</h5>
                                    <span class="badge {{ $tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }} mb-2">
                                        {{ ucfirst($tour->type) }}
                                    </span>
                                    <p class="card-text">
                                        📍 {{ $tour->lieu->nom }}<br>
                                        🕐 {{ $tour->heure_debut }} - {{ $tour->heure_fin }}<br>
                                        💶 {{ $tour->prix }}€
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Aucune compétion trouvée.</div>
    @endforelse
@endsection
