<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JO Hiver 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    :root {
        --jo-bleu: #0057A8;
        --jo-vert: #00A651;
        --jo-blanc: #FFFFFF;
        --jo-nuit: #1A1A2E;
    }

    body {
        background-color: #F0F4F8;
        font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
        background: linear-gradient(135deg, #0057A8, #1A1A2E) !important;
        border-bottom: 3px solid #00A651;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1px;
        color: white !important;
    }

    .card-header.bg-primary {
        background: linear-gradient(135deg, #0057A8, #1A1A2E) !important;
    }

    .btn-primary {
        background-color: #0057A8 !important;
        border-color: #0057A8 !important;
    }

    .btn-success {
        background-color: #00A651 !important;
        border-color: #00A651 !important;
    }

    .table-primary {
        background: linear-gradient(135deg, #0057A8, #1A1A2E) !important;
        color: white !important;
    }
</style>
</head>
<body>
    <!-- bar de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">❄️ JO Hiver 2026</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/calendrier">📅 Calendrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/billetterie">🎟️ Billetterie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/organisateur">🏅 Organisateur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Icône panier flottante -->
    <a href="/panier" class="position-fixed bottom-0 end-0 m-4" style="z-index: 9999; text-decoration: none;">
        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-lg"
            style="width: 60px; height: 60px; font-size: 1.5rem;">
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