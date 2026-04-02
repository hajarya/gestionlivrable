<x-app-layout>
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

        @keyframes barGrow {
            from {
                transform: scaleY(0);
                opacity: 0;
            }
            to {
                transform: scaleY(1);
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .slide-in {
            animation: slideIn 0.5s ease-out;
        }

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

        .chart-container {
            background: white;
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 15px 35px -15px rgba(0,0,0,0.15);
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .chart-bar {
            transition: height 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px 12px 0 0;
            position: relative;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
            transform-origin: bottom;
            animation: barGrow 0.8s ease-out;
        }

        .chart-bar:hover {
            filter: brightness(1.1);
            transform: scaleX(1.05) !important;
        }

        .chart-bar:hover::after {
            content: attr(data-value);
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: #2d3748;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            animation: fadeIn 0.2s ease;
        }

        .quick-action {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            border: 1px solid transparent;
            margin-bottom: 12px;
            text-decoration: none;
            color: inherit;
        }

        .quick-action:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateX(10px) scale(1.02);
            border-color: white;
            box-shadow: 0 20px 30px -10px rgba(102, 126, 234, 0.5);
        }

        .quick-action:hover .quick-action-icon {
            background: rgba(255,255,255,0.2);
            color: white;
            transform: rotate(360deg);
        }

        .quick-action-icon {
            width: 48px;
            height: 48px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .logo-banner-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            border-radius: 40px;
            padding: 25px 45px;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 25px 40px -15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255,255,255,0.3);
        }

        .logo-banner-container:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.08) rotate(2deg);
            box-shadow: 0 35px 50px -15px rgba(0, 0, 0, 0.4);
            border-color: rgba(255,255,255,0.5);
        }

        .logo-banner {
            width: auto;
            height: 150px;
            max-width: 400px;
            object-fit: contain;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));
        }

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

        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 10px;
        }

        .chart-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #2d3748;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            pointer-events: none;
            z-index: 10;
        }

        .hidden {
            display: none !important;
        }

        .chart-bar {
            transform: scaleY(0);
            transform-origin: bottom;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex">
        <!-- Sidebar -->
        <aside class="bg-white/90 backdrop-blur-lg shadow-2xl sidebar-fixed">
            <div class="sidebar-content">
                <div class="gradient-bg p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-5 rounded-full -ml-10 -mb-10"></div>
                    <div class="relative z-10">
                        <h1 class="text-2xl font-bold text-white tracking-tight">GestionLivrable</h1>
                        <p class="text-sm text-purple-200 font-medium mt-2">Espace Responsable</p>
                    </div>
                </div>

                <div class="p-6">
                    <div class="profile-card">
                        <div class="flex items-center space-x-4">
                            <div class="avatar">
                                {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-xl">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                <p class="text-sm text-gray-500">Responsable Projet</p>
                            </div>
                        </div>
                        
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

                <div class="px-4">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 px-3">MENU PRINCIPAL</p>
                    
                    <a href="{{ route('responsable.dashboard') }}" class="sidebar-item active flex items-center space-x-3 p-3 mb-1 group">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Dashboard</span>
                    </a>

                    <a href="{{ route('responsable.livrables') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Mes Livrables</span>
                        <span class="ml-auto bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs px-3 py-1.5 rounded-full font-semibold shadow-md">
                            {{ isset($livrables) ? count($livrables) : 0 }}
                        </span>
                    </a>

                    <a href="{{ route('responsable.livrables.create') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Créer un Livrable</span>
                    </a>

                    <a href="{{ route('responsable.statistiques') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18M19 21V10M12 21V3M7 21h10"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Statistiques</span>
                    </a>
                </div>

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

        <!-- Main -->
        <main class="flex-1 ml-72">
            <header class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-10">
                <div class="px-8 py-4 flex justify-between items-center">
                    <div class="flex items-center space-x-3 text-sm">
                        <a href="{{ route('responsable.dashboard') }}" class="text-gray-600 hover:text-purple-600 transition font-medium">Dashboard</a>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-purple-600 font-semibold bg-purple-50 px-3 py-1 rounded-full">Accueil</span>
                    </div>

                    <div class="relative group">
                        <input 
                            type="text" 
                            placeholder="Taper ici pour rechercher..." 
                            class="pl-12 pr-6 py-3 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-purple-200 focus:border-purple-400 w-96 bg-gray-50/80 backdrop-blur-sm transition-all group-hover:shadow-md"
                        />
                        <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5 group-hover:text-purple-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button class="relative p-2.5 hover:bg-purple-50 rounded-xl transition group">
                            <svg class="w-6 h-6 text-gray-600 group-hover:text-purple-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span class="absolute top-2 right-2 w-5 h-5 bg-gradient-to-r from-red-500 to-pink-500 rounded-full text-white text-xs flex items-center justify-center font-bold shadow-md">3</span>
                        </button>
                        <div class="w-11 h-11 rounded-xl gradient-bg flex items-center justify-center text-white text-base font-bold shadow-lg border-2 border-white">
                            {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8 space-y-8">
                <div class="gradient-bg rounded-3xl p-10 text-white fade-in relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-5 rounded-full -ml-20 -mb-20"></div>
                    
                    <div class="flex justify-between items-center relative z-10">
                        <div class="slide-in">
                            <h2 class="text-4xl font-bold mb-3">Bonjour, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} !</h2>
                            <p class="text-purple-100 text-xl">Voici un résumé de votre activité sur la plateforme</p>
                            <div class="mt-6 flex items-center space-x-4">
                                <div class="flex items-center space-x-3 bg-white/20 backdrop-blur-sm rounded-xl px-5 py-2.5 border border-white/30">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-medium">Mise à jour: {{ now()->format('d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="logo-banner-container">
                            <img src="{{ asset('images/logo-segula.png') }}" 
                                 alt="Segula" 
                                 class="logo-banner"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/400x150/ffffff/667eea?text=SEGULA'">
                        </div>
                    </div>
                </div>

                @php
                    $livrables = isset($livrables) ? $livrables : collect([]);
                    
                    $totalLivrables = count($livrables);
                    $inProgress = $livrables->filter(fn($l) => strtolower($l->status) === 'in progress')->count();
                    $completed = $livrables->filter(fn($l) => strtolower($l->status) === 'completed')->count();
                    $cancelled = $livrables->filter(fn($l) => strtolower($l->status) === 'cancelled')->count();
                    
                    $inProgressPourcentage = $totalLivrables > 0 ? round(($inProgress / $totalLivrables) * 100) : 0;
                    $completedPourcentage = $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100) : 0;
                    $cancelledPourcentage = $totalLivrables > 0 ? round(($cancelled / $totalLivrables) * 100) : 0;
                    
                    $tendanceTotal = '+5%';
                    $tendanceProgress = '+12%';
                    $tendanceCompleted = '+23%';
                    $tendanceCancelled = '-2%';
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="stat-card purple fade-in" style="animation-delay: 0.1s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-100 rounded-2xl">
                                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="badge badge-success text-base px-4 py-2">{{ $tendanceTotal }}</span>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $totalLivrables }}</h3>
                        <p class="text-gray-600 font-medium text-lg">Total Livrables</p>
                        <div class="mt-5">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500 font-medium">Progression</span>
                                <span class="font-bold text-purple-600">100%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="progress-bar bg-purple-600 h-3 rounded-full" style="width: 100%"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3 font-medium">100% du total</p>
                        </div>
                    </div>

                    <div class="stat-card fade-in" style="animation-delay: 0.2s; border-left: 5px solid #3b82f6;">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-100 rounded-2xl">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="badge text-base px-4 py-2" style="background: #dbeafe; color: #1e40af;">{{ $tendanceProgress }}</span>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $inProgress }}</h3>
                        <p class="text-gray-600 font-medium text-lg">In progress</p>
                        <div class="mt-5">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500 font-medium">Progression</span>
                                <span class="font-bold text-blue-600">{{ $inProgressPourcentage }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="progress-bar bg-blue-600 h-3 rounded-full" style="width: {{ $inProgressPourcentage }}%"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3 font-medium">{{ $inProgressPourcentage }}% en progression</p>
                        </div>
                    </div>

                    <div class="stat-card fade-in" style="animation-delay: 0.3s; border-left: 5px solid #10b981;">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 rounded-2xl">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="badge text-base px-4 py-2" style="background: #d1fae5; color: #065f46;">{{ $tendanceCompleted }}</span>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $completed }}</h3>
                        <p class="text-gray-600 font-medium text-lg">Completed</p>
                        <div class="mt-5">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500 font-medium">Réussite</span>
                                <span class="font-bold text-green-600">{{ $completedPourcentage }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="progress-bar bg-green-600 h-3 rounded-full" style="width: {{ $completedPourcentage }}%"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3 font-medium">{{ $completedPourcentage }}% de réussite</p>
                        </div>
                    </div>

                    <div class="stat-card fade-in" style="animation-delay: 0.4s; border-left: 5px solid #ef4444;">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-red-100 rounded-2xl">
                                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="badge text-base px-4 py-2" style="background: #fee2e2; color: #991b1b;">{{ $tendanceCancelled }}</span>
                        </div>
                        <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $cancelled }}</h3>
                        <p class="text-gray-600 font-medium text-lg">Cancelled</p>
                        <div class="mt-5">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-500 font-medium">Annulé</span>
                                <span class="font-bold text-red-600">{{ $cancelledPourcentage }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="progress-bar bg-red-500 h-3 rounded-full" style="width: {{ $cancelledPourcentage }}%"></div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3 font-medium">{{ $cancelledPourcentage }}% annulés</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <div class="chart-container fade-in">
                            <div class="flex justify-between items-center mb-8">
                                <h3 class="text-xl font-bold text-gray-800">Activité des Livrables</h3>
                                <select id="activite-periode" class="border border-gray-200 rounded-2xl px-5 py-2.5 text-sm bg-gray-50 focus:ring-4 focus:ring-purple-200 focus:border-purple-400 font-medium">
                                    <option value="semaine">Cette semaine</option>
                                    <option value="mois">Ce mois</option>
                                    <option value="annee">Cette année</option>
                                </select>
                            </div>
                            
                            @php
                                $now = now();
                                
                                $semaine = [];
                                for ($i = 0; $i < 7; $i++) {
                                    $date = $now->copy()->subDays(6 - $i)->startOfDay();
                                    $semaine[$date->format('Y-m-d')] = [
                                        'date' => $date,
                                        'count' => 0,
                                        'label' => $date->format('D')
                                    ];
                                }
                                
                                $mois = [];
                                for ($i = 0; $i < 30; $i++) {
                                    $date = $now->copy()->subDays(29 - $i)->startOfDay();
                                    $mois[$date->format('Y-m-d')] = [
                                        'date' => $date,
                                        'count' => 0,
                                        'label' => $date->format('d M')
                                    ];
                                }
                                
                                $annee = [];
                                for ($i = 0; $i < 12; $i++) {
                                    $date = $now->copy()->subMonths(11 - $i)->startOfMonth();
                                    $annee[$date->format('Y-m')] = [
                                        'date' => $date,
                                        'count' => 0,
                                        'label' => $date->format('M Y')
                                    ];
                                }
                                
                                if ($livrables->count() > 0) {
                                    foreach ($livrables as $livrable) {
                                        $createdAt = \Carbon\Carbon::parse($livrable->created_at);
                                        
                                        $dateKey = $createdAt->format('Y-m-d');
                                        if (isset($semaine[$dateKey])) {
                                            $semaine[$dateKey]['count']++;
                                        }
                                        
                                        if (isset($mois[$dateKey])) {
                                            $mois[$dateKey]['count']++;
                                        }
                                        
                                        $monthKey = $createdAt->format('Y-m');
                                        if (isset($annee[$monthKey])) {
                                            $annee[$monthKey]['count']++;
                                        }
                                    }
                                }
                                
                                $maxSemaine = max(array_column($semaine, 'count')) ?: 1;
                                $maxMois = max(array_column($mois, 'count')) ?: 1;
                                $maxAnnee = max(array_column($annee, 'count')) ?: 1;
                                
                                $totalActiviteSemaine = array_sum(array_column($semaine, 'count'));
                                $totalActiviteMois = array_sum(array_column($mois, 'count'));
                                $totalActiviteAnnee = array_sum(array_column($annee, 'count'));
                                
                                $moyenneSemaine = $totalActiviteSemaine > 0 ? round($totalActiviteSemaine / 7, 1) : 0;
                                $moyenneMois = $totalActiviteMois > 0 ? round($totalActiviteMois / 30, 1) : 0;
                                $moyenneAnnee = $totalActiviteAnnee > 0 ? round($totalActiviteAnnee / 12, 1) : 0;
                            @endphp

                            <div id="graphique-semaine" class="graphique-actif">
                                <div class="h-80 flex items-end justify-between space-x-2">
                                    @foreach($semaine as $jour)
                                        @php
                                            $hauteur = $jour['count'] > 0 ? round(($jour['count'] / $maxSemaine) * 180) + 20 : 20;
                                            $pourcentage = $maxSemaine > 0 ? round(($jour['count'] / $maxSemaine) * 100) : 0;
                                        @endphp
                                        <div class="flex-1 flex flex-col items-center group">
                                            <div class="relative w-full">
                                                <div class="w-full chart-bar transition-all duration-500 ease-out" 
                                                     style="height: {{ $hauteur }}px" 
                                                     data-value="{{ $jour['count'] }} livrables">
                                                </div>
                                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 whitespace-nowrap z-10 pointer-events-none">
                                                    <div class="font-bold">{{ $jour['date']->format('d/m/Y') }}</div>
                                                    <div class="text-purple-300">{{ $jour['count'] }} livrable(s)</div>
                                                    <div class="text-gray-400">{{ $pourcentage }}% du max</div>
                                                </div>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-600 mt-3">{{ $jour['label'] }}</span>
                                            <span class="text-xs font-bold text-purple-600 mt-1 bg-purple-50 px-2 py-1 rounded-full">{{ $jour['count'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div id="graphique-mois" class="graphique-inactif hidden">
                                <div class="h-80 overflow-x-auto flex items-end space-x-2 pb-2 custom-scrollbar">
                                    @foreach($mois as $jour)
                                        @php
                                            $hauteur = $jour['count'] > 0 ? round(($jour['count'] / $maxMois) * 180) + 20 : 20;
                                            $pourcentage = $maxMois > 0 ? round(($jour['count'] / $maxMois) * 100) : 0;
                                        @endphp
                                        <div class="flex-1 min-w-[60px] flex flex-col items-center group">
                                            <div class="relative w-full">
                                                <div class="w-full chart-bar transition-all duration-500 ease-out" 
                                                     style="height: {{ $hauteur }}px" 
                                                     data-value="{{ $jour['count'] }} livrables">
                                                </div>
                                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 whitespace-nowrap z-10">
                                                    <div class="font-bold">{{ $jour['date']->format('d/m/Y') }}</div>
                                                    <div class="text-purple-300">{{ $jour['count'] }} livrable(s)</div>
                                                    <div class="text-gray-400">{{ $pourcentage }}% du max</div>
                                                </div>
                                            </div>
                                            <span class="text-xs font-semibold text-gray-600 mt-3 transform -rotate-45 origin-top-left">{{ $jour['label'] }}</span>
                                            <span class="text-xs font-bold text-purple-600 mt-1">{{ $jour['count'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div id="graphique-annee" class="graphique-inactif hidden">
                                <div class="h-80 flex items-end justify-between space-x-4">
                                    @foreach($annee as $moisData)
                                        @php
                                            $hauteur = $moisData['count'] > 0 ? round(($moisData['count'] / $maxAnnee) * 180) + 20 : 20;
                                            $pourcentage = $maxAnnee > 0 ? round(($moisData['count'] / $maxAnnee) * 100) : 0;
                                        @endphp
                                        <div class="flex-1 flex flex-col items-center group">
                                            <div class="relative w-full">
                                                <div class="w-full chart-bar transition-all duration-500 ease-out" 
                                                     style="height: {{ $hauteur }}px" 
                                                     data-value="{{ $moisData['count'] }} livrables">
                                                </div>
                                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 whitespace-nowrap z-10">
                                                    <div class="font-bold">{{ $moisData['date']->format('F Y') }}</div>
                                                    <div class="text-purple-300">{{ $moisData['count'] }} livrable(s)</div>
                                                    <div class="text-gray-400">{{ $pourcentage }}% du max</div>
                                                </div>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-600 mt-3">{{ $moisData['label'] }}</span>
                                            <span class="text-xs font-bold text-purple-600 mt-1 bg-purple-50 px-2 py-1 rounded-full">{{ $moisData['count'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex justify-between mt-8 text-sm text-gray-500 bg-gray-50 p-4 rounded-2xl">
                                <span class="font-medium">
                                    <i class="fas fa-chart-line text-purple-500 mr-2"></i>
                                    Activité totale: <span class="text-gray-800 font-bold" id="total-activite">{{ $totalActiviteSemaine }}</span> livrables
                                </span>
                                <span class="font-medium">
                                    <i class="fas fa-calculator text-purple-500 mr-2"></i>
                                    Moyenne: <span class="text-gray-800 font-bold" id="moyenne-activite">{{ $moyenneSemaine }}</span>/jour
                                </span>
                                <span class="font-medium">
                                    <i class="fas fa-calendar text-purple-500 mr-2"></i>
                                    Période: <span class="text-gray-800 font-bold" id="periode-label">7 jours</span>
                                </span>
                            </div>

                            <div class="flex items-center justify-center mt-4 space-x-6">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gradient-to-b from-purple-500 to-indigo-600 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-500">Livrables créés</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gray-300 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-500">Période sans activité</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Partie droite modifiée -->
                    <div class="space-y-6">
                        <div class="bg-white rounded-3xl shadow-xl p-6 fade-in border border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-1 h-8 bg-gradient-to-b from-purple-600 to-purple-400 rounded-full mr-3"></span>
                                Actions Rapides
                            </h3>

                            <div class="space-y-3">
                                <a href="{{ route('responsable.livrables') }}" class="quick-action">
                                    <div class="quick-action-icon">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-lg">Nouveau Livrable</span>
                                </a>

                                <a href="https://teams.microsoft.com" target="_blank" class="quick-action">
                                    <div class="quick-action-icon">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-lg">Planifier réunion</span>
                                </a>

                                <a href="{{ route('responsable.livrables') }}" class="quick-action">
                                    <div class="quick-action-icon">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1 0v14m-7-4h14"></path>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-lg">Modifier Livrable</span>
                                </a>
                            </div>
                        </div>

                        <div class="bg-white rounded-3xl shadow-xl p-6 fade-in border border-gray-100">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="w-1 h-8 bg-gradient-to-b from-green-600 to-green-400 rounded-full mr-3"></span>
                                Répartition des Statuts
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="font-medium text-gray-600">In progress</span>
                                        <span class="font-bold text-blue-600">{{ $inProgress }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $inProgressPourcentage }}%"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="font-medium text-gray-600">Completed</span>
                                        <span class="font-bold text-green-600">{{ $completed }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-green-500 h-3 rounded-full" style="width: {{ $completedPourcentage }}%"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="font-medium text-gray-600">Cancelled</span>
                                        <span class="font-bold text-red-600">{{ $cancelled }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-red-500 h-3 rounded-full" style="width: {{ $cancelledPourcentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="gradient-bg rounded-3xl shadow-xl p-6 text-white fade-in">
                            <h3 class="text-xl font-bold mb-6 flex items-center">
                                <span class="w-1 h-8 bg-white rounded-full mr-3"></span>
                                Résumé Global
                            </h3>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                                    <span class="font-semibold">Total Livrables</span>
                                    <span class="text-sm bg-white/20 px-4 py-2 rounded-full font-bold">{{ $totalLivrables }}</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                                    <span class="font-semibold">Taux Completed</span>
                                    <span class="text-sm bg-white/20 px-4 py-2 rounded-full font-bold">{{ $completedPourcentage }}%</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                                    <span class="font-semibold">Taux In progress</span>
                                    <span class="text-sm bg-white/20 px-4 py-2 rounded-full font-bold">{{ $inProgressPourcentage }}%</span>
                                </div>
                            </div>

                            <a href="{{ route('responsable.statistiques') }}" class="mt-6 block w-full text-center bg-white text-purple-600 py-4 rounded-2xl font-bold text-lg hover:bg-opacity-90 transition shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                                Voir les statistiques
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const periodeSelect = document.getElementById('activite-periode');
            const graphSemaine = document.getElementById('graphique-semaine');
            const graphMois = document.getElementById('graphique-mois');
            const graphAnnee = document.getElementById('graphique-annee');
            const totalActivite = document.getElementById('total-activite');
            const moyenneActivite = document.getElementById('moyenne-activite');
            const periodeLabel = document.getElementById('periode-label');

            const stats = {
                semaine: {
                    total: {{ $totalActiviteSemaine }},
                    moyenne: {{ $moyenneSemaine }},
                    periode: '7 jours'
                },
                mois: {
                    total: {{ $totalActiviteMois }},
                    moyenne: {{ $moyenneMois }},
                    periode: '30 jours'
                },
                annee: {
                    total: {{ $totalActiviteAnnee }},
                    moyenne: {{ $moyenneAnnee }},
                    periode: '12 mois'
                }
            };

            function updateGraph(periode) {
                graphSemaine.classList.add('hidden');
                graphMois.classList.add('hidden');
                graphAnnee.classList.add('hidden');
                
                if (periode === 'semaine') {
                    graphSemaine.classList.remove('hidden');
                } else if (periode === 'mois') {
                    graphMois.classList.remove('hidden');
                } else if (periode === 'annee') {
                    graphAnnee.classList.remove('hidden');
                }
                
                totalActivite.textContent = stats[periode].total;
                moyenneActivite.textContent = stats[periode].moyenne;
                periodeLabel.textContent = stats[periode].periode;
            }

            periodeSelect.addEventListener('change', function(e) {
                updateGraph(e.target.value);
            });

            setTimeout(() => {
                document.querySelectorAll('.chart-bar').forEach(bar => {
                    bar.style.transform = 'scaleY(1)';
                });
            }, 100);
        });
    </script>
</x-app-layout>