@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1 class="text-success">🎉 Réservation confirmée !</h1>
        <p class="lead">Merci pour votre réservation aux JO d'hiver 2026 !</p>
    </div>

    @if(session('recap'))
        @php $recap = session('recap'); @endphp

        {{-- Coordonnées de l'acheteur --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">👤 Vos coordonnées</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nom :</strong> {{ $recap['prenom'] }} {{ $recap['nom'] }}</p>
                        <p><strong>Email :</strong> {{ $recap['email'] }}</p>
                        <p><strong>Téléphone :</strong> {{ $recap['telephone'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Récapitulatif des billets --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">🎟️ Récapitulatif des billets</h5>
            </div>
            <div class="card-body">
                <table class="table align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Spectateur</th>
                            <th>Sport</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($recap['reservations'] as $reservation)
                            @php $total += $reservation['tour']->prix; @endphp
                            <tr>
                                <td>{{ $reservation['spectateur']->prenom }} {{ $reservation['spectateur']->nom }}</td>
                                <td>{{ $reservation['tour']->sport->nom }}</td>
                                <td>
                                    <span class="badge {{ $reservation['tour']->type == 'finale' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($reservation['tour']->type) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($reservation['tour']->date)->translatedFormat('d F Y') }}</td>
                                <td>{{ $reservation['tour']->lieu->nom }}</td>
                                <td>{{ $reservation['tour']->prix }}€</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end"><strong>Total :</strong></td>
                            <td><strong class="text-success">{{ $total }}€</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif

    <div class="text-center">
        <a href="/billetterie" class="btn btn-primary mt-3">🎟️ Retour à la billetterie</a>
        <a href="/calendrier" class="btn btn-secondary mt-3">📅 Voir le calendrier</a>
    </div>
@endsection