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
            --pink: #ec4899;
            --cyan: #06b6d4;
            --emerald: #10b981;
            --orange: #f59e0b;
            --red: #ef4444;
            --blue: #3b82f6;
            --slate: #475569;
            --dark: #1e293b;
            --light: #f8fafc;

            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --purple-pink-gradient: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            --blue-cyan-gradient: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            --green-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --orange-gradient: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            --dark-gradient: linear-gradient(135deg, #475569 0%, #1e293b 100%);
            --card-shadow: 0 20px 40px -15px rgba(0,0,0,0.10);
            --sidebar-width: 280px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-10px) rotate(1deg); }
            75% { transform: translateY(10px) rotate(-1deg); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) skewX(-15deg); }
            100% { transform: translateX(200%) skewX(-15deg); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-slide-left { animation: slideInLeft 0.6s ease forwards; }
        .animate-slide-right { animation: slideInRight 0.6s ease forwards; }
        .animate-scale { animation: scaleIn 0.5s ease forwards; }
        .fade-in { animation: fadeIn 0.5s ease forwards; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
            background:
                radial-gradient(circle at 20% 20%, rgba(102,126,234,0.06) 0%, transparent 35%),
                radial-gradient(circle at 80% 15%, rgba(236,72,153,0.05) 0%, transparent 30%),
                radial-gradient(circle at 80% 80%, rgba(6,182,212,0.06) 0%, transparent 35%),
                linear-gradient(135deg, #f8fbff 0%, #f4f7fb 100%);
            overflow-x: hidden;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: rgba(255,255,255,0.96);
            backdrop-filter: blur(12px);
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
            box-shadow: 0 15px 25px -8px rgba(102, 126, 234, 0.4);
            border: 3px solid white;
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

        .partner-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(102,126,234,0.03), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
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
            margin-top: 1rem;
            padding: 0.8rem;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #edf2f7;
            position: relative;
            z-index: 1;
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
            transition: all 0.35s ease;
            text-decoration: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .menu-item:hover::before {
            opacity: 0.08;
        }

        .menu-item:hover {
            transform: translateX(8px);
            color: var(--primary);
        }

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
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(12px);
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
            background: linear-gradient(135deg, rgba(102,126,234,0.05), rgba(118,75,162,0.05));
            border-radius: 50%;
            z-index: 0;
            animation: float 8s infinite ease-in-out;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .header-content h1 {
            font-size: 2.5rem;
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
            gap: 0.5rem;
        }

        .header-content p i {
            color: var(--primary);
            background: rgba(102,126,234,0.1);
            padding: 0.4rem;
            border-radius: 50%;
            font-size: 0.8rem;
        }

        .manager-profile {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: rgba(255,255,255,0.95);
            padding: 0.6rem 1.8rem 0.6rem 0.6rem;
            border-radius: 70px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
        }

        .manager-avatar {
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

        .manager-info .role i {
            color: var(--emerald);
            font-size: 0.5rem;
        }

        .welcome-banner {
            background: var(--primary-gradient);
            border-radius: 32px;
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
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .banner-content h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .banner-content p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .banner-stats {
            display: flex;
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .banner-stat {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.15);
            padding: 0.4rem 1rem;
            border-radius: 40px;
            backdrop-filter: blur(5px);
            font-size: 0.85rem;
        }

        .banner-logo {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(5px);
            padding: 1.5rem 3rem;
            border-radius: 30px;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .banner-logo img {
            height: 100px;
            width: auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.6rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(18px);
            border-radius: 32px;
            padding: 1.7rem;
            border: 1px solid rgba(255,255,255,0.75);
            box-shadow: 0 20px 45px -18px rgba(15, 23, 42, 0.18);
            transition: all 0.45s ease;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .stat-card.purple-card::before {
            background: linear-gradient(135deg, rgba(139,92,246,0.09), transparent 45%, rgba(236,72,153,0.08));
        }

        .stat-card.blue-card::before {
            background: linear-gradient(135deg, rgba(59,130,246,0.09), transparent 45%, rgba(6,182,212,0.08));
        }

        .stat-card.green-card::before {
            background: linear-gradient(135deg, rgba(16,185,129,0.09), transparent 45%, rgba(5,150,105,0.08));
        }

        .stat-card.orange-card::before {
            background: linear-gradient(135deg, rgba(245,158,11,0.09), transparent 45%, rgba(249,115,22,0.08));
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.45s ease;
        }

        .stat-card.purple-card::after { background: var(--purple-pink-gradient); }
        .stat-card.blue-card::after { background: var(--blue-cyan-gradient); }
        .stat-card.green-card::after { background: var(--green-gradient); }
        .stat-card.orange-card::after { background: var(--orange-gradient); }

        .stat-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 70px -22px rgba(102,126,234,0.28);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card:hover::after {
            transform: scaleX(1);
        }

        .stat-card > * {
            position: relative;
            z-index: 1;
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.2rem;
        }

        .stat-icon {
            width: 62px;
            height: 62px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 14px 28px -10px rgba(0,0,0,0.16);
            transition: all 0.35s ease;
        }

        .stat-card:hover .stat-icon {
            transform: rotate(8deg) scale(1.08);
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #ede9fe, #f5d0fe);
            color: #7c3aed;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #dbeafe, #cffafe);
            color: #2563eb;
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #d1fae5, #bbf7d0);
            color: #059669;
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #fef3c7, #fed7aa);
            color: #ea580c;
        }

        .stat-trend {
            padding: 0.32rem 0.8rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
        }

        .stat-trend.positive {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        .stat-trend.neutral {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }

        .stat-number {
            font-size: 2.7rem;
            line-height: 1;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 0.45rem;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.88rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .stat-subtext {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.72rem;
            color: #94a3b8;
            margin-bottom: 0.9rem;
            background: #f8fafc;
            padding: 0.35rem 0.7rem;
            border-radius: 999px;
        }

        .stat-progress {
            margin-top: 0.9rem;
            padding-top: 0.8rem;
            border-top: 1px solid rgba(226,232,240,0.75);
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 0.45rem;
            color: #64748b;
        }

        .progress-value {
            color: var(--primary);
            font-weight: 800;
        }

        .progress-bar {
            width: 100%;
            height: 9px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 999px;
            transition: width 0.6s ease;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
        }

        .progress-fill.blue { background: linear-gradient(90deg, #3b82f6, #06b6d4); }
        .progress-fill.green { background: linear-gradient(90deg, #10b981, #059669); }
        .progress-fill.purple { background: linear-gradient(90deg, #8b5cf6, #ec4899); }
        .progress-fill.orange { background: linear-gradient(90deg, #f59e0b, #f97316); }

        /* SEARCH BAR */
        .search-wrapper {
            margin-bottom: 2rem;
            display: flex;
            justify-content: flex-start;
        }

        .search-container {
            position: relative;
            width: 480px;
            max-width: 100%;
        }

        .search-container::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #667eea, #764ba2, #06b6d4);
            border-radius: 999px;
            opacity: 0;
            transition: opacity 0.35s ease;
            z-index: 0;
        }

        .search-container:hover::before,
        .search-container:focus-within::before {
            opacity: 1;
        }

        .search-inner {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            background: rgba(255,255,255,0.94);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(226,232,240,0.9);
            border-radius: 999px;
            padding: 0.35rem;
            box-shadow: 0 16px 35px -18px rgba(15, 23, 42, 0.18);
            transition: all 0.35s ease;
            overflow: hidden;
        }

        .search-container:focus-within .search-inner {
            box-shadow: 0 22px 45px -18px rgba(102,126,234,0.28);
            transform: translateY(-2px);
        }

        .search-icon-box {
            width: 48px;
            height: 48px;
            min-width: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: linear-gradient(135deg, #eef2ff, #dbeafe);
            color: #4f46e5;
            font-size: 1rem;
            margin-right: 0.35rem;
            transition: all 0.35s ease;
        }

        .search-container:focus-within .search-icon-box {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: scale(1.05) rotate(6deg);
        }

        .search-input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            font-size: 0.95rem;
            font-weight: 500;
            color: #1e293b;
            padding: 0 0.4rem;
        }

        .search-input::placeholder {
            color: #94a3b8;
            font-weight: 500;
        }

        .search-shortcut {
            margin-right: 0.5rem;
            padding: 0.35rem 0.65rem;
            border-radius: 999px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            transition: all 0.3s ease;
        }

        .search-container:focus-within .search-shortcut {
            background: #eef2ff;
            border-color: #c7d2fe;
            color: #4f46e5;
        }

        .search-clear {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border: none;
            border-radius: 999px;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
        }

        .search-clear:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        .search-hint {
            margin-top: 0.65rem;
            padding-left: 1rem;
            font-size: 0.75rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .search-hint i {
            color: #6366f1;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .title-bar {
            width: 5px;
            height: 30px;
            background: var(--primary-gradient);
            border-radius: 5px;
        }

        .section-title h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--dark);
        }

        .section-title i {
            color: var(--primary);
            font-size: 1.2rem;
            background: rgba(102,126,234,0.1);
            padding: 0.5rem;
            border-radius: 12px;
        }

        .consultants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
            gap: 2rem;
        }

        .consultant-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(18px);
            border-radius: 34px;
            padding: 1.8rem;
            box-shadow: 0 20px 45px -20px rgba(15, 23, 42, 0.16);
            border: 1px solid rgba(255,255,255,0.75);
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .consultant-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(102,126,234,0.10), transparent 30%),
                linear-gradient(135deg, rgba(255,255,255,0.65), rgba(248,250,252,0.9));
            opacity: 1;
        }

        .consultant-card::after {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(102,126,234,0.10), transparent 70%);
            transition: transform 0.5s ease;
        }

        .consultant-card:hover {
            transform: translateY(-10px) scale(1.01);
            box-shadow: 0 32px 70px -22px rgba(102,126,234,0.26);
        }

        .consultant-card:hover::after {
            transform: scale(1.18);
        }

        .consultant-header,
        .progress-stats,
        .consultant-stats,
        .btn-details {
            position: relative;
            z-index: 1;
        }

        .consultant-header {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
        }

        .consultant-avatar-card {
            width: 74px;
            height: 74px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.55rem;
            font-weight: 900;
            box-shadow: 0 18px 30px -12px rgba(102, 126, 234, 0.38);
            border: 3px solid rgba(255,255,255,0.85);
        }

        .consultant-info-card h3 {
            font-size: 1.18rem;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .consultant-info-card p {
            font-size: 0.82rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.45rem;
            font-weight: 600;
        }

        .consultant-info-card p i {
            color: var(--emerald);
            font-size: 0.55rem;
        }

        .progress-stats {
            margin-bottom: 1.5rem;
        }

        .progress-stat-item {
            margin-bottom: 1rem;
            background: rgba(248,250,252,0.9);
            border: 1px solid rgba(226,232,240,0.8);
            border-radius: 18px;
            padding: 1rem 1rem 0.9rem;
        }

        .progress-stat-header {
            display: flex;
            justify-content: space-between;
            font-size: 0.78rem;
            font-weight: 800;
            margin-bottom: 0.55rem;
        }

        .progress-stat-header .label {
            color: #64748b;
        }

        .progress-stat-header .value {
            color: var(--primary);
        }

        .progress-stat-bar {
            width: 100%;
            height: 9px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-stat-fill {
            height: 100%;
            border-radius: 999px;
            transition: width 0.5s ease;
        }

        .progress-stat-fill.completed {
            background: linear-gradient(90deg, #10b981, #059669);
            box-shadow: 0 0 14px rgba(16,185,129,0.25);
        }

        .consultant-stats {
            display: flex;
            justify-content: space-between;
            gap: 0.85rem;
            margin-top: 1.25rem;
            padding-top: 1.2rem;
            border-top: 1px solid rgba(226,232,240,0.8);
        }

        .consultant-stat {
            flex: 1;
            text-align: center;
            padding: 0.8rem 0.6rem;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border: 1px solid rgba(226,232,240,0.9);
            border-radius: 18px;
            transition: all 0.35s ease;
            cursor: pointer;
        }

        .consultant-stat:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 25px -15px rgba(102,126,234,0.35);
            border-color: rgba(102,126,234,0.25);
        }

        .consultant-stat-number {
            font-size: 1.45rem;
            font-weight: 900;
            line-height: 1;
        }

        .consultant-stat-label {
            font-size: 0.62rem;
            color: #64748b;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-top: 0.35rem;
        }

        .consultant-stat .mini-bar {
            width: 100%;
            height: 4px;
            background: #e2e8f0;
            border-radius: 999px;
            margin-top: 0.55rem;
            overflow: hidden;
        }

        .consultant-stat .mini-fill {
            height: 100%;
            border-radius: 999px;
            transition: width 0.35s ease;
        }

        .mini-fill.not-started { background: #94a3b8; }
        .mini-fill.in-progress { background: #3b82f6; }
        .mini-fill.completed { background: #10b981; }

        .btn-details {
            width: 100%;
            margin-top: 1.3rem;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fafc, #eef2ff);
            border: 1px solid rgba(102,126,234,0.15);
            border-radius: 999px;
            color: var(--primary);
            font-weight: 800;
            font-size: 0.88rem;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            position: relative;
            z-index: 1;
            overflow: hidden;
            text-decoration: none;
        }

        .btn-details::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--primary-gradient);
            transform: translateX(-100%);
            transition: transform 0.4s ease;
            z-index: 0;
        }

        .btn-details:hover::before {
            transform: translateX(0);
        }

        .btn-details i,
        .btn-details span {
            position: relative;
            z-index: 1;
        }

        .btn-details:hover {
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 16px 30px -12px rgba(102,126,234,0.35);
        }

        .empty-state-modern {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 40px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
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

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .consultants-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .banner-logo img {
                height: 80px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .consultants-grid {
                grid-template-columns: 1fr;
            }

            .modern-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.5rem;
            }

            .welcome-banner {
                flex-direction: column;
                text-align: center;
            }

            .banner-logo {
                margin-top: 1.5rem;
            }

            .search-wrapper,
            .search-container {
                width: 100%;
            }

            .search-shortcut {
                display: none;
            }
        }
    </style>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>GestionLivrable</h1>
                <p>Espace Manager</p>
            </div>

            <div class="sidebar-profile">
                <div class="profile-info">
                    <div class="profile-avatar">
                        {{ Auth::user() ? strtoupper(substr(Auth::user()->first_name, 0, 1)) : 'U' }}
                    </div>
                    <div class="profile-details">
                        <h3>{{ optional(Auth::user())->first_name ?? 'User' }} {{ optional(Auth::user())->last_name ?? '' }}</h3>
                        <p><i class="fas fa-circle"></i> Manager</p>
                        <div class="profile-email">
                            <i class="fas fa-envelope"></i> {{ optional(Auth::user())->email ?? '' }}
                        </div>
                    </div>
                </div>

                <div class="partner-container">
                    <span>Partenaire officiel</span>
                    <div class="partner-logo">
                        <img src="{{ asset('images/logo-alstom.png') }}" alt="Alstom"
                             onerror="this.src='https://via.placeholder.com/150x50/667eea/ffffff?text=ALSTOM'">
                    </div>
                </div>
            </div>

            <div class="sidebar-menu">
                <div class="menu-title">MENU</div>

                <a href="{{ route('manager.dashboard') }}" class="menu-item active">
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
                    <button type="submit" class="menu-item" style="width:100%; color:#ef4444; background:none; border:none; cursor:pointer;">
                        <div class="menu-icon" style="background:#fee2e2;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#ef4444;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                            </svg>
                        </div>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content">
            <div class="modern-header">
                <div class="header-content">
                    <h1><i class="fas fa-chart-line"></i> Tableau de bord Manager</h1>
                    <p><i class="fas fa-users"></i> Suivez l'avancement de vos équipes en temps réel</p>
                </div>
                <div class="manager-profile">
                    <div class="manager-avatar">
                        {{ strtoupper(substr(optional(Auth::user())->first_name ?? 'U', 0, 2)) }}
                    </div>
                    <div class="manager-info">
                        <div class="name">{{ optional(Auth::user())->first_name ?? 'User' }} {{ optional(Auth::user())->last_name ?? 'Unknown' }}</div>
                        <div class="role"><i class="fas fa-circle"></i> Manager</div>
                    </div>
                </div>
            </div>

            @php
                $totalLivrables = $totalLivrables ?? 0;
                $totalConsultants = $totalConsultants ?? 0;
                $totalInProgress = $totalInProgress ?? 0;
                $totalCompleted = $totalCompleted ?? 0;
                $consultants = $consultants ?? collect([]);
            @endphp

            <div class="welcome-banner">
                <div class="banner-content">
                    <h2><i class="fas fa-chart-simple"></i> Vue d'ensemble</h2>
                    <p>Analyse globale de l'avancement des livrables</p>
                    <div class="banner-stats">
                        <div class="banner-stat">
                            <i class="fas fa-calendar"></i>
                            <span>{{ now()->format('d F Y') }}</span>
                        </div>
                        <div class="banner-stat">
                            <i class="fas fa-chart-line"></i>
                            <span>{{ $totalConsultants }} consultants actifs</span>
                        </div>
                    </div>
                </div>
                <div class="banner-logo">
                    <img src="{{ asset('images/logo-segula.png') }}" alt="Segula"
                         onerror="this.src='https://via.placeholder.com/200x80/ffffff/667eea?text=SEGULA'">
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card purple-card animate-scale delay-100">
                    <div class="stat-header">
                        <div class="stat-icon purple">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="stat-trend positive">+{{ rand(5,15) }}%</span>
                    </div>
                    <div class="stat-number">{{ $totalLivrables }}</div>
                    <div class="stat-label">Total Livrables</div>
                    <div class="stat-subtext">
                        <i class="fas fa-layer-group"></i>
                        <span>Volume global des livrables</span>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Capacité utilisée</span>
                            <span class="progress-value">100%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill purple" style="width:100%"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card blue-card animate-scale delay-200">
                    <div class="stat-header">
                        <div class="stat-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="stat-trend positive">+{{ rand(0,5) }}%</span>
                    </div>
                    <div class="stat-number">{{ $totalConsultants }}</div>
                    <div class="stat-label">Consultants</div>
                    <div class="stat-subtext">
                        <i class="fas fa-user-check"></i>
                        <span>Consultants actifs</span>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Effectif actif</span>
                            <span class="progress-value">{{ $totalConsultants > 0 ? 100 : 0 }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill blue" style="width:{{ $totalConsultants > 0 ? 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card orange-card animate-scale delay-300">
                    <div class="stat-header">
                        <div class="stat-icon orange">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <span class="stat-trend neutral">{{ rand(5,15) }}%</span>
                    </div>
                    <div class="stat-number">{{ $totalInProgress }}</div>
                    <div class="stat-label">In Progress</div>
                    <div class="stat-subtext">
                        <i class="fas fa-spinner"></i>
                        <span>Livrables en cours</span>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Progression</span>
                            <span class="progress-value">{{ $totalLivrables > 0 ? round(($totalInProgress / $totalLivrables) * 100) : 0 }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill orange" style="width:{{ $totalLivrables > 0 ? round(($totalInProgress / $totalLivrables) * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card green-card animate-scale delay-400">
                    <div class="stat-header">
                        <div class="stat-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span class="stat-trend positive">+{{ rand(10,25) }}%</span>
                    </div>
                    <div class="stat-number">{{ $totalCompleted }}</div>
                    <div class="stat-label">Completed</div>
                    <div class="stat-subtext">
                        <i class="fas fa-award"></i>
                        <span>Livrables finalisés</span>
                    </div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Taux de réussite</span>
                            <span class="progress-value">{{ $totalLivrables > 0 ? round(($totalCompleted / $totalLivrables) * 100) : 0 }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill green" style="width:{{ $totalLivrables > 0 ? round(($totalCompleted / $totalLivrables) * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-wrapper">
                <div class="search-container">
                    <div class="search-inner">
                        <div class="search-icon-box">
                            <i class="fas fa-search"></i>
                        </div>

                        <input
                            type="text"
                            id="searchInput"
                            class="search-input"
                            placeholder="Rechercher un consultant par nom..."
                        >

                        <span class="search-shortcut">Recherche</span>

                        <button type="button" class="search-clear" id="clearSearch" title="Effacer">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="search-hint">
                        <i class="fas fa-lightbulb"></i>
                        <span>Astuce : tapez le prénom ou le nom du consultant</span>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <div class="title-bar"></div>
                <h2><i class="fas fa-chart-pie"></i> Avancement par consultant</h2>
            </div>

            @if($consultants->count() > 0)
                <div class="consultants-grid" id="consultantsGrid">
                    @foreach($consultants as $consultant)
                        @php
                            $consultantLivrables = $consultant->livrables ?? collect([]);
                            $totalConsultantLivrables = $consultantLivrables->count();
                            $consultantNotStarted = $consultantLivrables->where('status', 'not started')->count();
                            $consultantInProgress = $consultantLivrables->where('status', 'in progress')->count();
                            $consultantCompleted = $consultantLivrables->where('status', 'completed')->count();

                            $progressPercentage = $totalConsultantLivrables > 0 ? round(($consultantCompleted / $totalConsultantLivrables) * 100) : 0;
                            $inProgressPercentage = $totalConsultantLivrables > 0 ? round(($consultantInProgress / $totalConsultantLivrables) * 100) : 0;
                            $notStartedPercentage = $totalConsultantLivrables > 0 ? round(($consultantNotStarted / $totalConsultantLivrables) * 100) : 0;
                        @endphp

                        <div class="consultant-card fade-in" data-name="{{ strtolower($consultant->first_name . ' ' . $consultant->last_name) }}">
                            <div class="consultant-header">
                                <div class="consultant-avatar-card">
                                    {{ strtoupper(substr($consultant->first_name, 0, 1)) }}{{ strtoupper(substr($consultant->last_name, 0, 1)) }}
                                </div>
                                <div class="consultant-info-card">
                                    <h3>{{ $consultant->first_name }} {{ $consultant->last_name }}</h3>
                                    <p><i class="fas fa-circle"></i> Consultant • {{ $totalConsultantLivrables }} livrables</p>
                                </div>
                            </div>

                            <div class="progress-stats">
                                <div class="progress-stat-item">
                                    <div class="progress-stat-header">
                                        <span class="label">Progression globale</span>
                                        <span class="value">{{ $progressPercentage }}%</span>
                                    </div>
                                    <div class="progress-stat-bar">
                                        <div class="progress-stat-fill completed" style="width: {{ $progressPercentage }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="consultant-stats">
                                <div class="consultant-stat" onclick="filterByStatus('not-started', {{ $consultant->id }})">
                                    <div class="consultant-stat-number" style="color:#94a3b8;">{{ $consultantNotStarted }}</div>
                                    <div class="consultant-stat-label">Not Started</div>
                                    <div class="mini-bar">
                                        <div class="mini-fill not-started" style="width: {{ $notStartedPercentage }}%"></div>
                                    </div>
                                </div>

                                <div class="consultant-stat" onclick="filterByStatus('in-progress', {{ $consultant->id }})">
                                    <div class="consultant-stat-number" style="color:#3b82f6;">{{ $consultantInProgress }}</div>
                                    <div class="consultant-stat-label">In Progress</div>
                                    <div class="mini-bar">
                                        <div class="mini-fill in-progress" style="width: {{ $inProgressPercentage }}%"></div>
                                    </div>
                                </div>

                                <div class="consultant-stat" onclick="filterByStatus('completed', {{ $consultant->id }})">
                                    <div class="consultant-stat-number" style="color:#10b981;">{{ $consultantCompleted }}</div>
                                    <div class="consultant-stat-label">Completed</div>
                                    <div class="mini-bar">
                                        <div class="mini-fill completed" style="width: {{ $progressPercentage }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('manager.consultant.details', $consultant->id) }}" class="btn-details">
                                <i class="fas fa-eye"></i>
                                <span>Voir les détails complets</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-modern">
                    <i class="fas fa-users"></i>
                    <h3>Aucun consultant</h3>
                    <p>Aucun consultant n'est encore assigné à votre équipe.</p>
                </div>
            @endif
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const consultantCards = document.querySelectorAll('.consultant-card');
            const clearSearch = document.getElementById('clearSearch');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();

                    consultantCards.forEach(card => {
                        const name = card.dataset.name || '';

                        if (searchTerm === '' || name.includes(searchTerm)) {
                            card.style.display = 'block';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 50);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            }

            if (clearSearch && searchInput) {
                clearSearch.addEventListener('click', function() {
                    searchInput.value = '';
                    searchInput.dispatchEvent(new Event('input'));
                    searchInput.focus();
                });

                document.addEventListener('keydown', function(e) {
                    if (e.ctrlKey && e.key.toLowerCase() === 'k') {
                        e.preventDefault();
                        searchInput.focus();
                    }
                });
            }

            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.consultant-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
                observer.observe(card);
            });
        });

        function viewConsultantDetails(consultantId) {
            window.location.href = `/manager/consultant/${consultantId}/details`;
        }

        function filterByStatus(status, consultantId) {
            window.location.href = `/manager/consultant/${consultantId}/livrables?status=${status}`;
        }
    </script>
</x-app-layout>