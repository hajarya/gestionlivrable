<x-app-layout>
    <!-- Styles personnalisés -->
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
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #1e293b;
            --light: #f8fafc;
            --not-started: #94a3b8;
            --in-progress: #3b82f6;
            --completed: #10b981;
            --fq-review: #f59e0b;
            --standby: #8b5cf6;
            --cancelled: #ef4444;
            --sidebar-width: 280px;
            --card-shadow: 0 20px 40px -15px rgba(0,0,0,0.1);
            --hover-shadow: 0 30px 60px -15px rgba(102,126,234,0.4);
        }

        /* ===== ANIMATIONS AVANCÉES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-5px) rotate(1deg); }
            75% { transform: translateY(5px) rotate(-1deg); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(102,126,234,0.3); }
            50% { box-shadow: 0 0 30px 5px rgba(102,126,234,0.5); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) skewX(-15deg); }
            100% { transform: translateX(200%) skewX(-15deg); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(50px); }
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

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes iconPop {
            0% { transform: scale(1); }
            50% { transform: scale(1.2) rotate(10deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        @keyframes progressFill {
            from { width: 0%; }
            to { width: var(--target-width); }
        }

        @keyframes rotate360 {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.9; box-shadow: 0 0 15px currentColor; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-3px); }
            75% { transform: translateX(3px); }
        }

        @keyframes glowPulse {
            0% { box-shadow: 0 0 5px rgba(102,126,234,0.2); }
            50% { box-shadow: 0 0 25px rgba(102,126,234,0.6); }
            100% { box-shadow: 0 0 5px rgba(102,126,234,0.2); }
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideInFromBottom {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes borderPulse {
            0%, 100% { border-color: rgba(102,126,234,0.2); }
            50% { border-color: rgba(102,126,234,0.8); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInLeft 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-right { animation: slideInRight 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-up { animation: slideInUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-scale { animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        .animate-bounce { animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-wave { animation: wave 1s ease-in-out infinite; }
        .animate-gradient { background-size: 200% 200%; animation: gradientShift 3s ease infinite; }
        .animate-card-entrance { animation: cardEntrance 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-icon-pop { animation: iconPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .animate-rotate { animation: rotate360 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55); }
        .animate-pulse { animation: pulse 2s ease-in-out infinite; }
        .animate-glow-pulse { animation: glowPulse 2s ease-in-out infinite; }
        .animate-fade-scale { animation: fadeInScale 0.5s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-bottom { animation: slideInFromBottom 0.5s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-border-pulse { animation: borderPulse 2s ease-in-out infinite; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }

        /* Layout principal */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
            background: radial-gradient(circle at 20% 20%, rgba(102,126,234,0.05) 0%, transparent 40%),
                        radial-gradient(circle at 80% 80%, rgba(118,75,162,0.05) 0%, transparent 40%),
                        linear-gradient(135deg, #f6f9fc 0%, #f1f4f9 100%);
            position: relative;
            overflow-x: hidden;
        }

        .dashboard-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102,126,234,0.02) 0%, transparent 60%);
            animation: float-slow 30s linear infinite;
            pointer-events: none;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-width);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            box-shadow: 4px 0 40px rgba(0,0,0,0.05);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
            border-right: 1px solid rgba(102,126,234,0.1);
            animation: slideInLeft 0.8s ease-out;
        }

        .sidebar::-webkit-scrollbar { width: 5px; }
        .sidebar::-webkit-scrollbar-track { background: #e2e8f0; }
        .sidebar::-webkit-scrollbar-thumb { background: var(--primary-gradient); border-radius: 5px; }

        .sidebar-header {
            background: var(--primary-gradient);
            padding: 2.5rem 1.8rem;
            position: relative;
            overflow: hidden;
            animation: fadeInScale 0.6s ease-out;
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
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
            position: relative;
            z-index: 1;
            letter-spacing: -0.5px;
            animation: slideInRight 0.5s ease-out;
        }

        .sidebar-header p {
            color: rgba(255,255,255,0.9);
            font-size: 0.85rem;
            position: relative;
            z-index: 1;
            animation: slideInRight 0.5s ease-out 0.1s both;
        }

        .sidebar-profile {
            padding: 2rem 1.8rem;
            border-bottom: 1px solid rgba(102,126,234,0.1);
            background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
            animation: slideInRight 0.5s ease-out 0.2s both;
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
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            box-shadow: 0 15px 25px -8px rgba(102, 126, 234, 0.4);
            border: 3px solid white;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            animation: bounceIn 0.6s ease-out;
        }

        .profile-avatar::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        .profile-avatar:hover { transform: scale(1.1) rotate(8deg); }

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
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            background: #f1f5f9;
            padding: 0.3rem 1rem;
            border-radius: 40px;
            width: fit-content;
            transition: all 0.3s ease;
        }

        .profile-email:hover {
            background: #e2e8f0;
            transform: translateX(5px);
        }

        .partner-container {
            margin-top: 2rem;
            padding: 1.2rem;
            background: white;
            border-radius: 20px;
            text-align: center;
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: scaleIn 0.5s ease-out 0.3s both;
        }

        .partner-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(102,126,234,0.05), transparent);
            transform: rotate(45deg);
            animation: shimmer 4s infinite;
        }

        .partner-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102,126,234,0.15);
        }

        .partner-container span {
            font-size: 0.7rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        .partner-logo {
            margin-top: 0.8rem;
            padding: 0.8rem;
            background: #f8fafc;
            border-radius: 14px;
            border: 1px solid #edf2f7;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
        }

        .partner-logo:hover {
            transform: scale(1.05);
            border-color: var(--primary);
            box-shadow: 0 10px 25px rgba(102,126,234,0.2);
        }

        .partner-logo img { height: 45px; width: auto; }

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
            padding-left: 0.8rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.9rem 1rem;
            margin-bottom: 0.6rem;
            border-radius: 16px;
            color: #475569;
            transition: all 0.4s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            animation: slideInRight 0.5s ease-out;
            animation-fill-mode: both;
        }

        .menu-item:nth-child(1) { animation-delay: 0.1s; }
        .menu-item:nth-child(2) { animation-delay: 0.15s; }
        .menu-item:nth-child(3) { animation-delay: 0.2s; }

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

        .menu-item:hover::before { width: 100%; }
        .menu-item:hover { transform: translateX(8px); color: var(--primary); }

        .menu-item.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.5);
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
            background: rgba(255,255,255,0.25);
            transform: rotate(5deg) scale(1.1);
        }

        .menu-icon svg { width: 20px; height: 20px; }

        .menu-badge {
            margin-left: auto;
            background: rgba(0,0,0,0.05);
            color: #475569;
            font-size: 0.7rem;
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
            font-weight: 700;
        }

        .menu-item:hover .menu-badge {
            background: rgba(102,126,234,0.2);
            color: var(--primary);
        }

        .menu-item.active .menu-badge {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Main content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            width: calc(100% - var(--sidebar-width));
        }

        /* Header */
        .modern-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: 48px;
            padding: 1.8rem 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(102,126,234,0.2);
            animation: slideInUp 0.6s ease-out;
        }

        .modern-header::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(102,126,234,0.08), transparent);
            border-radius: 50%;
            animation: float-slow 10s infinite;
        }

        .header-content h1 {
            font-size: 2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            animation: slideInLeft 0.5s ease-out;
        }

        .header-content h1 i {
            background: rgba(102,126,234,0.1);
            padding: 0.8rem;
            border-radius: 20px;
            font-size: 1.4rem;
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .header-content h1:hover i {
            animation: rotate360 0.6s ease;
        }

        .header-content p {
            color: #64748b;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            animation: slideInLeft 0.5s ease-out 0.1s both;
        }

        .manager-profile {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            background: rgba(255,255,255,0.9);
            padding: 0.6rem 1.5rem 0.6rem 0.8rem;
            border-radius: 60px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
            transition: all 0.4s ease;
            animation: slideInRight 0.5s ease-out;
        }

        .manager-profile:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 35px rgba(102,126,234,0.15);
        }

        .manager-avatar {
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 10px 20px -5px rgba(102,126,234,0.4);
            border: 2px solid white;
            transition: all 0.3s ease;
        }

        .manager-profile:hover .manager-avatar {
            transform: scale(1.05) rotate(5deg);
        }

        .manager-info .name {
            font-weight: 800;
            color: var(--dark);
            font-size: 1rem;
        }

        .manager-info .role {
            font-size: 0.75rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Back Button */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 40px;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            animation: slideInLeft 0.5s ease-out 0.2s both;
            position: relative;
            overflow: hidden;
        }

        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: left 0.4s ease;
            z-index: 0;
        }

        .back-button:hover::before {
            left: 0;
        }

        .back-button:hover {
            color: white;
            border-color: transparent;
            transform: translateX(-5px);
        }

        .back-button i,
        .back-button span {
            position: relative;
            z-index: 1;
        }

        /* ===== PROFIL CONSULTANT AVEC ANIMATIONS ===== */
        .consultant-profile-card {
            background: white;
            border-radius: 40px;
            padding: 0;
            margin-bottom: 2rem;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            overflow: hidden;
            animation: cardEntrance 0.7s cubic-bezier(0.34, 1.2, 0.64, 1) forwards;
            position: relative;
            transition: all 0.4s ease;
        }

        .consultant-profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 50px -15px rgba(102,126,234,0.3);
        }

        .consultant-profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--primary-gradient);
            animation: gradientShift 3s ease infinite;
        }

        .profile-header {
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            padding: 2rem 2.5rem;
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
            border-bottom: 1px solid rgba(102,126,234,0.1);
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            box-shadow: 0 20px 30px -10px rgba(102, 126, 234, 0.4);
            border: 4px solid white;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            animation: bounceIn 0.8s ease-out;
        }

        .profile-avatar-large::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        .profile-avatar-large:hover {
            transform: scale(1.08) rotate(8deg);
        }

        .profile-info-large h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--dark), #4a5568);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: slideInLeft 0.5s ease-out;
        }

        .profile-info-large p {
            color: #64748b;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            animation: slideInLeft 0.5s ease-out 0.1s both;
        }

        .profile-info-large p i {
            color: var(--primary);
            width: 30px;
            height: 30px;
            background: rgba(102,126,234,0.1);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .profile-info-large p:hover i {
            animation: iconPop 0.4s ease;
        }

        .profile-stats {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .stat-badge-large {
            background: #f1f5f9;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #475569;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: scaleIn 0.5s ease-out;
            animation-fill-mode: both;
        }

        .stat-badge-large:nth-child(1) { animation-delay: 0.2s; }
        .stat-badge-large:nth-child(2) { animation-delay: 0.25s; }
        .stat-badge-large:nth-child(3) { animation-delay: 0.3s; }

        .stat-badge-large:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 20px rgba(102,126,234,0.3);
        }

        .stat-badge-large:hover i {
            animation: rotate360 0.5s ease;
        }

        .stat-badge-large i {
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .stat-badge-large:hover i {
            color: white;
        }

        /* ===== STATS GRID AVEC ANIMATIONS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 28px;
            padding: 1.2rem;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.5s ease-out;
            animation-fill-mode: both;
            cursor: pointer;
        }

        .stat-card:nth-child(1) { animation-delay: 0.3s; }
        .stat-card:nth-child(2) { animation-delay: 0.35s; }
        .stat-card:nth-child(3) { animation-delay: 0.4s; }
        .stat-card:nth-child(4) { animation-delay: 0.45s; }
        .stat-card:nth-child(5) { animation-delay: 0.5s; }
        .stat-card:nth-child(6) { animation-delay: 0.55s; }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, transparent 0%, rgba(102,126,234,0.02) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px -10px rgba(102,126,234,0.3);
            border-color: var(--primary);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.5s ease;
        }

        .stat-card:hover::after {
            transform: scaleX(1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 0.8rem;
            transition: all 0.4s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-icon.not-started { background: #f1f5f9; color: #94a3b8; }
        .stat-icon.in-progress { background: #dbeafe; color: #3b82f6; animation: glowPulse 2s ease-in-out infinite; }
        .stat-icon.completed { background: #d1fae5; color: #10b981; }
        .stat-icon.fq-review { background: #fed7aa; color: #f59e0b; }
        .stat-icon.standby { background: #ede9fe; color: #8b5cf6; }
        .stat-icon.cancelled { background: #fee2e2; color: #ef4444; }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--dark);
            transition: all 0.3s ease;
        }

        .stat-card:hover .stat-number {
            transform: scale(1.05);
        }

        .stat-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #64748b;
            margin-top: 0.2rem;
        }

        /* ===== SECTION TITRE ===== */
        .section-title {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            animation: slideInLeft 0.5s ease-out 0.6s both;
        }

        .title-bar {
            width: 5px;
            height: 30px;
            background: var(--primary-gradient);
            border-radius: 5px;
            animation: scaleIn 0.5s ease-out;
        }

        .section-title h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title h2 i {
            color: var(--primary);
            background: rgba(102,126,234,0.1);
            padding: 0.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .section-title h2:hover i {
            animation: rotate360 0.6s ease;
        }

        /* ===== LIVRABLES GRID AVEC ANIMATIONS ===== */
        .livrables-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .livrable-card {
            background: white;
            border-radius: 32px;
            padding: 0;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.05);
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            animation: cardEntrance 0.6s cubic-bezier(0.34, 1.2, 0.64, 1) forwards;
            animation-fill-mode: both;
        }

        .livrable-card:nth-child(1) { animation-delay: 0.65s; }
        .livrable-card:nth-child(2) { animation-delay: 0.7s; }
        .livrable-card:nth-child(3) { animation-delay: 0.75s; }
        .livrable-card:nth-child(4) { animation-delay: 0.8s; }
        .livrable-card:nth-child(5) { animation-delay: 0.85s; }
        .livrable-card:nth-child(6) { animation-delay: 0.9s; }

        .livrable-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 32px;
            padding: 2px;
            background: var(--primary-gradient);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .livrable-card:hover::before {
            opacity: 1;
        }

        .livrable-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 35px 50px -15px rgba(102,126,234,0.4);
        }

        .livrable-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 150%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transform: skewX(-25deg);
            transition: left 0.7s ease;
            pointer-events: none;
        }

        .livrable-card:hover::after {
            left: 150%;
        }

        .card-status-bar {
            position: absolute;
            left: 0;
            top: 0;
            width: 6px;
            height: 100%;
            transition: all 0.4s ease;
        }

        .livrable-card:hover .card-status-bar {
            width: 10px;
        }

        .card-status-bar.not-started { background: linear-gradient(180deg, #94a3b8, #64748b); }
        .card-status-bar.in-progress { background: linear-gradient(180deg, #3b82f6, #2563eb); animation: glowPulse 2s ease-in-out infinite; }
        .card-status-bar.completed { background: linear-gradient(180deg, #10b981, #059669); }
        .card-status-bar.fq-review { background: linear-gradient(180deg, #f59e0b, #d97706); }
        .card-status-bar.standby { background: linear-gradient(180deg, #8b5cf6, #7c3aed); }
        .card-status-bar.cancelled { background: linear-gradient(180deg, #ef4444, #dc2626); }

        .card-header {
            padding: 1.2rem 1.5rem 1rem 1.8rem;
            border-bottom: 1px solid rgba(102,126,234,0.1);
            position: relative;
            z-index: 1;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: width 0.5s ease;
        }

        .livrable-card:hover .card-header::after {
            width: 100%;
        }

        .card-title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--dark);
            transition: all 0.3s ease;
        }

        .livrable-card:hover .card-title {
            color: var(--primary);
            transform: translateX(5px);
        }

        .status-badge {
            padding: 0.3rem 1rem;
            border-radius: 40px;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: all 0.3s ease;
        }

        .livrable-card:hover .status-badge {
            transform: scale(1.05);
        }

        .status-badge.not-started { background: #f1f5f9; color: #475569; }
        .status-badge.in-progress { background: #dbeafe; color: #1e40af; animation: pulse 2s ease-in-out infinite; }
        .status-badge.completed { background: #d1fae5; color: #065f46; }
        .status-badge.fq-review { background: #fed7aa; color: #92400e; }
        .status-badge.standby { background: #ede9fe; color: #5b21b6; }
        .status-badge.cancelled { background: #fee2e2; color: #991b1b; }

        .card-body {
            padding: 1rem 1.5rem 1.2rem 1.8rem;
            position: relative;
            z-index: 1;
        }

        .description {
            color: #64748b;
            font-size: 0.85rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            position: relative;
            padding-left: 1rem;
        }

        .description::before {
            content: '"';
            position: absolute;
            left: 0;
            top: -5px;
            font-size: 1.5rem;
            color: var(--primary);
            opacity: 0.3;
            font-family: serif;
            transition: all 0.3s ease;
        }

        .livrable-card:hover .description::before {
            opacity: 0.8;
            transform: translateX(-3px);
        }

        .meta-info {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 0.8rem;
        }

        .meta-info span {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.7rem;
            color: #64748b;
            transition: all 0.3s ease;
        }

        .livrable-card:hover .meta-info span {
            transform: translateX(3px);
        }

        .meta-info i {
            color: var(--primary);
            font-size: 0.7rem;
            transition: all 0.3s ease;
        }

        .livrable-card:hover .meta-info i {
            transform: rotate(360deg);
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.8s cubic-bezier(0.23, 1, 0.32, 1);
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            position: relative;
            overflow: hidden;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 1.5s infinite;
        }

        .card-footer {
            padding: 1rem 1.5rem 1.2rem 1.8rem;
            border-top: 1px solid rgba(102,126,234,0.1);
            background: #fafcff;
            position: relative;
            z-index: 1;
        }

        .btn-details {
            width: 100%;
            padding: 0.7rem;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border: 1px solid #e2e8f0;
            border-radius: 40px;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn-details::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: left 0.4s ease;
            z-index: 0;
        }

        .btn-details:hover::before {
            left: 0;
        }

        .btn-details:hover {
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102,126,234,0.3);
        }

        .btn-details i,
        .btn-details span {
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .btn-details:hover i:first-child {
            transform: translateX(-3px);
        }

        .btn-details:hover i:last-child {
            transform: translateX(5px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem;
            background: white;
            border-radius: 40px;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            animation: fadeInScale 0.6s ease-out 0.7s both;
            position: relative;
            overflow: hidden;
        }

        .empty-state::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102,126,234,0.03) 0%, transparent 70%);
            animation: float-slow 15s linear infinite;
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--primary);
            opacity: 0.3;
            margin-bottom: 1rem;
            animation: float 4s ease-in-out infinite;
        }

        .empty-state h3 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #64748b;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
            .livrables-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); transition: transform 0.3s; }
            .main-content { margin-left: 0; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .livrables-grid { grid-template-columns: 1fr; }
            .profile-header { flex-direction: column; text-align: center; }
            .profile-stats { justify-content: center; }
            .modern-header { flex-direction: column; align-items: flex-start; gap: 1rem; padding: 1.5rem; }
        }
    </style>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>GestionLivrable</h1>
                <p>Espace Manager</p>
            </div>

            <div class="sidebar-profile">
                <div class="profile-info">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                    </div>
                    <div class="profile-details">
                        <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                        <p><i class="fas fa-circle"></i> Manager</p>
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
                
                <a href="{{ route('manager.dashboard') }}" class="menu-item">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('manager.livrables') }}" class="menu-item">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <span>Tous les livrables</span>
                    <span class="menu-badge">{{ $totalLivrables ?? 0 }}</span>
                </a>

                <a href="{{ route('manager.statistiques') }}" class="menu-item">
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

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <div class="modern-header">
                <div class="header-content">
                    <h1>
                        <i class="fas fa-user-circle"></i>
                        Détails du consultant
                    </h1>
                    <p>
                        <i class="fas fa-chart-line"></i>
                        Consultez les informations et l'avancement du consultant
                    </p>
                </div>
                <div class="manager-profile">
                    <div class="manager-avatar">
                        {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                    </div>
                    <div class="manager-info">
                        <div class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                        <div class="role"><i class="fas fa-circle"></i> Manager</div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <a href="{{ route('manager.dashboard') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
                <span>Retour au tableau de bord</span>
            </a>

            @php
                // Calcul des statistiques
                $totalLivrables = $livrables->count();
                $notStarted = $livrables->where('status', 'not started')->count();
                $inProgress = $livrables->where('status', 'in progress')->count();
                $fqReview = $livrables->where('status', 'FQ review')->count();
                $completed = $livrables->where('status', 'completed')->count();
                $standby = $livrables->where('status', 'standby')->count();
                $cancelled = $livrables->where('status', 'cancelled')->count();
                
                $progressPercentage = $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100) : 0;
            @endphp

            <!-- Profil Consultant -->
            <div class="consultant-profile-card">
                <div class="profile-header">
                    <div class="profile-avatar-large">
                        {{ strtoupper(substr($consultant->first_name, 0, 1)) }}{{ strtoupper(substr($consultant->last_name, 0, 1)) }}
                    </div>
                    <div class="profile-info-large">
                        <h1>{{ $consultant->first_name }} {{ $consultant->last_name }}</h1>
                        <p>
                            <i class="fas fa-envelope"></i>
                            {{ $consultant->email }}
                        </p>
                        <p>
                            <i class="fas fa-calendar-alt"></i>
                            Membre depuis {{ $consultant->created_at->format('d F Y') }}
                        </p>
                        <div class="profile-stats">
                            <div class="stat-badge-large">
                                <i class="fas fa-tasks"></i>
                                {{ $totalLivrables }} livrables
                            </div>
                            <div class="stat-badge-large">
                                <i class="fas fa-chart-line"></i>
                                {{ $progressPercentage }}% complété
                            </div>
                            <div class="stat-badge-large">
                                <i class="fas fa-star"></i>
                                Consultant
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques des statuts -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon not-started">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number">{{ $notStarted }}</div>
                    <div class="stat-label">Not Started</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon in-progress">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="stat-number">{{ $inProgress }}</div>
                    <div class="stat-label">In Progress</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon fq-review">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div class="stat-number">{{ $fqReview }}</div>
                    <div class="stat-label">FQ Review</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon completed">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number">{{ $completed }}</div>
                    <div class="stat-label">Completed</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon standby">
                        <i class="fas fa-pause-circle"></i>
                    </div>
                    <div class="stat-number">{{ $standby }}</div>
                    <div class="stat-label">Standby</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon cancelled">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number">{{ $cancelled }}</div>
                    <div class="stat-label">Cancelled</div>
                </div>
            </div>

            <!-- Liste des livrables -->
            <div class="section-title">
                <div class="title-bar"></div>
                <h2>
                    <i class="fas fa-folder-open"></i>
                    Livrables assignés
                </h2>
            </div>

            @if($livrables->count() > 0)
                <div class="livrables-grid">
                    @foreach($livrables as $livrable)
                        @php
                            $statusClass = str_replace(' ', '-', strtolower($livrable->status));
                            $hasUrgentDeadline = $livrable->date_echeance && now()->diffInDays($livrable->date_echeance, false) < 3 && $livrable->date_echeance > now();
                            $isOverdue = $livrable->date_echeance && $livrable->date_echeance < now();
                            
                            $statusIcon = match($livrable->status) {
                                'not started' => 'fa-clock',
                                'in progress' => 'fa-sync-alt',
                                'FQ review' => 'fa-check-double',
                                'completed' => 'fa-check-circle',
                                'standby' => 'fa-pause-circle',
                                'cancelled' => 'fa-times-circle',
                                default => 'fa-question-circle'
                            };
                            
                            $progress = $livrable->taches && $livrable->taches->count() > 0 
                                ? round(($livrable->taches->where('terminee', true)->count() / $livrable->taches->count()) * 100) 
                                : 0;
                        @endphp
                        <div class="livrable-card">
                            <div class="card-status-bar {{ $statusClass }}"></div>
                            
                            <div class="card-header">
                                <div class="card-title-row">
                                    <h3 class="card-title">{{ $livrable->titre }}</h3>
                                    <span class="status-badge {{ $statusClass }}">
                                        <i class="fas {{ $statusIcon }}"></i>
                                        {{ ucfirst($livrable->status) }}
                                    </span>
                                </div>
                                @if($livrable->project)
                                <div class="project-tag" style="margin-top: 0.5rem; display: inline-flex; align-items: center; gap: 0.4rem; background: #f0f4ff; padding: 0.2rem 0.8rem; border-radius: 30px; font-size: 0.7rem; color: var(--primary);">
                                    <i class="fas fa-folder"></i>
                                    {{ $livrable->project->nom }}
                                </div>
                                @endif
                            </div>
                            
                            <div class="card-body">
                                <p class="description">
                                    {{ $livrable->description ?? 'Aucune description fournie pour ce livrable.' }}
                                </p>
                                
                                <div class="meta-info">
                                    <span>
                                        <i class="fas fa-calendar-alt"></i>
                                        Créé le {{ \Carbon\Carbon::parse($livrable->created_at)->format('d/m/Y') }}
                                    </span>
                                    @if($livrable->date_echeance)
                                    <span>
                                        <i class="fas fa-hourglass-half"></i>
                                        @if($isOverdue)
                                            <span style="color: #ef4444;">En retard</span>
                                        @elseif($hasUrgentDeadline)
                                            <span style="color: #f59e0b;">Urgent: J-{{ now()->diffInDays($livrable->date_echeance) }}</span>
                                        @else
                                            Échéance: {{ \Carbon\Carbon::parse($livrable->date_echeance)->format('d/m/Y') }}
                                        @endif
                                    </span>
                                    @endif
                                </div>
                                
                                @if($livrable->taches && $livrable->taches->count() > 0)
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $progress }}%"></div>
                                </div>
                                @endif
                            </div>
                            
                            <div class="card-footer">
                                <button class="btn-details" onclick="viewLivrableDetails({{ $livrable->id }})">
                                    <i class="fas fa-eye"></i>
                                    <span>Voir les détails</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <h3>Aucun livrable assigné</h3>
                    <p>Ce consultant n'a pas encore de livrables assignés.</p>
                </div>
            @endif
        </main>
    </div>

    <script>
        function viewLivrableDetails(livrableId) {
            window.location.href = `/manager/livrable/${livrableId}/details`;
        }

        // Animation des barres de progression
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 800);
            });

            // Animation des icônes au survol
            const statIcons = document.querySelectorAll('.stat-icon');
            statIcons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.animation = 'iconPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 400);
                });
            });

            // Effet de parallaxe léger sur le profil
            const profileCard = document.querySelector('.consultant-profile-card');
            if (profileCard) {
                profileCard.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = (y - centerY) / 30;
                    const rotateY = (centerX - x) / 30;
                    
                    this.style.transform = `translateY(-3px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                });
                
                profileCard.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            }

            // Animation d'apparition progressive des éléments
            const animateElements = document.querySelectorAll('.stat-card, .livrable-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            animateElements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.5s ease';
                observer.observe(el);
            });
        });
    </script>
</x-app-layout>