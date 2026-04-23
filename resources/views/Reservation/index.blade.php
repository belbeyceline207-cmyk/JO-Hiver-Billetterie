@extends('layouts.app')

@section('content')
    <h1 class="mb-4">📝 Formulaire de réservation</h1>

    <form method="POST" action="/billetterie/confirmer">
        @csrf

        {{-- Coordonnées de l'acheteur --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">👤 Vos coordonnées</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Prénom *</label>
                        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}">
                        @error('prenom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nom *</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Téléphone *</label>
                        <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}">
                        @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Noms des personnes par billet --}}
        @php $index = 0; @endphp
        @foreach($tours as $tour_id => $item)
            @for($i = 0; $i < $item['quantite']; $i++)
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0">
                            🎟️ Billet {{ $index + 1 }} — {{ $item['tour']->sport->nom }} 
                            ({{ ucfirst($item['tour']->type) }}) — {{ $item['tour']->prix }}€
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="personnes[{{ $index }}][tour_id]" value="{{ $tour_id }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Prénom du spectateur *</label>
                                <input type="text" name="personnes[{{ $index }}][prenom]" 
                                       class="form-control @error('personnes.'.$index.'.prenom') is-invalid @enderror">
                                @error('personnes.'.$index.'.prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nom du spectateur *</label>
                                <input type="text" name="personnes[{{ $index }}][nom]" 
                                       class="form-control @error('personnes.'.$index.'.nom') is-invalid @enderror">
                                @error('personnes.'.$index.'.nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @php $index++; @endphp
            @endfor
        @endforeach

        <div class="d-flex justify-content-between">
            <a href="/panier" class="btn btn-secondary">⬅️ Retour au panier</a>
            <button type="submit" class="btn btn-success btn-lg">✅ Confirmer la réservation</button>
        </div>

    </form>
@endsection