@extends('layouts.app')

@section('content')

    {{-- Bannière en haut de page --}}
    <div style="background-color: #006d6d; padding: 40px; margin: -30px -12px 30px; text-align: center;">
        <h1 style="color: white; border: none; padding: 0; letter-spacing: 2px;">
            <i class="bi bi-calendar3"></i> Calendrier des compétitions
        </h1>
    </div>

    {{-- Formulaire de filtre par sport --}}
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="/calendrier">
                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                        <label class="form-label mb-0">Filtrer par sport :</label>
                    </div>
                    <div class="col-auto">
                        {{-- Menu déroulant avec tous les sports --}}
                        <select name="sport_id" class="form-select">
                            <option value="">Tous les sports</option>
                            @foreach($sports as $sport)
                                {{-- 'selected' garde le sport choisi après le filtre --}}
                                <option value="{{ $sport->id }}" {{ request('sport_id') == $sport->id ? 'selected' : '' }}>
                                    {{ $sport->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Filtrer
                        </button>
                    </div>
                    <div class="col-auto">
                        {{-- Lien simple qui recharge la page sans filtre --}}
                        <a href="/calendrier" class="btn btn-secondary">
                            <i class="bi bi-arrow-counterclockwise"></i> Réinitialiser
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tableau planning des compétitions --}}
    <div class="card">
        <div class="card-body p-0">
            {{-- table-responsive permet de scroller horizontalement sur mobile --}}
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle mb-0">
                    <thead style="background-color: #006d6d; color: white;">
                        <tr>
                            <th style="background-color: #004d4d;">
                                <i class="bi bi-calendar3"></i> Date
                            </th>
                            {{-- Une colonne par sport --}}
                            @foreach($sports as $sport)
                                <th>{{ $sport->nom }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        {{-- On boucle sur les tours groupés par date --}}
                        @forelse($tours as $date => $toursduJour)
                            <tr>
                                {{-- Affiche la date en français --}}
                                <td class="fw-bold" style="background-color: #f0f9f9; color: #006d6d; white-space: nowrap;">
                                    {{ \Carbon\Carbon::parse($date)->translatedFormat('l d F Y') }}
                                </td>

                                {{-- Pour chaque sport, on cherche s'il a un tour ce jour-là --}}
                                @foreach($sports as $sport)
                                    <td>
                                        @php
                                            // Cherche si ce sport a un tour ce jour-là
                                            $tour = $toursduJour->firstWhere('sport_id', $sport->id);
                                        @endphp

                                        @if($tour)
                                            {{-- Badge rouge pour finale, jaune pour qualifications --}}
                                            <span class="badge {{ $tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                                {{ ucfirst($tour->type) }}
                                            </span>
                                            <div class="mt-1" style="font-size: 0.8rem; color: #4a5568;">
                                                <i class="bi bi-geo-alt"></i> {{ $tour->lieu->nom }}<br>
                                                <i class="bi bi-clock"></i> {{ $tour->heure_debut }}<br>
                                                <i class="bi bi-tag"></i> {{ $tour->prix }}€
                                            </div>
                                        @else
                                            {{-- Tiret si pas de compétition ce jour pour ce sport --}}
                                            <span style="color: #e2e8f0; font-size: 1.2rem;">—</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @empty
                            {{-- Message si aucune compétition trouvée --}}
                            <tr>
                                <td colspan="{{ $sports->count() + 1 }}">
                                    <div class="alert alert-info mb-0">Aucune compétition trouvée.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection