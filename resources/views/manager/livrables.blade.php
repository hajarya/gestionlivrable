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
            --success-dark: #059669;
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
            --glow-effect: 0 0 20px rgba(102,126,234,0.3);
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

        @keyframes scaleInBounce {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.95); }
            100% { transform: scale(1); }
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

        @keyframes borderGlow {
            0%, 100% { border-color: rgba(102,126,234,0.2); box-shadow: 0 0 0 0 rgba(102,126,234,0.2); }
            50% { border-color: rgba(102,126,234,0.6); box-shadow: 0 0 20px 5px rgba(102,126,234,0.3); }
        }

        @keyframes loading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(50px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes iconPop {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        @keyframes rotate360 {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-3px); }
            75% { transform: translateX(3px); }
        }

        @keyframes glowPulse {
            0% { box-shadow: 0 0 5px rgba(102,126,234,0.2); }
            50% { box-shadow: 0 0 20px rgba(102,126,234,0.5); }
            100% { box-shadow: 0 0 5px rgba(102,126,234,0.2); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInLeft 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-right { animation: slideInRight 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-up { animation: slideInUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-scale { animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        .animate-scale-bounce { animation: scaleInBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-bounce { animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-wave { animation: wave 1s ease-in-out infinite; }
        .animate-gradient { background-size: 200% 200%; animation: gradientShift 3s ease infinite; }
        .animate-border-glow { animation: borderGlow 2s ease-in-out infinite; }
        .animate-card-entrance { animation: cardEntrance 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-icon-pop { animation: iconPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .animate-rotate { animation: rotate360 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55); }
        .animate-pulse { animation: pulse 1s ease-in-out infinite; }
        .animate-shake { animation: shake 0.4s ease-in-out; }
        .animate-glow-pulse { animation: glowPulse 2s ease-in-out infinite; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

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
        }

        .sidebar::-webkit-scrollbar { width: 5px; }
        .sidebar::-webkit-scrollbar-track { background: #e2e8f0; }
        .sidebar::-webkit-scrollbar-thumb { background: var(--primary-gradient); border-radius: 5px; }

        .sidebar-header {
            background: var(--primary-gradient);
            padding: 2.5rem 1.8rem;
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
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
            position: relative;
            z-index: 1;
            letter-spacing: -0.5px;
        }

        .sidebar-header p {
            color: rgba(255,255,255,0.9);
            font-size: 0.85rem;
            position: relative;
            z-index: 1;
        }

        .sidebar-profile {
            padding: 2rem 1.8rem;
            border-bottom: 1px solid rgba(102,126,234,0.1);
            background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
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
            font-size: 2.2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .header-content h1 i {
            background: rgba(102,126,234,0.1);
            padding: 0.8rem;
            border-radius: 20px;
            font-size: 1.4rem;
            color: var(--primary);
        }

        .header-content p {
            color: #64748b;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
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

        /* Welcome Banner */
        .welcome-banner {
            background: var(--primary-gradient);
            border-radius: 40px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .banner-content h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .banner-content h2 i { margin-right: 0.8rem; }

        .banner-stats {
            display: flex;
            gap: 1rem;
            margin-top: 1.2rem;
            flex-wrap: wrap;
        }

        .banner-stat {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: rgba(255,255,255,0.2);
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            backdrop-filter: blur(8px);
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .banner-stat:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }

        .banner-logo {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(8px);
            padding: 1.2rem 2.5rem;
            border-radius: 35px;
            border: 2px solid rgba(255,255,255,0.3);
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .banner-logo::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: rotate(45deg);
            animation: shimmer 4s infinite;
        }

        .banner-logo:hover {
            transform: scale(1.05) rotate(2deg);
            background: rgba(255,255,255,0.25);
        }

        .banner-logo img { height: 85px; width: auto; }

        /* ===== FILTRES SECTION ===== */
        .filters-section {
            background: white;
            border-radius: 40px;
            padding: 1.8rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
        }

        .filter-tabs {
            display: flex;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: #f8fafc;
            color: #64748b;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .filter-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(102,126,234,0.3);
        }

        .filter-btn.active {
            background: var(--primary-gradient);
            color: white;
            border-color: transparent;
            box-shadow: 0 10px 25px -5px rgba(102,126,234,0.5);
        }

        .filter-btn i { font-size: 0.9rem; }

        .search-filter {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-wrapper {
            flex: 1;
            position: relative;
            max-width: 400px;
        }

        .search-wrapper i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1rem;
            z-index: 1;
        }

        .search-wrapper input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.4s ease;
            background: #f8fafc;
        }

        .search-wrapper input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(102,126,234,0.1);
            background: white;
        }

        /* ===== DESIGN DES CARTES ULTRA MODERNE AVEC EFFETS 3D ===== */
        .livrables-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
            gap: 2rem;
            perspective: 1000px;
        }

        .livrable-card {
            background: white;
            border-radius: 40px;
            padding: 0;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.1);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transform-style: preserve-3d;
            transform: translateZ(0);
            animation: cardEntrance 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            opacity: 0;
        }

        /* Effet 3D au survol */
        .livrable-card:hover {
            transform: translateY(-15px) translateZ(30px) rotateX(2deg);
            box-shadow: 0 40px 70px -25px rgba(102,126,234,0.5);
        }

        /* Effet de bordure lumineuse animée */
        .livrable-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 40px;
            padding: 2px;
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--primary), var(--secondary));
            background-size: 300% 300%;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
            animation: gradientShift 4s ease infinite;
        }

        .livrable-card:hover::before {
            opacity: 1;
        }

        /* Effet de brillance au survol */
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

        /* Barre de statut latérale avec animation */
        .status-bar {
            position: absolute;
            left: 0;
            top: 0;
            width: 8px;
            height: 100%;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 2;
        }

        .livrable-card:hover .status-bar {
            width: 14px;
            filter: brightness(1.15);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .status-bar.not-started { background: linear-gradient(180deg, #94a3b8, #64748b); }
        .status-bar.in-progress { background: linear-gradient(180deg, #3b82f6, #2563eb); animation: glowPulse 2s ease-in-out infinite; }
        .status-bar.completed { background: linear-gradient(180deg, #10b981, #059669); }
        .status-bar.fq-review { background: linear-gradient(180deg, #f59e0b, #d97706); }
        .status-bar.standby { background: linear-gradient(180deg, #8b5cf6, #7c3aed); }
        .status-bar.cancelled { background: linear-gradient(180deg, #ef4444, #dc2626); }

        /* En-tête de la carte avec motif */
        .card-header {
            padding: 1.8rem 2rem 1.2rem 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
            border-bottom: 2px solid rgba(102,126,234,0.08);
            position: relative;
            z-index: 1;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
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
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--dark);
            background: linear-gradient(135deg, var(--dark), #4a5568);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.5s ease;
            line-height: 1.3;
            flex: 1;
            position: relative;
        }

        .livrable-card:hover .card-title {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transform: translateX(5px);
        }

        /* Badge de statut 3D avec effet */
        .status-badge {
            padding: 0.5rem 1.3rem;
            border-radius: 60px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            backdrop-filter: blur(8px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            white-space: nowrap;
            position: relative;
            overflow: hidden;
        }

        .status-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            transition: left 0.5s ease;
        }

        .livrable-card:hover .status-badge::before {
            left: 100%;
        }

        .livrable-card:hover .status-badge {
            transform: scale(1.05) translateX(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .status-badge.not-started { background: #f1f5f9; color: #475569; border-left: 3px solid #94a3b8; }
        .status-badge.in-progress { background: #dbeafe; color: #1e40af; border-left: 3px solid #3b82f6; animation: pulse 2s ease-in-out infinite; }
        .status-badge.completed { background: #d1fae5; color: #065f46; border-left: 3px solid #10b981; }
        .status-badge.fq-review { background: #fed7aa; color: #92400e; border-left: 3px solid #f59e0b; }
        .status-badge.standby { background: #ede9fe; color: #5b21b6; border-left: 3px solid #8b5cf6; }
        .status-badge.cancelled { background: #fee2e2; color: #991b1b; border-left: 3px solid #ef4444; }

        /* Project tag avec effet */
        .project-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: linear-gradient(135deg, #f0f4ff, #e9edff);
            padding: 0.4rem 1.2rem;
            border-radius: 40px;
            font-size: 0.75rem;
            color: var(--primary);
            font-weight: 700;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .project-tag::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
            transition: left 0.5s ease;
        }

        .livrable-card:hover .project-tag::before {
            left: 100%;
        }

        .livrable-card:hover .project-tag {
            transform: translateX(8px) scale(1.02);
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 5px 15px rgba(102,126,234,0.3);
        }

        .project-tag i { font-size: 0.7rem; }

        /* Corps de la carte */
        .card-body {
            padding: 1.5rem 2rem;
            position: relative;
            z-index: 1;
        }

        /* Description stylisée avec effet de citation */
        .description {
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            position: relative;
            padding: 0.5rem 0 0.5rem 1.5rem;
            background: linear-gradient(90deg, rgba(102,126,234,0.03), transparent);
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .livrable-card:hover .description {
            background: linear-gradient(90deg, rgba(102,126,234,0.08), transparent);
            transform: translateX(3px);
        }

        .description::before {
            content: '"';
            position: absolute;
            left: 0;
            top: -5px;
            font-size: 2.2rem;
            color: var(--primary);
            opacity: 0.4;
            font-family: serif;
            transition: all 0.3s ease;
        }

        .livrable-card:hover .description::before {
            opacity: 0.8;
            transform: translateX(-2px);
        }

        /* Métadonnées en cartes avec effet 3D */
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border-radius: 24px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(102,126,234,0.05);
            position: relative;
            overflow: hidden;
        }

        .meta-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102,126,234,0.1), transparent);
            transition: left 0.5s ease;
        }

        .livrable-card:hover .meta-item::before {
            left: 100%;
        }

        .livrable-card:hover .meta-item {
            background: linear-gradient(135deg, #ffffff, #fefefe);
            transform: translateX(5px) translateY(-2px);
            border-color: rgba(102,126,234,0.3);
            box-shadow: 0 8px 20px rgba(102,126,234,0.1);
        }

        .meta-item i {
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1rem;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }

        .livrable-card:hover .meta-item i {
            transform: rotate(360deg) scale(1.15);
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 8px 20px rgba(102,126,234,0.3);
        }

        .meta-item span {
            font-size: 0.8rem;
            color: #475569;
            font-weight: 500;
            line-height: 1.3;
        }

        .meta-item span strong {
            color: var(--dark);
            font-weight: 700;
        }

        /* Section commentaires améliorée avec effet glassmorphism */
        .comments-preview {
            background: linear-gradient(135deg, rgba(248,250,252,0.9), rgba(255,255,255,0.95));
            backdrop-filter: blur(4px);
            border-radius: 28px;
            padding: 1.2rem;
            margin-top: 0.5rem;
            transition: all 0.4s ease;
            border: 1px solid rgba(102,126,234,0.08);
        }

        .livrable-card:hover .comments-preview {
            background: linear-gradient(135deg, #ffffff, #fefefe);
            box-shadow: 0 15px 35px rgba(102,126,234,0.15);
            border-color: rgba(102,126,234,0.2);
            transform: translateY(-3px);
        }

        .comments-header {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 1rem;
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--dark);
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(102,126,234,0.1);
        }

        .comments-header i {
            color: var(--primary);
            background: rgba(102,126,234,0.1);
            padding: 0.5rem;
            border-radius: 50%;
            font-size: 0.8rem;
            transition: all 0.5s ease;
        }

        .livrable-card:hover .comments-header i {
            transform: rotate(360deg);
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 5px 15px rgba(102,126,234,0.3);
        }

        .comment-item {
            padding: 0.8rem;
            background: white;
            border-radius: 20px;
            margin-bottom: 0.6rem;
            border-left: 4px solid var(--primary);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }

        .comment-item:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 20px rgba(102,126,234,0.15);
            border-left-width: 6px;
        }

        .comment-author {
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-bottom: 0.3rem;
        }

        .comment-author i {
            font-size: 0.7rem;
            transition: all 0.3s ease;
        }

        .comment-item:hover .comment-author i {
            transform: scale(1.2);
        }

        .comment-text {
            font-size: 0.75rem;
            color: #64748b;
            line-height: 1.4;
        }

        /* Pied de carte avec bouton animé */
        .card-footer {
            padding: 1.2rem 2rem 2rem 2rem;
            background: linear-gradient(135deg, #fafcff, #ffffff);
            border-top: 2px solid rgba(102,126,234,0.08);
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border: 2px solid rgba(102,126,234,0.2);
            border-radius: 60px;
            color: var(--primary);
            font-weight: 800;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: left 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: 0;
        }

        .btn-primary:hover::before {
            left: 0;
        }

        .btn-primary:hover {
            color: white;
            border-color: transparent;
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 35px rgba(102,126,234,0.4);
        }

        .btn-primary i,
        .btn-primary span {
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .btn-primary:hover i:first-child {
            transform: translateX(-3px);
        }

        .btn-primary:hover i:last-child {
            transform: translateX(8px);
        }

        /* Empty State */
        .empty-state-modern {
            text-align: center;
            padding: 5rem 3rem;
            background: white;
            border-radius: 48px;
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
        }

        .empty-state-modern i {
            font-size: 5rem;
            color: var(--primary);
            opacity: 0.3;
            margin-bottom: 1.5rem;
            animation: float 4s ease-in-out infinite;
        }

        .empty-state-modern h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .empty-state-modern p {
            color: #64748b;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .livrables-grid { grid-template-columns: repeat(2, 1fr); }
            .banner-logo img { height: 70px; }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); transition: transform 0.3s; }
            .main-content { margin-left: 0; }
            .livrables-grid { grid-template-columns: 1fr; }
            .modern-header { flex-direction: column; align-items: flex-start; gap: 1rem; padding: 1.5rem; }
            .welcome-banner { flex-direction: column; text-align: center; }
            .banner-logo { margin-top: 1.5rem; }
            .filter-tabs { justify-content: center; }
            .meta-grid { grid-template-columns: 1fr; }
            .card-title-row { flex-direction: column; }
            .status-badge { align-self: flex-start; }
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

                <a href="{{ route('manager.livrables') }}" class="menu-item active">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <span>Tous les livrables</span>
                    <span class="menu-badge">{{ $livrables->count() ?? 0 }}</span>
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
                        <i class="fas fa-folder-open"></i>
                        Tous les livrables
                    </h1>
                    <p>
                        <i class="fas fa-chart-line"></i>
                        Gérez et suivez l'avancement de tous les livrables
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

            @php
                $totalLivrables = $livrables->count() ?? 0;
                $statsNotStarted = $livrables->where('status', 'not started')->count();
                $statsInProgress = $livrables->where('status', 'in progress')->count();
                $statsFQReview = $livrables->where('status', 'FQ review')->count();
                $statsCompleted = $livrables->where('status', 'completed')->count();
                $statsStandby = $livrables->where('status', 'standby')->count();
                $statsCancelled = $livrables->where('status', 'cancelled')->count();
            @endphp

            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="banner-content">
                    <h2>
                        <i class="fas fa-chart-simple"></i>
                        Gestion des livrables
                    </h2>
                    <p>Consultez et suivez l'avancement de tous les livrables</p>
                    <div class="banner-stats">
                        <div class="banner-stat">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ now()->format('d F Y') }}</span>
                        </div>
                        <div class="banner-stat">
                            <i class="fas fa-tasks"></i>
                            <span>{{ $totalLivrables }} livrables</span>
                        </div>
                    </div>
                </div>
                <div class="banner-logo">
                    <img src="{{ asset('images/logo-segula.png') }}" 
                         alt="Segula"
                         onerror="this.src='https://via.placeholder.com/200x80/ffffff/667eea?text=SEGULA'">
                </div>
            </div>

            <!-- Filtres modernes -->
            <div class="filters-section">
                <div class="filter-tabs">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-layer-group"></i>
                        Tous ({{ $totalLivrables }})
                    </button>
                    <button class="filter-btn" data-filter="not started">
                        <i class="fas fa-clock"></i>
                        Not Started ({{ $statsNotStarted }})
                    </button>
                    <button class="filter-btn" data-filter="in progress">
                        <i class="fas fa-sync-alt"></i>
                        In Progress ({{ $statsInProgress }})
                    </button>
                    <button class="filter-btn" data-filter="FQ review">
                        <i class="fas fa-check-double"></i>
                        FQ Review ({{ $statsFQReview }})
                    </button>
                    <button class="filter-btn" data-filter="completed">
                        <i class="fas fa-check-circle"></i>
                        Completed ({{ $statsCompleted }})
                    </button>
                    <button class="filter-btn" data-filter="standby">
                        <i class="fas fa-pause-circle"></i>
                        Standby ({{ $statsStandby }})
                    </button>
                    <button class="filter-btn" data-filter="cancelled">
                        <i class="fas fa-times-circle"></i>
                        Cancelled ({{ $statsCancelled }})
                    </button>
                </div>
                <div class="search-filter">
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Rechercher un livrable par titre...">
                    </div>
                </div>
            </div>

            <!-- Liste des livrables -->
            @if($livrables->count() > 0)
                <div class="livrables-grid" id="livrablesGrid">
                    @foreach($livrables as $index => $livrable)
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
                        @endphp
                        <div class="livrable-card" data-status="{{ strtolower($livrable->status) }}" data-title="{{ strtolower($livrable->titre) }}" style="animation-delay: {{ $index * 0.05 }}s;">
                            <div class="status-bar {{ $statusClass }}"></div>
                            
                            <div class="card-header">
                                <div class="card-title-row">
                                    <h3 class="card-title">{{ $livrable->titre }}</h3>
                                    <span class="status-badge {{ $statusClass }}">
                                        <i class="fas {{ $statusIcon }}"></i>
                                        {{ ucfirst($livrable->status) }}
                                    </span>
                                </div>
                                @if($livrable->project)
                                <div class="project-tag">
                                    <i class="fas fa-folder"></i>
                                    {{ $livrable->project->nom }}
                                </div>
                                @endif
                            </div>
                            
                            <div class="card-body">
                                <p class="description">
                                    {{ $livrable->description ?? 'Aucune description fournie pour ce livrable.' }}
                                </p>
                                
                                <div class="meta-grid">
                                    <div class="meta-item">
                                        <i class="fas fa-user"></i>
                                        <span>Assigné à: <strong>{{ $livrable->consultant->first_name ?? 'Non assigné' }} {{ $livrable->consultant->last_name ?? '' }}</strong></span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>Créé le <strong>{{ \Carbon\Carbon::parse($livrable->created_at)->format('d/m/Y') }}</strong></span>
                                    </div>
                                    @if($livrable->date_echeance)
                                    <div class="meta-item">
                                        <i class="fas fa-hourglass-half"></i>
                                        <span>
                                            @if($isOverdue)
                                                <span style="color: #ef4444;"><strong>⚠️ En retard</strong></span>
                                            @elseif($hasUrgentDeadline)
                                                <span style="color: #f59e0b;"><strong>🔥 Urgent: J-{{ now()->diffInDays($livrable->date_echeance) }}</strong></span>
                                            @else
                                                Échéance: <strong>{{ \Carbon\Carbon::parse($livrable->date_echeance)->format('d/m/Y') }}</strong>
                                            @endif
                                        </span>
                                    </div>
                                    @endif
                                </div>
                                
                                @if($livrable->comments && $livrable->comments->count() > 0)
                                <div class="comments-preview">
                                    <div class="comments-header">
                                        <i class="fas fa-comments"></i>
                                        <span>Derniers commentaires ({{ $livrable->comments->count() }})</span>
                                    </div>
                                    @foreach($livrable->comments->take(2) as $comment)
                                    <div class="comment-item">
                                        <div class="comment-author">
                                            <i class="fas fa-user-circle"></i>
                                            {{ $comment->user->name }}
                                            <span style="font-size: 0.6rem; color: #94a3b8; margin-left: auto;">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-text">
                                            {{ Str::limit($comment->content, 80) }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            
                            <div class="card-footer">
                                <button class="btn-primary" onclick="viewLivrableDetails({{ $livrable->id }})">
                                    <i class="fas fa-eye"></i>
                                    <span>Voir les détails</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-modern">
                    <i class="fas fa-folder-open"></i>
                    <h3>Aucun livrable</h3>
                    <p>Aucun livrable n'a encore été créé.</p>
                </div>
            @endif
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filtrage par statut
            const filterBtns = document.querySelectorAll('.filter-btn');
            const livrableCards = document.querySelectorAll('.livrable-card');
            const searchInput = document.getElementById('searchInput');

            function filterLivrables() {
                const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
                const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

                livrableCards.forEach(card => {
                    const status = card.dataset.status;
                    const title = card.dataset.title;
                    
                    const statusMatch = activeFilter === 'all' || status === activeFilter;
                    const searchMatch = searchTerm === '' || title.includes(searchTerm);
                    
                    if (statusMatch && searchMatch) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0) scale(1)';
                        }, 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px) scale(0.95)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            }

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    filterLivrables();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', filterLivrables);
            }

            // Animation des icônes au survol
            const metaIcons = document.querySelectorAll('.meta-item i');
            metaIcons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.animation = 'iconPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 400);
                });
            });

            // Effet de parallaxe au survol des cartes
            const cards = document.querySelectorAll('.livrable-card');
            cards.forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = (y - centerY) / 20;
                    const rotateY = (centerX - x) / 20;
                    
                    this.style.transform = `translateY(-10px) translateZ(20px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            });
        });

        function viewLivrableDetails(livrableId) {
            window.location.href = `/manager/livrable/${livrableId}/details`;
        }
    </script>
</x-app-layout>