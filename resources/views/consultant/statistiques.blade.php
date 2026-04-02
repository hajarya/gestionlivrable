<x-app-layout>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --primary-soft: rgba(102, 126, 234, 0.1);
            --not-started: #94a3b8;
            --in-progress: #3b82f6;
            --fq-review: #f59e0b;
            --completed: #10b981;
            --standby: #8b5cf6;
            --cancelled: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
            --sidebar-width: 280px;
            --card-shadow: 0 20px 40px -15px rgba(0,0,0,0.1);
            --hover-shadow: 0 30px 60px -15px rgba(102,126,234,0.4);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-10px) rotate(1deg); }
            75% { transform: translateY(10px) rotate(-1deg); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(102,126,234,0.3); }
            50% { box-shadow: 0 0 30px 5px rgba(102,126,234,0.5); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        @keyframes wave {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(15deg); }
            75% { transform: rotate(-15deg); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInLeft 0.6s ease-out forwards; }
        .animate-slide-right { animation: slideInRight 0.6s ease-out forwards; }
        .animate-slide-up { animation: slideInUp 0.6s ease-out forwards; }
        .animate-scale { animation: scaleIn 0.5s ease-out forwards; }
        .animate-bounce { animation: bounceIn 0.8s ease-out; }
        .animate-wave { animation: wave 1s ease-in-out infinite; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            background: radial-gradient(circle at 20% 20%, rgba(102,126,234,0.05) 0%, transparent 40%),
                        radial-gradient(circle at 80% 80%, rgba(118,75,162,0.05) 0%, transparent 40%),
                        linear-gradient(135deg, #f6f9fc 0%, #f1f4f9 100%);
            position: relative;
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 4px 0 30px rgba(0,0,0,0.08);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
            border-right: 1px solid rgba(102,126,234,0.1);
        }

        .sidebar-header {
            background: var(--primary-gradient);
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar-header::before {
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

        .sidebar-header h1 {
            color: white;
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
            position: relative;
            z-index: 1;
        }

        .sidebar-header p {
            color: rgba(255,255,255,0.9);
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
        }

        .sidebar-profile {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(102,126,234,0.1);
            background: linear-gradient(135deg, #ffffff 0%, #fafcff 100%);
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .profile-avatar {
            width: 70px;
            height: 70px;
            background: var(--primary-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            box-shadow: 0 15px 25px -8px rgba(102,126,234,0.4);
            border: 3px solid white;
            transition: all 0.4s ease;
        }

        .profile-avatar:hover {
            transform: scale(1.1) rotate(8deg);
        }

        .profile-details h3 {
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.25rem;
            font-size: 1.1rem;
        }

        .profile-details p {
            color: #64748b;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .profile-email {
            font-size: 0.7rem;
            color: #94a3b8;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            background: #f1f5f9;
            padding: 0.3rem 0.8rem;
            border-radius: 30px;
            width: fit-content;
        }

        .partner-container {
            margin-top: 1.8rem;
            padding: 1.2rem;
            background: white;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.02);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
        }

        .partner-container span {
            font-size: 0.7rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .partner-logo {
            margin-top: 1rem;
            padding: 0.8rem;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            transition: all 0.4s ease;
        }

        .partner-logo:hover {
            transform: scale(1.08) translateY(-3px);
            border-color: var(--primary);
            box-shadow: 0 15px 30px rgba(102,126,234,0.2);
        }

        .partner-logo img {
            height: 50px;
            width: auto;
        }

        .sidebar-menu {
            padding: 2rem 1.5rem;
        }

        .menu-title {
            font-size: 0.7rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.2rem;
            padding-left: 0.75rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.9rem 1rem;
            margin-bottom: 0.6rem;
            border-radius: 16px;
            color: #4a5568;
            transition: all 0.4s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: var(--primary-gradient);
            opacity: 0.1;
            transition: width 0.4s ease;
            z-index: -1;
        }

        .menu-item:hover::before {
            width: 100%;
        }

        .menu-item:hover {
            transform: translateX(8px);
            color: var(--primary);
        }

        .menu-item.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 10px 25px -5px rgba(102,126,234,0.5);
        }

        .menu-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.8rem;
            transition: all 0.4s ease;
        }

        .menu-item:hover .menu-icon {
            transform: rotate(5deg) scale(1.1);
        }

        .menu-icon svg {
            width: 20px;
            height: 20px;
        }

        .menu-badge {
            margin-left: auto;
            background: rgba(0,0,0,0.05);
            color: #4a5568;
            font-size: 0.7rem;
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
            font-weight: 700;
        }

        .menu-item.active .menu-badge {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            width: calc(100% - var(--sidebar-width));
        }

        .modern-header {
            background: white;
            border-radius: 40px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(102,126,234,0.1);
        }

        .modern-header::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(102,126,234,0.05), transparent);
            border-radius: 50%;
            animation: float 8s infinite;
        }

        .header-content h1 {
            font-size: 2.2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .header-content p {
            color: #64748b;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .consultant-profile {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            background: rgba(255,255,255,0.95);
            padding: 0.6rem 1.5rem 0.6rem 0.8rem;
            border-radius: 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
        }

        .consultant-avatar {
            width: 55px;
            height: 55px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.3rem;
            box-shadow: 0 10px 20px -5px rgba(102,126,234,0.4);
        }

        .consultant-info .name {
            font-weight: 800;
            color: var(--dark);
            font-size: 1rem;
        }

        .consultant-info .role {
            font-size: 0.75rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .stat-card-modern {
            background: white;
            border-radius: 30px;
            padding: 1.5rem 1.2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .stat-card-modern::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            transition: height 0.4s ease;
        }

        .stat-card-modern.not-started::after { background: var(--not-started); }
        .stat-card-modern.in-progress::after { background: var(--in-progress); }
        .stat-card-modern.fq-review::after { background: var(--fq-review); }
        .stat-card-modern.completed::after { background: var(--completed); }
        .stat-card-modern.standby::after { background: var(--standby); }
        .stat-card-modern.cancelled::after { background: var(--cancelled); }

        .stat-card-modern:hover {
            transform: translateY(-8px);
            box-shadow: var(--hover-shadow);
        }

        .stat-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .stat-icon-wrapper.not-started { background: #f1f5f9; color: var(--not-started); }
        .stat-icon-wrapper.in-progress { background: #dbeafe; color: var(--in-progress); }
        .stat-icon-wrapper.fq-review { background: #fed7aa; color: var(--fq-review); }
        .stat-icon-wrapper.completed { background: #d1fae5; color: var(--completed); }
        .stat-icon-wrapper.standby { background: #ede9fe; color: var(--standby); }
        .stat-icon-wrapper.cancelled { background: #fee2e2; color: var(--cancelled); }

        .stat-number-modern {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-label-modern {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .chart-container {
            background: white;
            border-radius: 30px;
            padding: 1.8rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
        }

        .chart-container h3 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .chart-container h3 i {
            color: var(--primary);
        }

        .chart-wrapper {
            position: relative;
            height: 280px;
        }

        .status-chart-wrapper {
            position: relative;
            height: 320px;
        }

        .chart-center-text {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .chart-center-text .total {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
        }

        .chart-center-text .label {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 0.3rem;
            font-weight: 600;
        }

        .table-container {
            background: white;
            border-radius: 30px;
            padding: 1.8rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
            margin-bottom: 2rem;
        }

        .table-container h3 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .stats-table {
            width: 100%;
            border-collapse: collapse;
        }

        .stats-table th {
            text-align: left;
            padding: 12px;
            font-weight: 600;
            color: #64748b;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.85rem;
        }

        .stats-table td {
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
        }

        .stats-table tr:hover {
            background: #f9fafb;
        }

        .progress-bar-container {
            background: #e2e8f0;
            border-radius: 10px;
            height: 6px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            border-radius: 10px;
            transition: width 1s ease;
        }

        .insights-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .insight-card {
            background: white;
            border-radius: 30px;
            padding: 1.8rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
        }

        .insight-card h4 {
            font-size: 1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .insight-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .insight-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 0.8rem;
            background: #f8fafc;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .insight-item:hover {
            transform: translateX(5px);
            background: #f1f5f9;
        }

        .insight-icon {
            width: 40px;
            height: 40px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .insight-icon.green { background: #d1fae5; color: #10b981; }
        .insight-icon.blue { background: #dbeafe; color: #3b82f6; }
        .insight-icon.purple { background: #ede9fe; color: #8b5cf6; }
        .insight-icon.orange { background: #fed7aa; color: #f59e0b; }

        .insight-text p {
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.5;
        }

        .insight-text strong {
            color: var(--dark);
        }

        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 1024px) {
            .charts-grid, .insights-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .modern-header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
            .header-content h1 {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>GestionLivrable</h1>
                <p>Espace Consultant</p>
            </div>

            <div class="sidebar-profile">
                <div class="profile-info">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                    </div>
                    <div class="profile-details">
                        <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                        <p><i class="fas fa-circle"></i> Consultant</p>
                        <div class="profile-email">
                            <i class="fas fa-envelope"></i> {{ Auth::user()->email }}
                        </div>
                    </div>
                </div>

                <div class="partner-container">
                    <span>Partenaire officiel</span>
                    <div class="partner-logo">
                        <img src="{{ asset('images/logo-alstom.png') }}"
                             alt="Alstom"
                             onerror="this.src='https://via.placeholder.com/150x50/667eea/ffffff?text=ALSTOM'">
                    </div>
                </div>
            </div>

            <div class="sidebar-menu">
                <div class="menu-title">MENU</div>

                <a href="{{ route('consultant.dashboard') }}" class="menu-item">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('consultant.livrables') }}" class="menu-item">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <span>Mes Livrables</span>
                    <span class="menu-badge">{{ $livrables->count() ?? 0 }}</span>
                </a>

                <a href="{{ route('consultant.statistiques') }}" class="menu-item active">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span>Statistiques</span>
                </a>

                <div style="margin: 1.5rem 0; border-top: 1px solid #e2e8f0;"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="menu-item" style="width: 100%; color: #ef4444; background: none; border: none; cursor: pointer;">
                        <div class="menu-icon" style="background: #fee2e2;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #ef4444;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                            </svg>
                        </div>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content">
            @php
                $consultantName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
                $consultantInitial = strtoupper(substr(Auth::user()->first_name, 0, 1));

                $completionRate = $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100, 1) : 0;
                $tasksRate = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100, 1) : 0;

                $months = [];
                $livrablesData = [];
                for ($i = 5; $i >= 0; $i--) {
                    $month = now()->copy()->subMonths($i);
                    $months[] = $month->format('M Y');
                    $livrablesData[] = $livrables->filter(function($l) use ($month) {
                        return $l->created_at && $l->created_at->format('Y-m') === $month->format('Y-m');
                    })->count();
                }

                $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                $workHoursByDay = [7.5, 8, 6.5, 8, 7, 4, 0];
                $totalWorkHours = array_sum($workHoursByDay);
                $averageWorkHours = round($totalWorkHours / 7, 1);
                $weeklyGoal = 35;
                $weeklyProgress = round(($totalWorkHours / $weeklyGoal) * 100, 1);
            @endphp

            <div class="modern-header">
                <div class="header-content">
                    <h1>Mes statistiques</h1>
                    <p>
                        <i class="fas fa-chart-line"></i>
                        Analyse de votre activité et de vos performances
                    </p>
                </div>

                <div class="consultant-profile">
                    <div class="consultant-avatar">
                        {{ $consultantInitial }}
                    </div>
                    <div class="consultant-info">
                        <div class="name">{{ $consultantName }}</div>
                        <div class="role">
                            <i class="fas fa-circle"></i>
                            Consultant
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card-modern not-started animate-scale delay-100">
                    <div class="stat-icon-wrapper not-started">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number-modern">{{ $notStarted }}</div>
                    <div class="stat-label-modern">Not Started</div>
                </div>

                <div class="stat-card-modern in-progress animate-scale delay-200">
                    <div class="stat-icon-wrapper in-progress">
                        <i class="fas fa-sync-alt fa-spin"></i>
                    </div>
                    <div class="stat-number-modern">{{ $inProgress }}</div>
                    <div class="stat-label-modern">In Progress</div>
                </div>

                <div class="stat-card-modern fq-review animate-scale delay-300">
                    <div class="stat-icon-wrapper fq-review">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div class="stat-number-modern">{{ $fqReview }}</div>
                    <div class="stat-label-modern">FQ Review</div>
                </div>

                <div class="stat-card-modern completed animate-scale delay-400">
                    <div class="stat-icon-wrapper completed">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number-modern">{{ $completed }}</div>
                    <div class="stat-label-modern">Completed</div>
                </div>

                <div class="stat-card-modern standby animate-scale delay-500">
                    <div class="stat-icon-wrapper standby">
                        <i class="fas fa-pause-circle"></i>
                    </div>
                    <div class="stat-number-modern">{{ $standby }}</div>
                    <div class="stat-label-modern">Standby</div>
                </div>

                <div class="stat-card-modern cancelled animate-scale delay-600">
                    <div class="stat-icon-wrapper cancelled">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number-modern">{{ $cancelled }}</div>
                    <div class="stat-label-modern">Cancelled</div>
                </div>
            </div>

            <div class="charts-grid">
                <div class="chart-container animate-slide-up delay-100">
                    <h3><i class="fas fa-chart-line"></i> Évolution de mes livrables</h3>
                    <div class="chart-wrapper">
                        <canvas id="evolutionChart"></canvas>
                    </div>
                </div>

                <div class="chart-container animate-slide-up delay-200">
                    <h3><i class="fas fa-chart-pie"></i> Répartition par statut</h3>
                    <div class="status-chart-wrapper">
                        <canvas id="statusChart"></canvas>
                        <div class="chart-center-text">
                            <div class="total">{{ $totalLivrables }}</div>
                            <div class="label">Livrables</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chart-container animate-slide-up delay-300" style="margin-bottom: 2rem;">
                <h3><i class="fas fa-clock"></i> Durée de travail par jour</h3>
                <div class="chart-wrapper" style="height: 300px;">
                    <canvas id="workHoursChart"></canvas>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-4 text-center">
                        <p class="text-gray-500 text-sm">Total heures (semaine)</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $totalWorkHours }}h</p>
                        <div class="progress-bar-container mt-2">
                            <div class="progress-bar-fill" style="width: {{ min(100, $weeklyProgress) }}%; background: #3b82f6"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Objectif: {{ $weeklyGoal }}h ({{ $weeklyProgress }}%)</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-white rounded-2xl p-4 text-center">
                        <p class="text-gray-500 text-sm">Moyenne par jour</p>
                        <p class="text-2xl font-bold text-green-600">{{ $averageWorkHours }}h</p>
                        <p class="text-xs text-gray-400 mt-2">Sur les 7 derniers jours</p>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-white rounded-2xl p-4 text-center">
                        <p class="text-gray-500 text-sm">Aujourd'hui</p>
                        <p class="text-2xl font-bold text-orange-600">{{ $workHoursByDay[date('N') - 1] ?? 0 }}h</p>
                        <p class="text-xs text-gray-400 mt-2">Heures travaillées</p>
                    </div>
                </div>
            </div>

            <div class="table-container animate-slide-up delay-400">
                <h3><i class="fas fa-table"></i> Récapitulatif de mes livrables</h3>
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
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full" style="background: #94a3b8"></div>
                                        <span class="font-medium">Not Started</span>
                                    </div>
                                </td>
                                <td class="text-center font-bold">{{ $notStarted }}</td>
                                <td class="text-center">{{ $totalLivrables > 0 ? round(($notStarted / $totalLivrables) * 100, 1) : 0 }}%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: {{ $totalLivrables > 0 ? round(($notStarted / $totalLivrables) * 100, 1) : 0 }}%; background: #94a3b8"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full" style="background: #3b82f6"></div>
                                        <span class="font-medium">In Progress</span>
                                    </div>
                                </td>
                                <td class="text-center font-bold">{{ $inProgress }}</td>
                                <td class="text-center">{{ $totalLivrables > 0 ? round(($inProgress / $totalLivrables) * 100, 1) : 0 }}%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: {{ $totalLivrables > 0 ? round(($inProgress / $totalLivrables) * 100, 1) : 0 }}%; background: #3b82f6"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full" style="background: #f59e0b"></div>
                                        <span class="font-medium">FQ Review</span>
                                    </div>
                                </td>
                                <td class="text-center font-bold">{{ $fqReview }}</td>
                                <td class="text-center">{{ $totalLivrables > 0 ? round(($fqReview / $totalLivrables) * 100, 1) : 0 }}%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: {{ $totalLivrables > 0 ? round(($fqReview / $totalLivrables) * 100, 1) : 0 }}%; background: #f59e0b"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full" style="background: #10b981"></div>
                                        <span class="font-medium">Completed</span>
                                    </div>
                                </td>
                                <td class="text-center font-bold">{{ $completed }}</td>
                                <td class="text-center">{{ $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100, 1) : 0 }}%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: {{ $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100, 1) : 0 }}%; background: #10b981"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full" style="background: #8b5cf6"></div>
                                        <span class="font-medium">Standby</span>
                                    </div>
                                </td>
                                <td class="text-center font-bold">{{ $standby }}</td>
                                <td class="text-center">{{ $totalLivrables > 0 ? round(($standby / $totalLivrables) * 100, 1) : 0 }}%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: {{ $totalLivrables > 0 ? round(($standby / $totalLivrables) * 100, 1) : 0 }}%; background: #8b5cf6"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 rounded-full" style="background: #ef4444"></div>
                                        <span class="font-medium">Cancelled</span>
                                    </div>
                                </td>
                                <td class="text-center font-bold">{{ $cancelled }}</td>
                                <td class="text-center">{{ $totalLivrables > 0 ? round(($cancelled / $totalLivrables) * 100, 1) : 0 }}%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: {{ $totalLivrables > 0 ? round(($cancelled / $totalLivrables) * 100, 1) : 0 }}%; background: #ef4444"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-gray-50 font-bold">
                                <td>TOTAL</td>
                                <td class="text-center">{{ $totalLivrables }}</td>
                                <td class="text-center">100%</td>
                                <td class="text-center">
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: 100%; background: #667eea"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="insights-grid">
                <div class="insight-card animate-slide-up delay-500">
                    <h4><i class="fas fa-lightbulb text-yellow-500"></i> Mes performances</h4>
                    <div class="insight-list">
                        <div class="insight-item">
                            <div class="insight-icon green"><i class="fas fa-check-circle"></i></div>
                            <div class="insight-text">
                                <p><strong>Taux de complétion :</strong> {{ $completionRate }}% de vos livrables sont terminés</p>
                            </div>
                        </div>
                        <div class="insight-item">
                            <div class="insight-icon blue"><i class="fas fa-tasks"></i></div>
                            <div class="insight-text">
                                <p><strong>Productivité :</strong> {{ $completedTasks }} tâches terminées sur {{ $totalTasks }} ({{ $tasksRate }}%)</p>
                            </div>
                        </div>
                        <div class="insight-item">
                            <div class="insight-icon purple"><i class="fas fa-chart-line"></i></div>
                            <div class="insight-text">
                                <p><strong>Performance globale :</strong> {{ $totalLivrables }} livrables assignés</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="insight-card animate-slide-up delay-600">
                    <h4><i class="fas fa-chart-simple text-purple-500"></i> Recommandations</h4>
                    <div class="insight-list">
                        @if($notStarted > 0)
                            <div class="insight-item">
                                <div class="insight-icon orange"><i class="fas fa-play-circle"></i></div>
                                <div class="insight-text">
                                    <p>{{ $notStarted }} livrable(s) non démarré(s) - Commencez à les planifier</p>
                                </div>
                            </div>
                        @endif

                        @if($standby > 0)
                            <div class="insight-item">
                                <div class="insight-icon orange"><i class="fas fa-pause-circle"></i></div>
                                <div class="insight-text">
                                    <p>{{ $standby }} livrable(s) en standby - Identifiez les blocages</p>
                                </div>
                            </div>
                        @endif

                        @if($inProgress > 0)
                            <div class="insight-item">
                                <div class="insight-icon blue"><i class="fas fa-chart-line"></i></div>
                                <div class="insight-text">
                                    <p>{{ $inProgress }} livrable(s) en cours - Continuez votre progression</p>
                                </div>
                            </div>
                        @endif

                        @if($weeklyProgress < 80)
                            <div class="insight-item">
                                <div class="insight-icon orange"><i class="fas fa-hourglass-half"></i></div>
                                <div class="insight-text">
                                    <p>Objectif hebdomadaire : {{ $weeklyProgress }}% atteint - Vous êtes à {{ $weeklyGoal - $totalWorkHours }}h de l'objectif</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const months = @json($months);
            const livrablesData = @json($livrablesData);

            const evolutionCtx = document.getElementById('evolutionChart').getContext('2d');
            new Chart(evolutionCtx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
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
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: { mode: 'index', intersect: false }
                    },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#e2e8f0' } },
                        x: { grid: { display: false } }
                    }
                }
            });

            const statusCtx = document.getElementById('statusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Not Started', 'In Progress', 'FQ Review', 'Completed', 'Standby', 'Cancelled'],
                    datasets: [{
                        data: [
                            {{ $notStarted }},
                            {{ $inProgress }},
                            {{ $fqReview }},
                            {{ $completed }},
                            {{ $standby }},
                            {{ $cancelled }}
                        ],
                        backgroundColor: [
                            '#94a3b8',
                            '#3b82f6',
                            '#f59e0b',
                            '#10b981',
                            '#8b5cf6',
                            '#ef4444'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 4,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
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
                    }
                }
            });

            const daysOfWeek = @json($daysOfWeek);
            const workHoursByDay = @json($workHoursByDay);

            const workCtx = document.getElementById('workHoursChart').getContext('2d');
            new Chart(workCtx, {
                type: 'bar',
                data: {
                    labels: daysOfWeek,
                    datasets: [{
                        label: 'Heures travaillées',
                        data: workHoursByDay,
                        backgroundColor: 'rgba(102, 126, 234, 0.7)',
                        borderColor: '#667eea',
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.raw} heures`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 10,
                            title: { display: true, text: 'Heures' },
                            grid: { color: '#e2e8f0' }
                        },
                        x: {
                            title: { display: true, text: 'Jour' },
                            grid: { display: false }
                        }
                    }
                }
            });

            setTimeout(() => {
                document.querySelectorAll('.progress-bar-fill').forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0';
                    setTimeout(() => { bar.style.width = width; }, 100);
                });
            }, 200);
        });
    </script>
</x-app-layout>