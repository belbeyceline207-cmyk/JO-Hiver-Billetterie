@extends('layouts.app')

@section('content')

    {{-- Bannière en haut de page --}}
    <div style="background-color: #006d6d; padding: 40px; margin: -30px -12px 30px; text-align: center;">
        <h1 style="color: white; border: none; padding: 0; letter-spacing: 2px;">
            <i class="bi bi-trophy"></i> Espace Organisateur
        </h1>
    </div>

    {{-- Message de succès après une action --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    {{-- Grille de 4 cartes cliquables --}}
    <div class="row g-4 justify-content-center">

        {{-- Carte : Ajouter une compétition --}}
        <div class="col-md-4">
            <a href="/organisateur/competitions" class="card text-center p-4 text-decoration-none h-100"
               style="transition: transform 0.3s;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem; color: #006d6d;">
                    <i class="bi bi-plus-circle"></i>
                </div>
                <h5 class="mt-3" style="color: #1a1a2e;">Ajouter une compétition</h5>
                <p style="color: #4a5568; font-size: 0.85rem;">Programmer une nouvelle compétition</p>
            </a>
        </div>

        {{-- Carte : Gérer les compétitions --}}
        <div class="col-md-4">
            <a href="/organisateur/competitions/liste" class="card text-center p-4 text-decoration-none h-100"
               style="transition: transform 0.3s;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem; color: #006d6d;">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <h5 class="mt-3" style="color: #1a1a2e;">Gérer les compétitions</h5>
                <p style="color: #4a5568; font-size: 0.85rem;">Modifier ou supprimer une compétition</p>
            </a>
        </div>

        {{-- Carte : Voir les réservations --}}
        <div class="col-md-4">
            <a href="/organisateur/reservations" class="card text-center p-4 text-decoration-none h-100"
               style="transition: transform 0.3s;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem; color: #006d6d;">
                    <i class="bi bi-ticket-perforated"></i>
                </div>
                <h5 class="mt-3" style="color: #1a1a2e;">Voir les réservations</h5>
                <p style="color: #4a5568; font-size: 0.85rem;">Consulter toutes les réservations</p>
            </a>
        </div>

        {{-- Carte : Statistiques --}}
        <div class="col-md-4">
            <a href="/organisateur/stats" class="card text-center p-4 text-decoration-none h-100"
               style="transition: transform 0.3s;"
               onmouseover="this.style.transform='translateY(-8px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem; color: #006d6d;">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
                <h5 class="mt-3" style="color: #1a1a2e;">Statistiques</h5>
                <p style="color: #4a5568; font-size: 0.85rem;">Spectateurs et places disponibles</p>
            </a>
        </div>

    </div>

    {{-- Bouton de déconnexion en bas à droite --}}
    <div class="text-end mt-5">
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i> Déconnexion
            </button>
        </form>
    </div>

@endsection