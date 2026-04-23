@extends('layouts.app')

@section('content')
    <h1 class="mb-4">🛒 Mon panier</h1>

    {{-- Message de succés --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
    @endif

    @if(count($tours) > 0)
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <table class="table align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Sport</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th>Sous-total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $tour_id => $item)
                            <tr>
                                <td><strong>{{ $item['tour']->sport->nom }}</strong></td>
                                <td>
                                    <span class="badge {{ $item['tour']->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($item['tour']->type) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item['tour']->date)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item['tour']->lieu->nom }}</td>
                                <td>{{ $item['tour']->prix }}€</td>
                                <td>{{ $item['quantite'] }}</td>
                                <td><strong>{{ $item['tour']->prix * $item['quantite'] }}€</strong></td>
                                <td>
                                    <form method="POST" action="/panier/supprimer/{{ $tour_id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Total et actions --}}
        <div class="d-flex justify-content-between align-items-center">
            <form method="POST" action="/panier/vider">
                @csrf
                <button type="submit" class="btn btn-secondary">🗑️ Vider le panier</button>
            </form>
            <div class="text-end">
                <h4>Total : <strong class="text-success">{{ $total }}€</strong></h4>
                <a href="/billetterie/reserver" class="btn btn-success btn-lg">
                    ✅ Confirmer la réservation
                </a>
            </div>
        </div>

    @else
        <div class="alert alert-info">
            Votre panier est vide. 
            <a href="/billetterie">Retour à la billetterie</a>
        </div>
    @endif

@endsection