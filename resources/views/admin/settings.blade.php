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
        
        /* Cartes de paramètres */
        .settings-card {
            background: white;
            border-radius: 28px;
            padding: 28px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            transition: all 0.3s ease;
        }
        
        .settings-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(102,126,234,0.15);
            border-color: var(--primary);
        }
        
        .settings-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .settings-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea20, #764ba220);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .settings-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        .settings-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--gray-800);
        }
        
        .settings-subtitle {
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-top: 4px;
        }
        
        /* Formulaires */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }
        
        .form-label i {
            margin-right: 6px;
            color: var(--primary);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }
        
        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            font-size: 0.9rem;
            background: white;
            cursor: pointer;
        }
        
        .form-select:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        /* Toggle switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 28px;
        }
        
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #cbd5e1;
            transition: 0.3s;
            border-radius: 34px;
        }
        
        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.3s;
            border-radius: 50%;
        }
        
        input:checked + .toggle-slider {
            background-color: var(--primary);
        }
        
        input:checked + .toggle-slider:before {
            transform: translateX(24px);
        }
        
        /* Boutons */
        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102,126,234,0.4);
        }
        
        .btn-secondary {
            background: #f3f4f6;
            color: var(--gray-700);
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-secondary:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-danger:hover {
            background: #fecaca;
            transform: translateY(-2px);
        }
        
        /* Message de succès */
        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 12px 20px;
            border-radius: 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 4px solid #10b981;
        }
        
        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 20px;
            border-radius: 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 4px solid #ef4444;
        }
        
        /* Grid */
        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }
        
        /* Badge */
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            background: #e5e7eb;
            color: #374151;
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
            .settings-grid {
                grid-template-columns: 1fr;
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
                    <a href="{{ route('admin.statistiques') }}" class="sidebar-item flex items-center space-x-3 p-3 text-gray-700">
                        <i class="fas fa-chart-pie w-5"></i>
                        <span>Statistiques</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="sidebar-item active flex items-center space-x-3 p-3">
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
                        <i class="fas fa-cog text-purple-500 text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-800">Paramètres</h2>
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
                <!-- En-tête -->
                <div class="gradient-header">
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold mb-2">
                            <i class="fas fa-sliders-h mr-3"></i>
                            Paramètres de l'application
                        </h1>
                        <p class="text-purple-100">Gérez les configurations globales de la plateforme</p>
                    </div>
                </div>
                
                @if(session('success'))
                <div class="success-message fade-in">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
                @endif
                
                @if(session('error'))
                <div class="error-message fade-in">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ session('error') }}
                </div>
                @endif
                
                <!-- Paramètres Généraux -->
                <div class="settings-card fade-in">
                    <div class="settings-header">
                        <div class="settings-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Paramètres Généraux</h3>
                            <p class="settings-subtitle">Configuration de base de l'application</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.settings.general') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-building"></i> Nom de l'application
                                </label>
                                <input type="text" name="app_name" class="form-control" value="{{ config('app.name', 'GestionLivrable') }}" placeholder="Nom de l'application">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i> Email de contact
                                </label>
                                <input type="email" name="contact_email" class="form-control" value="{{ config('mail.from.address', 'admin@example.com') }}" placeholder="contact@example.com">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i> Fuseau horaire
                                </label>
                                <select name="timezone" class="form-select">
                                    <option value="UTC" {{ config('app.timezone') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                    <option value="Europe/Paris" {{ config('app.timezone') == 'Europe/Paris' ? 'selected' : '' }}>Europe/Paris</option>
                                    <option value="America/New_York" {{ config('app.timezone') == 'America/New_York' ? 'selected' : '' }}>America/New York</option>
                                    <option value="Asia/Tokyo" {{ config('app.timezone') == 'Asia/Tokyo' ? 'selected' : '' }}>Asia/Tokyo</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-language"></i> Langue par défaut
                                </label>
                                <select name="locale" class="form-select">
                                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Paramètres des Statuts -->
                <div class="settings-card fade-in" style="animation-delay: 0.1s">
                    <div class="settings-header">
                        <div class="settings-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Gestion des Statuts</h3>
                            <p class="settings-subtitle">Personnalisez les statuts des livrables</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.settings.statuses') }}" method="POST">
                        @csrf
                        <div class="settings-grid">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-check-circle" style="color: #10b981"></i> Completed
                                </label>
                                <input type="text" name="status_completed" class="form-control" value="Completed" placeholder="Completed">
                                <p class="text-xs text-gray-400 mt-1">Livrables terminés</p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-spinner" style="color: #3b82f6"></i> In Progress
                                </label>
                                <input type="text" name="status_in_progress" class="form-control" value="In Progress" placeholder="In Progress">
                                <p class="text-xs text-gray-400 mt-1">Livrables en cours</p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clipboard-check" style="color: #8b5cf6"></i> FQ Review
                                </label>
                                <input type="text" name="status_fq_review" class="form-control" value="FQ Review" placeholder="FQ Review">
                                <p class="text-xs text-gray-400 mt-1">Livrables en révision</p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock" style="color: #9ca3af"></i> Not Started
                                </label>
                                <input type="text" name="status_not_started" class="form-control" value="Not Started" placeholder="Not Started">
                                <p class="text-xs text-gray-400 mt-1">Livrables non démarrés</p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-pause-circle" style="color: #f59e0b"></i> Standby
                                </label>
                                <input type="text" name="status_standby" class="form-control" value="Standby" placeholder="Standby">
                                <p class="text-xs text-gray-400 mt-1">Livrables en pause</p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-times-circle" style="color: #ef4444"></i> Cancelled
                                </label>
                                <input type="text" name="status_cancelled" class="form-control" value="Cancelled" placeholder="Cancelled">
                                <p class="text-xs text-gray-400 mt-1">Livrables annulés</p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Enregistrer les statuts
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Paramètres des Types -->
                <div class="settings-card fade-in" style="animation-delay: 0.2s">
                    <div class="settings-header">
                        <div class="settings-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Gestion des Types</h3>
                            <p class="settings-subtitle">Personnalisez les types de livrables</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.settings.types') }}" method="POST">
                        @csrf
                        <div class="settings-grid">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-file-signature" style="color: #667eea"></i> Tender
                                </label>
                                <input type="text" name="type_tender" class="form-control" value="TENDER" placeholder="TENDER">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-chart-line" style="color: #10b981"></i> CBC
                                </label>
                                <input type="text" name="type_cbc" class="form-control" value="CBC" placeholder="CBC">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-file-alt" style="color: #f59e0b"></i> DTRF
                                </label>
                                <input type="text" name="type_dtrf" class="form-control" value="DTRF" placeholder="DTRF">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-check-double" style="color: #8b5cf6"></i> STANDARD
                                </label>
                                <input type="text" name="type_standard" class="form-control" value="STANDARD" placeholder="STANDARD">
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Enregistrer les types
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Paramètres de Sécurité -->
                <div class="settings-card fade-in" style="animation-delay: 0.3s">
                    <div class="settings-header">
                        <div class="settings-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Sécurité</h3>
                            <p class="settings-subtitle">Gérez les paramètres de sécurité</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.settings.security') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-key"></i> Longueur minimale du mot de passe
                                </label>
                                <input type="number" name="min_password_length" class="form-control" value="8" min="6" max="20">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i> Durée de session (minutes)
                                </label>
                                <input type="number" name="session_timeout" class="form-control" value="120" min="15" max="480">
                            </div>
                            
                            <div class="form-group">
                                <div class="flex justify-between items-center">
                                    <label class="form-label">
                                        <i class="fas fa-lock"></i> Authentification à deux facteurs
                                    </label>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="two_factor_auth" value="1">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Activer la double authentification pour les administrateurs</p>
                            </div>
                            
                            <div class="form-group">
                                <div class="flex justify-between items-center">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i> Notifications par email
                                    </label>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="email_notifications" value="1" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Recevoir des notifications par email</p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Enregistrer les paramètres de sécurité
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Gestion des Données -->
                <div class="settings-card fade-in" style="animation-delay: 0.4s">
                    <div class="settings-header">
                        <div class="settings-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Gestion des Données</h3>
                            <p class="settings-subtitle">Export, import et sauvegarde des données</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <button onclick="exportData('users')" class="btn-secondary w-full">
                                <i class="fas fa-users"></i> Exporter les utilisateurs
                            </button>
                        </div>
                        <div>
                            <button onclick="exportData('livrables')" class="btn-secondary w-full">
                                <i class="fas fa-folder-open"></i> Exporter les livrables
                            </button>
                        </div>
                        <div>
                            <button onclick="exportData('all')" class="btn-primary w-full">
                                <i class="fas fa-download"></i> Exporter toutes les données
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <button onclick="backupDatabase()" class="btn-secondary w-full">
                                    <i class="fas fa-archive"></i> Sauvegarder la base de données
                                </button>
                            </div>
                            <div>
                                <button onclick="clearCache()" class="btn-secondary w-full">
                                    <i class="fas fa-broom"></i> Vider le cache
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Zone Danger -->
                <div class="settings-card fade-in" style="animation-delay: 0.5s; border: 1px solid #fee2e2;">
                    <div class="settings-header">
                        <div class="settings-icon" style="background: #fee2e2;">
                            <i class="fas fa-exclamation-triangle" style="color: #ef4444;"></i>
                        </div>
                        <div>
                            <h3 class="settings-title" style="color: #991b1b;">Zone Danger</h3>
                            <p class="settings-subtitle">Actions irréversibles - Manipuler avec précaution</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <button onclick="resetSystem()" class="btn-danger w-full" style="background: #fee2e2; color: #991b1b;">
                                <i class="fas fa-redo-alt"></i> Réinitialiser les paramètres
                            </button>
                            <p class="text-xs text-gray-400 mt-2">Réinitialiser tous les paramètres aux valeurs par défaut</p>
                        </div>
                        <div>
                            <button onclick="clearAllData()" class="btn-danger w-full" style="background: #fee2e2; color: #991b1b;">
                                <i class="fas fa-trash-alt"></i> Supprimer toutes les données
                            </button>
                            <p class="text-xs text-gray-400 mt-2">⚠️ Supprime tous les livrables, tâches et utilisateurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        // Fonctions d'export
        function exportData(type) {
            if (type === 'users') {
                alert('Export des utilisateurs en cours...');
                // Simuler l'export
                setTimeout(() => {
                    window.location.href = '/admin/export/users';
                }, 500);
            } else if (type === 'livrables') {
                alert('Export des livrables en cours...');
                setTimeout(() => {
                    window.location.href = '/admin/export/livrables';
                }, 500);
            } else if (type === 'all') {
                if (confirm('Exporter toutes les données ? Cette opération peut prendre quelques instants.')) {
                    alert('Export de toutes les données en cours...');
                    setTimeout(() => {
                        window.location.href = '/admin/export/all';
                    }, 500);
                }
            }
        }
        
        function backupDatabase() {
            if (confirm('Créer une sauvegarde de la base de données ?')) {
                alert('Sauvegarde en cours...');
                setTimeout(() => {
                    window.location.href = '/admin/backup';
                }, 500);
            }
        }
        
        function clearCache() {
            if (confirm('Vider le cache de l\'application ?')) {
                alert('Nettoyage du cache en cours...');
                fetch('/admin/clear-cache', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Cache vidé avec succès !');
                    } else {
                        alert('Erreur lors du nettoyage du cache');
                    }
                });
            }
        }
        
        function resetSystem() {
            if (confirm('⚠️ ATTENTION : Cette action réinitialisera tous les paramètres par défaut. Êtes-vous sûr ?')) {
                if (confirm('Confirmation finale : Voulez-vous vraiment réinitialiser tous les paramètres ?')) {
                    alert('Réinitialisation en cours...');
                    fetch('/admin/reset-settings', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Paramètres réinitialisés avec succès !');
                            location.reload();
                        } else {
                            alert('Erreur lors de la réinitialisation');
                        }
                    });
                }
            }
        }
        
        function clearAllData() {
            if (confirm('⚠️ ATTENTION : Cette action supprimera TOUTES les données (utilisateurs, livrables, tâches). Cette action est irréversible !')) {
                if (confirm('Confirmation finale : Voulez-vous vraiment supprimer toutes les données ?')) {
                    if (confirm('DERNIER AVERTISSEMENT : Tapez "SUPPRIMER" pour confirmer')) {
                        const confirmation = prompt('Tapez "SUPPRIMER" pour confirmer la suppression de toutes les données :');
                        if (confirmation === 'SUPPRIMER') {
                            alert('Suppression en cours...');
                            fetch('/admin/clear-all-data', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Toutes les données ont été supprimées avec succès !');
                                    location.reload();
                                } else {
                                    alert('Erreur lors de la suppression des données');
                                }
                            });
                        } else {
                            alert('Suppression annulée');
                        }
                    }
                }
            }
        }
        
        // Animation des cartes au scroll
        const cards = document.querySelectorAll('.settings-card');
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</x-app-layout>