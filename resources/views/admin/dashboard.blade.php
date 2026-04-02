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
        
        .pulse {
            animation: pulse 2s infinite;
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
        
        /* Cartes d'activité */
        .activity-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        
        .activity-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }
        
        /* Timeline */
        .timeline-item {
            position: relative;
            padding-left: 30px;
            padding-bottom: 20px;
            border-left: 2px solid #e2e8f0;
        }
        
        .timeline-item:last-child {
            border-left: 2px solid transparent;
        }
        
        .timeline-icon {
            position: absolute;
            left: -10px;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary);
            border: 3px solid white;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.2);
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
            background: var(--primary-gradient);
        }
        
        /* Badges */
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .badge-admin { background: #667eea20; color: #667eea; }
        .badge-manager { background: #10b98120; color: #10b981; }
        .badge-user { background: #f59e0b20; color: #f59e0b; }
        
        /* User avatar */
        .user-avatar-sm {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        /* Header */
        .gradient-header {
            background: var(--primary-gradient);
            border-radius: 30px;
            padding: 30px;
            color: white;
            position: relative;
            overflow: hidden;
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
        
        /* Table */
        .user-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .user-table th {
            text-align: left;
            padding: 12px;
            color: #4b5563;
            font-weight: 600;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .user-table td {
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .user-table tr:hover {
            background: #f9fafb;
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
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-item active flex items-center space-x-3 p-3">
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
                        <i class="fas fa-tachometer-alt text-purple-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Dashboard Administrateur</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-400 text-lg cursor-pointer hover:text-purple-500 transition"></i>
                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="user-avatar-sm">
                                {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        </div>
                    </div>
                </div>
            </header>
            
            <div class="p-8">
                @php
                    // Statistiques générales
                    $totalUsers = \App\Models\User::count();
                    $totalManagers = \App\Models\User::where('role', 'manager')->count();
                    $totalConsultants = \App\Models\User::where('role', 'consultant')->count();
                    $totalLivrables = \App\Models\Livrable::count();
                    $totalTasks = \App\Models\Task::count();
                    $completedTasks = \App\Models\Task::where('status', 'terminé')->count();
                    $completedLivrables = \App\Models\Livrable::where('status', 'completed')->count();
                    $inProgressLivrables = \App\Models\Livrable::where('status', 'in progress')->count();
                    $notStartedLivrables = \App\Models\Livrable::where('status', 'not started')->count();
                    
                    $tauxCompletion = $totalLivrables > 0 ? round(($completedLivrables / $totalLivrables) * 100, 1) : 0;
                    $tauxTasks = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100, 1) : 0;
                    
                    // Activités récentes (derniers livrables créés)
                    $recentLivrables = \App\Models\Livrable::with('consultant')->orderBy('created_at', 'desc')->take(5)->get();
                    
                    // Top consultants (avec le plus de livrables)
                    $topConsultants = \App\Models\User::where('role', 'consultant')
                        ->withCount('livrables')
                        ->orderBy('livrables_count', 'desc')
                        ->take(5)
                        ->get();
                    
                    // Statistiques par mois (6 derniers mois)
                    $months = [];
                    $livrablesData = [];
                    $usersData = [];
                    
                    for ($i = 5; $i >= 0; $i--) {
                        $month = now()->subMonths($i);
                        $monthName = $month->format('M Y');
                        $months[] = $monthName;
                        
                        $livrablesData[] = \App\Models\Livrable::whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->count();
                        
                        $usersData[] = \App\Models\User::whereYear('created_at', $month->year)
                            ->whereMonth('created_at', $month->month)
                            ->count();
                    }
                    
                    // Derniers utilisateurs inscrits
                    $recentUsers = \App\Models\User::orderBy('created_at', 'desc')->take(5)->get();
                @endphp
                
                <!-- En-tête décoratif -->
                <div class="gradient-header mb-8">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold mb-2">
                            <i class="fas fa-chart-line mr-3"></i>
                            Bienvenue, {{ Auth::user()->first_name }} !
                        </h1>
                        <p class="text-purple-100">Voici un aperçu global de votre plateforme de gestion des livrables</p>
                        <div class="flex gap-3 mt-4">
                            <span class="px-3 py-1 bg-white/20 rounded-full text-sm">
                                <i class="fas fa-calendar mr-1"></i> {{ now()->format('d/m/Y') }}
                            </span>
                            <span class="px-3 py-1 bg-white/20 rounded-full text-sm">
                                <i class="fas fa-users mr-1"></i> {{ $totalUsers }} utilisateurs
                            </span>
                            <span class="px-3 py-1 bg-white/20 rounded-full text-sm">
                                <i class="fas fa-folder-open mr-1"></i> {{ $totalLivrables }} livrables
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Cartes KPI principales -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="stat-card fade-in">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Utilisateurs</p>
                                <p class="stat-value text-3xl font-bold">{{ $totalUsers }}</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-3 flex gap-2 text-sm">
                            <span class="text-green-600">{{ $totalManagers }} Managers</span>
                            <span class="text-blue-600">{{ $totalConsultants }} Consultants</span>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Livrables</p>
                                <p class="stat-value text-3xl font-bold">{{ $totalLivrables }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-folder-open text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="progress-container mt-3">
                            <div class="progress-bar" style="width: {{ $tauxCompletion }}%"></div>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            {{ $completedLivrables }} terminés ({{ $tauxCompletion }}%)
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
                            {{ $completedTasks }} terminées ({{ $tauxTasks }}%)
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">En cours</p>
                                <p class="stat-value text-3xl font-bold">{{ $inProgressLivrables }}</p>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-spinner fa-spin text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            {{ $notStartedLivrables }} non démarrés
                        </div>
                    </div>
                </div>
                
                <!-- Graphiques et activités -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Évolution des livrables et utilisateurs -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg fade-in" style="animation-delay: 0.2s">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-chart-line text-purple-500 mr-2"></i>
                            Évolution (6 derniers mois)
                        </h3>
                        <div class="relative h-64">
                            <canvas id="evolutionChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Top consultants -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg fade-in" style="animation-delay: 0.3s">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                            Top Consultants
                        </h3>
                        <div class="space-y-4">
                            @foreach($topConsultants as $consultant)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($consultant->first_name,0,1)) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $consultant->first_name }} {{ $consultant->last_name }}</p>
                                            <p class="text-xs text-gray-500">{{ $consultant->email }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xl font-bold text-purple-600">{{ $consultant->livrables_count }}</p>
                                        <p class="text-xs text-gray-500">livrables</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Derniers livrables et utilisateurs récents -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Derniers livrables -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg fade-in" style="animation-delay: 0.4s">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-clock text-purple-500 mr-2"></i>
                            Derniers livrables
                        </h3>
                        <div class="space-y-3">
                            @foreach($recentLivrables as $livrable)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                            <i class="fas fa-file-alt text-purple-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ Str::limit($livrable->titre, 40) }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ $livrable->consultant->first_name ?? 'Non assigné' }} {{ $livrable->consultant->last_name ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="badge 
                                            @if($livrable->status == 'completed') badge-success
                                            @elseif($livrable->status == 'in progress') badge-warning
                                            @else badge-secondary @endif">
                                            {{ $livrable->status }}
                                        </span>
                                        <p class="text-xs text-gray-400 mt-1">{{ $livrable->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Derniers utilisateurs inscrits -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg fade-in" style="animation-delay: 0.5s">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-user-plus text-green-500 mr-2"></i>
                            Derniers inscrits
                        </h3>
                        <div class="space-y-3">
                            @foreach($recentUsers as $user)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg 
                                            @if($user->role == 'admin') bg-purple-100
                                            @elseif($user->role == 'manager') bg-green-100
                                            @else bg-blue-100 @endif
                                            flex items-center justify-center">
                                            <i class="fas fa-user 
                                                @if($user->role == 'admin') text-purple-600
                                                @elseif($user->role == 'manager') text-green-600
                                                @else text-blue-600 @endif"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $user->first_name }} {{ $user->last_name }}</p>
                                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="badge 
                                            @if($user->role == 'admin') badge-admin
                                            @elseif($user->role == 'manager') badge-manager
                                            @else badge-user @endif">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                        <p class="text-xs text-gray-400 mt-1">{{ $user->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Statistiques rapides -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl p-6 text-white fade-in" style="animation-delay: 0.6s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm">Taux de complétion</p>
                                <p class="text-4xl font-bold mt-2">{{ $tauxCompletion }}%</p>
                            </div>
                            <i class="fas fa-chart-simple text-4xl opacity-50"></i>
                        </div>
                        <div class="progress-container mt-4 bg-white/20">
                            <div class="progress-bar" style="width: {{ $tauxCompletion }}%; background: white"></div>
                        </div>
                        <p class="text-purple-100 text-sm mt-3">{{ $completedLivrables }} sur {{ $totalLivrables }} livrables terminés</p>
                    </div>
                    
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl p-6 text-white fade-in" style="animation-delay: 0.7s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm">Progression des tâches</p>
                                <p class="text-4xl font-bold mt-2">{{ $tauxTasks }}%</p>
                            </div>
                            <i class="fas fa-check-circle text-4xl opacity-50"></i>
                        </div>
                        <div class="progress-container mt-4 bg-white/20">
                            <div class="progress-bar" style="width: {{ $tauxTasks }}%; background: white"></div>
                        </div>
                        <p class="text-green-100 text-sm mt-3">{{ $completedTasks }} sur {{ $totalTasks }} tâches terminées</p>
                    </div>
                    
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl p-6 text-white fade-in" style="animation-delay: 0.8s">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100 text-sm">À venir</p>
                                <p class="text-4xl font-bold mt-2">{{ $notStartedLivrables }}</p>
                            </div>
                            <i class="fas fa-clock text-4xl opacity-50"></i>
                        </div>
                        <div class="mt-4">
                            <p class="text-orange-100 text-sm">Livrables à démarrer</p>
                        </div>
                        <p class="text-orange-100 text-sm mt-3">{{ $inProgressLivrables }} en cours de réalisation</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Graphique d'évolution
            const months = @json($months);
            const livrablesData = @json($livrablesData);
            const usersData = @json($usersData);
            
            const ctx = document.getElementById('evolutionChart').getContext('2d');
            new Chart(ctx, {
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
                            grid: {
                                color: '#e2e8f0'
                            },
                            title: {
                                display: true,
                                text: 'Nombre',
                                color: '#6b7280'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Mois',
                                color: '#6b7280'
                            }
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