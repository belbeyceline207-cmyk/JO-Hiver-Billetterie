@extends('layouts.app')

@section('content')

    {{-- Titre de confirmation --}}
    <div class="text-center mb-4">
        <h1 style="color: #006d6d;">
            <i class="bi bi-check-circle"></i> Réservation confirmée !
        </h1>
        <p class="lead">Merci pour votre réservation aux JO d'hiver 2026 !</p>
    </div>

    {{-- Affiche le récapitulatif seulement si les données sont en session --}}
    @if(session('recap'))
        @php $recap = session('recap'); @endphp

        {{-- Coordonnées de l'acheteur --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-person"></i> Vos coordonnées
                </h5>
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

        {{-- Tableau récapitulatif des billets achetés --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="bi bi-ticket-perforated"></i> Récapitulatif des billets
                </h5>
            </div>
            <div class="card-body">
                <table class="table align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-person"></i> Spectateur</th>
                            <th><i class="bi bi-trophy"></i> Sport</th>
                            <th><i class="bi bi-flag"></i> Type</th>
                            <th><i class="bi bi-calendar3"></i> Date</th>
                            <th><i class="bi bi-geo-alt"></i> Lieu</th>
                            <th><i class="bi bi-tag"></i> Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($recap['reservations'] as $reservation)
                            {{-- Calcul du total au fur et à mesure --}}
                            @php $total += $reservation['tour']->prix; @endphp
                            <tr>
                                {{-- Nom du spectateur pour ce billet --}}
                                <td>{{ $reservation['spectateur']->prenom }} {{ $reservation['spectateur']->nom }}</td>
                                <td>{{ $reservation['tour']->sport->nom }}</td>
                                <td>
                                    {{-- Badge rouge pour finale, jaune pour qualifications --}}
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
                    {{-- Ligne de total en bas du tableau --}}
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end"><strong>Total :</strong></td>
                            <td><strong style="color: #006d6d;">{{ $total }}€</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif

    {{-- Boutons de navigation après confirmation --}}
    <div class="text-center">
        <a href="/billetterie" class="btn btn-primary mt-3">
            <i class="bi bi-ticket-perforated"></i> Retour à la billetterie
        </a>
        <a href="/calendrier" class="btn btn-secondary mt-3">
            <i class="bi bi-calendar3"></i> Voir le calendrier
        </a>
    </div>

@endsection