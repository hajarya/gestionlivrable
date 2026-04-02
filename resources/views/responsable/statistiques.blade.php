<x-app-layout>
    <!-- Inclusion de Chart.js pour les graphiques -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --primary-light: #667eea15;
            --primary-dark: #5a67d8;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
            --shadow-hover: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
            --border-radius-sm: 12px;
            --border-radius-md: 16px;
            --border-radius-lg: 24px;
            --border-radius-xl: 32px;
        }

        body {
            background: #f1f5f9;
        }

        .gradient-bg {
            background: var(--primary-gradient);
        }
        
        .hover-gradient {
            transition: all 0.3s ease;
        }
        
        .hover-gradient:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .sidebar-item {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 14px;
            margin-bottom: 6px;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: var(--primary-gradient);
            opacity: 0.1;
            transition: width 0.3s ease;
            z-index: -1;
        }
        
        .sidebar-item:hover::before {
            width: 100%;
        }
        
        .sidebar-item:hover {
            transform: translateX(8px);
        }
        
        .sidebar-item.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        /* Sidebar fixe */
        .sidebar-fixed {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 50;
            width: 18rem;
            background: white;
            box-shadow: var(--shadow-lg);
        }

        .sidebar-content {
            padding-bottom: 80px;
            min-height: 100%;
            position: relative;
        }

        /* Scrollbar */
        .sidebar-fixed::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-fixed::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar-fixed::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 3px;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }

        /* Cartes statistiques */
        .stat-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: white;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s;
            opacity: 0;
        }

        .stat-card:hover::after {
            opacity: 1;
            transform: rotate(45deg) translate(10%, 10%);
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 30px 40px -15px rgba(102, 126, 234, 0.4);
            border-color: var(--primary);
        }

        .stat-card.purple { border-left: 5px solid #667eea; }
        .stat-card.blue { border-left: 5px solid #4299e1; }
        .stat-card.green { border-left: 5px solid #48bb78; }
        .stat-card.red { border-left: 5px solid #ef4444; }
        .stat-card.orange { border-left: 5px solid #f59e0b; }

        /* Progress bar */
        .progress-bar {
            transition: width 1.2s cubic-bezier(0.22, 1, 0.36, 1);
            height: 8px;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Badges */
        .badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .badge-success {
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
            color: #22543d;
        }

        .badge-warning {
            background: linear-gradient(135deg, #feebc8 0%, #fbd38d 100%);
            color: #744210;
        }

        .badge-info {
            background: linear-gradient(135deg, #bee3f8 0%, #90cdf4 100%);
            color: #1e4a6b;
        }

        /* Conteneurs de graphiques */
        .chart-container {
            background: white;
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 15px 35px -15px rgba(0,0,0,0.15);
            border: 1px solid rgba(102, 126, 234, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #9f7aea, #667eea);
            background-size: 300% 300%;
            animation: gradientShift 6s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Sélecteur de période */
        .period-selector {
            display: inline-flex;
            background: #f3f4f6;
            border-radius: 40px;
            padding: 4px;
        }
        
        .period-btn {
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .period-btn.active {
            background: white;
            color: #667eea;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        /* Badges de statut */
        .status-badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .status-badge.not-start { background: #e5e7eb; color: #374151; }
        .status-badge.in-progress { background: #dbeafe; color: #1e40af; }
        .status-badge.fq-review { background: #ede9fe; color: #5b21b6; }
        .status-badge.completed { background: #d1fae5; color: #065f46; }
        .status-badge.standby { background: #fef3c7; color: #92400e; }
        .status-badge.cancelled { background: #fee2e2; color: #991b1b; }

        /* Profil */
        .profile-card {
            background: linear-gradient(135deg, #f9fafc 0%, #f3f4f8 100%);
            border-radius: 24px;
            padding: 24px;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .avatar {
            width: 70px;
            height: 70px;
            border-radius: 22px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 15px 25px -8px rgba(102, 126, 234, 0.4);
            border: 3px solid white;
        }

        /* Alstom logo */
        .alstom-container {
            background: white;
            border-radius: 18px;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px -8px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .alstom-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 30px -10px rgba(0,0,0,0.15);
            border-color: var(--primary);
        }

        .logo-alstom {
            width: auto;
            height: 45px;
            max-width: 130px;
            object-fit: contain;
        }

        /* Logo banner */
        .logo-banner-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 40px;
            padding: 10px 35px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px -5px rgba(0,0,0,0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .logo-banner-container:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px -8px rgba(102, 126, 234, 0.4);
            border-color: var(--primary);
        }

        .header-logo {
            width: auto;
            height: 50px;
            max-width: 180px;
            object-fit: contain;
        }

        /* User container */
        .user-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-name {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 20px;
            border-radius: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 45px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            border: 2px solid white;
        }

        /* Tooltip personnalisé */
        [data-tooltip] {
            position: relative;
            cursor: help;
        }
        
        [data-tooltip]:before {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 4px 8px;
            background: #1e293b;
            color: white;
            font-size: 0.75rem;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s ease;
            z-index: 10;
            margin-bottom: 5px;
        }
        
        [data-tooltip]:hover:before {
            opacity: 1;
            visibility: visible;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex">
        <!-- Sidebar - Menu Latéral -->
        <aside class="bg-white/90 backdrop-blur-lg shadow-2xl sidebar-fixed">
            <div class="sidebar-content">
                <!-- En-tête avec titre seulement -->
                <div class="gradient-bg p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-5 rounded-full -ml-10 -mb-10"></div>
                    <div class="relative z-10">
                        <h1 class="text-2xl font-bold text-white tracking-tight">GestionLivrable</h1>
                        <p class="text-sm text-purple-200 font-medium mt-2">Espace Responsable</p>
                    </div>
                </div>

                <!-- Profil Utilisateur - Version avec logo ALSTOM bien visible -->
                <div class="p-6">
                    <div class="profile-card">
                        <!-- Avatar et nom en haut -->
                        <div class="flex items-center space-x-4">
                            <div class="avatar">
                                {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-xl">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                <p class="text-sm text-gray-500">Responsable Projet</p>
                            </div>
                        </div>
                        
                        <!-- Logo ALSTOM bien visible en dessous -->
                        <div class="mt-5 flex flex-col items-center">
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Partenaire officiel</span>
                            <div class="alstom-container w-full justify-center py-4">
                                <img src="{{ asset('images/logo-alstom.png') }}" 
                                     alt="Alstom" 
                                     class="logo-alstom h-12 w-auto"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/150x50/667eea/ffffff?text=ALSTOM'">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Principal amélioré -->
                <div class="px-4">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 px-3">MENU PRINCIPAL</p>
                    
                    <!-- Dashboard -->
                    <a href="{{ route('responsable.dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Dashboard</span>
                    </a>

                    <!-- Mes Livrables -->
                    <a href="{{ route('responsable.livrables') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Mes Livrables</span>
                        <span class="ml-auto bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs px-3 py-1.5 rounded-full font-semibold shadow-md">{{ $totalLivrables }}</span>
                    </a>

                    <!-- Créer Livrable -->
                    <a href="{{ route('responsable.livrables.create') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Créer un Livrable</span>
                    </a>

                    

                    <!-- Statistiques (actif) -->
                    <a href="{{ route('responsable.statistiques') }}" class="sidebar-item active flex items-center space-x-3 p-3 mb-1 group">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Statistiques</span>
                    </a>
                </div>

                <!-- Footer Sidebar avec déconnexion -->
                <div class="absolute bottom-0 w-72 p-4 border-t border-gray-200 bg-white/90 backdrop-blur-lg">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-700 group w-full text-left">
                            <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                                <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-base">Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72">
            <!-- Header amélioré -->
            <header class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-10">
                <div class="px-8 py-4 flex justify-between items-center">
                    <!-- Breadcrumb -->
                    <div class="flex items-center space-x-3 text-sm">
                        <a href="{{ route('responsable.dashboard') }}" class="text-gray-600 hover:text-purple-600 transition font-medium">Dashboard</a>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-purple-600 font-semibold bg-purple-50 px-3 py-1 rounded-full">
                            <i class="fas fa-chart-pie mr-1"></i> Statistiques
                        </span>
                    </div>

                    <!-- Logo SEGULA -->
                    <div class="logo-banner-container">
                        <img src="{{ asset('images/logo-segula.png') }}" 
                             alt="Segula" 
                             class="header-logo"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/180x50/667eea/ffffff?text=SEGULA'">
                    </div>

                    <!-- Nom utilisateur -->
                    <div class="user-container">
                        <span class="user-name"><i class="fas fa-user-circle mr-2"></i>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenu de la page Statistiques -->
            <div class="p-8">
                @php
                    // Configuration dynamique des statuts avec leurs couleurs et icônes
                    $statusConfig = [
                        'Not start' => ['color' => '#9ca3af', 'bg' => '#e5e7eb', 'icon' => 'fa-circle', 'label' => 'Non démarré'],
                        'In progress' => ['color' => '#3b82f6', 'bg' => '#dbeafe', 'icon' => 'fa-spinner fa-spin', 'label' => 'En cours'],
                        'FQ review' => ['color' => '#8b5cf6', 'bg' => '#ede9fe', 'icon' => 'fa-clipboard-check', 'label' => 'En révision'],
                        'Completed' => ['color' => '#10b981', 'bg' => '#d1fae5', 'icon' => 'fa-check-circle', 'label' => 'Terminé'],
                        'Standby' => ['color' => '#f59e0b', 'bg' => '#fef3c7', 'icon' => 'fa-pause-circle', 'label' => 'En pause'],
                        'Cancelled' => ['color' => '#ef4444', 'bg' => '#fee2e2', 'icon' => 'fa-times-circle', 'label' => 'Annulé']
                    ];
                    
                    // Compter les livrables par statut de façon dynamique
                    $statusCounts = [];
                    $totalLivrables = $livrables->count();
                    
                    foreach ($statusConfig as $status => $config) {
                        $count = $livrables->where('status', $status)->count();
                        $statusCounts[$status] = [
                            'count' => $count,
                            'color' => $config['color'],
                            'bg' => $config['bg'],
                            'icon' => $config['icon'],
                            'label' => $config['label'],
                            'percentage' => $totalLivrables > 0 ? round(($count / $totalLivrables) * 100, 1) : 0
                        ];
                    }
                    
                    // Calculer les livrables ouverts/fermés
                    $completed = $statusCounts['Completed']['count'];
                    $cancelled = $statusCounts['Cancelled']['count'];
                    $openLivrables = $totalLivrables - ($completed + $cancelled);
                    $closedLivrables = $completed + $cancelled;
                    
                    // Données pour le graphique annuel (12 derniers mois)
                    $months = [];
                    $openData = [];
                    $closedData = [];
                    
                    for ($i = 11; $i >= 0; $i--) {
                        $month = now()->subMonths($i);
                        $monthName = $month->format('M Y');
                        $months[] = $monthName;
                        
                        // Filtrer les livrables créés ce mois-ci
                        $monthLivrables = $livrables->filter(function($l) use ($month) {
                            return $l->created_at->format('Y-m') == $month->format('Y-m');
                        });
                        
                        // Compter les ouverts et fermés pour ce mois
                        $monthOpen = $monthLivrables->filter(function($l) {
                            return !in_array($l->status, ['Completed', 'Cancelled']);
                        })->count();
                        
                        $monthClosed = $monthLivrables->filter(function($l) {
                            return in_array($l->status, ['Completed', 'Cancelled']);
                        })->count();
                        
                        $openData[] = $monthOpen;
                        $closedData[] = $monthClosed;
                    }
                    
                    // Statistiques avancées
                    $tauxCompletion = $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100, 1) : 0;
                    $tauxAnnulation = $totalLivrables > 0 ? round(($cancelled / $totalLivrables) * 100, 1) : 0;
                    
                    // Période de plus forte activité
                    $maxActivityMonth = !empty($openData) ? array_search(max($openData), $openData) : false;
                    $maxActivityMonthName = ($maxActivityMonth !== false && isset($months[$maxActivityMonth])) ? $months[$maxActivityMonth] : 'N/A';
                    
                    // Moyenne mensuelle
                    $averageMonthly = $totalLivrables > 0 ? round($totalLivrables / 12, 1) : 0;
                    
                    // Tendances (comparaison avec le mois précédent)
                    $currentMonth = now()->format('Y-m');
                    $lastMonth = now()->subMonth()->format('Y-m');
                    
                    $currentMonthCount = $livrables->filter(function($l) use ($currentMonth) {
                        return $l->created_at->format('Y-m') == $currentMonth;
                    })->count();
                    
                    $lastMonthCount = $livrables->filter(function($l) use ($lastMonth) {
                        return $l->created_at->format('Y-m') == $lastMonth;
                    })->count();
                    
                    $evolution = $lastMonthCount > 0 ? round((($currentMonthCount - $lastMonthCount) / $lastMonthCount) * 100, 1) : 0;
                    $tendanceTotal = ($evolution > 0 ? '+' : '') . $evolution . '%';
                @endphp

                <!-- En-tête décoratif -->
                <div class="gradient-bg rounded-3xl p-8 text-white fade-in relative overflow-hidden mb-8">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-5 rounded-full -ml-20 -mb-20"></div>
                    
                    <div class="relative z-10">
                        <h1 class="text-4xl font-bold mb-2 flex items-center">
                            <i class="fas fa-chart-pie mr-4 text-3xl"></i>
                            Tableau de bord statistique
                        </h1>
                        <p class="text-purple-100 text-lg flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Analyse complète de vos livrables
                        </p>
                        <div class="mt-4 flex items-center space-x-4">
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl flex items-center gap-2">
                                <i class="fas fa-database"></i>
                                {{ $totalLivrables }} livrables au total
                            </span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl flex items-center gap-2">
                                <i class="fas fa-calendar"></i>
                                Mis à jour {{ now()->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Cartes de statistiques rapides -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="stat-card purple fade-in" style="animation-delay: 0.1s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total livrables</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $totalLivrables }}</h3>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-600">
                                <i class="fas fa-folder-open text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <span class="text-green-500 font-medium">{{ $tendanceTotal }}</span>
                            <span class="text-gray-400 ml-2">vs mois dernier</span>
                        </div>
                    </div>
                    
                    <div class="stat-card green fade-in" style="animation-delay: 0.2s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Taux de complétion</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $tauxCompletion }}%</h3>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-600">
                                <i class="fas fa-check-circle text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <span class="text-green-500 font-medium">{{ $completed }} livrables</span>
                            <span class="text-gray-400 ml-2">terminés</span>
                        </div>
                    </div>
                    
                    <div class="stat-card red fade-in" style="animation-delay: 0.3s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Taux d'annulation</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $tauxAnnulation }}%</h3>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center text-red-600">
                                <i class="fas fa-times-circle text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <span class="text-red-500 font-medium">{{ $cancelled }} livrables</span>
                            <span class="text-gray-400 ml-2">annulés</span>
                        </div>
                    </div>
                    
                    <div class="stat-card orange fade-in" style="animation-delay: 0.4s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Moyenne mensuelle</p>
                                <h3 class="text-3xl font-bold text-gray-800">{{ $averageMonthly }}</h3>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center text-orange-600">
                                <i class="fas fa-calendar text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center text-sm">
                            <span class="text-orange-500 font-medium">{{ $maxActivityMonthName }}</span>
                            <span class="text-gray-400 ml-2">pic d'activité</span>
                        </div>
                    </div>
                </div>

                <!-- Graphiques principaux -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Diagramme circulaire des statuts -->
                    <div class="chart-container fade-in" style="animation-delay: 0.2s">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-chart-pie text-purple-500 mr-2"></i>
                                Répartition par statut
                            </h3>
                            <span class="text-sm text-gray-500" data-tooltip="Distribution des livrables selon leur état">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </div>
                        
                        <div class="relative h-80">
                            <canvas id="statusChart"></canvas>
                        </div>
                        
                        <!-- Légende interactive dynamique -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-6">
                            @foreach($statusCounts as $status => $data)
                                @if($data['count'] > 0)
                                    <div class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 transition">
                                        <div class="w-3 h-3 rounded-full" style="background-color: {{ $data['color'] }}"></div>
                                        <span class="text-sm text-gray-600 flex-1">{{ $status }}</span>
                                        <span class="text-sm font-bold text-gray-800">{{ $data['count'] }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Diagramme annuel Open/Close -->
                    <div class="chart-container fade-in" style="animation-delay: 0.3s">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-chart-line text-purple-500 mr-2"></i>
                                Évolution annuelle
                            </h3>
                            <div class="period-selector">
                                <span class="period-btn active" onclick="changeChartPeriod('line')">Linéaire</span>
                                <span class="period-btn" onclick="changeChartPeriod('bar')">Barres</span>
                            </div>
                        </div>
                        
                        <div class="relative h-80">
                            <canvas id="annualChart"></canvas>
                        </div>
                        
                        <!-- Statistiques annuelles -->
                        <div class="grid grid-cols-2 gap-4 mt-6">
                            <div class="bg-gradient-to-br from-green-50 to-white rounded-xl p-4 border border-green-100">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                                        <i class="fas fa-folder-open"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Total ouverts</p>
                                        <p class="text-xl font-bold text-green-600">{{ $openLivrables }}</p>
                                    </div>
                                </div>
                                <div class="text-xs text-gray-400">
                                    <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                                    {{ $totalLivrables > 0 ? round(($openLivrables / $totalLivrables) * 100, 1) : 0 }}% du total
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-br from-red-50 to-white rounded-xl p-4 border border-red-100">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600">
                                        <i class="fas fa-folder"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Total fermés</p>
                                        <p class="text-xl font-bold text-red-600">{{ $closedLivrables }}</p>
                                    </div>
                                </div>
                                <div class="text-xs text-gray-400">
                                    <i class="fas fa-arrow-down text-red-500 mr-1"></i>
                                    {{ $totalLivrables > 0 ? round(($closedLivrables / $totalLivrables) * 100, 1) : 0 }}% du total
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau détaillé des statuts -->
                <div class="chart-container fade-in" style="animation-delay: 0.4s">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-table text-purple-500 mr-2"></i>
                        Détail par statut
                    </h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-100">
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Statut</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Nombre</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Pourcentage</th>
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600">Barre de progression</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statusCounts as $status => $data)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-3 px-4">
                                            <div class="flex items-center gap-2">
                                                <div class="w-3 h-3 rounded-full" style="background-color: {{ $data['color'] }}"></div>
                                                <span class="font-medium text-gray-700">{{ $status }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 font-bold text-gray-800">{{ $data['count'] }}</td>
                                        <td class="py-3 px-4 text-gray-600">{{ $data['percentage'] }}%</td>
                                        <td class="py-3 px-4">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="h-2 rounded-full" style="width: {{ $data['percentage'] }}%; background-color: {{ $data['color'] }}"></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($totalLivrables == 0)
                                    <tr>
                                        <td colspan="4" class="text-center py-8 text-gray-500">
                                            <i class="fas fa-chart-pie text-4xl mb-3 text-gray-300"></i>
                                            <p>Aucune donnée disponible</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Données dynamiques depuis PHP
            const statusLabels = [];
            const statusData = [];
            const statusColors = [];
            const statusBorderColors = [];
            
            @foreach($statusCounts as $status => $data)
                @if($data['count'] > 0)
                    statusLabels.push('{{ $status }}');
                    statusData.push({{ $data['count'] }});
                    statusColors.push('{{ $data['color'] }}20');
                    statusBorderColors.push('{{ $data['color'] }}');
                @endif
            @endforeach
            
            // Configuration du graphique des statuts (camembert)
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            
            if (statusData.length > 0) {
                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: statusLabels,
                        datasets: [{
                            data: statusData,
                            backgroundColor: statusColors,
                            borderColor: statusBorderColors,
                            borderWidth: 2,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });
            } else {
                // Afficher un message si pas de données
                statusCtx.canvas.parentNode.innerHTML = '<div class="flex items-center justify-center h-full"><p class="text-gray-400">Aucune donnée à afficher</p></div>';
            }

            // Configuration du graphique annuel
            const annualCtx = document.getElementById('annualChart').getContext('2d');
            let currentChartType = 'line';
            
            const months = @json($months);
            const openData = @json($openData);
            const closedData = @json($closedData);
            
            function createChart(type) {
                if (window.myAnnualChart) {
                    window.myAnnualChart.destroy();
                }
                
                window.myAnnualChart = new Chart(annualCtx, {
                    type: type,
                    data: {
                        labels: months,
                        datasets: [
                            {
                                label: 'Livrables ouverts',
                                data: openData,
                                backgroundColor: '#10b98120',
                                borderColor: '#10b981',
                                borderWidth: 2,
                                tension: 0.3,
                                fill: type === 'line' ? true : false,
                                pointBackgroundColor: '#10b981',
                                pointBorderColor: 'white',
                                pointBorderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            },
                            {
                                label: 'Livrables fermés',
                                data: closedData,
                                backgroundColor: '#ef444420',
                                borderColor: '#ef4444',
                                borderWidth: 2,
                                tension: 0.3,
                                fill: type === 'line' ? true : false,
                                pointBackgroundColor: '#ef4444',
                                pointBorderColor: 'white',
                                pointBorderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    usePointStyle: true,
                                    boxWidth: 6
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: '#1e293b',
                                titleColor: '#fff',
                                bodyColor: '#e2e8f0',
                                borderColor: '#475569',
                                borderWidth: 1
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: '#e2e8f0'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        },
                        interaction: {
                            mode: 'nearest',
                            axis: 'x',
                            intersect: false
                        }
                    }
                });
            }

            // Créer le graphique initial
            createChart('line');

            // Fonction pour changer le type de graphique
            window.changeChartPeriod = function(type) {
                currentChartType = type;
                createChart(type);
                
                // Mettre à jour les boutons actifs
                document.querySelectorAll('.period-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                event.target.classList.add('active');
            };
        });
    </script>
</x-app-layout>