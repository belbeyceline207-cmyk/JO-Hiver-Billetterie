@extends('layouts.app')

@section('content')

    {{-- Bannière en haut de page --}}
    <div style="background-color: #006d6d; padding: 40px; margin: -30px -12px 30px; text-align: center;">
        <h1 style="color: white; border: none; padding: 0; letter-spacing: 2px;">
            <i class="bi bi-cart3"></i> Mon panier
        </h1>
    </div>

    {{-- Message de succès après ajout ou suppression --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Si le panier contient au moins un article --}}
    @if(count($tours) > 0)
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <table class="table align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-trophy"></i> Sport</th>
                            <th><i class="bi bi-flag"></i> Type</th>
                            <th><i class="bi bi-calendar3"></i> Date</th>
                            <th><i class="bi bi-geo-alt"></i> Lieu</th>
                            <th><i class="bi bi-tag"></i> Prix unitaire</th>
                            <th><i class="bi bi-hash"></i> Quantité</th>
                            <th><i class="bi bi-receipt"></i> Sous-total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tours as $tour_id => $item)
                            <tr>
                                <td><strong>{{ $item['tour']->sport->nom }}</strong></td>
                                <td>
                                    {{-- Badge rouge pour finale, jaune pour qualifications --}}
                                    <span class="badge {{ $item['tour']->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($item['tour']->type) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item['tour']->date)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item['tour']->lieu->nom }}</td>
                                <td>{{ $item['tour']->prix }}€</td>
                                <td>{{ $item['quantite'] }}</td>
                                {{-- Sous-total = prix x quantité --}}
                                <td><strong>{{ $item['tour']->prix * $item['quantite'] }}€</strong></td>
                                <td>
                                    {{-- Formulaire de suppression d'un billet --}}
                                    <form method="POST" action="/panier/supprimer/{{ $tour_id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Total et boutons d'action --}}
        <div class="d-flex justify-content-between align-items-center">

            {{-- Bouton pour vider tout le panier --}}
            <form method="POST" action="/panier/vider">
                @csrf
                <button type="submit" class="btn btn-secondary">
                    <i class="bi bi-trash"></i> Vider le panier
                </button>
            </form>

            <div class="text-end">
                {{-- Total général de la commande --}}
                <h4>Total : <strong style="color: #006d6d;">{{ $total }}€</strong></h4>
                <a href="/billetterie/reserver" class="btn btn-success btn-lg">
                    <i class="bi bi-check-circle"></i> Confirmer la réservation
                </a>
            </div>
        </div>

    @else
        {{-- Message si le panier est vide --}}
        <div class="alert alert-info">
            <i class="bi bi-cart-x"></i> Votre panier est vide.
            <a href="/billetterie">Retour à la billetterie</a>
        </div>
    @endif

@endsection