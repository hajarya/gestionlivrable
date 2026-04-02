<x-app-layout>
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
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
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
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }

        /* Sidebar styles */
        .sidebar-fixed {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            width: 280px;
            background: white;
            box-shadow: 4px 0 20px rgba(0,0,0,0.05);
            z-index: 50;
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
            border-radius: 12px;
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
            box-shadow: 0 4px 15px rgba(102,126,234,0.3);
        }
        
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #f0f2f5 100%);
        }
        
        /* Cartes statistiques */
        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 24px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(102,126,234,0.15);
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Filtres et recherche */
        .filters-section {
            background: white;
            border-radius: 24px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .search-wrapper {
            position: relative;
            flex: 1;
        }
        
        .search-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        .search-wrapper input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .search-wrapper input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }
        
        .filter-select {
            padding: 12px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 50px;
            font-size: 0.9rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        /* Table des livrables */
        .livrables-table-container {
            background: white;
            border-radius: 28px;
            padding: 24px;
            box-shadow: 0 15px 35px -15px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        
        .livrables-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .livrables-table th {
            text-align: left;
            padding: 16px 12px;
            font-weight: 600;
            color: #4b5563;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .livrables-table td {
            padding: 16px 12px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }
        
        .livrables-table tr:hover {
            background: #f9fafb;
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
            width: fit-content;
        }
        
        .status-badge.completed { background: #d1fae5; color: #065f46; }
        .status-badge.fq-review { background: #ede9fe; color: #5b21b6; }
        .status-badge.cancelled { background: #fee2e2; color: #991b1b; }
        .status-badge.in-progress { background: #dbeafe; color: #1e40af; animation: pulse 2s ease-in-out infinite; }
        .status-badge.standby { background: #fef3c7; color: #92400e; }
        .status-badge.not-started { background: #e5e7eb; color: #374151; }
        
        /* Badges de type */
        .type-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            width: fit-content;
        }
        
        .type-badge.tender { background: #667eea20; color: #667eea; }
        .type-badge.cbc { background: #10b98120; color: #10b981; }
        .type-badge.dtrf { background: #f59e0b20; color: #f59e0b; }
        .type-badge.standard { background: #8b5cf620; color: #8b5cf6; }
        .type-badge.autre { background: #6b728020; color: #6b7280; }
        
        /* Avatar consultant */
        .consultant-avatar {
            width: 35px;
            height: 35px;
            border-radius: 12px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        /* Bouton de suppression seulement */
        .delete-btn {
            padding: 8px 16px;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #fee2e2;
            border: none;
            color: #991b1b;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .delete-btn:hover {
            background: #fecaca;
            transform: scale(1.05);
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
        }
        
        .pagination button {
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .pagination button:hover:not(:disabled) {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .pagination button.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        /* Header */
        .gradient-header {
            background: var(--primary-gradient);
            border-radius: 30px;
            padding: 30px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
        }
        
        .gradient-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 16px;
        }
        
        .empty-state h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--gray-600);
            margin-bottom: 8px;
        }
        
        .empty-state p {
            color: var(--gray-400);
        }
        
        /* Tooltip */
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
            font-size: 0.7rem;
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
        
        /* Progress bar */
        .progress-container {
            background: #e2e8f0;
            border-radius: 10px;
            height: 8px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            border-radius: 10px;
            transition: width 1s ease;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar-fixed {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            .main-content {
                margin-left: 0;
            }
            .livrables-table th, .livrables-table td {
                padding: 12px 8px;
            }
            .filter-select {
                width: 100%;
            }
        }
    </style>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="sidebar-fixed">
            <div class="p-6">
                <div class="gradient-bg rounded-2xl p-5 text-white mb-6" style="background: var(--primary-gradient);">
                    <h1 class="text-2xl font-bold">Admin Panel</h1>
                    <p class="text-sm opacity-90 mt-1">Gestion des livrables</p>
                </div>
                
                <!-- Profil Admin -->
                <div class="flex items-center space-x-3 mb-6 p-3 bg-gray-50 rounded-xl">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold text-lg">
                        {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                        <p class="text-xs text-gray-500">Administrateur</p>
                    </div>
                </div>
                
                <!-- Menu -->
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 text-gray-700">
                        <i class="fas fa-chart-line w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="sidebar-item flex items-center space-x-3 p-3 text-gray-700">
                        <i class="fas fa-users w-5"></i>
                        <span>Utilisateurs</span>
                    </a>
                    <a href="{{ route('admin.livrables') }}" class="sidebar-item active flex items-center space-x-3 p-3">
                        <i class="fas fa-folder-open w-5"></i>
                        <span>Livrables</span>
                    </a>
                    <a href="{{ route('admin.statistiques') }}" class="sidebar-item flex items-center space-x-3 p-3 text-gray-700">
                        <i class="fas fa-chart-pie w-5"></i>
                        <span>Statistiques</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="sidebar-item flex items-center space-x-3 p-3 text-gray-700">
                        <i class="fas fa-cog w-5"></i>
                        <span>Paramètres</span>
                    </a>
                </nav>
                
                <!-- Footer -->
                <div class="absolute bottom-6 left-6 right-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                        <button type="submit" class="w-full flex items-center justify-center space-x-2 p-3 text-red-500 hover:bg-red-50 rounded-xl transition">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="px-8 py-4 flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-folder-open text-purple-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Gestion des livrables</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        </div>
                    </div>
                </div>
            </header>
            
            <div class="p-8">
                @php
                    // Statistiques des livrables avec les nouveaux statuts
                    $totalLivrables = \App\Models\Livrable::count();
                    $totalCompleted = \App\Models\Livrable::where('status', 'completed')->count();
                    $totalInProgress = \App\Models\Livrable::where('status', 'in progress')->count();
                    $totalNotStarted = \App\Models\Livrable::where('status', 'not started')->count();
                    $totalFQReview = \App\Models\Livrable::where('status', 'FQ review')->count();
                    $totalStandby = \App\Models\Livrable::where('status', 'standby')->count();
                    $totalCancelled = \App\Models\Livrable::where('status', 'cancelled')->count();
                    
                    $completionRate = $totalLivrables > 0 ? round(($totalCompleted / $totalLivrables) * 100, 1) : 0;
                    
                    // Récupération des livrables avec pagination
                    $livrables = \App\Models\Livrable::with('consultant')->orderBy('created_at', 'desc')->paginate(10);
                @endphp
                
                <!-- En-tête -->
                <div class="gradient-header">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold mb-2">
                            <i class="fas fa-folder-open mr-3"></i>
                            Liste des livrables
                        </h1>
                        <p class="text-purple-100">Consultez tous les livrables de la plateforme</p>
                    </div>
                </div>
                
                <!-- Cartes statistiques -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="stat-card fade-in">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Total livrables</p>
                                <p class="stat-value text-3xl font-bold">{{ $totalLivrables }}</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-folder-open text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="progress-container mt-3">
                            <div class="progress-bar" style="width: 100%; background: #667eea;"></div>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Completed</p>
                                <p class="text-3xl font-bold text-green-600">{{ $totalCompleted }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-sm">
                            <span class="text-green-600">{{ $completionRate }}%</span>
                            <span class="text-gray-400"> du total</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">In Progress / FQ Review</p>
                                <p class="text-3xl font-bold text-blue-600">{{ $totalInProgress + $totalFQReview }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-spinner fa-spin text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-sm">
                            <span class="text-blue-600">{{ $totalInProgress }}</span>
                            <span class="text-gray-400"> In Progress, </span>
                            <span class="text-purple-600">{{ $totalFQReview }}</span>
                            <span class="text-gray-400"> FQ Review</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Not Started / Standby</p>
                                <p class="text-3xl font-bold text-orange-600">{{ $totalNotStarted + $totalStandby }}</p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-clock text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-sm">
                            <span class="text-orange-600">{{ $totalNotStarted }}</span>
                            <span class="text-gray-400"> Not Started, </span>
                            <span class="text-yellow-600">{{ $totalStandby }}</span>
                            <span class="text-gray-400"> Standby</span>
                        </div>
                    </div>
                </div>
                
                <!-- Filtres et recherche -->
                <div class="filters-section">
                    <div class="flex flex-wrap gap-4 items-center">
                        <div class="search-wrapper flex-1 min-w-[200px]">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" placeholder="Rechercher par titre, consultant ou type...">
                        </div>
                        <select id="statusFilter" class="filter-select">
                            <option value="all">Tous les statuts</option>
                            <option value="completed">Completed</option>
                            <option value="in progress">In Progress</option>
                            <option value="FQ review">FQ Review</option>
                            <option value="not started">Not Started</option>
                            <option value="standby">Standby</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select id="typeFilter" class="filter-select">
                            <option value="all">Tous les types</option>
                            <option value="tender">Tender</option>
                            <option value="cbc">CBC</option>
                            <option value="dtrf">DTRF</option>
                            <option value="standard">STANDARD</option>
                        </select>
                        <button onclick="resetFilters()" class="px-4 py-2 bg-gray-100 rounded-xl hover:bg-gray-200 transition">
                            <i class="fas fa-undo-alt"></i> Réinitialiser
                        </button>
                    </div>
                </div>
                
                <!-- Tableau des livrables -->
                <div class="livrables-table-container">
                    <div class="overflow-x-auto">
                        <table class="livrables-table" id="livrablesTable">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Type</th>
                                    <th>Consultant</th>
                                    <th>Statut</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </thead>
                            <tbody id="livrablesTableBody">
                                @forelse($livrables as $livrable)
                                <tr data-status="{{ strtolower($livrable->status) }}" data-type="{{ strtolower($livrable->type ?? 'autre') }}" data-title="{{ strtolower($livrable->titre) }}" data-consultant="{{ strtolower($livrable->consultant->first_name ?? '' . ' ' . $livrable->consultant->last_name ?? '') }}">
                                    <td class="font-medium text-gray-800">{{ $livrable->titre }}</td>
                                    <td>
                                        @php
                                            $typeClass = strtolower($livrable->type ?? 'autre');
                                            $typeIcon = match($typeClass) {
                                                'tender' => 'fa-file-signature',
                                                'cbc' => 'fa-chart-line',
                                                'dtrf' => 'fa-file-alt',
                                                'standard' => 'fa-check-double',
                                                default => 'fa-folder'
                                            };
                                        @endphp
                                        <span class="type-badge {{ $typeClass }}">
                                            <i class="fas {{ $typeIcon }}"></i>
                                            {{ strtoupper($livrable->type ?? 'AUTRE') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($livrable->consultant)
                                        <div class="flex items-center gap-2">
                                            <div class="consultant-avatar">
                                                {{ strtoupper(substr($livrable->consultant->first_name,0,1)) }}
                                            </div>
                                            <span class="text-gray-600">{{ $livrable->consultant->first_name }} {{ $livrable->consultant->last_name }}</span>
                                        </div>
                                        @else
                                        <span class="text-gray-400">Non assigné</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = str_replace(' ', '-', strtolower($livrable->status));
                                            $statusIcon = match(strtolower($livrable->status)) {
                                                'completed' => 'fa-check-circle',
                                                'in progress' => 'fa-spinner fa-spin',
                                                'fq review' => 'fa-clipboard-check',
                                                'not started' => 'fa-clock',
                                                'standby' => 'fa-pause-circle',
                                                'cancelled' => 'fa-times-circle',
                                                default => 'fa-question-circle'
                                            };
                                        @endphp
                                        <span class="status-badge {{ $statusClass }}">
                                            <i class="fas {{ $statusIcon }}"></i>
                                            {{ ucfirst($livrable->status) }}
                                        </span>
                                    </td>
                                    <td class="text-gray-500">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ $livrable->created_at->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <button onclick="deleteLivrable({{ $livrable->id }}, '{{ $livrable->titre }}')" class="delete-btn" data-tooltip="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-12">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open"></i>
                                            <h3>Aucun livrable</h3>
                                            <p>Il n'y a pas encore de livrables créés.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    @if($livrables->hasPages())
                    <div class="pagination">
                        {{ $livrables->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
    
    <script>
        let currentPage = 1;
        const itemsPerPage = 10;
        let allLivrables = [];
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('#livrablesTableBody tr');
            rows.forEach(row => {
                if (row.cells && row.cells.length > 0 && row.dataset.status) {
                    allLivrables.push({
                        element: row,
                        status: row.dataset.status,
                        type: row.dataset.type,
                        title: row.dataset.title,
                        consultant: row.dataset.consultant
                    });
                }
            });
            
            setupFilters();
            updatePagination();
        });
        
        // Filtres
        function setupFilters() {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const typeFilter = document.getElementById('typeFilter');
            
            function filterLivrables() {
                const searchTerm = searchInput.value.toLowerCase();
                const statusValue = statusFilter.value;
                const typeValue = typeFilter.value;
                
                let visibleCount = 0;
                allLivrables.forEach(livrable => {
                    const matchesSearch = livrable.title.includes(searchTerm) || livrable.consultant.includes(searchTerm);
                    const matchesStatus = statusValue === 'all' || livrable.status === statusValue;
                    const matchesType = typeValue === 'all' || livrable.type === typeValue;
                    
                    if (matchesSearch && matchesStatus && matchesType) {
                        livrable.element.style.display = '';
                        visibleCount++;
                    } else {
                        livrable.element.style.display = 'none';
                    }
                });
                
                updatePagination();
            }
            
            searchInput.addEventListener('input', filterLivrables);
            statusFilter.addEventListener('change', filterLivrables);
            typeFilter.addEventListener('change', filterLivrables);
        }
        
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('statusFilter').value = 'all';
            document.getElementById('typeFilter').value = 'all';
            
            allLivrables.forEach(livrable => {
                livrable.element.style.display = '';
            });
            
            updatePagination();
        }
        
        function updatePagination() {
            const visibleRows = Array.from(document.querySelectorAll('#livrablesTableBody tr')).filter(row => row.style.display !== 'none');
            const totalPages = Math.ceil(visibleRows.length / itemsPerPage);
            
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            if (prevBtn) prevBtn.disabled = currentPage === 1;
            if (nextBtn) nextBtn.disabled = currentPage === totalPages || totalPages === 0;
            
            visibleRows.forEach((row, index) => {
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
        }
        
        function deleteLivrable(id) {
    if (!confirm("Supprimer ce livrable ?")) return;

    fetch('/admin/livrables/' + id, { // ⚠️ IMPORTANT
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(data => {
        alert("✅ Supprimé");
        location.reload();
    })
    .catch(err => {
        console.error(err);
        alert("❌ Erreur suppression");
    });
}
        
        // Animation des barres de progression
        setTimeout(() => {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                if (width) {
                    bar.style.width = '0';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 100);
                }
            });
        }, 200);
    </script>
</x-app-layout>