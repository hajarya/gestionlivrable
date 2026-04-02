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
        
        /* Cartes */
        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 24px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(102,126,234,0.15);
        }
        
        /* Table utilisateurs */
        .users-table-container {
            background: white;
            border-radius: 28px;
            padding: 24px;
            box-shadow: 0 15px 35px -15px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        
        .users-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .users-table th {
            text-align: left;
            padding: 16px 12px;
            font-weight: 600;
            color: #4b5563;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .users-table td {
            padding: 16px 12px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }
        
        .users-table tr:hover {
            background: #f9fafb;
        }
        
        /* Badges de rôle */
        .role-badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
        }
        
        .role-badge.admin {
            background: linear-gradient(135deg, #667eea20, #764ba220);
            color: #667eea;
            border-left: 3px solid #667eea;
        }
        
        .role-badge.manager {
            background: linear-gradient(135deg, #10b98120, #05966920);
            color: #10b981;
            border-left: 3px solid #10b981;
        }
        
        .role-badge.consultant {
            background: linear-gradient(135deg, #3b82f620, #2563eb20);
            color: #3b82f6;
            border-left: 3px solid #3b82f6;
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
            width: fit-content;
        }
        
        .status-badge.active {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-badge.inactive {
            background: #fee2e2;
            color: #991b1b;
        }
        
        /* Avatar */
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(102,126,234,0.3);
        }
        
        /* Boutons d'action */
        .action-btn {
            padding: 8px;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: transparent;
            border: none;
        }
        
        .action-btn.edit {
            color: #667eea;
        }
        
        .action-btn.edit:hover {
            background: #667eea10;
            transform: scale(1.1);
        }
        
        .action-btn.delete {
            color: #ef4444;
        }
        
        .action-btn.delete:hover {
            background: #ef444410;
            transform: scale(1.1);
        }
        
        .action-btn.view {
            color: #10b981;
        }
        
        .action-btn.view:hover {
            background: #10b98110;
            transform: scale(1.1);
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
        
        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(8px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }
        
        .modal-content {
            background: white;
            border-radius: 32px;
            max-width: 500px;
            width: 90%;
            padding: 32px;
            animation: slideIn 0.3s ease;
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
        
        /* Bouton ajouter */
        .btn-add {
            background: white;
            color: var(--primary);
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
            .users-table th, .users-table td {
                padding: 12px 8px;
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
                        <i class="fas fa-users text-purple-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Gestion des utilisateurs</h2>
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
                    // Statistiques des utilisateurs
                    $totalUsers = \App\Models\User::count();
                    $totalAdmins = \App\Models\User::where('role', 'admin')->count();
                    $totalManagers = \App\Models\User::where('role', 'manager')->count();
                    $totalConsultants = \App\Models\User::where('role', 'consultant')->count();
                    $activeUsers = \App\Models\User::where('is_active', true)->count();
                    
                    // Récupération des utilisateurs avec pagination
                    $users = \App\Models\User::orderBy('created_at', 'desc')->paginate(10);
                @endphp
                
                <!-- En-tête -->
                <div class="gradient-header">
                    <div class="relative z-10 flex justify-between items-center flex-wrap gap-4">
                        <div>
                            <h1 class="text-3xl font-bold mb-2">
                                <i class="fas fa-users mr-3"></i>
                                Gestion des utilisateurs
                            </h1>
                            <p class="text-purple-100">Gérez tous les comptes utilisateurs de la plateforme</p>
                        </div>
                        <button onclick="openAddUserModal()" class="btn-add">
                            <i class="fas fa-plus"></i>
                            Ajouter un utilisateur
                        </button>
                    </div>
                </div>
                
                <!-- Cartes statistiques -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                    <div class="stat-card fade-in">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Total</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">utilisateurs</p>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.1s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Administrateurs</p>
                                <p class="text-3xl font-bold text-purple-600">{{ $totalAdmins }}</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-shield text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.2s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Managers</p>
                                <p class="text-3xl font-bold text-green-600">{{ $totalManagers }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.3s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Consultants</p>
                                <p class="text-3xl font-bold text-blue-600">{{ $totalConsultants }}</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-tie text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card fade-in" style="animation-delay: 0.4s">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Actifs</p>
                                <p class="text-3xl font-bold text-emerald-600">{{ $activeUsers }}</p>
                            </div>
                            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-emerald-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Filtres et recherche -->
                <div class="filters-section">
                    <div class="flex flex-wrap gap-4 items-center">
                        <div class="search-wrapper flex-1 min-w-[200px]">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" placeholder="Rechercher par nom, email ou rôle...">
                        </div>
                        <select id="roleFilter" class="filter-select">
                            <option value="all">Tous les rôles</option>
                            <option value="admin">Administrateurs</option>
                            <option value="manager">Managers</option>
                            <option value="consultant">Consultants</option>
                        </select>
                        <select id="statusFilter" class="filter-select">
                            <option value="all">Tous les statuts</option>
                            <option value="active">Actifs</option>
                            <option value="inactive">Inactifs</option>
                        </select>
                        <button onclick="resetFilters()" class="px-4 py-2 bg-gray-100 rounded-xl hover:bg-gray-200 transition">
                            <i class="fas fa-undo-alt"></i> Réinitialiser
                        </button>
                    </div>
                </div>
                
                <!-- Tableau des utilisateurs -->
                <div class="users-table-container">
                    <div class="overflow-x-auto">
                        <table class="users-table" id="usersTable">
                            <thead>
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Statut</th>
                                    <th>Date d'inscription</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="usersTableBody">
                                @foreach($users as $user)
                                <tr data-role="{{ $user->role }}" data-status="{{ $user->is_active ? 'active' : 'inactive' }}" data-name="{{ strtolower($user->first_name . ' ' . $user->last_name . ' ' . $user->email) }}">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="user-avatar">
                                                {{ strtoupper(substr($user->first_name,0,1)) }}
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                <p class="text-xs text-gray-500">ID: #{{ $user->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-gray-600">{{ $user->email }}</span>
                                    </td>
                                    <td>
                                        <span class="role-badge {{ $user->role }}">
                                            <i class="fas 
                                                @if($user->role == 'admin') fa-user-shield
                                                @elseif($user->role == 'manager') fa-chart-line
                                                @else fa-user-tie @endif">
                                            </i>
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $user->is_active ? 'active' : 'inactive' }}">
                                            <i class="fas {{ $user->is_active ? 'fa-circle' : 'fa-ban' }}"></i>
                                            {{ $user->is_active ? 'Actif' : 'Inactif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-gray-500 text-sm">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            <button onclick="viewUser({{ $user->id }})" class="action-btn view" data-tooltip="Voir détails">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="editUser({{ $user->id }})" class="action-btn edit" data-tooltip="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="deleteUser({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" class="action-btn delete" data-tooltip="Supprimer">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        <button onclick="changePage('prev')" id="prevBtn" disabled>
                            <i class="fas fa-chevron-left"></i> Précédent
                        </button>
                        <div id="pageNumbers" class="flex gap-2"></div>
                        <button onclick="changePage('next')" id="nextBtn">
                            Suivant <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Modal Ajouter/Modifier Utilisateur -->
    <div id="userModal" class="modal-overlay">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800" id="modalTitle">Ajouter un utilisateur</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>
            <form id="userForm" method="POST">
                @csrf
                <input type="hidden" id="userId" name="user_id">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                        <input type="text" id="firstName" name="first_name" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="lastName" name="last_name" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div id="passwordField">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input type="password" id="password" name="password" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Laisser vide pour conserver le mot de passe actuel (en modification)</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Rôle</label>
                        <select id="role" name="role" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                            <option value="consultant">Consultant</option>
                            <option value="manager">Manager</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                        <select id="status" name="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500">
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>
                    <div class="flex gap-3 pt-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-2 rounded-xl hover:shadow-lg transition">
                            <i class="fas fa-save mr-2"></i> Enregistrer
                        </button>
                        <button type="button" onclick="closeModal()" class="flex-1 bg-gray-100 text-gray-700 py-2 rounded-xl hover:bg-gray-200 transition">
                            Annuler
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        let currentPage = 1;
        const itemsPerPage = 10;
        let allUsers = [];
        
        // Initialisation des données utilisateurs
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer toutes les lignes du tableau
            const rows = document.querySelectorAll('#usersTableBody tr');
            rows.forEach(row => {
                allUsers.push({
                    element: row,
                    role: row.dataset.role,
                    status: row.dataset.status,
                    name: row.dataset.name
                });
            });
            
            updatePagination();
            setupFilters();
        });
        
        // Filtres
        function setupFilters() {
            const searchInput = document.getElementById('searchInput');
            const roleFilter = document.getElementById('roleFilter');
            const statusFilter = document.getElementById('statusFilter');
            
            function filterUsers() {
                const searchTerm = searchInput.value.toLowerCase();
                const roleValue = roleFilter.value;
                const statusValue = statusFilter.value;
                
                let visibleCount = 0;
                allUsers.forEach(user => {
                    const matchesSearch = user.name.includes(searchTerm);
                    const matchesRole = roleValue === 'all' || user.role === roleValue;
                    const matchesStatus = statusValue === 'all' || user.status === statusValue;
                    
                    if (matchesSearch && matchesRole && matchesStatus) {
                        user.element.style.display = '';
                        visibleCount++;
                    } else {
                        user.element.style.display = 'none';
                    }
                });
                
                // Mettre à jour la pagination
                updatePagination();
            }
            
            searchInput.addEventListener('input', filterUsers);
            roleFilter.addEventListener('change', filterUsers);
            statusFilter.addEventListener('change', filterUsers);
        }
        
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('roleFilter').value = 'all';
            document.getElementById('statusFilter').value = 'all';
            
            allUsers.forEach(user => {
                user.element.style.display = '';
            });
            
            updatePagination();
        }
        
        // Pagination
        function updatePagination() {
            const visibleRows = Array.from(document.querySelectorAll('#usersTableBody tr')).filter(row => row.style.display !== 'none');
            const totalPages = Math.ceil(visibleRows.length / itemsPerPage);
            
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage === totalPages || totalPages === 0;
            
            // Afficher les lignes de la page courante
            visibleRows.forEach((row, index) => {
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
            
            // Mettre à jour les numéros de page
            const pageNumbers = document.getElementById('pageNumbers');
            pageNumbers.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.onclick = () => goToPage(i);
                if (i === currentPage) btn.classList.add('active');
                pageNumbers.appendChild(btn);
            }
        }
        
        function goToPage(page) {
            currentPage = page;
            updatePagination();
        }
        
        function changePage(direction) {
            if (direction === 'prev' && currentPage > 1) {
                currentPage--;
                updatePagination();
            } else if (direction === 'next') {
                const visibleRows = Array.from(document.querySelectorAll('#usersTableBody tr')).filter(row => row.style.display !== 'none');
                const totalPages = Math.ceil(visibleRows.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            }
        }
        
        // Modal fonctions
        function openAddUserModal() {
            document.getElementById('modalTitle').textContent = 'Ajouter un utilisateur';
            document.getElementById('userForm').reset();
            document.getElementById('userId').value = '';
            document.getElementById('passwordField').style.display = 'block';
            document.getElementById('password').required = true;
            document.getElementById('userModal').style.display = 'flex';
        }
        
        function closeModal() {
            document.getElementById('userModal').style.display = 'none';
        }
        
        function editUser(userId) {
            // Simuler la récupération des données utilisateur
            fetch(`/admin/users/${userId}/edit`)
                .then(response => response.json())
                .then(user => {
                    document.getElementById('modalTitle').textContent = 'Modifier l\'utilisateur';
                    document.getElementById('userId').value = user.id;
                    document.getElementById('firstName').value = user.first_name;
                    document.getElementById('lastName').value = user.last_name;
                    document.getElementById('email').value = user.email;
                    document.getElementById('role').value = user.role;
                    document.getElementById('status').value = user.is_active ? '1' : '0';
                    document.getElementById('passwordField').style.display = 'block';
                    document.getElementById('password').required = false;
                    document.getElementById('userModal').style.display = 'flex';
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Erreur lors du chargement des données');
                });
        }
        
        function viewUser(userId) {
            window.location.href = `/admin/users/${userId}`;
        }
        
        function deleteUser(userId, userName) {
            if (confirm(`Êtes-vous sûr de vouloir supprimer l'utilisateur ${userName} ? Cette action est irréversible.`)) {
                fetch(`/admin/users/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Utilisateur supprimé avec succès');
                        location.reload();
                    } else {
                        alert('Erreur lors de la suppression');
                    }
                });
            }
        }
        
        // Formulaire d'ajout/modification
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const userId = document.getElementById('userId').value;
            const url = userId ? `/admin/users/${userId}` : '/admin/users';
            const method = userId ? 'PUT' : 'POST';
            
            const formData = {
                first_name: document.getElementById('firstName').value,
                last_name: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                role: document.getElementById('role').value,
                is_active: document.getElementById('status').value === '1'
            };
            
            if (document.getElementById('password').value) {
                formData.password = document.getElementById('password').value;
            }
            
            fetch(url, {
    method: 'POST', // ⚠️ toujours POST
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        ...formData,
        _method: userId ? 'PUT' : 'POST'
    })
})
.then(async response => {
    const data = await response.json();

    if (!response.ok) {
        console.error(data); // 🔥 afficher vraie erreur
        alert(data.message || 'Erreur serveur');
        return;
    }

    alert(userId ? 'Utilisateur modifié avec succès' : 'Utilisateur créé avec succès');
    location.reload();
})
.catch(error => {
    console.error('Erreur:', error);
    alert('Erreur lors de l\'enregistrement');
});
        });
        
        // Fermer le modal en cliquant à l'extérieur
        window.onclick = function(event) {
            const modal = document.getElementById('userModal');
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>
</x-app-layout>