@extends('layouts.app')

@section('content')

    {{-- Contenu principal --}}
    <div class="text-center py-5">
        <div style="font-size: 5rem;">❄️</div>
        <h1 class="display-4 fw-black" style="border: none; padding: 0; letter-spacing: 5px;">
            MILANO CORTINA
        </h1>
        <h2 style="color: #00A651; font-size: 4rem; font-weight: 900; letter-spacing: 10px;">
            2026
        </h2>
        <p style="color: #a0aec0; letter-spacing: 4px; text-transform: uppercase; font-size: 0.9rem;">
            Jeux Olympiques d'Hiver &nbsp;|&nbsp; 6 - 22 Février 2026
        </p>
        <div style="width: 80px; height: 3px; background: #00A651; margin: 20px auto;"></div>
    </div>

    {{-- Infos clés --}}
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-center p-3">
                <div style="font-size: 2.5rem;">🏔️</div>
                <h5 class="mt-2" style="color: #00A651;">Lieu</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Milano & Cortina d'Ampezzo, Italie</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <div style="font-size: 2.5rem;">🏅</div>
                <h5 class="mt-2" style="color: #00A651;">Sports</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">16 disciplines olympiques</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3">
                <div style="font-size: 2.5rem;">🌍</div>
                <h5 class="mt-2" style="color: #00A651;">Nations</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">93 pays participants</p>
            </div>
        </div>
    </div>

    {{-- Description --}}
    <div class="card p-4 mb-4">
        <h5 style="color: #00A651; letter-spacing: 2px; text-transform: uppercase;">🎯 À propos</h5>
        <p style="color: #a0aec0; line-height: 1.8;">
            Les XXVes Jeux Olympiques d'Hiver se déroulent à Milan et Cortina d'Ampezzo en Italie, 
            du <strong style="color: white;">6 au 22 février 2026</strong>. 
            Réservez vos billets et suivez le calendrier des compétitions sur ce site officiel.
        </p>
    </div>

    {{-- Call to action --}}
    <div class="row g-3">
        <div class="col-md-6">
            <a href="/billetterie" class="card text-center p-4 text-decoration-none" 
               style="transition: transform 0.3s; display: block;"
               onmouseover="this.style.transform='translateY(-5px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 2rem;">🎟️</div>
                <h5 class="mt-2">Réserver des billets</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Achetez vos places pour les compétitions</p>
            </a>
        </div>
        <div class="col-md-6">
            <a href="/calendrier" class="card text-center p-4 text-decoration-none"
               style="transition: transform 0.3s; display: block;"
               onmouseover="this.style.transform='translateY(-5px)'"
               onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 2rem;">📅</div>
                <h5 class="mt-2">Voir le calendrier</h5>
                <p style="color: #a0aec0; font-size: 0.85rem;">Consultez toutes les compétitions</p>
            </a>
        </div>
    </div>

@endsection