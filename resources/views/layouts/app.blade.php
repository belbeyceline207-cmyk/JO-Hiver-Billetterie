<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JO Hiver 2026 - Milano Cortina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #0a0e1a;
            color: #ffffff;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: linear-gradient(135deg, #0a0e1a 0%, #1a2744 100%) !important;
            border-bottom: 3px solid #00A651;
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 900;
            font-size: 1.4rem;
            letter-spacing: 2px;
            color: #ffffff !important;
            text-transform: uppercase;
        }

        .navbar-brand span {
            color: #00A651;
        }

        .nav-link {
            color: #ffffff !important;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.85rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #00A651 !important;
        }

        /* ===== CONTENU PRINCIPAL ===== */
        .main-container {
            background-color: #0f1525;
            min-height: 100vh;
            padding: 40px 0;
        }

        /* ===== TITRES ===== */
        h1 {
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #ffffff;
            border-left: 5px solid #00A651;
            padding-left: 15px;
        }

        /* ===== CARDS ===== */
        .card {
            background-color: #1a2744;
            border: 1px solid #2a3754;
            border-radius: 12px;
            color: #ffffff;
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .card-header.bg-primary {
            background: linear-gradient(135deg, #0057A8, #1a2744) !important;
            border-bottom: 2px solid #00A651 !important;
        }

        .card-header.bg-success {
            background: linear-gradient(135deg, #00A651, #1a2744) !important;
        }

        .card-header.bg-dark {
            background: linear-gradient(135deg, #1a2744, #0a0e1a) !important;
            border-bottom: 2px solid #0057A8 !important;
        }

        /* ===== TABLEAUX ===== */
        .table {
            color: #ffffff !important;
        }

        .table-bordered {
            border-color: #2a3754 !important;
        }

        .table td, .table th {
            border-color: #2a3754 !important;
        }

        .table-dark {
            background: linear-gradient(135deg, #0057A8, #1a2744) !important;
        }

        .table-primary {
            background: linear-gradient(135deg, #0057A8, #1a2744) !important;
            color: white !important;
        }

        .table-primary th {
            color: white !important;
        }

        tbody tr:hover {
            background-color: #2a3754 !important;
        }

        /* ===== BOUTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, #0057A8, #003d7a) !important;
            border: none !important;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .btn-success {
            background: linear-gradient(135deg, #00A651, #007a3d) !important;
            border: none !important;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #4a5568, #2d3748) !important;
            border: none !important;
            font-weight: 700;
        }

        .btn-danger {
            background: linear-gradient(135deg, #e53e3e, #c53030) !important;
            border: none !important;
        }

        .btn-warning {
            background: linear-gradient(135deg, #d69e2e, #b7791f) !important;
            border: none !important;
        }

        /* ===== FORMULAIRES ===== */
        .form-control, .form-select {
            background-color: #0f1525 !important;
            border: 1px solid #2a3754 !important;
            color: #ffffff !important;
            border-radius: 8px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #00A651 !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 166, 81, 0.25) !important;
        }

        .form-control::placeholder {
            color: #6b7280 !important;
        }

        .form-label {
            color: #a0aec0;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ===== ALERTS ===== */
        .alert-success {
            background-color: rgba(0, 166, 81, 0.2) !important;
            border: 1px solid #00A651 !important;
            color: #00A651 !important;
            font-weight: 600;
        }

        .alert-info {
            background-color: rgba(0, 87, 168, 0.2) !important;
            border: 1px solid #0057A8 !important;
            color: #63b3ed !important;
        }

        .alert-danger {
            background-color: rgba(229, 62, 62, 0.2) !important;
            border: 1px solid #e53e3e !important;
            color: #fc8181 !important;
        }

        /* ===== MODALS ===== */
        .modal-content {
            background-color: #1a2744 !important;
            border: 1px solid #2a3754 !important;
            color: #ffffff !important;
        }

        .modal-header {
            border-bottom: 1px solid #2a3754 !important;
        }

        .btn-close {
            filter: invert(1);
        }

        /* ===== BADGE ===== */
        .badge {
            font-size: 0.8rem;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* ===== PANIER FLOTTANT ===== */
        .panier-flottant {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            text-decoration: none;
        }

        .panier-flottant .cercle {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, #00A651, #007a3d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 4px 20px rgba(0, 166, 81, 0.5);
            transition: transform 0.3s;
        }

        .panier-flottant:hover .cercle {
            transform: scale(1.1);
        }

        /* ===== HERO BANNER ===== */
        .hero-banner {
            background: linear-gradient(135deg, #0a0e1a 0%, #1a2744 50%, #0a0e1a 100%);
            border-bottom: 3px solid #00A651;
            padding: 20px 0;
            text-align: center;
            font-size: 0.8rem;
            color: #a0aec0;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                ❄️ Milano Cortina <span>2026</span>
            </a>
        </div>
    </nav>

    <!-- Bannière -->
    <div class="hero-banner">
        🏔️ Jeux Olympiques d'Hiver &nbsp;|&nbsp; 6 - 22 Février 2026 &nbsp;|&nbsp; Milano Cortina ❄️
    </div>

    <!-- Bouton menu -->
    <div class="container mt-3">
        <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
            ☰ Menu
        </button>
    </div>

    <!-- Menu latéral dépliable -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateral"
         style="background-color: #1a2744; color: white; width: 280px;">
        <div class="offcanvas-header" style="border-bottom: 2px solid #00A651;">
            <h5 class="offcanvas-title fw-bold" style="letter-spacing: 2px;">❄️ NAVIGATION</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-grid gap-3 mt-3">
                <a href="/" class="btn btn-secondary py-3">🏠 Accueil</a>
                <a href="/calendrier" class="btn btn-primary py-3">📅 Calendrier</a>
                <a href="/billetterie" class="btn btn-success py-3">🎟️ Billetterie</a>
                @auth
                    <a href="/organisateur" class="btn btn-secondary py-3">🏅 Espace Organisateur</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 py-3">🚪 Déconnexion</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-secondary py-3">🔐 Connexion Organisateur</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Contenu -->
    <div class="main-container">
        <div class="container">
            @yield('content')
        </div>
    </div>

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