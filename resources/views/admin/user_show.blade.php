<x-app-layout>
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Chart.js pour les graphiques -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
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
            --gray-900: #111827;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .slide-left {
            animation: slideInLeft 0.5s ease-out;
        }
        
        .slide-right {
            animation: slideInRight 0.5s ease-out;
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
        
        /* Profile Header */
        .profile-header {
            background: var(--primary-gradient);
            border-radius: 40px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            margin-bottom: 32px;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite;
        }
        
        .profile-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 12s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .profile-avatar-large {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 25px 40px -15px rgba(0,0,0,0.3);
            border: 4px solid rgba(255,255,255,0.3);
            position: relative;
            z-index: 1;
        }
        
        .profile-avatar-large span {
            font-size: 3.5rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Cartes d'information */
        .info-card {
            background: white;
            border-radius: 28px;
            padding: 24px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            height: 100%;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(102,126,234,0.15);
            border-color: var(--primary);
        }
        
        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea20, #764ba220);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        
        .info-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        .info-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
            color: var(--gray-400);
            margin-bottom: 8px;
        }
        
        .info-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--gray-800);
            line-height: 1.4;
        }
        
        /* Badges */
        .role-badge-large {
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            width: fit-content;
        }
        
        .role-badge-large.admin {
            background: linear-gradient(135deg, #667eea20, #764ba220);
            color: #667eea;
            border-left: 4px solid #667eea;
        }
        
        .role-badge-large.manager {
            background: linear-gradient(135deg, #10b98120, #05966920);
            color: #10b981;
            border-left: 4px solid #10b981;
        }
        
        .role-badge-large.consultant {
            background: linear-gradient(135deg, #3b82f620, #2563eb20);
            color: #3b82f6;
            border-left: 4px solid #3b82f6;
        }
        
        .status-badge-large {
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .status-badge-large.active {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-badge-large.inactive {
            background: #fee2e2;
            color: #991b1b;
        }
        
        /* Stats cards */
        .stat-mini-card {
            background: white;
            border-radius: 24px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(102,126,234,0.1);
        }
        
        .stat-mini-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102,126,234,0.1);
            border-color: var(--primary);
        }
        
        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Table des livrables */
        .deliverables-table-container {
            background: white;
            border-radius: 28px;
            padding: 24px;
            overflow-x: auto;
        }
        
        .deliverables-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .deliverables-table th {
            text-align: left;
            padding: 16px 12px;
            font-weight: 600;
            color: var(--gray-500);
            border-bottom: 2px solid var(--gray-200);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .deliverables-table td {
            padding: 16px 12px;
            border-bottom: 1px solid var(--gray-100);
        }
        
        .deliverables-table tr:hover {
            background: var(--gray-50);
        }
        
        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, var(--primary), var(--secondary));
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 24px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -34px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary);
            border: 2px solid white;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.2);
        }
        
        .timeline-date {
            font-size: 0.7rem;
            color: var(--gray-400);
            margin-bottom: 4px;
        }
        
        .timeline-content {
            font-size: 0.85rem;
            color: var(--gray-600);
            line-height: 1.5;
        }
        
        /* Progress bar */
        .progress-container {
            background: var(--gray-200);
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
        
        /* Buttons */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            background: white;
            border-radius: 50px;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
        }
        
        .btn-back:hover {
            transform: translateX(-5px);
            box-shadow: 0 10px 25px rgba(102,126,234,0.2);
            border-color: var(--primary);
        }
        
        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102,126,234,0.4);
        }
        
        /* Badge statut livrable */
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .status-badge.completed {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-badge.in-progress {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status-badge.not-started {
            background: #e5e7eb;
            color: #374151;
        }
        
        .status-badge.fq-review {
            background: #ede9fe;
            color: #5b21b6;
        }
        
        .status-badge.standby {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-badge.cancelled {
            background: #fee2e2;
            color: #991b1b;
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
            .profile-header {
                padding: 24px;
            }
            .profile-avatar-large {
                width: 80px;
                height: 80px;
            }
            .profile-avatar-large span {
                font-size: 2rem;
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
                    <a href="{{ route('admin.users') }}" class="sidebar-item active flex items-center space-x-3 p-3">
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
                        <i class="fas fa-user-circle text-purple-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Détails de l'utilisateur</h2>
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
                    $user = $user ?? null;
                    if (!$user) {
                        // Simulation de données pour l'exemple
                        $user = (object) [
                            'id' => 1,
                            'first_name' => 'Jean',
                            'last_name' => 'Dupont',
                            'email' => 'jean.dupont@example.com',
                            'role' => 'consultant',
                            'is_active' => true,
                            'created_at' => now()->subMonths(6),
                            'updated_at' => now()->subDays(5),
                            'bio' => 'Expert en développement web avec 8 ans d\'expérience. Passionné par les technologies innovantes et la gestion de projet.'
                        ];
                    }
                    
                    // Statistiques de l'utilisateur
                    $totalLivrables = isset($user->livrables) ? $user->livrables->count() : rand(5, 25);
                    $completedLivrables = isset($user->livrables) ? $user->livrables->where('status', 'completed')->count() : rand(1, 10);
                    $inProgressLivrables = isset($user->livrables) ? $user->livrables->where('status', 'in progress')->count() : rand(1, 8);
                    $totalTasks = isset($user->tasks) ? $user->tasks->count() : rand(10, 50);
                    $completedTasks = isset($user->tasks) ? $user->tasks->where('status', 'terminé')->count() : rand(3, 30);
                    
                    $completionRate = $totalLivrables > 0 ? round(($completedLivrables / $totalLivrables) * 100, 1) : 0;
                    $tasksRate = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100, 1) : 0;
                    
                    // Derniers livrables
                    $recentLivrables = isset($user->livrables) ? $user->livrables->sortByDesc('created_at')->take(5) : collect([]);
                    
                    // Activités récentes
                    $activities = [
                        ['date' => now()->subDays(2), 'action' => 'a complété le livrable "Rapport mensuel"', 'type' => 'completed'],
                        ['date' => now()->subDays(5), 'action' => 'a commencé le livrable "Documentation API"', 'type' => 'started'],
                        ['date' => now()->subDays(8), 'action' => 'a mis à jour le livrable "Analyse des besoins"', 'type' => 'updated'],
                        ['date' => now()->subDays(12), 'action' => 'a créé un nouveau livrable', 'type' => 'created'],
                        ['date' => now()->subDays(15), 'action' => 'a terminé 3 tâches', 'type' => 'task_completed'],
                    ];
                    
                    $roleColors = [
                        'admin' => ['bg' => '#667eea20', 'color' => '#667eea', 'icon' => 'fa-user-shield'],
                        'manager' => ['bg' => '#10b98120', 'color' => '#10b981', 'icon' => 'fa-chart-line'],
                        'consultant' => ['bg' => '#3b82f620', 'color' => '#3b82f6', 'icon' => 'fa-user-tie']
                    ];
                    
                    $roleInfo = $roleColors[$user->role] ?? $roleColors['consultant'];
                @endphp
                
                <!-- Bouton retour -->
                <div class="mb-6 flex justify-between items-center flex-wrap gap-4">
                    <a href="{{ route('admin.users') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Retour à la liste
                    </a>
                    
                </div>
                
                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="relative z-10 flex flex-wrap items-center gap-8">
                        <div class="profile-avatar-large">
                            <span>{{ strtoupper(substr($user->first_name,0,1)) }}{{ strtoupper(substr($user->last_name,0,1)) }}</span>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $user->first_name }} {{ $user->last_name }}</h1>
                            <div class="flex flex-wrap gap-3 mt-3">
                                <span class="role-badge-large {{ $user->role }}">
                                    <i class="fas {{ $roleInfo['icon'] }}"></i>
                                    {{ ucfirst($user->role) }}
                                </span>
                                <span class="status-badge-large {{ $user->is_active ? 'active' : 'inactive' }}">
                                    <i class="fas {{ $user->is_active ? 'fa-circle' : 'fa-ban' }}"></i>
                                    {{ $user->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                                <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Membre depuis {{ $user->created_at->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-2xl">
                                <p class="text-white/80 text-sm">ID Utilisateur</p>
                                <p class="text-white font-bold text-xl">#{{ $user->id }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cartes d'informations personnelles simplifiées -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="info-card fade-in">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $user->email }}</div>
                    </div>
                    
                    <div class="info-card fade-in" style="animation-delay: 0.1s">
                        <div class="info-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="info-label">Dernière modification</div>
                        <div class="info-value">{{ $user->updated_at->format('d/m/Y à H:i') }}</div>
                    </div>
                </div>
                
                <!-- Bio -->
                @if(isset($user->bio) && $user->bio)
                <div class="info-card mb-8 fade-in" style="animation-delay: 0.2s">
                    <div class="flex items-start gap-4">
                        <div class="info-icon">
                            <i class="fas fa-user-astronaut"></i>
                        </div>
                        <div class="flex-1">
                            <div class="info-label">Biographie</div>
                            <p class="text-gray-600 leading-relaxed">{{ $user->bio }}</p>
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Statistiques de l'utilisateur -->
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-chart-line text-purple-500 mr-2"></i>
                    Statistiques d'activité
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="stat-mini-card fade-in" style="animation-delay: 0.3s">
                        <i class="fas fa-folder-open text-3xl text-purple-400 mb-3"></i>
                        <div class="stat-number">{{ $totalLivrables }}</div>
                        <p class="text-gray-500 text-sm mt-1">Livrables</p>
                        <div class="progress-container mt-3">
                            <div class="progress-bar" style="width: {{ $completionRate }}%"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">{{ $completedLivrables }} terminés ({{ $completionRate }}%)</p>
                    </div>
                    
                    <div class="stat-mini-card fade-in" style="animation-delay: 0.4s">
                        <i class="fas fa-tasks text-3xl text-blue-400 mb-3"></i>
                        <div class="stat-number">{{ $totalTasks }}</div>
                        <p class="text-gray-500 text-sm mt-1">Tâches</p>
                        <div class="progress-container mt-3">
                            <div class="progress-bar" style="width: {{ $tasksRate }}%; background: #3b82f6"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">{{ $completedTasks }} terminées ({{ $tasksRate }}%)</p>
                    </div>
                    
                    <div class="stat-mini-card fade-in" style="animation-delay: 0.5s">
                        <i class="fas fa-play-circle text-3xl text-orange-400 mb-3"></i>
                        <div class="stat-number">{{ $inProgressLivrables }}</div>
                        <p class="text-gray-500 text-sm mt-1">En cours</p>
                        <p class="text-xs text-gray-400 mt-2">Livrables actifs</p>
                    </div>
                    
                    <div class="stat-mini-card fade-in" style="animation-delay: 0.6s">
                        <i class="fas fa-check-circle text-3xl text-green-400 mb-3"></i>
                        <div class="stat-number">{{ $completedLivrables }}</div>
                        <p class="text-gray-500 text-sm mt-1">Taux de succès</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $completionRate }}% des livrables</p>
                    </div>
                </div>
                
                <!-- Derniers livrables -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-clock text-purple-500 mr-2"></i>
                        Derniers livrables
                    </h3>
                    <div class="deliverables-table-container">
                        <div class="overflow-x-auto">
                            <table class="deliverables-table">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Statut</th>
                                        <th>Date de création</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentLivrables as $livrable)
                                    <tr>
                                        <td class="font-medium text-gray-800">{{ $livrable->titre }}</td>
                                        <td>
                                            <span class="status-badge {{ str_replace(' ', '-', strtolower($livrable->status)) }}">
                                                <i class="fas 
                                                    @if($livrable->status == 'completed') fa-check-circle
                                                    @elseif($livrable->status == 'in progress') fa-spinner fa-spin
                                                    @elseif($livrable->status == 'not started') fa-clock
                                                    @elseif($livrable->status == 'FQ review') fa-clipboard-check
                                                    @elseif($livrable->status == 'standby') fa-pause-circle
                                                    @else fa-times-circle @endif">
                                                </i>
                                                {{ ucfirst($livrable->status) }}
                                            </span>
                                        </td>
                                        <td class="text-gray-500">{{ $livrable->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-8 text-gray-500">
                                            <i class="fas fa-inbox text-3xl mb-2 text-gray-300"></i>
                                            <p>Aucun livrable trouvé</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline des activités et informations système -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Activités récentes -->
                    <div class="info-card">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-history text-purple-500 mr-2"></i>
                            Activités récentes
                        </h3>
                        <div class="timeline">
                            @foreach($activities as $activity)
                            <div class="timeline-item">
                                <div class="timeline-date">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($activity['date'])->format('d/m/Y') }}
                                </div>
                                <div class="timeline-content">
                                    <span class="font-medium text-gray-800">{{ $user->first_name }}</span>
                                    {{ $activity['action'] }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Informations système -->
                    <div class="info-card">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-purple-500 mr-2"></i>
                            Informations système
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-500">Date d'inscription</span>
                                <span class="font-medium text-gray-700">{{ $user->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-500">Dernière modification</span>
                                <span class="font-medium text-gray-700">{{ $user->updated_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-500">ID unique</span>
                                <span class="font-mono text-sm text-gray-600">#{{ $user->id }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-500">Statut du compte</span>
                                <span class="status-badge-large {{ $user->is_active ? 'active' : 'inactive' }}" style="padding: 4px 12px; font-size: 0.7rem;">
                                    <i class="fas {{ $user->is_active ? 'fa-circle' : 'fa-ban' }}"></i>
                                    {{ $user->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Graphique d'activité simplifié -->
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <p class="text-sm text-gray-500 mb-3">Activité mensuelle (livrables créés)</p>
                            <div class="h-32">
                                <canvas id="activityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des barres de progression
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 200);
            });
            
            // Graphique d'activité
            const ctx = document.getElementById('activityChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                        datasets: [{
                            label: 'Livrables',
                            data: [2, 3, 5, 4, 7, 6],
                            borderColor: '#667eea',
                            backgroundColor: 'rgba(102, 126, 234, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: true,
                            pointBackgroundColor: '#667eea',
                            pointBorderColor: 'white',
                            pointBorderWidth: 2,
                            pointRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: { mode: 'index', intersect: false }
                        },
                        scales: {
                            y: { beginAtZero: true, grid: { color: '#e2e8f0' } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }
        });
    </script>
</x-app-layout>