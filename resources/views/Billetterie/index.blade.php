@extends('layouts.app')

@section('content')
    <h1 class="mb-4"> 🎟️ Billetterie </h1>

    {{-- Filtre par prix --}}
    <form method="GET" action="/billetterie" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <input type="number" name="prix_min" class="form-control" placeholder="Prix min" value="{{ request('prix_min') }}">
            </div>
            <div class="col-auto">
                <input type="number" name="prix_max" class="form-control" placeholder="Prix max" value="{{ request('prix_max') }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
            <div class="col-auto">
                <a href="/billetterie" class="btn btn-secondary">Réinitialiser</a>
            </div>
        </div>
    </form>

    {{-- liste des competions --}}
    <div class="row">
        @forelse($tours as $tour)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $tour->sport->nom}}</h5>
                    </div>
                    <div class="card-body">
                        <span class="badge {{$tour->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }} mb-2">
                            {{ ucfirst($tour->type)}}
                        </span>
                        <p class="card-text">
                            📍 {{ $tour->lieu->nom }}<br>
                            📅 {{ \Carbon\Carbon::parse($tour->date)->translatedFormat('l d F Y') }}<br>
                            🕐 {{ $tour->heure_debut }} - {{ $tour->heure_fin }}<br>
                            💶 <strong>{{ $tour->prix }}€</strong>
                        </p>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="/panier/ajouter">
                            @csrf
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                            <div class="d-flex gap-2">
                                <input type="number" name="quantite" value="1" min="1" max="10" class="form-control w-25">
                                <button type="submit" class="btn btn-success w-75">🛒 Ajouter au panier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty 
            <div class="alert alert-info">Aucune compétion trouvée.</div>
        @endforelse
    </div>
@endsection