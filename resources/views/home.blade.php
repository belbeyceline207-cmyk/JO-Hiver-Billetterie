@extends('layouts.app')

@section('content')

    {{-- HERO IMAGE --}}
    <div style="position: relative; margin: 0 -12px;">
        <img src="{{ asset('images/hero.jpg') }}" 
             style="width: 100%; height: 550px; object-fit: cover; display: block;">
        <div style="position: absolute; bottom: 0; left: 0; right: 0; 
                    background: linear-gradient(transparent, rgba(0,0,0,0.7));
                    padding: 40px 40px 30px;">
            <h2 style="color: white; font-weight: 900; font-size: 2.5rem; margin: 0;">
                Bienvenue aux JO d'Hiver 2026
            </h2>
            <p style="color: rgba(255,255,255,0.85); font-size: 1.1rem; margin: 10px 0 20px;">
                Milano Cortina • 6 - 22 Février 2026
            </p>
            <a href="/billetterie" class="btn btn-primary btn-lg me-3">🎟️ Réserver des billets</a>
            <a href="/calendrier" class="btn btn-outline-light btn-lg">📅 Voir le calendrier</a>
        </div>
    </div>

    {{-- INFOS CLÉS --}}
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card text-center p-4 h-100" style="border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                    <div style="font-size: 2.5rem;">🏔️</div>
                    <h5 class="mt-3" style="color: #006d6d; font-weight: 700;">Lieu</h5>
                    <p style="color: #6b7280;">Milano & Cortina d'Ampezzo, Italie</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-4 h-100" style="border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                    <div style="font-size: 2.5rem;">🏅</div>
                    <h5 class="mt-3" style="color: #006d6d; font-weight: 700;">Sports</h5>
                    <p style="color: #6b7280;">16 disciplines olympiques</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-4 h-100" style="border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                    <div style="font-size: 2.5rem;">🌍</div>
                    <h5 class="mt-3" style="color: #006d6d; font-weight: 700;">Nations</h5>
                    <p style="color: #6b7280;">93 pays participants</p>
                </div>
            </div>
        </div>

        {{-- SPORTS avec images --}}
        <h2 style="font-weight: 900; color: #1a1a2e; margin-bottom: 25px;">
            🏆 Les sports
        </h2>
        <div class="row g-3 mb-5">
            <div class="col-md-4">
                <div style="position: relative; border-radius: 16px; overflow: hidden; height: 200px;">
                    <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=500" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; 
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 20px;">
                        <h6 style="color: white; font-weight: 700; margin: 0;">Ski Alpin</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; border-radius: 16px; overflow: hidden; height: 200px;">
                    <img src="https://french.xinhuanet.com/20260220/055b29c14ed94526a9a9275b25feeee5/20260220055b29c14ed94526a9a9275b25feeee5_202602203c9cfee1566945089c724eef19491d68.jpg" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; 
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 20px;">
                        <h6 style="color: white; font-weight: 700; margin: 0;">Hockey sur Glace</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div style="position: relative; border-radius: 16px; overflow: hidden; height: 200px;">
                    <img src="https://thumb.canalplus.pro/http/unsafe/1440x810/filters:quality(80)/img-hapi.canalplus.pro:80/ServiceImage/ImageID/122702049" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; 
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 20px;">
                        <h6 style="color: white; font-weight: 700; margin: 0;">Patinage Artistique</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div style="position: relative; border-radius: 16px; overflow: hidden; height: 200px;">
                    <img src="https://maville.com/photosmvi/2026/01/25/P35709308D7160113G.jpg" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; 
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 20px;">
                        <h6 style="color: white; font-weight: 700; margin: 0;">Biathlon</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div style="position: relative; border-radius: 16px; overflow: hidden; height: 200px;">
                    <img src="https://images.unsplash.com/photo-1580748141549-71748dbe0bdc?w=500" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; 
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 20px;">
                        <h6 style="color: white; font-weight: 700; margin: 0;">Curling</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- CALL TO ACTION --}}
        <div style="background: linear-gradient(135deg, #006d6d, #00a896); 
                    border-radius: 20px; padding: 50px; text-align: center; color: white;">
            <h2 style="font-weight: 900; margin-bottom: 15px;">🎟️ Réservez vos billets</h2>
            <p style="font-size: 1.1rem; opacity: 0.9; margin-bottom: 25px;">
                Ne manquez pas les Jeux Olympiques d'Hiver 2026 !
            </p>
            <a href="/billetterie" class="btn btn-light btn-lg px-5" style="font-weight: 700; color: #006d6d; border-radius: 50px;">
                Voir les billets disponibles →
            </a>
        </div>
    </div>

@endsection