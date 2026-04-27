@extends('layouts.app')

@section('content')
    <h1 class="mb-4">🏅 Espace Organisateur</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Dashboard avec icônes --}}
    <div class="row g-4 justify-content-center mt-3">
        <div class="col-md-4">
            <a href="/organisateur/competitions" class="card text-center p-4 text-decoration-none"
               style="transition: transform 0.3s; display: block;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem;">➕</div>
                <h5 class="mt-3">Ajouter une compétition</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Programmer une nouvelle compétition</p>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/organisateur/competitions/liste" class="card text-center p-4 text-decoration-none"
               style="transition: transform 0.3s; display: block;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem;">📋</div>
                <h5 class="mt-3">Gérer les compétitions</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Modifier ou supprimer une compétition</p>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/organisateur/reservations" class="card text-center p-4 text-decoration-none"
               style="transition: transform 0.3s; display: block;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem;">🎟️</div>
                <h5 class="mt-3">Voir les réservations</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Consulter toutes les réservations</p>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/organisateur/stats" class="card text-center p-4 text-decoration-none"
               style="transition: transform 0.3s; display: block;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem;">📊</div>
                <h5 class="mt-3">Statistiques</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Spectateurs et places disponibles</p>
            </a>
        </div>
        {{-- Bouton déconnexion --}}
        <div class="text-end mt-4">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-danger">🚪 Déconnexion</button>
            </form>
        </div>
    </div>
@endsection