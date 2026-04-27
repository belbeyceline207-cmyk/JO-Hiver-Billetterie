<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JO Hiver 2026 - Milano Cortina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Montserrat', sans-serif; }

        body {
            background-color: #ffffff;
            color: #1a1a2e;
            margin: 0;
            padding: 0;
        }

        /* ===== BARRE SUPERIEURE ===== */
        .top-bar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e2e8f0;
            padding: 6px 0;
            font-size: 0.75rem;
            color: #6b7280;
        }

        .top-bar a {
            color: #6b7280;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .top-bar a:hover { color: #006d6d; }

        /* ===== NAVBAR ===== */
        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand img { height: 55px; }

        .navbar-icons a {
            color: #1a1a2e;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar-icons a:hover { color: #006d6d; }

        .btn-menu {
            background-color: #006d6d;
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-menu:hover { background-color: #004d4d; }

        /* ===== OFFCANVAS STYLE JO ===== */
        .offcanvas {
            background-color: #ffffff !important;
            width: 300px !important;
        }

        .offcanvas-header {
            border-bottom: 1px solid #e2e8f0 !important;
            padding: 20px !important;
        }

        .offcanvas-title {
            color: #1a1a2e !important;
            font-weight: 900 !important;
            font-size: 1.1rem !important;
        }

        .offcanvas-body { padding: 20px !important; }

        .menu-section { margin-bottom: 25px; }

        .menu-section-title {
            font-size: 1.1rem;
            font-weight: 900;
            color: #1a1a2e;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .menu-section-title:hover { color: #006d6d; }

        .menu-section ul {
            list-style: none;
            padding-left: 10px;
            margin: 0;
        }

        .menu-section ul li a {
            color: #6b7280 !important;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            display: block;
            padding: 5px 0;
            transition: color 0.3s;
        }

        .menu-section ul li a:hover { color: #006d6d !important; }

        /* ===== CONTENU ===== */
        .main-content {
            min-height: 100vh;
            background-color: #ffffff;
        }

        /* ===== TITRES ===== */
        h1 {
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #1a1a2e;
            border-left: 5px solid #006d6d;
            padding-left: 15px;
        }

        /* ===== CARDS ===== */
        .card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            color: #1a1a2e;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .card-header { border-radius: 12px 12px 0 0 !important; font-weight: 700; }
        .card-header.bg-primary { background: linear-gradient(135deg, #006d6d, #00a896) !important; color: white !important; border: none !important; }
        .card-header.bg-success { background: linear-gradient(135deg, #4ecb71, #00a896) !important; color: white !important; }
        .card-header.bg-dark { background: linear-gradient(135deg, #1a1a2e, #2d3748) !important; color: white !important; }

        /* ===== TABLEAUX ===== */
        .table { color: #1a1a2e !important; }
        .table-bordered, .table td, .table th { border-color: #e2e8f0 !important; }
        .table-dark { background: linear-gradient(135deg, #006d6d, #00a896) !important; color: white !important; }
        .table-primary { background: linear-gradient(135deg, #006d6d, #00a896) !important; color: white !important; }
        .table-primary th { color: white !important; }
        tbody tr:hover { background-color: #f0f9f9 !important; }

        /* ===== BOUTONS ===== */
        .btn-primary { background: linear-gradient(135deg, #006d6d, #00a896) !important; border: none !important; font-weight: 700; color: white !important; border-radius: 8px !important; }
        .btn-success { background: linear-gradient(135deg, #4ecb71, #00a896) !important; border: none !important; font-weight: 700; color: white !important; border-radius: 8px !important; }
        .btn-secondary { background: linear-gradient(135deg, #4a5568, #2d3748) !important; border: none !important; font-weight: 700; color: white !important; border-radius: 8px !important; }
        .btn-danger { background: linear-gradient(135deg, #e53e3e, #c53030) !important; border: none !important; border-radius: 8px !important; }
        .btn-warning { background: linear-gradient(135deg, #d69e2e, #b7791f) !important; border: none !important; border-radius: 8px !important; }

        /* ===== FORMULAIRES ===== */
        .form-control, .form-select { background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; color: #1a1a2e !important; border-radius: 8px; }
        .form-control:focus, .form-select:focus { border-color: #006d6d !important; box-shadow: 0 0 0 0.2rem rgba(0, 109, 109, 0.25) !important; }
        .form-label { color: #4a5568; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; }

        /* ===== ALERTS ===== */
        .alert-success { background-color: rgba(78, 203, 113, 0.1) !important; border: 1px solid #4ecb71 !important; color: #276749 !important; }
        .alert-info { background-color: rgba(0, 109, 109, 0.1) !important; border: 1px solid #006d6d !important; color: #006d6d !important; }
        .alert-danger { background-color: rgba(229, 62, 62, 0.1) !important; border: 1px solid #e53e3e !important; color: #c53030 !important; }

        /* ===== MODALS ===== */
        .modal-content { background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; color: #1a1a2e !important; }
        .modal-header { border-bottom: 1px solid #e2e8f0 !important; }

        /* ===== BADGE ===== */
        .badge { font-size: 0.8rem; padding: 6px 10px; border-radius: 6px; font-weight: 700; }

        /* ===== PANIER FLOTTANT ===== */
        .panier-flottant { position: fixed; bottom: 30px; right: 30px; z-index: 9999; text-decoration: none; }
        .panier-flottant .cercle {
            width: 65px; height: 65px;
            background: linear-gradient(135deg, #006d6d, #00a896);
            border-radius: 50%; display: flex;
            align-items: center; justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 4px 20px rgba(0, 109, 109, 0.4);
            transition: transform 0.3s;
        }
        .panier-flottant:hover .cercle { transform: scale(1.1); }

        /* ===== FOOTER ===== */
        footer {
            background: linear-gradient(135deg, #006d6d 0%, #004d4d 100%);
            padding: 40px 0 20px;
            color: #e2e8f0;
            margin-top: 60px;
        }
        footer h6 { color: #4ecb71; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 15px; }
        footer a { color: #e2e8f0 !important; font-size: 0.85rem; text-decoration: none; }
        footer a:hover { color: #4ecb71 !important; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.2); padding-top: 15px; margin-top: 20px; font-size: 0.8rem; color: rgba(255,255,255,0.5); }
    </style>
</head>
<body>

    <!-- Barre supérieure -->
    <div class="top-bar">
        <div class="container-fluid px-4">
            <div class="d-flex gap-4">
                <a href="#">CIO</a>
                <a href="#">Milano Cortina 2026</a>
                <a href="#">LA 2028</a>
                <a href="#">Brisbane 2032</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

            {{-- Logo --}}
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Milano Cortina 2026">
            </a>

            {{-- Icônes + Menu --}}
            <div class="navbar-icons d-flex align-items-center gap-3">

                {{-- Calendrier --}}
                <a href="/calendrier" title="Calendrier">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                    </svg>
                </a>

                {{-- Billetterie --}}
                <a href="/billetterie" title="Billetterie">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5m0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5M4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1"/>
                    </svg>
                </a>

                {{-- Organisateur --}}
                @auth
                    <a href="/organisateur" title="Espace Organisateur">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.029 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </a>
                @endauth
                @guest
                    <a href="/login" title="Connexion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.029 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </a>
                @endguest

                {{-- Bouton menu hamburger bleu --}}
                <button class="btn-menu" data-bs-toggle="offcanvas" data-bs-target="#menuOffcanvas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Menu Offcanvas style JO -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="menuOffcanvas">
        <div class="offcanvas-header">
            <img src="{{ asset('images/logo.png') }}" height="40" alt="Milano Cortina 2026">
            <button type="button" class="btn-menu" data-bs-dismiss="offcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
        </div>
        <div class="offcanvas-body">

            <div class="menu-section">
                <div class="menu-section-title">
                    <a href="/" style="text-decoration: none; color: inherit;">🏠 Accueil</a>
                </div>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">📅 Calendrier</div>
                <ul>
                    <li><a href="/calendrier">Toutes les compétitions</a></li>
                    <li><a href="/calendrier?sport_id=1">Hockey sur glace</a></li>
                    <li><a href="/calendrier?sport_id=2">Ski alpin</a></li>
                    <li><a href="/calendrier?sport_id=3">Patinage artistique</a></li>
                    <li><a href="/calendrier?sport_id=4">Biathlon</a></li>
                    <li><a href="/calendrier?sport_id=5">Curling</a></li>
                </ul>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">🎟️ Billetterie</div>
                <ul>
                    <li><a href="/billetterie">Toutes les compétitions</a></li>
                    <li><a href="/panier">Mon panier</a></li>
                </ul>
            </div>

            @auth
                <div class="menu-section">
                    <div class="menu-section-title">🏅 Espace Organisateur</div>
                    <ul>
                        <li><a href="/organisateur">Dashboard</a></li>
                        <li><a href="/organisateur/competitions">Ajouter une compétition</a></li>
                        <li><a href="/organisateur/competitions/liste">Gérer les compétitions</a></li>
                        <li><a href="/organisateur/reservations">Réservations</a></li>
                        <li><a href="/organisateur/stats">Statistiques</a></li>
                    </ul>
                </div>
                <div class="menu-section">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">🚪 Déconnexion</button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="menu-section">
                    <div class="menu-section-title">
                        <a href="/login" style="text-decoration: none; color: inherit;">🔐 Connexion Organisateur</a>
                    </div>
                </div>
            @endguest

        </div>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" height="70" alt="Milano Cortina 2026" class="mb-3" style="filter: brightness(0) invert(1);">
                    <ul class="list-unstyled">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/calendrier">Calendrier</a></li>
                        <li><a href="/billetterie">Billetterie</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>🏔️ Les sites</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Forum di Assago</a></li>
                        <li><a href="#">Piste Stelvio</a></li>
                        <li><a href="#">Palais des Sports</a></li>
                        <li><a href="#">Anneau Olympique</a></li>
                        <li><a href="#">Stade de Glace</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>🏅 Les sports</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Hockey sur glace</a></li>
                        <li><a href="#">Ski alpin</a></li>
                        <li><a href="#">Patinage artistique</a></li>
                        <li><a href="#">Biathlon</a></li>
                        <li><a href="#">Curling</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>📋 Informations</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">Conditions de vente</a></li>
                        <li><a href="/login">Espace Organisateur</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom text-center">
                © 2026 Milano Cortina - Tous droits réservés
            </div>
        </div>
    </footer>

    <!-- Panier flottant -->
    <a href="/panier" class="panier-flottant">
        <div class="cercle position-relative">
            🛒
            @if(session('panier') && count(session('panier')) > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ count(session('panier')) }}
                </span>
            @endif
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>