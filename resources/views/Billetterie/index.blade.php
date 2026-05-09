@extends('layouts.app')

@section('content')

    {{-- Bannière en haut de page --}}
    <div style="background-color: #006d6d; padding: 40px; margin: -30px -12px 30px; text-align: center;">
        <h1 style="color: white; border: none; padding: 0; letter-spacing: 2px;">
            <i class="bi bi-ticket-perforated"></i> Billetterie
        </h1>
    </div>

    {{-- Formulaire de filtre par prix --}}
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="/billetterie">
                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                        <label class="form-label mb-0">Filtrer par prix :</label>
                    </div>
                    <div class="col-auto">
                        {{-- request('prix_min') garde la valeur saisie après le filtre --}}
                        <input type="number" name="prix_min" class="form-control"
                               placeholder="Prix min" value="{{ request('prix_min') }}">
                    </div>
                    <div class="col-auto">
                        <input type="number" name="prix_max" class="form-control"
                               placeholder="Prix max" value="{{ request('prix_max') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Filtrer
                        </button>
                    </div>
                    <div class="col-auto">
                        {{-- Lien simple qui recharge la page sans filtre --}}
                        <a href="/billetterie" class="btn btn-secondary">
                            <i class="bi bi-arrow-counterclockwise"></i> Réinitialiser
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Liste des compétitions --}}
    <div class="row">
        {{-- @forelse affiche les tours ou un message si la liste est vide --}}
        @forelse($tours as $tour)
            <div class="col-md-4 mb-4">
                <div class="card h-100">

                    {{-- Nom du sport en header de la card --}}
                    <div class="card-header bg-primary">
                        <h5 class="mb-0">{{ $tour->sport->nom }}</h5>
                    </div>

                    <div class="card-body">
                        {{-- Badge rouge pour finale, jaune pour qualifications --}}
                        <span class="badge {{ $tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }} mb-3">
                            {{ ucfirst($tour->type) }}
                        </span>
                        <div style="font-size: 0.9rem; color: #4a5568; line-height: 1.8;">
                            <i class="bi bi-geo-alt"></i> {{ $tour->lieu->nom }}<br>
                            <i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($tour->date)->translatedFormat('l d F Y') }}<br>
                            <i class="bi bi-clock"></i> {{ $tour->heure_debut }} - {{ $tour->heure_fin }}<br>
                            <i class="bi bi-tag"></i> <strong style="color: #006d6d; font-size: 1.1rem;">{{ $tour->prix }}€</strong>
                        </div>
                    </div>

                    {{-- Formulaire d'ajout au panier --}}
                    <div class="card-footer" style="background-color: #f8f9fa;">
                        <form method="POST" action="/panier/ajouter">
                            @csrf
                            {{-- Champ caché pour envoyer l'id du tour --}}
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                            <div class="d-flex gap-2">
                                {{-- Champ quantité entre 1 et 10 --}}
                                <input type="number" name="quantite" value="1"
                                       min="1" max="10" class="form-control w-25">
                                <button type="submit" class="btn btn-success w-75">
                                    <i class="bi bi-cart-plus"></i> Ajouter au panier
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            {{-- Message si aucune compétition trouvée avec le filtre --}}
            <div class="col-12">
                <div class="alert alert-info">Aucune compétition trouvée.</div>
            </div>
        @endforelse
    </div>

@endsection