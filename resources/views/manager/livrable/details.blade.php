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
            --primary-gradient-reverse: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            --success: #10b981;
            --success-dark: #059669;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #0f172a;
            --darker: #0a0f1c;
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
            --not-started: #94a3b8;
            --in-progress: #3b82f6;
            --completed: #10b981;
            --fq-review: #f59e0b;
            --standby: #8b5cf6;
            --cancelled: #ef4444;
            --card-shadow: 0 20px 40px -12px rgba(0,0,0,0.1);
            --card-shadow-hover: 0 30px 60px -15px rgba(102,126,234,0.3);
            --glow-effect: 0 0 30px rgba(102,126,234,0.4);
        }

        /* ===== ANIMATIONS AVANCÉES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-8px) rotate(1deg); }
            75% { transform: translateY(8px) rotate(-1deg); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(102,126,234,0.4); }
            50% { box-shadow: 0 0 40px 15px rgba(102,126,234,0.6); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) skewX(-15deg); }
            100% { transform: translateX(200%) skewX(-15deg); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-80px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(80px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(60px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-60px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.85); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes scaleInBounce {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.97); }
            100% { transform: scale(1); }
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.08); }
            70% { transform: scale(0.95); }
            100% { transform: scale(1); }
        }

        @keyframes rotateIn {
            from { opacity: 0; transform: rotate(-180deg) scale(0.3); }
            to { opacity: 1; transform: rotate(0) scale(1); }
        }

        @keyframes wave {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(20deg); }
            75% { transform: rotate(-20deg); }
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes borderGlow {
            0%, 100% { border-color: rgba(102,126,234,0.2); box-shadow: 0 0 0 0 rgba(102,126,234,0.1); }
            50% { border-color: rgba(102,126,234,0.6); box-shadow: 0 0 30px 10px rgba(102,126,234,0.2); }
        }

        @keyframes loading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(40px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes iconPop {
            0% { transform: scale(1); }
            50% { transform: scale(1.3) rotate(10deg); }
            100% { transform: scale(1) rotate(0deg); }
        }

        @keyframes rotate360 {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.08); opacity: 0.9; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        @keyframes glowPulse {
            0% { box-shadow: 0 0 5px rgba(102,126,234,0.2); }
            50% { box-shadow: 0 0 30px rgba(102,126,234,0.5); }
            100% { box-shadow: 0 0 5px rgba(102,126,234,0.2); }
        }

        @keyframes ribbon {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        @keyframes progressFill {
            from { width: 0; }
            to { width: var(--progress-width); }
        }

        @keyframes numberCount {
            from { counter-reset: count 0; }
            to { counter-reset: count var(--count); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-slow { animation: float-slow 12s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInLeft 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-right { animation: slideInRight 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-up { animation: slideInUp 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-slide-down { animation: slideInDown 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-scale { animation: scaleIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
        .animate-scale-bounce { animation: scaleInBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-bounce { animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-rotate-in { animation: rotateIn 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards; }
        .animate-wave { animation: wave 1s ease-in-out infinite; }
        .animate-gradient { background-size: 200% 200%; animation: gradientShift 3s ease infinite; }
        .animate-border-glow { animation: borderGlow 2s ease-in-out infinite; }
        .animate-card-entrance { animation: cardEntrance 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-icon-pop { animation: iconPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .animate-rotate { animation: rotate360 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55); }
        .animate-pulse { animation: pulse 1.5s ease-in-out infinite; }
        .animate-shake { animation: shake 0.5s ease-in-out; }
        .animate-glow-pulse { animation: glowPulse 2s ease-in-out infinite; }
        .animate-progress-fill { animation: progressFill 1.5s ease-out forwards; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }

        /* Layout principal avec fond dynamique */
        .details-page {
            min-height: 100vh;
            background: radial-gradient(circle at 0% 0%, rgba(102,126,234,0.03) 0%, transparent 50%),
                        radial-gradient(circle at 100% 100%, rgba(118,75,162,0.03) 0%, transparent 50%),
                        linear-gradient(135deg, #f5f7fa 0%, #f0f2f5 100%);
            position: relative;
            overflow-x: hidden;
        }

        .details-page::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102,126,234,0.02) 0%, transparent 70%);
            animation: float-slow 40s linear infinite;
            pointer-events: none;
        }

        .details-page::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(102,126,234,0.02) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Container principal */
        .details-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        /* ===== HEADER DE NAVIGATION AVEC EFFET GLASS ===== */
        .nav-header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 80px;
            padding: 1rem 2rem;
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
            position: sticky;
            top: 1rem;
            z-index: 100;
            animation: slideInDown 0.6s ease forwards;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-brand-icon {
            width: 45px;
            height: 45px;
            background: var(--primary-gradient);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 10px 20px rgba(102,126,234,0.3);
            transition: all 0.4s ease;
        }

        .nav-brand:hover .nav-brand-icon {
            transform: rotate(360deg) scale(1.1);
        }

        .nav-brand-text h2 {
            font-size: 1.3rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-brand-text p {
            font-size: 0.7rem;
            color: var(--gray-500);
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 2rem;
            background: white;
            border-radius: 50px;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
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
            transform: translateX(-8px);
            color: white;
            border-color: transparent;
        }

        .back-button i, .back-button span {
            position: relative;
            z-index: 1;
        }

        /* ===== BREADCRUMB AVANCÉ ===== */
        .breadcrumb-modern {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            animation: slideInLeft 0.5s ease forwards;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-500);
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--secondary);
            transform: translateX(3px);
        }

        .breadcrumb-item.active {
            color: var(--gray-800);
            font-weight: 600;
        }

        .breadcrumb-separator {
            color: var(--gray-400);
            font-size: 0.7rem;
        }

        /* ===== EN-TÊTE PRINCIPAL AVEC EFFET HERO ===== */
        .hero-section {
            background: var(--primary-gradient);
            border-radius: 50px;
            padding: 3rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            animation: scaleIn 0.6s ease forwards;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 12s ease-in-out infinite;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: float-slow 15s ease-in-out infinite;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
        }

        .hero-badges {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.5rem 1.2rem;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .hero-badge:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .hero-description {
            font-size: 1rem;
            opacity: 0.9;
            max-width: 70%;
            line-height: 1.6;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .hero-stat {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            background: rgba(255,255,255,0.15);
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            backdrop-filter: blur(8px);
        }

        /* ===== CARTE D'INFORMATIONS AVEC EFFET 3D ===== */
        .info-grid-modern {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-card-modern {
            background: white;
            border-radius: 32px;
            padding: 1.8rem;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            animation: slideInUp 0.6s ease forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .info-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102,126,234,0.05), transparent);
            transition: left 0.6s ease;
        }

        .info-card-modern:hover::before {
            left: 100%;
        }

        .info-card-modern:hover {
            transform: translateY(-8px) translateX(-3px);
            border-color: rgba(102,126,234,0.3);
            box-shadow: 0 25px 45px -15px rgba(102,126,234,0.25);
        }

        .card-icon-wrapper {
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
            transition: all 0.4s ease;
        }

        .info-card-modern:hover .card-icon-wrapper {
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 15px 30px rgba(102,126,234,0.3);
        }

        .card-icon-wrapper i {
            font-size: 1.6rem;
            color: white;
        }

        .card-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 800;
            color: var(--gray-400);
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--gray-800);
            line-height: 1.4;
        }

        .status-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            background: var(--gray-100);
        }

        .status-chip.not-started { background: #f1f5f9; color: #475569; border-left: 3px solid #94a3b8; }
        .status-chip.in-progress { background: #dbeafe; color: #1e40af; border-left: 3px solid #3b82f6; animation: pulse 2s ease-in-out infinite; }
        .status-chip.completed { background: #d1fae5; color: #065f46; border-left: 3px solid #10b981; }
        .status-chip.fq-review { background: #fed7aa; color: #92400e; border-left: 3px solid #f59e0b; }
        .status-chip.standby { background: #ede9fe; color: #5b21b6; border-left: 3px solid #8b5cf6; }
        .status-chip.cancelled { background: #fee2e2; color: #991b1b; border-left: 3px solid #ef4444; }

        /* ===== SECTION PROGRESSION AVEC ANIMATION ===== */
        .progress-section {
            background: white;
            border-radius: 32px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(102,126,234,0.1);
            animation: slideInUp 0.6s ease 0.1s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .progress-title {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--gray-800);
        }

        .progress-percentage {
            font-size: 2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .progress-bar-container {
            background: var(--gray-200);
            border-radius: 60px;
            height: 12px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 60px;
            width: 0;
            position: relative;
            overflow: hidden;
            animation: progressFill 1.5s ease-out forwards;
        }

        .progress-bar-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2s infinite;
        }

        .progress-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            font-size: 0.8rem;
            color: var(--gray-500);
        }

        /* ===== DESCRIPTION AVEC EFFET CITATION ===== */
        .description-modern {
            background: linear-gradient(135deg, var(--gray-50), white);
            border-radius: 32px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            animation: slideInUp 0.6s ease 0.2s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .description-modern::before {
            content: '“';
            position: absolute;
            left: 2rem;
            top: 1rem;
            font-size: 6rem;
            color: var(--primary);
            opacity: 0.1;
            font-family: Georgia, serif;
            pointer-events: none;
        }

        .description-modern h3 {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--gray-800);
            display: flex;
            align-items: center;
            gap: 0.6rem;
            position: relative;
            z-index: 1;
        }

        .description-modern p {
            color: var(--gray-600);
            line-height: 1.8;
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }

        /* ===== SECTION DES TÂCHES AVANCÉE ===== */
        .tasks-modern {
            background: white;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            animation: slideInUp 0.6s ease 0.3s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .tasks-header-modern {
            background: linear-gradient(135deg, #059669, #10b981);
            padding: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .tasks-header-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite;
        }

        .tasks-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .tasks-header-content h2 {
            font-size: 1.6rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .tasks-counter {
            background: rgba(255,255,255,0.2);
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-weight: 700;
        }

        .tasks-stats-mini {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            position: relative;
            z-index: 1;
        }

        .tasks-stat-mini {
            background: rgba(255,255,255,0.15);
            padding: 0.3rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .tasks-list-modern {
            padding: 2rem;
        }

        .task-card-modern {
            background: linear-gradient(135deg, var(--gray-50), white);
            border-radius: 24px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(102,126,234,0.08);
            position: relative;
            overflow: hidden;
        }

        .task-card-modern::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-gradient);
            transform: scaleY(0);
            transition: transform 0.4s ease;
        }

        .task-card-modern:hover::before {
            transform: scaleY(1);
        }

        .task-card-modern:hover {
            transform: translateX(12px);
            border-color: rgba(102,126,234,0.2);
            box-shadow: 0 20px 35px -12px rgba(102,126,234,0.2);
        }

        .task-header-modern {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .task-title {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--gray-800);
        }

        .task-status-modern {
            padding: 0.3rem 1.2rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .task-status-modern.terminé { background: #d1fae5; color: #065f46; }
        .task-status-modern.en_cours { background: #dbeafe; color: #1e40af; animation: pulse 1.5s ease-in-out infinite; }
        .task-status-modern.en_attente { background: #fed7aa; color: #92400e; }
        .task-status-modern.bloqué { background: #fee2e2; color: #991b1b; }

        .task-description-modern {
            color: var(--gray-600);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            padding-left: 2rem;
        }

        .task-meta-modern {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            font-size: 0.8rem;
            color: var(--gray-500);
            padding-left: 2rem;
        }

        .task-meta-modern i {
            margin-right: 0.3rem;
            color: var(--primary);
        }

        .task-deadline-urgent {
            color: var(--danger);
            font-weight: 600;
            animation: pulse 1s ease-in-out infinite;
        }

        /* ===== GALLERIE DE MÉDIAS ===== */
        .media-section {
            background: white;
            border-radius: 32px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(102,126,234,0.1);
            animation: slideInUp 0.6s ease 0.4s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .media-section h3 {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--gray-800);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .media-item {
            background: var(--gray-50);
            border-radius: 16px;
            padding: 1rem;
            text-align: center;
            transition: all 0.4s ease;
            cursor: pointer;
            border: 1px solid rgba(102,126,234,0.1);
        }

        .media-item:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 25px rgba(102,126,234,0.15);
        }

        .media-item i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .media-item span {
            display: block;
            font-size: 0.7rem;
            color: var(--gray-600);
        }

        /* ===== TIMELINE ACTIVITÉ ===== */
        .timeline-section {
            background: white;
            border-radius: 32px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(102,126,234,0.1);
            animation: slideInUp 0.6s ease 0.5s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .timeline-section h3 {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .timeline {
            position: relative;
            padding-left: 2rem;
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
            padding-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2rem;
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
            margin-bottom: 0.3rem;
        }

        .timeline-content {
            font-size: 0.9rem;
            color: var(--gray-700);
        }

        /* ===== MÉTADONNÉES ===== */
        .metadata-modern {
            background: linear-gradient(135deg, var(--gray-50), white);
            border-radius: 24px;
            padding: 1.2rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            font-size: 0.8rem;
            color: var(--gray-500);
            animation: slideInUp 0.6s ease 0.6s forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        /* ===== MODAL DE CONFIRMATION ===== */
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
            border-radius: 48px;
            max-width: 500px;
            width: 90%;
            padding: 2rem;
            text-align: center;
            animation: scaleInBounce 0.5s ease;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .hero-title { font-size: 2.2rem; }
            .hero-description { max-width: 100%; }
        }

        @media (max-width: 768px) {
            .details-container { padding: 1rem; }
            .nav-header { flex-direction: column; gap: 1rem; border-radius: 30px; }
            .hero-section { padding: 1.5rem; }
            .hero-title { font-size: 1.5rem; }
            .info-grid-modern { grid-template-columns: 1fr; }
            .tasks-header-content { flex-direction: column; align-items: flex-start; }
            .task-header-modern { flex-direction: column; align-items: flex-start; }
            .timeline { padding-left: 1rem; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    <div class="details-page">
        <div class="details-container">
            <!-- Navigation Header -->
            <div class="nav-header">
                <div class="nav-brand">
                    <div class="nav-brand-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="nav-brand-text">
                        <h2>Gestion Livrable</h2>
                        <p>Plateforme de suivi</p>
                    </div>
                </div>
                <a href="{{ route('manager.livrables') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour à la liste</span>
                </a>
            </div>

            <!-- Breadcrumb -->
            <div class="breadcrumb-modern">
                <div class="breadcrumb-item">
                    <a href="{{ route('manager.dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </div>
                <div class="breadcrumb-separator">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('manager.livrables') }}">Livrables</a>
                </div>
                <div class="breadcrumb-separator">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="breadcrumb-item active">
                    {{ $livrable->titre }}
                </div>
            </div>

            @php
                $statusClass = str_replace(' ', '-', strtolower($livrable->status));
                $statusIcon = match($livrable->status) {
                    'not started' => 'fa-clock',
                    'in progress' => 'fa-sync-alt',
                    'FQ review' => 'fa-check-double',
                    'completed' => 'fa-check-circle',
                    'standby' => 'fa-pause-circle',
                    'cancelled' => 'fa-times-circle',
                    default => 'fa-question-circle'
                };
                $isOverdue = $livrable->date_echeance && $livrable->date_echeance < now();
                $tasksCompleted = $livrable->tasks->where('status', 'terminé')->count();
                $tasksTotal = $livrable->tasks->count();
                $progressPercentage = $tasksTotal > 0 ? round(($tasksCompleted / $tasksTotal) * 100) : 0;
            @endphp

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="hero-content">
                    <div class="hero-badges">
                        <div class="hero-badge">
                            <i class="fas {{ $statusIcon }}"></i>
                            {{ ucfirst($livrable->status) }}
                        </div>
                        @if($livrable->project)
                            <div class="hero-badge">
                                <i class="fas fa-folder"></i>
                                {{ $livrable->project->nom }}
                            </div>
                        @endif
                        @if($livrable->type)
                            <div class="hero-badge">
                                <i class="fas fa-tag"></i>
                                {{ ucfirst($livrable->type) }}
                            </div>
                        @endif
                    </div>
                    <h1 class="hero-title">{{ $livrable->titre }}</h1>
                    <p class="hero-description">
                        @if($livrable->description)
                            {{ Str::limit($livrable->description, 200) }}
                        @else
                            Aucune description fournie pour ce livrable.
                        @endif
                    </p>
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <i class="fas fa-calendar-alt"></i>
                            Créé le {{ $livrable->created_at ? $livrable->created_at->format('d/m/Y') : 'N/A' }}
                        </div>
                        <div class="hero-stat">
                            <i class="fas fa-tasks"></i>
                            {{ $tasksTotal }} tâches
                        </div>
                        <div class="hero-stat">
                            <i class="fas fa-chart-line"></i>
                            {{ $progressPercentage }}% complété
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grille d'informations avancée -->
            <div class="info-grid-modern">
                <div class="info-card-modern" style="animation-delay: 0.1s">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-label">Consultant assigné</div>
                    <div class="card-value">
                        @if($livrable->consultant)
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <div style="width: 40px; height: 40px; background: var(--primary-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    {{ strtoupper(substr($livrable->consultant->first_name, 0, 1)) }}
                                </div>
                                <div>
                                    <strong>{{ $livrable->consultant->first_name }} {{ $livrable->consultant->last_name }}</strong>
                                    <div style="font-size: 0.7rem; color: var(--gray-500);">{{ $livrable->consultant->email ?? '' }}</div>
                                </div>
                            </div>
                        @else
                            <span class="status-chip">Non assigné</span>
                        @endif
                    </div>
                </div>

                <div class="info-card-modern" style="animation-delay: 0.15s">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="card-label">Date de création</div>
                    <div class="card-value">
                        {{ $livrable->created_at ? $livrable->created_at->format('d/m/Y') : 'Non définie' }}
                        <div style="font-size: 0.7rem; color: var(--gray-500);">
                            {{ $livrable->created_at ? $livrable->created_at->format('H:i') : '' }}
                        </div>
                    </div>
                </div>

                @if($livrable->date_echeance)
                <div class="info-card-modern" style="animation-delay: 0.2s">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="card-label">Date d'échéance</div>
                    <div class="card-value">
                        {{ \Carbon\Carbon::parse($livrable->date_echeance)->format('d/m/Y') }}
                        @if($isOverdue)
                            <div style="color: var(--danger); font-size: 0.7rem; margin-top: 0.3rem;">
                                <i class="fas fa-exclamation-triangle"></i> En retard de {{ now()->diffInDays($livrable->date_echeance) }} jours
                            </div>
                        @elseif($livrable->date_echeance > now())
                            <div style="color: var(--success); font-size: 0.7rem; margin-top: 0.3rem;">
                                <i class="fas fa-clock"></i> J-{{ now()->diffInDays($livrable->date_echeance) }}
                            </div>
                        @endif
                    </div>
                </div>
                @endif

                @if($livrable->date_fin_prevue)
                <div class="info-card-modern" style="animation-delay: 0.25s">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-flag-checkered"></i>
                    </div>
                    <div class="card-label">Fin prévue</div>
                    <div class="card-value">
                        {{ \Carbon\Carbon::parse($livrable->date_fin_prevue)->format('d/m/Y') }}
                    </div>
                </div>
                @endif

                @if($livrable->priority)
                <div class="info-card-modern" style="animation-delay: 0.3s">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="card-label">Priorité</div>
                    <div class="card-value">
                        <span class="status-chip" style="background: #fef3c7; color: #92400e;">
                            <i class="fas fa-flag"></i> {{ ucfirst($livrable->priority) }}
                        </span>
                    </div>
                </div>
                @endif

                <div class="info-card-modern" style="animation-delay: 0.35s">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-hashtag"></i>
                    </div>
                    <div class="card-label">Identifiant unique</div>
                    <div class="card-value">
                        #{{ $livrable->id }}
                        <div style="font-size: 0.7rem; color: var(--gray-500);">Référence interne</div>
                    </div>
                </div>
            </div>

            <!-- Section Progression -->
            <div class="progress-section">
                <div class="progress-header">
                    <div class="progress-title">
                        <i class="fas fa-chart-simple" style="color: var(--primary);"></i>
                        Progression du livrable
                    </div>
                    <div class="progress-percentage">
                        {{ $progressPercentage }}%
                    </div>
                </div>
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="--progress-width: {{ $progressPercentage }}%; width: {{ $progressPercentage }}%;"></div>
                </div>
                <div class="progress-stats">
                    <span><i class="fas fa-check-circle" style="color: var(--success);"></i> {{ $tasksCompleted }} tâches terminées</span>
                    <span><i class="fas fa-tasks"></i> {{ $tasksTotal }} tâches au total</span>
                    <span><i class="fas fa-chart-line"></i> {{ $tasksTotal - $tasksCompleted }} restantes</span>
                </div>
            </div>

            <!-- Description détaillée -->
            @if($livrable->description)
            <div class="description-modern">
                <h3>
                    <i class="fas fa-align-left"></i>
                    Description complète
                </h3>
                <p>{{ $livrable->description }}</p>
            </div>
            @endif

            <!-- Section des tâches avancée -->
            <div class="tasks-modern">
                <div class="tasks-header-modern">
                    <div class="tasks-header-content">
                        <h2>
                            <i class="fas fa-tasks"></i>
                            Tâches associées
                        </h2>
                        <div class="tasks-counter">
                            {{ $tasksTotal }} tâche(s)
                        </div>
                    </div>
                    <div class="tasks-stats-mini">
                        <div class="tasks-stat-mini">
                            <i class="fas fa-check-circle"></i>
                            {{ $tasksCompleted }} terminées
                        </div>
                        <div class="tasks-stat-mini">
                            <i class="fas fa-spinner"></i>
                            {{ $tasksTotal - $tasksCompleted }} en cours
                        </div>
                    </div>
                </div>

                <div class="tasks-list-modern">
                    @if($livrable->tasks && $livrable->tasks->count() > 0)
                        @foreach($livrable->tasks as $task)
                            @php
                                $taskDeadline = $task->deadline ? \Carbon\Carbon::parse($task->deadline) : null;
                                $isTaskOverdue = $taskDeadline && $taskDeadline < now() && $task->status !== 'terminé';
                            @endphp
                            <div class="task-card-modern">
                                <div class="task-header-modern">
                                    <div class="task-title">
                                        <i class="fas fa-check-circle" style="color: var(--primary);"></i>
                                        {{ $task->nom }}
                                    </div>
                                    <span class="task-status-modern {{ str_replace(' ', '_', strtolower($task->status)) }}">
                                        <i class="fas {{ $task->status === 'terminé' ? 'fa-check' : ($task->status === 'en_cours' ? 'fa-play' : 'fa-pause') }}"></i>
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                </div>
                                @if($task->description)
                                    <div class="task-description-modern">
                                        {{ $task->description }}
                                    </div>
                                @endif
                                <div class="task-meta-modern">
                                    @if($task->deadline)
                                        <span class="{{ $isTaskOverdue ? 'task-deadline-urgent' : '' }}">
                                            <i class="fas fa-calendar-alt"></i>
                                            Échéance : {{ $taskDeadline->format('d/m/Y') }}
                                            @if($isTaskOverdue)
                                                <i class="fas fa-exclamation-circle"></i> En retard
                                            @endif
                                        </span>
                                    @endif
                                    @if($task->assignee)
                                        <span>
                                            <i class="fas fa-user"></i>
                                            Assigné à : {{ $task->assignee->name }}
                                        </span>
                                    @endif
                                    <span>
                                        <i class="fas fa-clock"></i>
                                        Créé le {{ $task->created_at ? $task->created_at->format('d/m/Y') : 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="text-align: center; padding: 4rem 2rem;">
                            <i class="fas fa-clipboard-list" style="font-size: 4rem; color: var(--primary); opacity: 0.3; margin-bottom: 1rem; display: block;"></i>
                            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--gray-700); margin-bottom: 0.5rem;">Aucune tâche</h3>
                            <p style="color: var(--gray-500);">Aucune tâche n'est associée à ce livrable pour le moment.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Section Galerie Médias (si des fichiers sont attachés) -->
            @if(isset($livrable->attachments) && $livrable->attachments->count() > 0)
            <div class="media-section">
                <h3>
                    <i class="fas fa-paperclip"></i>
                    Fichiers joints ({{ $livrable->attachments->count() }})
                </h3>
                <div class="media-grid">
                    @foreach($livrable->attachments->take(6) as $attachment)
                        <div class="media-item" onclick="window.open('{{ $attachment->url }}', '_blank')">
                            <i class="fas fa-file-alt"></i>
                            <span>{{ Str::limit($attachment->name, 20) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Timeline d'activité -->
            <div class="timeline-section">
                <h3>
                    <i class="fas fa-history"></i>
                    Historique des modifications
                </h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">{{ $livrable->created_at ? $livrable->created_at->format('d/m/Y à H:i') : 'N/A' }}</div>
                        <div class="timeline-content">
                            <strong>Création du livrable</strong> - Livrable créé par {{ $livrable->creator->name ?? 'un utilisateur' }}
                        </div>
                    </div>
                    @if($livrable->updated_at && $livrable->updated_at != $livrable->created_at)
                    <div class="timeline-item">
                        <div class="timeline-date">{{ $livrable->updated_at->format('d/m/Y à H:i') }}</div>
                        <div class="timeline-content">
                            <strong>Dernière modification</strong> - Mise à jour du livrable
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Métadonnées -->
            <div class="metadata-modern">
                <span><i class="fas fa-edit"></i> Dernière modification : {{ $livrable->updated_at ? $livrable->updated_at->format('d/m/Y à H:i') : 'Non définie' }}</span>
                <span><i class="fas fa-fingerprint"></i> ID Technique : {{ $livrable->id }}</span>
                <span><i class="fas fa-database"></i> Version : 1.0</span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des cartes au scroll
            const cards = document.querySelectorAll('.info-card-modern, .progress-section, .description-modern, .tasks-modern, .media-section, .timeline-section');
            
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
            
            // Animation des icônes au survol
            const icons = document.querySelectorAll('.card-icon-wrapper, .media-item, .task-card-modern');
            icons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.animation = 'iconPop 0.4s ease';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 400);
                });
            });
            
            // Effet de compteur pour le pourcentage
            const percentageElement = document.querySelector('.progress-percentage');
            if (percentageElement) {
                const targetPercentage = {{ $progressPercentage }};
                let currentPercentage = 0;
                const increment = targetPercentage / 30;
                const timer = setInterval(() => {
                    if (currentPercentage < targetPercentage) {
                        currentPercentage += increment;
                        percentageElement.textContent = Math.round(currentPercentage) + '%';
                    } else {
                        percentageElement.textContent = targetPercentage + '%';
                        clearInterval(timer);
                    }
                }, 50);
            }
        });
        
        // Fonction pour afficher les détails d'un fichier
        function viewFile(url) {
            window.open(url, '_blank');
        }
    </script>
</x-app-layout>