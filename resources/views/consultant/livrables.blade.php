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
            --hover-shadow: 0 30px 60px -15px rgba(102,126,234,0.25);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-10px) rotate(1deg); }
            75% { transform: translateY(10px) rotate(-1deg); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(102,126,234,0.25); }
            50% { box-shadow: 0 0 25px 4px rgba(102,126,234,0.20); }
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

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.94); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.95); }
            100% { transform: scale(1); }
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.96); }
            to { opacity: 1; transform: scale(1); }
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            background:
                radial-gradient(circle at 20% 20%, rgba(102,126,234,0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(118,75,162,0.05) 0%, transparent 40%),
                linear-gradient(135deg, #f6f9fc 0%, #f1f4f9 100%);
            position: relative;
            overflow-x: hidden;
        }

        .dashboard-layout::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102,126,234,0.02) 0%, transparent 50%);
            animation: float 20s linear infinite;
            pointer-events: none;
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
            animation: slideInLeft 0.8s ease-out;
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
        }

        .sidebar-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
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
            font-weight: 500;
        }

        .sidebar-profile {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(102,126,234,0.1);
            background: linear-gradient(135deg, #ffffff 0%, #fafcff 100%);
            position: relative;
            overflow: hidden;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            position: relative;
            z-index: 1;
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
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            inset: 0;
            width: 0;
            background: var(--primary-gradient);
            opacity: 0.08;
            transition: width 0.3s ease;
            z-index: -1;
        }

        .menu-item:hover::before {
            width: 100%;
        }

        .menu-item:hover {
            transform: translateX(6px);
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
            animation: slideInRight 0.8s ease-out;
        }

        .modern-header {
            background: white;
            border-radius: 40px;
            padding: 2.5rem 3rem;
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
        }

        .modern-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, rgba(118,75,162,0.05), rgba(102,126,234,0.05));
            border-radius: 50%;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .header-content h1 {
            font-size: 3rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .header-content p {
            color: #64748b;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .header-content p i {
            color: var(--primary);
            font-size: 1.2rem;
            background: rgba(102,126,234,0.1);
            padding: 0.5rem;
            border-radius: 50%;
        }

        .consultant-profile {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 1.8rem;
            background: rgba(255,255,255,0.95);
            padding: 0.8rem 2rem 0.8rem 0.8rem;
            border-radius: 70px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 1px solid rgba(102,126,234,0.2);
        }

        .consultant-avatar {
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.4rem;
            box-shadow: 0 15px 25px -8px rgba(102,126,234,0.4);
            border: 3px solid white;
        }

        .consultant-info .name {
            font-weight: 800;
            color: var(--dark);
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .consultant-info .role {
            font-size: 0.85rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .consultant-info .role i {
            font-size: 0.6rem;
            color: var(--completed);
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
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card-modern::after {
            content: '';
            position: absolute;
            inset: 0 auto auto 0;
            width: 100%;
            height: 5px;
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
            width: 60px;
            height: 60px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .stat-icon-wrapper.not-started { background: #f1f5f9; color: var(--not-started); }
        .stat-icon-wrapper.in-progress { background: #dbeafe; color: var(--in-progress); }
        .stat-icon-wrapper.fq-review { background: #fed7aa; color: var(--fq-review); }
        .stat-icon-wrapper.completed { background: #d1fae5; color: var(--completed); }
        .stat-icon-wrapper.standby { background: #ede9fe; color: var(--standby); }
        .stat-icon-wrapper.cancelled { background: #fee2e2; color: var(--cancelled); }

        .stat-number-modern {
            font-size: 2.4rem;
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

        .filters-modern {
            background: white;
            border-radius: 40px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
            position: relative;
            z-index: 10;
        }

        .filter-tabs-modern {
            display: flex;
            gap: 0.8rem;
            margin-bottom: 1.8rem;
            flex-wrap: wrap;
        }

        .filter-btn-modern {
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }

        .filter-btn-modern:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .filter-btn-modern.active {
            background: var(--primary-gradient);
            color: white;
            border-color: transparent;
            box-shadow: 0 15px 30px -5px rgba(102,126,234,0.35);
        }

        .search-modern {
            position: relative;
            max-width: 450px;
        }

        .search-modern i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
        }

        .search-modern input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #edf2f7;
            border-radius: 60px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .search-modern input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 8px rgba(102,126,234,0.1);
            background: white;
        }

        /* ===== NOUVEAU DESIGN DES CARTES LIVRABLES ===== */
        .livrables-grid-modern {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(410px, 1fr));
            gap: 2rem;
        }

        .livrable-card-modern {
            position: relative;
            background: linear-gradient(180deg, #ffffff 0%, #fcfdff 100%);
            border-radius: 34px;
            padding: 1.7rem;
            border: 1px solid rgba(102,126,234,0.12);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            transition: all 0.45s ease;
            animation: scaleIn 0.7s ease-out;
            animation-fill-mode: both;
        }

        .livrable-card-modern:nth-child(1) { animation-delay: 0.45s; }
        .livrable-card-modern:nth-child(2) { animation-delay: 0.50s; }
        .livrable-card-modern:nth-child(3) { animation-delay: 0.55s; }
        .livrable-card-modern:nth-child(4) { animation-delay: 0.60s; }
        .livrable-card-modern:nth-child(5) { animation-delay: 0.65s; }
        .livrable-card-modern:nth-child(6) { animation-delay: 0.70s; }

        .livrable-card-modern::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(102,126,234,0.10), transparent 28%),
                radial-gradient(circle at bottom left, rgba(118,75,162,0.06), transparent 22%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .livrable-card-modern:hover::before {
            opacity: 1;
        }

        .livrable-card-modern:hover {
            transform: translateY(-12px);
            box-shadow: 0 28px 60px rgba(102,126,234,0.18);
            border-color: rgba(102,126,234,0.25);
        }

        .card-status-bar {
            position: absolute;
            top: 20px;
            left: 0;
            width: 8px;
            height: calc(100% - 40px);
            border-radius: 0 12px 12px 0;
            transition: all 0.35s ease;
        }

        .livrable-card-modern:hover .card-status-bar {
            width: 12px;
        }

        .card-status-bar.not-started { background: linear-gradient(180deg, #94a3b8, #64748b); }
        .card-status-bar.in-progress { background: linear-gradient(180deg, #3b82f6, #1d4ed8); }
        .card-status-bar.fq-review { background: linear-gradient(180deg, #f59e0b, #d97706); }
        .card-status-bar.completed { background: linear-gradient(180deg, #10b981, #059669); }
        .card-status-bar.standby { background: linear-gradient(180deg, #8b5cf6, #6d28d9); }
        .card-status-bar.cancelled { background: linear-gradient(180deg, #ef4444, #dc2626); }

        .card-top-strip {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 1rem;
            margin-bottom: 1rem;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .card-id-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #64748b;
            padding: 0.45rem 0.85rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.3px;
        }

        .card-id-chip i {
            color: var(--primary);
        }

        .card-priority-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(102,126,234,0.08);
            color: var(--primary);
            padding: 0.45rem 0.85rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            border: 1px solid rgba(102,126,234,0.15);
        }

        .card-header-modern {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1rem;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .card-header-left {
            flex: 1;
            min-width: 0;
        }

        .card-title-modern {
            font-size: 1.45rem;
            font-weight: 900;
            line-height: 1.2;
            color: var(--dark);
            margin-bottom: 0.7rem;
            letter-spacing: -0.4px;
            transition: all 0.3s ease;
        }

        .livrable-card-modern:hover .card-title-modern {
            color: var(--primary);
        }

        .card-project-modern {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            background: linear-gradient(135deg, #eef2ff, #f5f3ff);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 800;
            border: 1px solid rgba(102,126,234,0.14);
        }

        .status-badge-modern {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.65rem 1rem;
            border-radius: 999px;
            font-size: 0.73rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: 1px solid transparent;
            white-space: nowrap;
        }

        .status-badge-modern.not-started { background: #f1f5f9; color: #475569; border-color: #e2e8f0; }
        .status-badge-modern.in-progress { background: #dbeafe; color: #1d4ed8; border-color: #bfdbfe; }
        .status-badge-modern.fq-review { background: #fef3c7; color: #92400e; border-color: #fde68a; }
        .status-badge-modern.completed { background: #d1fae5; color: #065f46; border-color: #a7f3d0; }
        .status-badge-modern.standby { background: #ede9fe; color: #6d28d9; border-color: #ddd6fe; }
        .status-badge-modern.cancelled { background: #fee2e2; color: #991b1b; border-color: #fecaca; }

        .card-description-modern {
            margin: 0 0 1.2rem 1rem;
            color: #64748b;
            font-size: 0.93rem;
            line-height: 1.7;
            background: #fafcff;
            border: 1px solid #eef2f7;
            border-radius: 22px;
            padding: 1rem 1.1rem;
        }

        .card-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.85rem;
            margin: 0 0 1.2rem 1rem;
        }

        .info-box-modern {
            background: #ffffff;
            border: 1px solid #edf2f7;
            border-radius: 18px;
            padding: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.03);
        }

        .livrable-card-modern:hover .info-box-modern {
            border-color: rgba(102,126,234,0.15);
            box-shadow: 0 10px 24px rgba(102,126,234,0.08);
        }

        .info-box-label {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #94a3b8;
            font-weight: 800;
            margin-bottom: 0.45rem;
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .info-box-label i {
            color: var(--primary);
        }

        .info-box-value {
            font-size: 0.86rem;
            color: var(--dark);
            font-weight: 700;
            line-height: 1.4;
        }

        .deadline-urgent {
            color: #d97706;
        }

        .deadline-overdue {
            color: #dc2626;
        }

        .card-actions-modern {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
            margin: 0 0 1.2rem 1rem;
        }

        .btn-card-modern {
            border: none;
            border-radius: 18px;
            padding: 0.9rem 1rem;
            font-size: 0.83rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-details-modern {
            width: 100%;
            background: linear-gradient(135deg, #eef2ff, #f5f3ff);
            color: var(--primary);
            border: 1px solid rgba(102,126,234,0.18);
            position: relative;
            z-index: 10;
        }

        .btn-details-modern:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(102,126,234,0.25);
        }

        .btn-secondary-modern {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary-modern:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .quick-status-modern {
            margin-left: 1rem;
            margin-bottom: 1.2rem;
            background: linear-gradient(135deg, #fafcff, #f8fbff);
            border: 1px solid #edf2f7;
            border-radius: 24px;
            padding: 1rem;
        }

        .quick-status-title {
            font-size: 0.82rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.45rem;
        }

        .quick-status-title i {
            color: var(--primary);
        }

        .status-timeline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.4rem;
        }

        .timeline-step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .timeline-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 13px;
            left: 60%;
            width: 80%;
            height: 2px;
            background: #e2e8f0;
            z-index: 0;
        }

        .timeline-dot {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            margin: 0 auto 0.35rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e2e8f0;
            color: white;
            font-size: 0.7rem;
            position: relative;
            z-index: 1;
        }

        .timeline-step.active .timeline-dot {
            background: var(--primary-gradient);
        }

        .timeline-step.done .timeline-dot {
            background: var(--completed);
        }

        .timeline-label {
            font-size: 0.62rem;
            color: #64748b;
            font-weight: 700;
            line-height: 1.2;
        }

        .comments-section-modern {
            background: linear-gradient(135deg, #f8fafc, #fbfdff);
            border-radius: 24px;
            padding: 1.3rem;
            margin-left: 1rem;
            margin-bottom: 1.2rem;
            border: 1px solid #edf2f7;
            transition: all 0.35s ease;
        }

        .livrable-card-modern:hover .comments-section-modern {
            box-shadow: 0 12px 28px rgba(102,126,234,0.08);
        }

        .comments-title-modern {
            font-size: 0.92rem;
            font-weight: 900;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .comments-title-modern i {
            color: var(--primary);
        }

        .comments-list-modern {
            max-height: 160px;
            overflow-y: auto;
            margin-bottom: 1rem;
            padding-right: 0.35rem;
        }

        .comments-list-modern::-webkit-scrollbar {
            width: 5px;
        }

        .comments-list-modern::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 5px;
        }

        .comments-list-modern::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 5px;
        }

        .comment-item-modern {
            background: white;
            padding: 0.9rem 1rem;
            border-radius: 16px;
            margin-bottom: 0.7rem;
            border-left: 4px solid var(--primary);
            box-shadow: 0 4px 14px rgba(15,23,42,0.03);
        }

        .comment-header-modern {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.45rem;
        }

        .comment-author-modern {
            font-weight: 800;
            color: var(--dark);
            font-size: 0.82rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .comment-date-modern {
            font-size: 0.65rem;
            color: #94a3b8;
            font-weight: 700;
            background: #f1f5f9;
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
        }

        .comment-text-modern {
            color: #475569;
            font-size: 0.83rem;
            line-height: 1.5;
        }

        .comment-form-modern {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.8rem;
        }

        .comment-input-modern {
            flex: 1;
            padding: 0.85rem 1rem;
            border: 2px solid #edf2f7;
            border-radius: 999px;
            font-size: 0.83rem;
            background: white;
            transition: all 0.3s ease;
        }

        .comment-input-modern:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(102,126,234,0.08);
        }

        .btn-send-modern {
            width: 46px;
            height: 46px;
            border: none;
            border-radius: 50%;
            background: var(--primary-gradient);
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(102,126,234,0.25);
            transition: all 0.3s ease;
        }

        .btn-send-modern:hover {
            transform: scale(1.08) rotate(12deg);
        }

        .status-form-modern {
            display: flex;
            gap: 0.8rem;
            align-items: center;
            margin-left: 1rem;
            margin-top: 0.8rem;
        }

        .status-select-modern {
            flex: 1;
            padding: 0.9rem 1rem;
            border: 2px solid #edf2f7;
            border-radius: 999px;
            font-size: 0.84rem;
            background: white;
            font-weight: 700;
            color: var(--dark);
            cursor: pointer;
            position: relative;
            z-index: 10;
        }

        .status-select-modern:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(102,126,234,0.08);
        }

        .btn-update-modern {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.9rem 1.3rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(102,126,234,0.24);
        }

        .btn-update-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(102,126,234,0.32);
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(8px);
            z-index: 1000;
            display: none;
            justify-content: center;
            align-items: center;
            animation: modalFadeIn 0.3s ease-out;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-container {
            background: white;
            border-radius: 50px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 50px 100px rgba(0,0,0,0.3);
            position: relative;
        }

        .modal-header {
            background: var(--primary-gradient);
            padding: 2rem 2.5rem;
            border-radius: 50px 50px 0 0;
            position: relative;
            overflow: hidden;
        }

        .modal-header h2 {
            color: white;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .modal-header p {
            color: rgba(255,255,255,0.9);
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(255,255,255,0.2);
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 2;
        }

        .modal-body {
            padding: 2.5rem;
        }

        .detail-section {
            margin-bottom: 2rem;
        }

        .detail-section h3 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border-left: 4px solid var(--primary);
            padding-left: 1rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .detail-item {
            background: #f8fafc;
            padding: 1rem;
            border-radius: 20px;
        }

        .detail-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #94a3b8;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
        }

        .tasks-list,
        .documents-list {
            background: #f8fafc;
            border-radius: 20px;
            padding: 1rem;
        }

        .task-item-detail,
        .document-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .task-item-detail:last-child,
        .document-item:last-child {
            border-bottom: none;
        }

        .task-checkbox-detail {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            cursor: pointer;
        }

        .task-checkbox-detail.checked {
            background: var(--primary-gradient);
            border-color: transparent;
            position: relative;
        }

        .task-checkbox-detail.checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
        }

        .task-content-detail,
        .document-info {
            flex: 1;
        }

        .task-title-detail {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .task-title-detail.completed {
            text-decoration: line-through;
            color: #94a3b8;
        }

        .task-meta-detail,
        .document-size {
            font-size: 0.7rem;
            color: #64748b;
            display: flex;
            gap: 1rem;
        }

        .document-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .document-item i {
            font-size: 1.4rem;
            color: var(--primary);
        }

        .download-btn {
            color: var(--primary);
            font-size: 1rem;
        }

        .empty-documents,
        .empty-state-modern {
            text-align: center;
            padding: 2rem;
            color: #94a3b8;
        }

        .empty-state-modern {
            grid-column: 1 / -1;
            padding: 6rem 2rem;
            background: white;
            border-radius: 50px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(102,126,234,0.1);
        }

        .empty-state-modern i {
            font-size: 6rem;
            color: var(--primary);
            opacity: 0.25;
            margin-bottom: 1rem;
        }

        .empty-state-modern h3 {
            font-size: 2.3rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .empty-state-modern p {
            color: #64748b;
            font-size: 1.05rem;
            margin-bottom: 1.2rem;
        }

        .info-message {
            color: var(--primary);
            background: rgba(102,126,234,0.1);
            padding: 1rem 2rem;
            border-radius: 999px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 1200px) {
            .livrables-grid-modern {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .modern-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .livrables-grid-modern {
                grid-template-columns: 1fr;
            }

            .consultant-profile {
                width: 100%;
                justify-content: center;
            }

            .header-content h1 {
                font-size: 2rem;
            }

            .filter-tabs-modern {
                justify-content: center;
            }

            .detail-grid,
            .card-actions-modern,
            .card-info-grid {
                grid-template-columns: 1fr;
            }

            .modal-body {
                padding: 1.5rem;
            }

            .status-form-modern {
                flex-direction: column;
                align-items: stretch;
            }

            .card-header-modern {
                flex-direction: column;
                align-items: flex-start;
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

                <a href="{{ route('consultant.livrables') }}" class="menu-item active">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <span>Mes Livrables</span>
                    <span class="menu-badge">{{ $livrables->count() }}</span>
                </a>

                <a href="{{ route('consultant.statistiques') }}" class="menu-item">
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

                $totalLivrables = $livrables->count();
                $notStarted = $livrables->where('status', 'not started')->count();
                $inProgress = $livrables->where('status', 'in progress')->count();
                $fqReview = $livrables->where('status', 'FQ review')->count();
                $completed = $livrables->where('status', 'completed')->count();
                $standby = $livrables->where('status', 'standby')->count();
                $cancelled = $livrables->where('status', 'cancelled')->count();
            @endphp

            <div class="modern-header">
                <div class="header-content">
                    <h1>Mes livrables assignés</h1>
                    <p>
                        <i class="fas fa-folder-open"></i>
                        Consultez et gérez tous les livrables qui vous sont assignés
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
                <div class="stat-card-modern not-started">
                    <div class="stat-icon-wrapper not-started">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number-modern">{{ $notStarted }}</div>
                    <div class="stat-label-modern">Not Started</div>
                </div>

                <div class="stat-card-modern in-progress">
                    <div class="stat-icon-wrapper in-progress">
                        <i class="fas fa-sync-alt fa-spin"></i>
                    </div>
                    <div class="stat-number-modern">{{ $inProgress }}</div>
                    <div class="stat-label-modern">In Progress</div>
                </div>

                <div class="stat-card-modern fq-review">
                    <div class="stat-icon-wrapper fq-review">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div class="stat-number-modern">{{ $fqReview }}</div>
                    <div class="stat-label-modern">FQ Review</div>
                </div>

                <div class="stat-card-modern completed">
                    <div class="stat-icon-wrapper completed">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number-modern">{{ $completed }}</div>
                    <div class="stat-label-modern">Completed</div>
                </div>

                <div class="stat-card-modern standby">
                    <div class="stat-icon-wrapper standby">
                        <i class="fas fa-pause-circle"></i>
                    </div>
                    <div class="stat-number-modern">{{ $standby }}</div>
                    <div class="stat-label-modern">Standby</div>
                </div>

                <div class="stat-card-modern cancelled">
                    <div class="stat-icon-wrapper cancelled">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-number-modern">{{ $cancelled }}</div>
                    <div class="stat-label-modern">Cancelled</div>
                </div>
            </div>

            <div class="filters-modern">
                <div class="filter-tabs-modern">
                    <button type="button" class="filter-btn-modern active" data-filter="all">Tous ({{ $totalLivrables }})</button>
                    <button type="button" class="filter-btn-modern" data-filter="not started">Not Started ({{ $notStarted }})</button>
                    <button type="button" class="filter-btn-modern" data-filter="in progress">In Progress ({{ $inProgress }})</button>
                    <button type="button" class="filter-btn-modern" data-filter="fq review">FQ Review ({{ $fqReview }})</button>
                    <button type="button" class="filter-btn-modern" data-filter="completed">Completed ({{ $completed }})</button>
                    <button type="button" class="filter-btn-modern" data-filter="standby">Standby ({{ $standby }})</button>
                    <button type="button" class="filter-btn-modern" data-filter="cancelled">Cancelled ({{ $cancelled }})</button>
                </div>

                <div class="search-modern">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Rechercher un livrable...">
                </div>
            </div>

            @if($livrables->count() > 0)
                <div class="livrables-grid-modern" id="livrablesGrid">
                    @foreach($livrables as $index => $livrable)
                        @php
                            $statusClass = str_replace(' ', '-', strtolower($livrable->status));
                            $hasUrgentDeadline = $livrable->date_echeance && now()->diffInDays($livrable->date_echeance, false) < 3 && $livrable->date_echeance > now();
                            $isOverdue = $livrable->date_echeance && $livrable->date_echeance < now();
                            $timelineStatus = strtolower($livrable->status);
                        @endphp

                        <div class="livrable-card-modern"
                             data-status="{{ strtolower($livrable->status) }}"
                             data-title="{{ strtolower($livrable->titre) }}"
                             data-id="{{ $livrable->id }}">

                            <div class="card-status-bar {{ $statusClass }}"></div>

                            <div class="card-top-strip">
                                <span class="card-id-chip">
                                    <i class="fas fa-hashtag"></i>
                                    LIV-{{ str_pad($livrable->id, 4, '0', STR_PAD_LEFT) }}
                                </span>

                                <span class="card-priority-chip">
                                    <i class="fas fa-bolt"></i>
                                    Livrable actif
                                </span>
                            </div>

                            <div class="card-header-modern">
                                <div class="card-header-left">
                                    <h3 class="card-title-modern">{{ $livrable->titre }}</h3>

                                    @if($livrable->project)
                                        <span class="card-project-modern">
                                            <i class="fas fa-folder-tree"></i>
                                            {{ $livrable->project->nom }}
                                        </span>
                                    @endif
                                </div>

                                <span class="status-badge-modern {{ $statusClass }}">
                                    @switch($livrable->status)
                                        @case('not started')
                                            <i class="fas fa-clock"></i> Not Started
                                            @break
                                        @case('in progress')
                                            <i class="fas fa-sync-alt fa-spin"></i> In Progress
                                            @break
                                        @case('FQ review')
                                            <i class="fas fa-check-double"></i> FQ Review
                                            @break
                                        @case('completed')
                                            <i class="fas fa-check-circle"></i> Completed
                                            @break
                                        @case('standby')
                                            <i class="fas fa-pause-circle"></i> Standby
                                            @break
                                        @case('cancelled')
                                            <i class="fas fa-times-circle"></i> Cancelled
                                            @break
                                        @default
                                            <i class="fas fa-info-circle"></i> {{ ucfirst($livrable->status) }}
                                    @endswitch
                                </span>
                            </div>

                            <p class="card-description-modern">
                                {{ $livrable->description ?? 'Aucune description fournie pour ce livrable.' }}
                            </p>

                            <div class="card-info-grid">
                                <div class="info-box-modern">
                                    <div class="info-box-label">
                                        <i class="fas fa-calendar-plus"></i>
                                        Création
                                    </div>
                                    <div class="info-box-value">
                                        {{ \Carbon\Carbon::parse($livrable->created_at)->format('d/m/Y') }}
                                    </div>
                                </div>

                                <div class="info-box-modern">
                                    <div class="info-box-label">
                                        <i class="fas fa-hourglass-half"></i>
                                        Échéance
                                    </div>
                                    <div class="info-box-value
                                        @if($isOverdue) deadline-overdue
                                        @elseif($hasUrgentDeadline) deadline-urgent
                                        @endif">
                                        @if($livrable->date_echeance)
                                            @if($isOverdue)
                                                En retard
                                            @elseif($hasUrgentDeadline)
                                                Urgent - J-{{ now()->diffInDays($livrable->date_echeance) }}
                                            @else
                                                {{ \Carbon\Carbon::parse($livrable->date_echeance)->format('d/m/Y') }}
                                            @endif
                                        @else
                                            Non définie
                                        @endif
                                    </div>
                                </div>

                                <div class="info-box-modern">
                                    <div class="info-box-label">
                                        <i class="fas fa-layer-group"></i>
                                        Type
                                    </div>
                                    <div class="info-box-value">
                                        {{ $livrable->type ?? 'Documentation technique' }}
                                    </div>
                                </div>

                                <div class="info-box-modern">
                                    <div class="info-box-label">
                                        <i class="fas fa-clock-rotate-left"></i>
                                        Durée
                                    </div>
                                    <div class="info-box-value">
                                        {{ $livrable->duration ?? 'Non spécifiée' }}
                                    </div>
                                </div>
                            </div>

                            <div class="quick-status-modern">
                                <div class="quick-status-title">
                                    <i class="fas fa-route"></i>
                                    Progression rapide
                                </div>

                                <div class="status-timeline">
                                    <div class="timeline-step {{ in_array($timelineStatus, ['not started','in progress','fq review','completed']) ? 'done' : '' }}">
                                        <div class="timeline-dot"><i class="fas fa-play"></i></div>
                                        <div class="timeline-label">Début</div>
                                    </div>

                                    <div class="timeline-step {{ in_array($timelineStatus, ['in progress','fq review','completed']) ? 'done' : '' }}">
                                        <div class="timeline-dot"><i class="fas fa-gears"></i></div>
                                        <div class="timeline-label">Traitement</div>
                                    </div>

                                    <div class="timeline-step {{ in_array($timelineStatus, ['fq review','completed']) ? 'done' : '' }}">
                                        <div class="timeline-dot"><i class="fas fa-magnifying-glass"></i></div>
                                        <div class="timeline-label">Review</div>
                                    </div>

                                    <div class="timeline-step {{ $timelineStatus === 'completed' ? 'done' : '' }}">
                                        <div class="timeline-dot"><i class="fas fa-check"></i></div>
                                        <div class="timeline-label">Finalisé</div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-actions-modern">
                                <button class="btn-card-modern btn-details-modern" onclick="openModal({{ $livrable->id }})">
                                    <i class="fas fa-eye"></i>
                                    Voir les détails
                                </button>

                                <button class="btn-card-modern btn-secondary-modern" type="button">
                                    <i class="fas fa-bookmark"></i>
                                    Suivi rapide
                                </button>
                            </div>

                            <div class="comments-section-modern">
                                <div class="comments-title-modern">
                                    <i class="fas fa-comments"></i>
                                    Commentaires
                                    @if($livrable->comments && $livrable->comments->count() > 0)
                                        <span style="margin-left:auto; background:var(--primary); color:white; padding:0.22rem 0.65rem; border-radius:999px; font-size:0.7rem; font-weight:800;">
                                            {{ $livrable->comments->count() }}
                                        </span>
                                    @endif
                                </div>

                                @if($livrable->comments && $livrable->comments->count() > 0)
                                    <div class="comments-list-modern">
                                        @foreach($livrable->comments->take(2) as $comment)
                                            <div class="comment-item-modern">
                                                <div class="comment-header-modern">
                                                    <span class="comment-author-modern">
                                                        <i class="fas fa-user-circle"></i>
                                                        {{ $comment->user->name }}
                                                    </span>
                                                    <span class="comment-date-modern">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                <div class="comment-text-modern">
                                                    {{ Str::limit($comment->content, 60) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p style="color:#94a3b8; font-size:0.84rem; text-align:center; margin-bottom:0.9rem;">
                                        <i class="far fa-comment-dots"></i> Aucun commentaire
                                    </p>
                                @endif

                                <form method="POST" action="{{ route('consultant.comment', $livrable->id) }}" class="comment-form-modern">
                                    @csrf
                                    <input type="text" name="comment" class="comment-input-modern" placeholder="Écrire un commentaire..." required>
                                    <button type="submit" class="btn-send-modern">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>

                            <form method="POST" action="{{ route('consultant.status', $livrable->id) }}" class="status-form-modern">
                                @csrf
                                <select name="status" class="status-select-modern">
                                    <option value="not started" {{ $livrable->status == 'not started' ? 'selected' : '' }}>⏳ Not Started</option>
                                    <option value="in progress" {{ $livrable->status == 'in progress' ? 'selected' : '' }}>🔄 In Progress</option>
                                    <option value="FQ review" {{ $livrable->status == 'FQ review' ? 'selected' : '' }}>📋 FQ Review</option>
                                    <option value="completed" {{ $livrable->status == 'completed' ? 'selected' : '' }}>✅ Completed</option>
                                    <option value="standby" {{ $livrable->status == 'standby' ? 'selected' : '' }}>⏸️ Standby</option>
                                    <option value="cancelled" {{ $livrable->status == 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                                </select>

                                <button type="submit" class="btn-update-modern">
                                    <i class="fas fa-sync-alt"></i>
                                    <span>Mettre à jour</span>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-modern">
                    <i class="fas fa-folder-open"></i>
                    <h3>Aucun livrable assigné</h3>
                    <p>Vous n'avez pas encore de livrables qui vous sont assignés.</p>
                    <div class="info-message">
                        <i class="fas fa-info-circle"></i>
                        Ils apparaîtront ici dès qu'un responsable vous en assignera.
                    </div>
                </div>
            @endif
        </main>
    </div>

    @foreach($livrables as $livrable)
        <div class="modal-overlay" id="modal-{{ $livrable->id }}">
            <div class="modal-container">
                <div class="modal-header">
                    <h2><i class="fas fa-file-alt"></i> {{ $livrable->titre }}</h2>
                    <p><i class="fas fa-tag"></i> Détails complets du livrable</p>
                    <button class="modal-close" onclick="closeModal({{ $livrable->id }})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="detail-section">
                        <h3><i class="fas fa-info-circle"></i> Type de livrable</h3>
                        <div class="detail-item">
                            <div class="detail-label">Type</div>
                            <div class="detail-value">{{ $livrable->type ?? 'Documentation technique' }}</div>
                        </div>
                    </div>

                    <div class="detail-section">
                        <h3><i class="fas fa-info-circle"></i> Informations générales</h3>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Nom du livrable</div>
                                <div class="detail-value">{{ $livrable->titre }}</div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">Statut actuel</div>
                                <div class="detail-value">
                                    @switch($livrable->status)
                                        @case('not started') <span style="color:#94a3b8;"><i class="fas fa-clock"></i> Not Started</span> @break
                                        @case('in progress') <span style="color:#3b82f6;"><i class="fas fa-sync-alt"></i> In Progress</span> @break
                                        @case('FQ review') <span style="color:#f59e0b;"><i class="fas fa-check-double"></i> FQ Review</span> @break
                                        @case('completed') <span style="color:#10b981;"><i class="fas fa-check-circle"></i> Completed</span> @break
                                        @case('standby') <span style="color:#8b5cf6;"><i class="fas fa-pause-circle"></i> Standby</span> @break
                                        @case('cancelled') <span style="color:#ef4444;"><i class="fas fa-times-circle"></i> Cancelled</span> @break
                                        @default
                                            <span style="color:#6b7280;"><i class="fas fa-info-circle"></i> {{ ucfirst($livrable->status) }}</span>
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="detail-section">
                        <h3><i class="fas fa-calendar-alt"></i> Dates</h3>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-label">Date de début</div>
                                <div class="detail-value">{{ $livrable->start_date ? \Carbon\Carbon::parse($livrable->start_date)->format('d/m/Y') : 'Non définie' }}</div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">Date de fin prévue</div>
                                <div class="detail-value">
                                    {{ $livrable->date_fin_prevue ? \Carbon\Carbon::parse($livrable->date_fin_prevue)->format('d/m/Y') : 'Non définie' }}
                                </div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">Durée estimée</div>
                                <div class="detail-value">{{ $livrable->duration ?? 'Non spécifiée' }}</div>
                            </div>

                            <div class="detail-item">
                                <div class="detail-label">Date de création</div>
                                <div class="detail-value">{{ \Carbon\Carbon::parse($livrable->created_at)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="detail-section">
                        <h3><i class="fas fa-tasks"></i> Tâches associées</h3>
                        <div class="tasks-list">
                            @if($livrable->tasks && $livrable->tasks->count() > 0)
                                @foreach($livrable->tasks as $tache)
                                    <div class="task-item-detail">
                                        <div class="task-checkbox-detail {{ $tache->terminee ? 'checked' : '' }}" onclick="toggleTask({{ $tache->id }}, this)"></div>
                                        <div class="task-content-detail">
                                            <div class="task-title-detail {{ $tache->terminee ? 'completed' : '' }}">
                                                {{ $tache->nom }}
                                            </div>
                                            <div class="task-meta-detail">
                                                <span><i class="fas fa-calendar"></i> Échéance: {{ \Carbon\Carbon::parse($tache->echeance)->format('d/m/Y') }}</span>
                                                <span><i class="fas fa-flag"></i> {{ ucfirst($tache->priorite) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="empty-documents">
                                    <i class="fas fa-tasks"></i>
                                    <p>Aucune tâche associée à ce livrable.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="detail-section">
                        <h3><i class="fas fa-paperclip"></i> Documents envoyés</h3>
                        <div class="documents-list">
                            @if($livrable->files && $livrable->files->count() > 0)
                                @foreach($livrable->files as $file)
                                    <div class="document-item">
                                        <i class="fas fa-file-{{ $file->type ?? 'alt' }}"></i>
                                        <div class="document-info">
                                            <div class="document-name">{{ basename($file->file_path) }}</div>
                                            <div class="document-size">Fichier</div>
                                        </div>
                                        <a href="{{ route('livrable.file.download', $file->id) }}" class="download-btn">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="empty-documents">
                                    <i class="fas fa-folder-open"></i>
                                    <p>Aucun document envoyé pour ce livrable.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function openModal(livrableId) {
            const modal = document.getElementById(`modal-${livrableId}`);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(livrableId) {
            const modal = document.getElementById(`modal-${livrableId}`);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        function toggleTask(taskId, element) {
            element.classList.toggle('checked');
            const taskTitle = element.closest('.task-item-detail').querySelector('.task-title-detail');
            if (element.classList.contains('checked')) {
                taskTitle.classList.add('completed');
            } else {
                taskTitle.classList.remove('completed');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const filterTabs = document.querySelectorAll('.filter-btn-modern');
            const livrableCards = document.querySelectorAll('.livrable-card-modern');
            const searchInput = document.getElementById('searchInput');

            function filterLivrables() {
                const activeBtn = document.querySelector('.filter-btn-modern.active');
                const activeFilter = activeBtn ? activeBtn.dataset.filter : 'all';
                const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

                livrableCards.forEach(card => {
                    const status = card.dataset.status;
                    const title = card.dataset.title;

                    const statusMatch = activeFilter === 'all' || status === activeFilter;
                    const searchMatch = searchTerm === '' || title.includes(searchTerm);

                    if (statusMatch && searchMatch) {
                        card.style.display = 'block';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 200);
                    }
                });
            }

            filterTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    filterTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    filterLivrables();
                });
            });

            if (searchInput) {
                searchInput.addEventListener('input', filterLivrables);
            }

            document.querySelectorAll('.status-form-modern').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const select = this.querySelector('select');
                    const newStatus = select.options[select.selectedIndex].text;

                    if (confirm(`Voulez-vous changer le statut de ce livrable en "${newStatus}" ?`)) {
                        this.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>