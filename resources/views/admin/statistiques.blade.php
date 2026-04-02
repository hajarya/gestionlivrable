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
            
            /* Couleurs des statuts */
            --color-completed: #10b981;
            --color-in-progress: #3b82f6;
            --color-fq-review: #8b5cf6;
            --color-not-started: #9ca3af;
            --color-standby: #f59e0b;
            --color-cancelled: #ef4444;
            
            /* Couleurs des types */
            --color-tender: #667eea;
            --color-cbc: #10b981;
            --color-dtrf: #f59e0b;
            --color-standard: #8b5cf6;
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
        
        /* Conteneurs de graphiques */
        .chart-container {
            background: white;
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 15px 35px -15px rgba(0,0,0,0.1);
            border: 1px solid rgba(102,126,234,0.1);
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
        
        /* Badges de statut */
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .status-badge.completed { background: #d1fae5; color: #065f46; }
        .status-badge.in-progress { background: #dbeafe; color: #1e40af; }
        .status-badge.fq-review { background: #ede9fe; color: #5b21b6; }
        .status-badge.not-started { background: #e5e7eb; color: #374151; }
        .status-badge.standby { background: #fef3c7; color: #92400e; }
        .status-badge.cancelled { background: #fee2e2; color: #991b1b; }
        
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
        
        /* Tableau */
        .stats-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .stats-table th {
            text-align: left;
            padding: 12px;
            font-weight: 600;
            color: #4b5563;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .stats-table td {
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .stats-table tr:hover {
            background: #f9fafb;
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar-fixed {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            .main-content {
                margin-left: 0;
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
                    <a href="{{ route('admin.livrables') }}" class="sidebar-item flex items-center space-x-3 p-3 text-gray-700">
                        <i class="fas fa-folder-open w-5"></i>
                        <span>Livrables</span>
                    </a>
                    <a href="{{ route('admin.statistiques') }}" class="sidebar-item active flex items-center space-x-3 p-3">
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
                        <i class="fas fa-chart-pie text-purple-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Statistiques globales</h2>
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
                    // Statistiques des livrables
                    $totalLivrables = \App\Models\Livrable::count();
                    $totalUsers = \App\Models\User::count();
                    $totalManagers = \App\Models\User::where('role', 'manager')->count();
                    $totalConsultants = \App\Models\User::where('role', 'consultant')->count();
                    $totalTasks = \App\Models\Task::count();
                    $completedTasks = \App\Models\Task::where('status', 'terminé')->count();
                    
                    // Statistiques par statut
                    $statusStats = [
                        'completed' => \App\Models\Livrable::where('status', 'completed')->count(),
                        'in progress' => \App\Models\Livrable::where('status', 'in progress')->count(),
                        'FQ review' => \App\Models\Livrable::where('status', 'FQ review')->count(),
                        'not started' => \App\Models\Livrable::where('status', 'not started')->count(),
                        'standby' => \App\Models\Livrable::where('status', 'standby')->count(),
                        'cancelled' => \App\Models\Livrable::where('status', 'cancelled')->count(),
                    ];
                    
                    // Statistiques par type
                    $typeStats = [
                        'tender' => \App\Models\Livrable::where('type', 'tender')->count(),
                        'cbc' => \App\Models\Livrable::where('type', 'cbc')->count(),
                        'dtrf' => \App\Models\Livrable::where('type', 'dtrf')->count(),
                        'standard' => \App\Models\Livrable::where('type', 'standard')->count(),
                        'autre' => \App\Models\Livrable::whereNotIn('type', ['tender', 'cbc', 'dtrf', 'standard'])->orWhereNull('type')->count(),
                    ];
                    
                    $tauxCompletion = $totalLivrables > 0 ? round(($statusStats['completed'] / $totalLivrables) * 100, 1) : 0;
                    $tauxTasks = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100, 1) : 0;
                    
                    // Données pour l'évolution mensuelle (6 derniers mois)
                    $months = [];
                    $livrablesData = [];
                    $usersData = [];
                    
                    for ($i = 5; $i >= 0; $i--) {
                        $month = now()->subMonths($i);
                        $months[] = $month->format('M Y');
                        $livrablesData[] = \App\Models\Livrable::whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->count();
                        $usersData[] = \App\Models\User::whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->count();
                    }
                    
                    // Données pour les graphiques
                    $statusLabels = ['Completed', 'In Progress', 'FQ Review', 'Not Started', 'Standby', 'Cancelled'];
                    $statusColors = ['#10b981', '#3b82f6', '#8b5cf6', '#9ca3af', '#f59e0b', '#ef4444'];
                    $statusCounts = array_values($statusStats);
                    
                    $typeLabels = ['TENDER', 'CBC', 'DTRF', 'STANDARD', 'AUTRE'];
                    $typeColors = ['#667eea', '#10b981', '#f59e0b', '#8b5cf6', '#6b7280'];
                    $typeCounts = array_values($typeStats);
                @endphp
                
                <!-- En-tête -->
                <div class="gradient-header">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold mb-2">
                            <i class="fas fa-chart-pie mr-3"></i>
                            Tableau de bord statistique
                        </h1>
                        <p class="text-purple-100">Analyse complète de l'activité de la plateforme</p>
                        <div class="flex flex-wrap gap-3 mt-4">
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl text-sm">
                                <i class="fas fa-calendar-alt mr-2"></i>{{ now()->format('d/m/Y') }}
                            </span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl text-sm">
                                <i class="fas fa-chart-line mr-2"></i>{{ $totalLivrables }} livrables
                            </span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-xl text-sm">
                                <i class="fas fa-users mr-2"></i>{{ $totalUsers }} utilisateurs
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Cartes KPI -->
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
                        <div class="mt-2 text-sm text-gray-500">
                            <i class="fas fa-chart-line mr-1"></i> Tous types confondus
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Taux de complétion</p>
                                <p class="stat-value text-3xl font-bold">{{ $tauxCompletion }}%</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="progress-container mt-3">
                            <div class="progress-bar" style="width: {{ $tauxCompletion }}%; background: #10b981"></div>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            {{ $statusStats['completed'] }} livrables terminés
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Tâches</p>
                                <p class="stat-value text-3xl font-bold">{{ $totalTasks }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-tasks text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="progress-container mt-3">
                            <div class="progress-bar" style="width: {{ $tauxTasks }}%; background: #3b82f6"></div>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            {{ $completedTasks }} tâches terminées ({{ $tauxTasks }}%)
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Utilisateurs</p>
                                <p class="stat-value text-3xl font-bold">{{ $totalUsers }}</p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            <span class="text-green-600">{{ $totalManagers }} Managers</span>
                            <span class="mx-1">•</span>
                            <span class="text-blue-600">{{ $totalConsultants }} Consultants</span>
                        </div>
                    </div>
                </div>
                
                <!-- Graphiques principaux -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Répartition par statut -->
                    <div class="chart-container fade-in">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-chart-pie text-purple-500 mr-2"></i>
                            Répartition par statut
                        </h3>
                        <div class="relative h-64">
                            <canvas id="statusChart"></canvas>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-4">
                            @foreach($statusLabels as $index => $label)
                                @if($statusCounts[$index] > 0)
                                <div class="flex items-center gap-2 text-sm">
                                    <div class="w-3 h-3 rounded-full" style="background: {{ $statusColors[$index] }}"></div>
                                    <span class="text-gray-600 flex-1">{{ $label }}</span>
                                    <span class="font-semibold text-gray-800">{{ $statusCounts[$index] }}</span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Répartition par type -->
                    <div class="chart-container fade-in">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-chart-bar text-purple-500 mr-2"></i>
                            Répartition par type
                        </h3>
                        <div class="relative h-64">
                            <canvas id="typeChart"></canvas>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-4">
                            @foreach($typeLabels as $index => $label)
                                @if($typeCounts[$index] > 0)
                                <div class="flex items-center gap-2 text-sm">
                                    <div class="w-3 h-3 rounded-full" style="background: {{ $typeColors[$index] }}"></div>
                                    <span class="text-gray-600 flex-1">{{ $label }}</span>
                                    <span class="font-semibold text-gray-800">{{ $typeCounts[$index] }}</span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Évolution mensuelle -->
                <div class="chart-container fade-in mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-line text-purple-500 mr-2"></i>
                        Évolution mensuelle
                    </h3>
                    <div class="relative h-80">
                        <canvas id="evolutionChart"></canvas>
                    </div>
                </div>
                
                <!-- Tableaux détaillés -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Tableau des statuts -->
                    <div class="chart-container fade-in">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-table text-purple-500 mr-2"></i>
                            Détail par statut
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="stats-table">
                                <thead>
                                    <tr>
                                        <th>Statut</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Pourcentage</th>
                                        <th class="text-center">Progression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statusLabels as $index => $label)
                                        @php
                                            $count = $statusCounts[$index];
                                            $percentage = $totalLivrables > 0 ? round(($count / $totalLivrables) * 100, 1) : 0;
                                            $color = $statusColors[$index];
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    <div class="w-3 h-3 rounded-full" style="background: {{ $color }}"></div>
                                                    <span class="font-medium text-gray-700">{{ $label }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center font-bold">{{ $count }}</td>
                                            <td class="text-center text-gray-600">{{ $percentage }}%</td>
                                            <td class="text-center">
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="h-2 rounded-full" style="width: {{ $percentage }}%; background: {{ $color }}"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="bg-gray-50 font-bold">
                                        <td>TOTAL</td>
                                        <td class="text-center">{{ $totalLivrables }}</td>
                                        <td class="text-center">100%</td>
                                        <td class="text-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="h-2 rounded-full" style="width: 100%; background: #667eea"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Tableau des types -->
                    <div class="chart-container fade-in">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-table text-purple-500 mr-2"></i>
                            Détail par type
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="stats-table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Pourcentage</th>
                                        <th class="text-center">Progression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($typeLabels as $index => $label)
                                        @php
                                            $count = $typeCounts[$index];
                                            $percentage = $totalLivrables > 0 ? round(($count / $totalLivrables) * 100, 1) : 0;
                                            $color = $typeColors[$index];
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    <div class="w-3 h-3 rounded-full" style="background: {{ $color }}"></div>
                                                    <span class="font-medium text-gray-700">{{ $label }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center font-bold">{{ $count }}</td>
                                            <td class="text-center text-gray-600">{{ $percentage }}%</td>
                                            <td class="text-center">
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="h-2 rounded-full" style="width: {{ $percentage }}%; background: {{ $color }}"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="bg-gray-50 font-bold">
                                        <td>TOTAL</td>
                                        <td class="text-center">{{ $totalLivrables }}</td>
                                        <td class="text-center">100%</td>
                                        <td class="text-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="h-2 rounded-full" style="width: 100%; background: #667eea"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Insights et recommandations -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100 fade-in">
                        <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                            Insights & Tendances
                        </h4>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check-circle text-green-600 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Taux de complétion :</span>
                                        {{ $tauxCompletion }}% des livrables sont terminés
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-chart-line text-blue-600 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Type le plus utilisé :</span>
                                        @php
                                            $maxType = array_search(max($typeCounts), $typeCounts);
                                            $maxTypeLabel = $typeLabels[$maxType] ?? 'Aucun';
                                            $maxTypeCount = max($typeCounts);
                                        @endphp
                                        {{ $maxTypeLabel }} avec {{ $maxTypeCount }} livrables
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-chart-pie text-purple-600 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Statut dominant :</span>
                                        @php
                                            $maxStatus = array_search(max($statusCounts), $statusCounts);
                                            $maxStatusLabel = $statusLabels[$maxStatus] ?? 'Aucun';
                                            $maxStatusCount = max($statusCounts);
                                        @endphp
                                        {{ $maxStatusLabel }} ({{ $maxStatusCount }} livrables)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-purple-100 fade-in">
                        <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-chart-simple text-purple-500 mr-2"></i>
                            Recommandations
                        </h4>
                        <div class="space-y-3">
                            @if($statusStats['not started'] > 0)
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-clock text-gray-600 text-sm"></i>
                                </div>
                                <p class="text-sm text-gray-700">
                                    {{ $statusStats['not started'] }} livraire(s) non démarré(s) - Planifier leur lancement
                                </p>
                            </div>
                            @endif
                            @if($statusStats['standby'] > 0)
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-pause-circle text-yellow-600 text-sm"></i>
                                </div>
                                <p class="text-sm text-gray-700">
                                    {{ $statusStats['standby'] }} livraire(s) en standby - Analyser les blocages
                                </p>
                            </div>
                            @endif
                            @if($statusStats['in progress'] > 0)
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-play-circle text-blue-600 text-sm"></i>
                                </div>
                                <p class="text-sm text-gray-700">
                                    {{ $statusStats['in progress'] }} livraire(s) en cours - Assurer un suivi régulier
                                </p>
                            </div>
                            @endif
                            @if($statusStats['FQ review'] > 0)
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-clipboard-check text-purple-600 text-sm"></i>
                                </div>
                                <p class="text-sm text-gray-700">
                                    {{ $statusStats['FQ review'] }} livraire(s) en révision - Prioriser la validation
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Graphique des statuts
            const statusLabels = @json($statusLabels);
            const statusCounts = @json($statusCounts);
            const statusColors = @json($statusColors);
            
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            if (statusCounts.some(count => count > 0)) {
                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: statusLabels,
                        datasets: [{
                            data: statusCounts,
                            backgroundColor: statusColors.map(c => c + '80'),
                            borderColor: statusColors,
                            borderWidth: 2,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label;
                                        const value = context.raw;
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
            }
            
            // Graphique des types
            const typeLabels = @json($typeLabels);
            const typeCounts = @json($typeCounts);
            const typeColors = @json($typeColors);
            
            const typeCtx = document.getElementById('typeChart').getContext('2d');
            if (typeCounts.some(count => count > 0)) {
                new Chart(typeCtx, {
                    type: 'bar',
                    data: {
                        labels: typeLabels,
                        datasets: [{
                            label: 'Nombre de livrables',
                            data: typeCounts,
                            backgroundColor: typeColors.map(c => c + '80'),
                            borderColor: typeColors,
                            borderWidth: 2,
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `${context.raw} livrable(s)`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#e2e8f0' },
                                title: { display: true, text: 'Nombre de livrables', color: '#6b7280' }
                            },
                            x: {
                                grid: { display: false },
                                title: { display: true, text: 'Type', color: '#6b7280' }
                            }
                        }
                    }
                });
            }
            
            // Graphique d'évolution
            const months = @json($months);
            const livrablesData = @json($livrablesData);
            const usersData = @json($usersData);
            
            const evolutionCtx = document.getElementById('evolutionChart').getContext('2d');
            new Chart(evolutionCtx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [
                        {
                            label: 'Livrables créés',
                            data: livrablesData,
                            borderColor: '#667eea',
                            backgroundColor: 'rgba(102, 126, 234, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true,
                            pointBackgroundColor: '#667eea',
                            pointBorderColor: 'white',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Utilisateurs inscrits',
                            data: usersData,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true,
                            pointBackgroundColor: '#10b981',
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
                            bodyColor: '#e2e8f0'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#e2e8f0' },
                            title: { display: true, text: 'Nombre', color: '#6b7280' }
                        },
                        x: {
                            grid: { display: false },
                            title: { display: true, text: 'Mois', color: '#6b7280' }
                        }
                    }
                }
            });
            
            // Animation des barres de progression
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        });
    </script>
</x-app-layout>