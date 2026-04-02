<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionLivrable</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        :root {
            --primary: #6d5dfc;
            --primary-dark: #4c3ed9;
            --primary-light: #a79dff;
            --secondary: #efeaff;
            --secondary-soft: #f7f4ff;
            --cream: #fcfbff;
            --white: #ffffff;
            --text-dark: #221b44;
            --text-muted: #6f6891;
            --border: #e5defa;
            --shadow: 0 18px 45px rgba(109, 93, 252, 0.10);
            --shadow-soft: 0 10px 26px rgba(109,93,252,0.07);
            --gradient-main: linear-gradient(135deg, #6d5dfc 0%, #8a7cff 100%);
            --gradient-soft: linear-gradient(135deg, #f4f1ff 0%, #ece7ff 100%);
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            margin: 0;
            background: #ffffff;
            color: var(--text-dark);
        }

        .page-shell {
            width: 100%;
            min-height: 100vh;
            background: var(--cream);
            overflow: hidden;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 34px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(109,93,252,0.08);
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand {
            font-size: 1.7rem;
            font-weight: 900;
            color: var(--primary-dark);
            letter-spacing: -0.6px;
            text-decoration: none;
        }

        .brand span {
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 700;
            transition: 0.25s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-dark);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: var(--gradient-main);
            transition: 0.25s ease;
            border-radius: 999px;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            text-decoration: none;
            border: none;
            outline: none;
            cursor: pointer;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 800;
            font-size: 0.95rem;
            transition: 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-light {
            background: rgba(255,255,255,0.96);
            color: var(--primary-dark);
            border: 1px solid var(--border);
        }

        .btn-light:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-main {
            background: var(--gradient-main);
            color: white;
            box-shadow: 0 10px 24px rgba(109,93,252,0.22);
        }

        .btn-main:hover {
            transform: translateY(-2px);
        }

        .hero {
            position: relative;
            min-height: 560px;
            padding: 42px;
            display: flex;
            align-items: flex-end;
            background:
                linear-gradient(to right, rgba(34,27,68,0.70), rgba(34,27,68,0.22)),
                url('{{ asset('images/welcome-livrable.jpg') }}') center/cover no-repeat;
        }

        .hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(109,93,252,0.18), rgba(255,255,255,0.02));
            pointer-events: none;
        }

        /* Logo Segula en haut à droite */
        .hero-segula-logo {
            position: absolute;
            top: 25px;
            right: 35px;
            z-index: 3;
            padding: 0;
            background: transparent;
            border: none;
            box-shadow: none;
            backdrop-filter: none;
        }

        .hero-segula-logo img {
            width: 220px;
            height: auto;
            display: block;
            object-fit: contain;
        }

        .hero-content {
            max-width: 680px;
            color: white;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.22);
            color: white;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 800;
            margin-bottom: 18px;
            backdrop-filter: blur(6px);
        }

        .hero h1 {
            font-size: 4rem;
            line-height: 1.03;
            margin-bottom: 16px;
            font-weight: 900;
            letter-spacing: -1.5px;
        }

        .hero p {
            color: rgba(255,255,255,0.92);
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 24px;
            max-width: 590px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .search-card {
            width: calc(100% - 90px);
            margin: -30px auto 0;
            background: linear-gradient(135deg, #ece7ff 0%, #e2dbff 100%);
            border-radius: 999px;
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            position: relative;
            z-index: 5;
            box-shadow: 0 14px 26px rgba(109,93,252,0.10);
            border: 1px solid rgba(109,93,252,0.08);
        }

        .search-fields {
            display: grid;
            grid-template-columns: 1.2fr 1.2fr 0.7fr;
            gap: 12px;
            flex: 1;
        }

        .search-pill {
            background: rgba(255,255,255,0.96);
            border-radius: 999px;
            padding: 14px 18px;
            color: var(--text-muted);
            font-size: 0.92rem;
            font-weight: 700;
            border: 1px solid rgba(109,93,252,0.06);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-pill i {
            color: var(--primary);
        }

        .search-btn {
            min-width: 125px;
        }

        .content {
            padding: 38px;
        }

        .section-anchor {
            scroll-margin-top: 100px;
        }

        .intro-section {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 28px;
            align-items: center;
            margin-bottom: 42px;
        }

        .intro-image {
            background: white;
            border-radius: 24px;
            padding: 12px;
            box-shadow: var(--shadow);
            border: 1px solid #efe9ff;
        }

        .intro-image img {
            width: 100%;
            height: 245px;
            object-fit: cover;
            border-radius: 18px;
            display: block;
        }

        .intro-text h2 {
            font-size: 2.3rem;
            color: var(--primary-dark);
            margin-bottom: 12px;
            font-weight: 900;
            letter-spacing: -0.8px;
        }

        .intro-text p {
            color: var(--text-muted);
            line-height: 1.85;
            margin-bottom: 18px;
            max-width: 760px;
            font-size: 0.98rem;
        }

        .mini-stats {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .mini-stat {
            background: white;
            border: 1px solid #eee8ff;
            border-radius: 18px;
            padding: 15px 18px;
            min-width: 165px;
            box-shadow: 0 8px 20px rgba(109,93,252,0.05);
        }

        .mini-stat .top {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            color: var(--primary);
            font-size: 0.9rem;
        }

        .mini-stat .value {
            font-size: 1.45rem;
            font-weight: 900;
            color: var(--primary-dark);
        }

        .mini-stat .label {
            font-size: 0.84rem;
            color: var(--text-muted);
            margin-top: 4px;
            font-weight: 700;
        }

        .section-title {
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--primary-dark);
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 22px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .feature-card {
            background: white;
            border-radius: 24px;
            padding: 14px;
            border: 1px solid #eee8ff;
            box-shadow: var(--shadow-soft);
            transition: 0.35s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 34px rgba(109,93,252,0.11);
        }

        .feature-card img {
            width: 100%;
            height: 205px;
            border-radius: 18px;
            object-fit: cover;
            margin-bottom: 14px;
            display: block;
        }

        .feature-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f2eeff;
            color: var(--primary);
            font-size: 0.74rem;
            font-weight: 800;
            padding: 7px 12px;
            border-radius: 999px;
            margin-bottom: 10px;
        }

        .feature-card h3 {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.65;
            margin-bottom: 16px;
            min-height: 72px;
        }

        .feature-card .btn {
            width: fit-content;
            padding: 10px 16px;
            font-size: 0.85rem;
        }

        .roles-section {
            margin-top: 42px;
        }

        .roles-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .role-card {
            background: linear-gradient(135deg, #ffffff 0%, #f9f7ff 100%);
            border: 1px solid #ece6ff;
            border-radius: 22px;
            padding: 22px 18px;
            box-shadow: 0 8px 22px rgba(109,93,252,0.04);
            transition: 0.3s ease;
        }

        .role-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(109,93,252,0.10);
        }

        .role-icon {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: var(--gradient-main);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 14px;
            box-shadow: 0 10px 20px rgba(109,93,252,0.18);
        }

        .role-card h4 {
            font-size: 1rem;
            font-weight: 900;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .role-card p {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.65;
        }

        .about-box {
            margin-top: 42px;
            background: linear-gradient(135deg, #f4f1ff 0%, #e9e2ff 100%);
            border-radius: 28px;
            padding: 30px;
            border: 1px solid #e5defa;
        }

        .about-box h3 {
            font-size: 1.75rem;
            color: var(--primary-dark);
            font-weight: 900;
            margin-bottom: 10px;
            letter-spacing: -0.6px;
        }

        .about-box p {
            color: var(--text-muted);
            line-height: 1.85;
            max-width: 900px;
        }

        .cta-box {
            margin-top: 38px;
            background: linear-gradient(135deg, #f4f1ff 0%, #e9e2ff 100%);
            border-radius: 28px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            border: 1px solid #e5defa;
        }

        .cta-box h3 {
            font-size: 1.75rem;
            color: var(--primary-dark);
            font-weight: 900;
            margin-bottom: 8px;
            letter-spacing: -0.6px;
        }

        .cta-box p {
            color: var(--text-muted);
            line-height: 1.8;
            max-width: 700px;
        }

        .cta-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .footer {
            margin-top: 30px;
            padding: 24px 38px 34px;
            color: var(--text-muted);
            font-size: 0.9rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-left {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .footer-left i {
            color: var(--primary);
        }

        @media (max-width: 1150px) {
            .features-grid {
                grid-template-columns: 1fr 1fr;
            }

            .roles-grid {
                grid-template-columns: 1fr 1fr;
            }

            .intro-section {
                grid-template-columns: 1fr;
            }

            .search-fields {
                grid-template-columns: 1fr;
            }

            .search-card {
                border-radius: 30px;
                align-items: stretch;
                flex-direction: column;
            }
        }

        @media (max-width: 780px) {
            .topbar {
                flex-wrap: wrap;
                gap: 16px;
                padding: 16px 18px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                min-height: 430px;
                padding: 24px;
            }

            .hero h1 {
                font-size: 2.35rem;
            }

            .hero-segula-logo {
                top: 18px;
                right: 18px;
                left: auto;
                padding: 0;
            }

            .hero-segula-logo img {
                width: 140px;
            }

            .content {
                padding: 22px;
            }

            .features-grid,
            .roles-grid {
                grid-template-columns: 1fr;
            }

            .cta-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-card {
                width: calc(100% - 28px);
            }

            .footer {
                padding: 20px 22px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">

        <header class="topbar">
            <div class="brand-wrap">
                <a href="#accueil" class="brand">Gestion<span>Livrable</span></a>
            </div>

            <nav class="nav-links">
                <a href="#accueil"><i class="fa-solid fa-house"></i> Accueil</a>
                <a href="#fonctionnalites"><i class="fa-solid fa-grid-2"></i> Fonctionnalités</a>
                <a href="#espaces"><i class="fa-solid fa-users"></i> Espaces</a>
                <a href="#apropos"><i class="fa-solid fa-circle-info"></i> À propos</a>
            </nav>

            <div class="top-actions">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-light">
                            <i class="fa-solid fa-chart-line"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light">
                            <i class="fa-solid fa-right-to-bracket"></i> Connexion
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-main">
                                <i class="fa-solid fa-user-plus"></i> S'inscrire
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

        <section class="hero section-anchor" id="accueil">
            <div class="hero-segula-logo">
                <img src="{{ asset('images/logo-segula.png') }}"
                     alt="Segula"
                     onerror="this.style.display='none'">
            </div>

            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fa-solid fa-layer-group"></i>
                    Plateforme collaborative • Livrables & Requis
                </div>

                <h1>Gérez vos livrables et suivez vos requis facilement</h1>

                <p>
                    Centralisez les projets, répartissez les tâches, suivez l’avancement
                    des livrables et facilitez la collaboration entre administrateurs,
                    responsables, managers et consultants.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="btn btn-main">
                        <i class="fa-solid fa-rocket"></i> Commencer
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-light">
                            <i class="fa-solid fa-user-plus"></i> Créer un compte
                        </a>
                    @endif
                </div>
            </div>
        </section>

        <div class="search-card">
            <div class="search-fields">
                <div class="search-pill">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Rechercher un livrable
                </div>
                <div class="search-pill">
                    <i class="fa-solid fa-folder-open"></i>
                    Consulter un projet
                </div>
                <div class="search-pill">
                    <i class="fa-solid fa-list-check"></i>
                    Suivi des tâches
                </div>
            </div>

            <a href="{{ route('login') }}" class="btn btn-main search-btn">
                <i class="fa-solid fa-arrow-right"></i> Explorer
            </a>
        </div>

        <main class="content">
            <section class="intro-section">
                <div class="intro-image">
                    <img src="{{ asset('images/welcome-card-1.jpg') }}"
                         alt="Gestion livrables"
                         onerror="this.src='https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80'">
                </div>

                <div class="intro-text">
                    <h2>Bienvenue sur votre plateforme professionnelle</h2>
                    <p>
                        GestionLivrable vous permet d’organiser les livrables, piloter les tâches,
                        suivre les échéances et améliorer la visibilité sur l’avancement des projets.
                        Chaque acteur dispose d’un espace dédié pour travailler efficacement dans
                        un environnement clair, structuré et moderne.
                    </p>

                    <a href="{{ route('login') }}" class="btn btn-main">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Accéder à la plateforme
                    </a>

                    <div class="mini-stats">
                        <div class="mini-stat">
                            <div class="top"><i class="fa-solid fa-user-shield"></i> Rôles</div>
                            <div class="value">4</div>
                            <div class="label">Espaces utilisateurs</div>
                        </div>

                        <div class="mini-stat">
                            <div class="top"><i class="fa-solid fa-chart-pie"></i> Suivi</div>
                            <div class="value">100%</div>
                            <div class="label">Suivi centralisé</div>
                        </div>

                        <div class="mini-stat">
                            <div class="top"><i class="fa-solid fa-clock"></i> Disponibilité</div>
                            <div class="value">24/7</div>
                            <div class="label">Accès en ligne</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-anchor" id="fonctionnalites">
                <div class="section-title">Fonctionnalités principales</div>
                <div class="section-subtitle">
                    Une interface moderne pour gérer les livrables, les tâches et la progression des projets.
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <img src="{{ asset('images/feature-projects.jpg') }}"
                             alt="Gestion des projets"
                             onerror="this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80'">

                        <div class="feature-tag">
                            <i class="fa-solid fa-folder-tree"></i> Pilotage
                        </div>

                        <h3>Gestion des projets</h3>
                        <p>
                            Organisez les livrables par projet, consultez les informations clés
                            et gardez une vision claire sur l’ensemble des activités en cours.
                        </p>

                        <a href="{{ route('login') }}" class="btn btn-light">
                            <i class="fa-solid fa-arrow-right"></i> Voir plus
                        </a>
                    </div>

                    <div class="feature-card">
                        <img src="{{ asset('images/feature-tasks.jpg') }}"
                             alt="Suivi des tâches"
                             onerror="this.src='https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80'">

                        <div class="feature-tag">
                            <i class="fa-solid fa-list-check"></i> Organisation
                        </div>

                        <h3>Suivi des tâches</h3>
                        <p>
                            Répartissez les tâches, attribuez les responsabilités et suivez facilement
                            l’état d’avancement de chaque action de manière centralisée.
                        </p>

                        <a href="{{ route('login') }}" class="btn btn-light">
                            <i class="fa-solid fa-arrow-right"></i> Découvrir
                        </a>
                    </div>

                    <div class="feature-card">
                        <img src="{{ asset('images/feature-stats.jpg') }}"
                             alt="Statistiques"
                             onerror="this.src='https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80'">

                        <div class="feature-tag">
                            <i class="fa-solid fa-chart-column"></i> Analyse
                        </div>

                        <h3>Statistiques & visibilité</h3>
                        <p>
                            Analysez les statuts, visualisez l’évolution des livrables et prenez de
                            meilleures décisions grâce aux indicateurs clés.
                        </p>

                        <a href="{{ route('login') }}" class="btn btn-light">
                            <i class="fa-solid fa-arrow-right"></i> Explorer
                        </a>
                    </div>
                </div>
            </section>

            <section class="roles-section section-anchor" id="espaces">
                <div class="section-title">Des espaces adaptés à chaque rôle</div>
                <div class="section-subtitle">
                    Chaque utilisateur accède à des fonctionnalités spécifiques selon son rôle dans le projet.
                </div>

                <div class="roles-grid">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h4>Administrateur</h4>
                        <p>Gère les utilisateurs, structure la plateforme et supervise l’organisation globale.</p>
                    </div>

                    <div class="role-card">
                        <div class="role-icon">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                        <h4>Responsable</h4>
                        <p>Crée les livrables, assigne les consultants et pilote l’avancement des activités.</p>
                    </div>

                    <div class="role-card">
                        <div class="role-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h4>Manager</h4>
                        <p>Suit les statistiques, contrôle la progression globale et visualise les performances.</p>
                    </div>

                    <div class="role-card">
                        <div class="role-icon">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                        <h4>Consultant</h4>
                        <p>Consulte ses tâches, met à jour les statuts et collabore sur les livrables assignés.</p>
                    </div>
                </div>
            </section>

            <section class="about-box section-anchor" id="apropos">
                <h3>À propos de la plateforme</h3>
                <p>
                    Cette plateforme a été conçue pour centraliser le management des livrables et des requis
                    dans un environnement professionnel. Elle améliore la coordination entre les différents
                    intervenants, facilite le suivi opérationnel et offre une meilleure visibilité sur
                    l’avancement des projets.
                </p>
            </section>

            <section class="cta-box">
                <div>
                    <h3>Prêt à démarrer ?</h3>
                    <p>
                        Connectez-vous à votre espace pour gérer les livrables, suivre les tâches
                        et collaborer efficacement avec toute l’équipe projet.
                    </p>
                </div>

                <div class="cta-actions">
                    <a href="{{ route('login') }}" class="btn btn-light">
                        <i class="fa-solid fa-right-to-bracket"></i> Connexion
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-main">
                            <i class="fa-solid fa-user-plus"></i> Créer un compte
                        </a>
                    @endif
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="footer-left">
                <i class="fa-solid fa-circle-check"></i>
                <span>GestionLivrable • Plateforme de gestion des livrables</span>
            </div>

            <div>
                © {{ date('Y') }} Segula Technologies
            </div>
        </footer>
    </div>
</body>
</html>