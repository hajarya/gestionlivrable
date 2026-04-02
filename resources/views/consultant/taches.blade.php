<x-app-layout>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --info: #3b82f6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #0f172a;
            --text: #1e293b;
            --muted: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --border: rgba(102, 126, 234, 0.14);
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --info-gradient: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            --shadow-sm: 0 12px 28px rgba(15, 23, 42, 0.05);
            --shadow-md: 0 20px 45px rgba(15, 23, 42, 0.08);
            --shadow-lg: 0 28px 60px rgba(102, 126, 234, 0.16);
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(102,126,234,0.10), transparent 22%),
                radial-gradient(circle at bottom right, rgba(118,75,162,0.08), transparent 24%),
                linear-gradient(135deg, #f8fafc 0%, #eef2f7 100%);
        }

        .tasks-page {
            padding: 2rem;
            max-width: 1450px;
            margin: 0 auto;
        }

        .hero {
            position: relative;
            overflow: hidden;
            background: var(--primary-gradient);
            border-radius: 34px;
            padding: 2.3rem 2.4rem;
            color: white;
            margin-bottom: 1.6rem;
            box-shadow: var(--shadow-lg);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -55px;
            right: -30px;
            width: 220px;
            height: 220px;
            background: rgba(255,255,255,0.12);
            border-radius: 50%;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -65px;
            left: -45px;
            width: 180px;
            height: 180px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .hero-text h1 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 0.45rem;
            letter-spacing: -0.7px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .hero-text h1 i {
            background: rgba(255,255,255,0.16);
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .hero-text p {
            font-size: 1rem;
            color: rgba(255,255,255,0.93);
            max-width: 760px;
            line-height: 1.6;
        }

        .hero-pill {
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(8px);
            border-radius: 18px;
            padding: 0.9rem 1.2rem;
            font-weight: 700;
            font-size: 0.92rem;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.55rem;
        }

        .toolbar {
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 1.4rem;
        }

        .search-box {
            flex: 1;
            min-width: 280px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 0.95rem 1rem 0.95rem 3rem;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            background: rgba(255,255,255,0.96);
            box-shadow: var(--shadow-sm);
            font-size: 0.92rem;
            transition: 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102,126,234,0.09);
        }

        .search-box .icon {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
        }

        .toolbar-badges {
            display: flex;
            gap: 0.7rem;
            flex-wrap: wrap;
        }

        .toolbar-badge {
            background: rgba(255,255,255,0.96);
            border: 1px solid #e2e8f0;
            color: #475569;
            padding: 0.72rem 1rem;
            border-radius: 16px;
            font-size: 0.84rem;
            font-weight: 700;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: rgba(255,255,255,0.97);
            border: 1px solid var(--border);
            border-radius: 26px;
            padding: 1.35rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            width: 115px;
            height: 115px;
            right: -28px;
            top: -28px;
            border-radius: 50%;
            opacity: 0.10;
        }

        .stat-card.total::before { background: #667eea; }
        .stat-card.progress::before { background: #3b82f6; }
        .stat-card.done::before { background: #10b981; }
        .stat-card.pending::before { background: #f59e0b; }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            box-shadow: 0 12px 24px rgba(15,23,42,0.10);
        }

        .icon-total { background: var(--primary-gradient); }
        .icon-progress { background: var(--info-gradient); }
        .icon-done { background: var(--success-gradient); }
        .icon-pending { background: var(--warning-gradient); }

        .stat-chip {
            padding: 0.34rem 0.72rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .chip-total { background: #eef2ff; color: #4f46e5; }
        .chip-progress { background: #dbeafe; color: #1d4ed8; }
        .chip-done { background: #d1fae5; color: #065f46; }
        .chip-pending { background: #fef3c7; color: #92400e; }

        .stat-number {
            font-size: 2.2rem;
            line-height: 1;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 0.35rem;
        }

        .stat-label {
            font-size: 0.95rem;
            color: var(--text);
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-desc {
            font-size: 0.82rem;
            color: var(--muted);
            line-height: 1.55;
        }

        .content-card {
            background: rgba(255,255,255,0.98);
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            padding: 1.4rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        }

        .content-header-left h2 {
            font-size: 1.16rem;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.55rem;
        }

        .content-header-left p {
            font-size: 0.88rem;
            color: var(--muted);
        }

        .count-badge {
            background: #eef2ff;
            color: #4f46e5;
            padding: 0.48rem 0.95rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
        }

        .modern-table thead {
            background: #f8fafc;
        }

        .modern-table th {
            text-align: left;
            padding: 1rem 1.2rem;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.55px;
            color: #64748b;
            font-weight: 900;
            border-bottom: 1px solid #e2e8f0;
        }

        .modern-table td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #edf2f7;
            color: var(--text);
            font-size: 0.93rem;
            vertical-align: middle;
        }

        .modern-table tbody tr {
            transition: all 0.25s ease;
        }

        .modern-table tbody tr:hover {
            background: #f8fbff;
        }

        .task-title-wrap {
            display: flex;
            flex-direction: column;
            gap: 0.22rem;
        }

        .task-title {
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .task-title i {
            color: #667eea;
        }

        .task-subtitle {
            font-size: 0.78rem;
            color: var(--muted);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.42rem 0.85rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 800;
            border: 1px solid transparent;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-not-started {
            background: #f1f5f9;
            color: #475569;
            border-color: #e2e8f0;
        }

        .status-not-started .status-dot {
            background: #64748b;
        }

        .status-in-progress {
            background: #dbeafe;
            color: #1d4ed8;
            border-color: #bfdbfe;
        }

        .status-in-progress .status-dot {
            background: #2563eb;
        }

        .status-completed {
            background: #d1fae5;
            color: #065f46;
            border-color: #a7f3d0;
        }

        .status-completed .status-dot {
            background: #059669;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            border-color: #fde68a;
        }

        .status-pending .status-dot {
            background: #d97706;
        }

        .status-default {
            background: #ede9fe;
            color: #6d28d9;
            border-color: #ddd6fe;
        }

        .status-default .status-dot {
            background: #7c3aed;
        }

        .date-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #475569;
            padding: 0.44rem 0.78rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .date-badge i {
            color: #667eea;
        }

        .empty-state {
            padding: 4rem 1.5rem;
            text-align: center;
        }

        .empty-icon {
            width: 86px;
            height: 86px;
            margin: 0 auto 1rem;
            border-radius: 26px;
            background: linear-gradient(135deg, #eef2ff, #e0e7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 2rem;
        }

        .empty-state h3 {
            color: var(--dark);
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
            font-weight: 900;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 0.95rem;
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.6;
        }

        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 900px) {
            .tasks-page {
                padding: 1rem;
            }

            .page-header-text h1 {
                font-size: 1.8rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @php
        $totalTaches = $taches->count();
        $tachesEnCours = $taches->filter(fn($t) => strtolower($t->status) === 'in progress')->count();
        $tachesTerminees = $taches->filter(fn($t) => strtolower($t->status) === 'completed')->count();
        $tachesEnAttente = $taches->filter(fn($t) => in_array(strtolower($t->status), ['pending', 'not started']))->count();
    @endphp

    <div class="tasks-page">
        <div class="hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>
                        <i class="fa-solid fa-list-check"></i>
                        Mes Tâches
                    </h1>
                    <p>Retrouvez une vue claire, moderne et détaillée de toutes vos tâches assignées, avec leur statut actuel et leur date de début.</p>
                </div>
                <div class="hero-pill">
                    <i class="fa-solid fa-layer-group"></i>
                    {{ $totalTaches }} tâche(s) au total
                </div>
            </div>
        </div>

        <div class="toolbar">
            <div class="search-box">
                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" placeholder="Rechercher une tâche...">
            </div>

            <div class="toolbar-badges">
                <span class="toolbar-badge">
                    <i class="fa-solid fa-user-tie" style="color:#667eea;"></i>
                    Vue consultant
                </span>
                <span class="toolbar-badge">
                    <i class="fa-solid fa-bolt" style="color:#f59e0b;"></i>
                    Suivi en temps réel
                </span>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card total">
                <div class="stat-top">
                    <div class="stat-icon icon-total">
                        <i class="fa-solid fa-list-ul"></i>
                    </div>
                    <span class="stat-chip chip-total">
                        <i class="fa-solid fa-chart-simple"></i>
                        Global
                    </span>
                </div>
                <div class="stat-number">{{ $totalTaches }}</div>
                <div class="stat-label">Total des tâches</div>
                <div class="stat-desc">Nombre total de tâches présentes dans votre espace de travail.</div>
            </div>

            <div class="stat-card progress">
                <div class="stat-top">
                    <div class="stat-icon icon-progress">
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                    <span class="stat-chip chip-progress">
                        <i class="fa-solid fa-play"></i>
                        Actif
                    </span>
                </div>
                <div class="stat-number">{{ $tachesEnCours }}</div>
                <div class="stat-label">En cours</div>
                <div class="stat-desc">Tâches qui sont actuellement en phase d’exécution.</div>
            </div>

            <div class="stat-card done">
                <div class="stat-top">
                    <div class="stat-icon icon-done">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <span class="stat-chip chip-done">
                        <i class="fa-solid fa-check"></i>
                        Validé
                    </span>
                </div>
                <div class="stat-number">{{ $tachesTerminees }}</div>
                <div class="stat-label">Terminées</div>
                <div class="stat-desc">Tâches clôturées avec succès et déjà finalisées.</div>
            </div>

            <div class="stat-card pending">
                <div class="stat-top">
                    <div class="stat-icon icon-pending">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <span class="stat-chip chip-pending">
                        <i class="fa-solid fa-clock"></i>
                        En attente
                    </span>
                </div>
                <div class="stat-number">{{ $tachesEnAttente }}</div>
                <div class="stat-label">À traiter</div>
                <div class="stat-desc">Tâches non démarrées ou encore en attente de traitement.</div>
            </div>
        </div>

        <div class="content-card">
            <div class="content-header">
                <div class="content-header-left">
                    <h2>
                        <i class="fa-solid fa-table-list" style="color:#667eea;"></i>
                        Liste détaillée des tâches
                    </h2>
                    <p>Consultez le titre, le statut et la date de début de chaque tâche.</p>
                </div>
                <span class="count-badge">
                    <i class="fa-solid fa-layer-group"></i>
                    {{ $totalTaches }} tâche(s)
                </span>
            </div>

            @if($taches->count() > 0)
                <div class="table-wrapper">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Statut</th>
                                <th>Date début</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($taches as $tache)
                                @php
                                    $status = strtolower($tache->status);
                                    $statusClass = match($status) {
                                        'not started' => 'status-not-started',
                                        'in progress' => 'status-in-progress',
                                        'completed' => 'status-completed',
                                        'pending' => 'status-pending',
                                        default => 'status-default',
                                    };
                                @endphp

                                <tr>
                                    <td>
                                        <div class="task-title-wrap">
                                            <span class="task-title">
                                                <i class="fa-solid fa-file-circle-check"></i>
                                                {{ $tache->titre }}
                                            </span>
                                            <span class="task-subtitle">Tâche assignée</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $statusClass }}">
                                            <span class="status-dot"></span>
                                            {{ $tache->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="date-badge">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ $tache->start_date ? \Carbon\Carbon::parse($tache->start_date)->format('d/m/Y') : 'Non définie' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                    <h3>Aucune tâche trouvée</h3>
                    <p>Vous n’avez pas encore de tâches assignées. Elles apparaîtront ici automatiquement dès qu’elles seront disponibles.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>