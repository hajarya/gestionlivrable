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
            --accent: #8b5cf6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #0f172a;
            --text: #1e293b;
            --muted: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --border: rgba(102, 126, 234, 0.12);
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --soft-gradient: linear-gradient(135deg, #f8fbff 0%, #eef3ff 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --info-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --shadow-sm: 0 10px 24px rgba(15, 23, 42, 0.05);
            --shadow-md: 0 20px 45px rgba(15, 23, 42, 0.08);
            --shadow-lg: 0 28px 60px rgba(102, 126, 234, 0.16);
            --sidebar-width: 290px;
        }

        body {
            background:
                radial-gradient(circle at 0% 0%, rgba(102,126,234,0.08), transparent 25%),
                radial-gradient(circle at 100% 100%, rgba(139,92,246,0.08), transparent 25%),
                linear-gradient(135deg, #f6f9fc 0%, #eef3f9 100%);
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: rgba(255,255,255,0.94);
            backdrop-filter: blur(14px);
            box-shadow: 6px 0 30px rgba(15, 23, 42, 0.06);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
            border-right: 1px solid rgba(102,126,234,0.08);
        }

        .sidebar-header {
            background: var(--primary-gradient);
            padding: 2rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar-header::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.12);
        }

        .sidebar-header::after {
            content: '';
            position: absolute;
            bottom: -35%;
            left: -10%;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }

        .sidebar-header h1 {
            color: white;
            font-size: 1.55rem;
            font-weight: 800;
            margin-bottom: 0.2rem;
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
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .profile-avatar {
            width: 64px;
            height: 64px;
            background: var(--primary-gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            border: 3px solid white;
            box-shadow: 0 14px 28px rgba(102,126,234,0.24);
        }

        .profile-details h3 {
            font-weight: 800;
            color: var(--text);
            margin-bottom: 0.2rem;
            font-size: 1rem;
        }

        .profile-details p {
            color: var(--muted);
            font-size: 0.85rem;
        }

        .partner-container {
            margin-top: 1.4rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 18px;
            text-align: center;
            border: 1px solid #e8edf5;
        }

        .partner-container span {
            font-size: 0.72rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .partner-logo {
            margin-top: 0.9rem;
            padding: 0.9rem;
            background: white;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .partner-logo:hover {
            transform: translateY(-2px) scale(1.02);
            border-color: rgba(102,126,234,0.3);
            box-shadow: 0 10px 25px rgba(102,126,234,0.1);
        }

        .partner-logo img {
            height: 62px;
            width: auto;
        }

        .sidebar-menu {
            padding: 1.5rem;
        }

        .menu-title {
            font-size: 0.72rem;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 1rem;
            padding-left: 0.75rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.82rem 1rem;
            margin-bottom: 0.55rem;
            border-radius: 15px;
            color: #475569;
            transition: all 0.28s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
            background: transparent;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            inset: 0;
            width: 0;
            background: var(--primary-gradient);
            opacity: 0.08;
            transition: width 0.28s ease;
            z-index: -1;
        }

        .menu-item:hover::before {
            width: 100%;
        }

        .menu-item:hover {
            color: var(--primary);
            transform: translateX(4px);
            border-color: rgba(102,126,234,0.08);
        }

        .menu-item.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 14px 30px rgba(102,126,234,0.22);
        }

        .menu-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255,255,255,0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.8rem;
        }

        .menu-icon svg {
            width: 18px;
            height: 18px;
        }

        .menu-badge {
            margin-left: auto;
            background: #e2e8f0;
            color: #475569;
            font-size: 0.72rem;
            padding: 0.22rem 0.7rem;
            border-radius: 999px;
            font-weight: 700;
        }

        .menu-item.active .menu-badge {
            background: rgba(255,255,255,0.18);
            color: white;
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }

        .topbar {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 1rem 1.3rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .breadcrumb span {
            color: var(--primary);
            background: #eef2ff;
            padding: 0.35rem 0.95rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .search-container {
            position: relative;
            width: 380px;
            max-width: 100%;
        }

        .search-input {
            width: 100%;
            padding: 0.82rem 1rem 0.82rem 3rem;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #f8fafc;
            font-size: 0.88rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(102,126,234,0.08);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #94a3b8;
        }

        .user-avatar {
            width: 46px;
            height: 46px;
            background: var(--primary-gradient);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            border: 2px solid white;
            box-shadow: 0 8px 16px rgba(15,23,42,0.08);
            flex-shrink: 0;
        }

        .welcome-banner {
            background: var(--primary-gradient);
            border-radius: 30px;
            padding: 2.5rem;
            margin-bottom: 1.7rem;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(102,126,234,0.22);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1.2rem;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -35%;
            right: -8%;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -55%;
            left: -10%;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }

        .banner-content {
            position: relative;
            z-index: 1;
            max-width: 700px;
        }

        .banner-content h2 {
            font-size: 2.45rem;
            line-height: 1.12;
            font-weight: 800;
            margin-bottom: 0.45rem;
        }

        .banner-content p {
            color: rgba(255,255,255,0.9);
            font-size: 1.05rem;
        }

        .banner-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-top: 1.4rem;
        }

        .banner-stat {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.14);
            padding: 0.65rem 1rem;
            border-radius: 14px;
            border: 1px solid rgba(255,255,255,0.16);
            backdrop-filter: blur(6px);
            font-size: 0.88rem;
        }

        .banner-logo {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.16);
            border: 2px solid rgba(255,255,255,0.18);
            border-radius: 34px;
            padding: 1.8rem 3.8rem;
            backdrop-filter: blur(6px);
            transition: all 0.35s ease;
        }

        .banner-logo:hover {
            transform: scale(1.04) rotate(2deg);
            background: rgba(255,255,255,0.22);
        }

        .banner-logo img {
            height: 140px;
            width: auto;
            filter: drop-shadow(0 12px 20px rgba(0,0,0,0.18));
        }

        /* NOUVELLES PETITES CARTES LUXE */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.4rem;
            margin-bottom: 1.9rem;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            padding: 1.55rem 1.4rem 1.35rem;
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.07);
            transition: all 0.35s ease;
            isolation: isolate;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.015);
            box-shadow: 0 28px 55px rgba(15, 23, 42, 0.12);
        }

        .stat-card::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(248,250,252,0.98));
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            top: -65px;
            right: -50px;
            opacity: 0.12;
            z-index: -1;
        }

        .stat-card.purple::after { background: linear-gradient(135deg, #7c3aed, #8b5cf6); }
        .stat-card.orange::after { background: linear-gradient(135deg, #f59e0b, #f97316); }
        .stat-card.blue::after { background: linear-gradient(135deg, #3b82f6, #06b6d4); }
        .stat-card.green::after { background: linear-gradient(135deg, #10b981, #059669); }

        .stat-glow-line {
            position: absolute;
            left: 18px;
            right: 18px;
            top: 0;
            height: 5px;
            border-radius: 0 0 14px 14px;
        }

        .stat-card.purple .stat-glow-line { background: linear-gradient(90deg, #7c3aed, #8b5cf6); }
        .stat-card.orange .stat-glow-line { background: linear-gradient(90deg, #f59e0b, #f97316); }
        .stat-card.blue .stat-glow-line { background: linear-gradient(90deg, #3b82f6, #06b6d4); }
        .stat-card.green .stat-glow-line { background: linear-gradient(90deg, #10b981, #059669); }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.15rem;
        }

        .stat-icon-wrap {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .stat-icon {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 14px 24px rgba(15,23,42,0.08),
                inset 0 1px 0 rgba(255,255,255,0.75);
        }

        .stat-icon svg {
            width: 26px;
            height: 26px;
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
            color: #6d28d9;
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            color: #ea580c;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #eff6ff, #e0f2fe);
            color: #0284c7;
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: #059669;
        }

        .stat-trend {
            padding: 0.38rem 0.8rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.2px;
            border: 1px solid transparent;
        }

        .stat-trend.positive {
            background: #dcfce7;
            color: #166534;
            border-color: #bbf7d0;
        }

        .stat-trend.neutral {
            background: #fef3c7;
            color: #92400e;
            border-color: #fde68a;
        }

        .stat-number {
            font-size: 2.8rem;
            line-height: 1;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: 0.38rem;
            letter-spacing: -1.3px;
        }

        .stat-label {
            color: #111827;
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 0.35rem;
        }

        .stat-subtext {
            font-size: 0.77rem;
            color: #64748b;
            margin-bottom: 1rem;
            font-weight: 600;
            min-height: 34px;
        }

        .stat-progress {
            margin-top: 0.2rem;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.77rem;
            color: #64748b;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .progress-bar {
            width: 100%;
            height: 11px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
            position: relative;
        }

        .progress-fill {
            height: 100%;
            border-radius: 999px;
            position: relative;
        }

        .progress-fill::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(255,255,255,0.35), rgba(255,255,255,0));
        }

        .progress-fill.purple { background: linear-gradient(90deg, #7c3aed, #8b5cf6); }
        .progress-fill.orange { background: linear-gradient(90deg, #f59e0b, #f97316); }
        .progress-fill.blue { background: linear-gradient(90deg, #3b82f6, #06b6d4); }
        .progress-fill.green { background: linear-gradient(90deg, #10b981, #059669); }

        .stat-footer-badge {
            margin-top: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.36rem 0.8rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
        }

        .stat-card.purple .stat-footer-badge {
            background: #f3e8ff;
            color: #7c3aed;
        }

        .stat-card.orange .stat-footer-badge {
            background: #fff7ed;
            color: #ea580c;
        }

        .stat-card.blue .stat-footer-badge {
            background: #eff6ff;
            color: #0284c7;
        }

        .stat-card.green .stat-footer-badge {
            background: #ecfdf5;
            color: #059669;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1.8fr 1fr;
            gap: 1.3rem;
            margin-bottom: 1.7rem;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 1.5rem;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.3rem;
            gap: 1rem;
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--dark);
        }

        .chart-select {
            padding: 0.55rem 0.95rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.84rem;
            background: #f8fafc;
        }

        .chart-container {
            height: 300px;
            display: flex;
            align-items: flex-end;
            gap: 0.55rem;
            margin-bottom: 1rem;
        }

        .chart-bar-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .chart-bar {
            width: 100%;
            min-height: 20px;
            border-radius: 10px 10px 0 0;
            background: linear-gradient(180deg, var(--primary), var(--secondary));
            position: relative;
            box-shadow: inset 0 -8px 18px rgba(255,255,255,0.10);
        }

        .chart-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: var(--dark);
            color: white;
            padding: 0.4rem 0.55rem;
            border-radius: 8px;
            font-size: 0.72rem;
            opacity: 0;
            pointer-events: none;
            margin-bottom: 0.45rem;
            white-space: nowrap;
        }

        .chart-bar-wrapper:hover .chart-tooltip {
            opacity: 1;
        }

        .chart-label {
            margin-top: 0.5rem;
            font-size: 0.75rem;
            color: var(--muted);
        }

        .chart-value {
            margin-top: 0.25rem;
            background: #eef2ff;
            color: var(--primary);
            border-radius: 999px;
            padding: 0.2rem 0.55rem;
            font-size: 0.72rem;
            font-weight: 800;
        }

        .chart-footer {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .chart-footer-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--muted);
            font-size: 0.84rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.15rem;
        }

        .title-bar {
            width: 4px;
            height: 24px;
            border-radius: 999px;
            background: linear-gradient(to bottom, #f59e0b, #d97706);
        }

        .section-title h3 {
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--dark);
        }

        .tasks-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tasks-count {
            background: #fef3c7;
            color: #92400e;
            padding: 0.3rem 0.8rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .priority-filters {
            display: flex;
            gap: 0.45rem;
            flex-wrap: wrap;
        }

        .priority-filter {
            padding: 0.28rem 0.75rem;
            border-radius: 999px;
            font-size: 0.73rem;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }

        .priority-filter.all { background: #eef2ff; color: var(--primary); }
        .priority-filter.high { background: #fee2e2; color: #991b1b; }
        .priority-filter.medium { background: #fef3c7; color: #92400e; }
        .priority-filter.low { background: #e0f2fe; color: #075985; }
        .priority-filter.active { transform: scale(1.04); box-shadow: 0 2px 8px rgba(0,0,0,0.08); }

        .tasks-container {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .task-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 16px;
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        .task-item:hover {
            background: #f1f5f9;
            border-color: rgba(102,126,234,0.08);
            transform: translateX(4px);
        }

        .task-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            margin-right: 1rem;
            cursor: pointer;
            flex-shrink: 0;
        }

        .task-checkbox.checked {
            background: var(--primary-gradient);
            border-color: transparent;
            position: relative;
        }

        .task-checkbox.checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: 800;
        }

        .task-content {
            flex: 1;
            min-width: 0;
        }

        .task-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.2rem;
        }

        .task-title.completed {
            text-decoration: line-through;
            color: #94a3b8;
        }

        .task-meta {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            font-size: 0.74rem;
            color: var(--muted);
        }

        .task-priority {
            padding: 0.12rem 0.55rem;
            border-radius: 999px;
            font-size: 0.64rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .priority-high { background: #fee2e2; color: #991b1b; }
        .priority-medium { background: #fef3c7; color: #92400e; }
        .priority-low { background: #e0f2fe; color: #075985; }

        .tasks-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 700;
        }

        .tasks-summary {
            margin-top: 1rem;
            background: var(--soft-gradient);
            border: 1px solid rgba(102,126,234,0.08);
            border-radius: 18px;
            padding: 1rem;
        }

        .tasks-summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.8rem;
        }

        .summary-box {
            background: white;
            border: 1px solid #edf2f7;
            border-radius: 14px;
            padding: 0.9rem;
            text-align: center;
        }

        .summary-box .value {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--dark);
        }

        .summary-box .label {
            margin-top: 0.2rem;
            font-size: 0.75rem;
            color: var(--muted);
            font-weight: 600;
        }

        .deliverables-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.2rem;
        }

        .deliverables-header h3 {
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--dark);
        }

        .deliverables-header a {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 700;
        }

        .deliverables-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .deliverable-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 18px;
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        .deliverable-item:hover {
            background: #f1f5f9;
            border-color: rgba(102,126,234,0.08);
        }

        .deliverable-icon {
            width: 42px;
            height: 42px;
            background: #eef2ff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.9rem;
            flex-shrink: 0;
        }

        .deliverable-icon svg {
            width: 20px;
            height: 20px;
            color: var(--primary);
        }

        .deliverable-content {
            flex: 1;
            min-width: 0;
        }

        .deliverable-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.2rem;
        }

        .deliverable-desc {
            font-size: 0.74rem;
            color: var(--muted);
        }

        .deliverable-status {
            padding: 0.26rem 0.75rem;
            border-radius: 999px;
            font-size: 0.64rem;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
            margin-left: 0.6rem;
        }

        .status-not-started { background: #f1f5f9; color: #475569; }
        .status-in-progress { background: #dbeafe; color: #1e40af; }
        .status-completed { background: #d1fae5; color: #065f46; }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .project-card {
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            transition: all 0.2s;
            background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
        }

        .project-card:hover {
            border-color: rgba(102,126,234,0.2);
            box-shadow: 0 8px 18px rgba(102,126,234,0.08);
        }

        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.55rem;
        }

        .project-header h4 {
            font-weight: 700;
            color: var(--dark);
        }

        .project-badge {
            font-size: 0.62rem;
            padding: 0.18rem 0.52rem;
            background: #d1fae5;
            color: #065f46;
            border-radius: 999px;
            font-weight: 700;
        }

        .project-desc {
            font-size: 0.74rem;
            color: var(--muted);
            margin-bottom: 0.85rem;
        }

        .project-progress-header {
            display: flex;
            justify-content: space-between;
            font-size: 0.74rem;
            margin-bottom: 0.3rem;
            color: var(--muted);
        }

        .project-progress-bar {
            width: 100%;
            height: 6px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .project-progress-fill {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 999px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.55s ease forwards;
        }

        @media (max-width: 1280px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .deliverables-grid {
                grid-template-columns: 1fr;
            }

            .projects-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .banner-logo img {
                height: 120px;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .topbar {
                flex-wrap: wrap;
            }

            .search-container {
                width: 100%;
            }

            .welcome-banner {
                padding: 1.6rem;
            }

            .banner-logo {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .stats-grid,
            .projects-grid,
            .tasks-summary-grid {
                grid-template-columns: 1fr;
            }

            .banner-content h2 {
                font-size: 1.75rem;
            }

            .chart-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>GestionLivrable</h1>
                <p>Espace Consultant</p>
            </div>

            <div class="sidebar-profile">
                <div class="profile-info">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                    </div>
                    <div class="profile-details">
                        <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                        <p>Consultant</p>
                    </div>
                </div>

                <div class="partner-container">
                    <span>Partenaire officiel</span>
                    <div class="partner-logo">
                        <img src="{{ asset('images/logo-alstom.png') }}"
                             alt="Alstom"
                             onerror="this.src='https://via.placeholder.com/200x80/667eea/ffffff?text=ALSTOM'">
                    </div>
                </div>
            </div>

            <div class="sidebar-menu">
                <div class="menu-title">MENU</div>

                <a href="{{ route('consultant.dashboard') }}" class="menu-item active">
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
                    <span class="menu-badge">{{ $totalLivrables ?? 0 }}</span>
                </a>

                <a href="{{ route('consultant.statistiques') }}" class="menu-item">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span>Statistiques</span>
                </a>

                <div style="margin: 1.4rem 0; border-top: 1px solid #e2e8f0;"></div>

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
            <header class="topbar">
                <div class="breadcrumb">
                    <a href="{{ route('consultant.dashboard') }}">Dashboard</a>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span>Accueil</span>
                </div>

                <div class="search-container">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" class="search-input" placeholder="Rechercher un livrable, une tâche...">
                </div>

                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                </div>
            </header>

            @php
                $totalLivrables = $livrables->count();
                $notStarted = $livrables->filter(fn($l) => strtolower($l->status) === 'not started')->count();
                $inProgress = $livrables->filter(fn($l) => strtolower($l->status) === 'in progress')->count();
                $completed = $livrables->filter(fn($l) => strtolower($l->status) === 'completed')->count();

                $notStartedPourcentage = $totalLivrables > 0 ? round(($notStarted / $totalLivrables) * 100) : 0;
                $inProgressPourcentage = $totalLivrables > 0 ? round(($inProgress / $totalLivrables) * 100) : 0;
                $completedPourcentage = $totalLivrables > 0 ? round(($completed / $totalLivrables) * 100) : 0;

                $tachesEnCours = $taches->where('terminee', false)->count();

                

                $totalActiviteSemaine = array_sum(array_column($semaine, 'count'));
                $moyenneSemaine = round($totalActiviteSemaine / 7, 1);
                $maxSemaine = max(array_column($semaine, 'count')) ?: 1;
            @endphp

            <div class="welcome-banner fade-in">
                <div class="banner-content">
                    <h2>Bonjour, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} !</h2>
                    <p>Bienvenue dans votre espace consultant. Retrouvez une vue premium de votre activité, de vos tâches et de vos livrables.</p>

                    <div class="banner-stats">
                        <div class="banner-stat">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Mise à jour : {{ now()->format('d/m/Y') }}</span>
                        </div>
                        <div class="banner-stat">
                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ $tachesEnCours }} tâches en cours</span>
                        </div>
                    </div>
                </div>

                <div class="banner-logo">
                    <img src="{{ asset('images/logo-segula.png') }}"
                         alt="Segula"
                         onerror="this.src='https://via.placeholder.com/400x150/ffffff/667eea?text=SEGULA'">
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card purple fade-in" style="animation-delay:0.1s;">
                    <div class="stat-glow-line"></div>
                    <div class="stat-header">
                        <div class="stat-icon-wrap">
                            <div class="stat-icon purple">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <span class="stat-trend positive">Global</span>
                    </div>
                    <div class="stat-number">{{ $totalLivrables }}</div>
                    <div class="stat-label">Mes Livrables</div>
                    <div class="stat-subtext">Vue premium de tous vos livrables assignés</div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Total</span>
                            <span>100%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill purple" style="width:100%;"></div>
                        </div>
                    </div>
                    <div class="stat-footer-badge">• Suivi global</div>
                </div>

                <div class="stat-card orange fade-in" style="animation-delay:0.2s;">
                    <div class="stat-glow-line"></div>
                    <div class="stat-header">
                        <div class="stat-icon-wrap">
                            <div class="stat-icon orange">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                        </div>
                        <span class="stat-trend neutral">À lancer</span>
                    </div>
                    <div class="stat-number">{{ $notStarted }}</div>
                    <div class="stat-label">Not Started</div>
                    <div class="stat-subtext">Livrables en attente de démarrage</div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Progression</span>
                            <span>{{ $notStartedPourcentage }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill orange" style="width:{{ $notStartedPourcentage }}%;"></div>
                        </div>
                    </div>
                    <div class="stat-footer-badge">• À préparer</div>
                </div>

                <div class="stat-card blue fade-in" style="animation-delay:0.3s;">
                    <div class="stat-glow-line"></div>
                    <div class="stat-header">
                        <div class="stat-icon-wrap">
                            <div class="stat-icon blue">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <span class="stat-trend positive">Actif</span>
                    </div>
                    <div class="stat-number">{{ $inProgress }}</div>
                    <div class="stat-label">In Progress</div>
                    <div class="stat-subtext">Livrables en cours de traitement</div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Progression</span>
                            <span>{{ $inProgressPourcentage }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill blue" style="width:{{ $inProgressPourcentage }}%;"></div>
                        </div>
                    </div>
                    <div class="stat-footer-badge">• En activité</div>
                </div>

                <div class="stat-card green fade-in" style="animation-delay:0.4s;">
                    <div class="stat-glow-line"></div>
                    <div class="stat-header">
                        <div class="stat-icon-wrap">
                            <div class="stat-icon green">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <span class="stat-trend positive">Validé</span>
                    </div>
                    <div class="stat-number">{{ $completed }}</div>
                    <div class="stat-label">Completed</div>
                    <div class="stat-subtext">Livrables terminés avec succès</div>
                    <div class="stat-progress">
                        <div class="progress-header">
                            <span>Réussite</span>
                            <span>{{ $completedPourcentage }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill green" style="width:{{ $completedPourcentage }}%;"></div>
                        </div>
                    </div>
                    <div class="stat-footer-badge">• Finalisés</div>
                </div>
            </div>

            <div class="main-grid">
                <div class="card fade-in">
                    <div class="card-header">
                        <div class="card-title">Mon activité hebdomadaire</div>
                        <select class="chart-select">
                            <option>Cette semaine</option>
                            <option disabled>Ce mois</option>
                            <option disabled>Cette année</option>
                        </select>
                    </div>

                    <div class="chart-container">
                        @foreach($semaine as $jour)
                            @php
                                $hauteur = $jour['count'] > 0 ? round(($jour['count'] / $maxSemaine) * 210) + 20 : 20;
                            @endphp
                            <div class="chart-bar-wrapper">
                                <div class="chart-bar" style="height: {{ $hauteur }}px;">
                                    <div class="chart-tooltip">{{ $jour['count'] }} livrable(s)</div>
                                </div>
                                <span class="chart-label">{{ $jour['label'] }}</span>
                                <span class="chart-value">{{ $jour['count'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="chart-footer">
                        <div class="chart-footer-item">
                            <svg width="18" height="18" fill="none" stroke="#667eea" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span>Total : <strong>{{ $totalActiviteSemaine }}</strong></span>
                        </div>
                        <div class="chart-footer-item">
                            <svg width="18" height="18" fill="none" stroke="#667eea" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Moyenne : <strong>{{ $moyenneSemaine }}</strong>/jour</span>
                        </div>
                    </div>
                </div>

                <div class="card fade-in" style="animation-delay:0.2s;">
                    <div class="section-title">
                        <div class="title-bar"></div>
                        <h3>Tâches en cours</h3>
                    </div>

                    <div class="tasks-header">
                        <span class="tasks-count">{{ $tachesEnCours }} restantes</span>
                        <div class="priority-filters">
                            <button class="priority-filter all active">Toutes</button>
                            <button class="priority-filter high">Haute</button>
                            <button class="priority-filter medium">Moyenne</button>
                            <button class="priority-filter low">Basse</button>
                        </div>
                    </div>

                    <div class="tasks-container">
                        @forelse($taches as $tache)
                            <div class="task-item" data-priority="{{ $tache->priorite }}">
                                <div class="task-checkbox {{ $tache->terminee ? 'checked' : '' }}"></div>
                                <div class="task-content">
                                    <div class="task-title {{ $tache->terminee ? 'completed' : '' }}">
                                        {{ $tache->titre }}
                                    </div>
                                    <div class="task-meta">
                                        <span>Échéance : {{ \Carbon\Carbon::parse($tache->echeance)->format('d/m') }}</span>
                                        <span class="task-priority priority-{{ $tache->priorite }}">
                                            {{ ucfirst($tache->priorite) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="text-align:center; color:#94a3b8; padding:2rem;">Aucune tâche en cours</p>
                        @endforelse
                    </div>

                    <div class="tasks-summary">
                        <div class="tasks-summary-grid">
                            <div class="summary-box">
                                <div class="value">{{ $taches->count() }}</div>
                                <div class="label">Total tâches</div>
                            </div>
                            <div class="summary-box">
                                <div class="value">{{ $tachesEnCours }}</div>
                                <div class="label">En attente</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('consultant.taches') }}" class="tasks-link">
                        Voir toutes mes tâches →
                    </a>
                </div>
            </div>

            <div class="card fade-in" style="animation-delay:0.35s;">
                <div class="deliverables-header">
                    <h3>Mes livrables récents</h3>
                    <a href="{{ route('consultant.livrables') }}">Voir tous →</a>
                </div>

                <div class="deliverables-grid">
                    @forelse($livrables->take(4) as $livrable)
                        <div class="deliverable-item">
                            <div class="deliverable-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="deliverable-content">
                                <div class="deliverable-title">{{ $livrable->titre }}</div>
                                <div class="deliverable-desc">{{ Str::limit($livrable->description ?? 'Sans description', 34) }}</div>
                            </div>
                            <span class="deliverable-status 
                                @if(strtolower($livrable->status) == 'completed') status-completed
                                @elseif(strtolower($livrable->status) == 'in progress') status-in-progress
                                @elseif(strtolower($livrable->status) == 'not started') status-not-started
                                @endif">
                                {{ $livrable->status }}
                            </span>
                        </div>
                    @empty
                        <div style="grid-column: span 2; text-align:center; padding:2rem; color:#94a3b8;">
                            Aucun livrable pour le moment
                        </div>
                    @endforelse
                </div>
            </div>

            @if($projets->count() > 0)
                <div class="card fade-in" style="margin-top:1.2rem; animation-delay:0.45s;">
                    <div class="card-title">Projets en cours</div>

                    <div class="projects-grid">
                        @foreach($projets as $projet)
                            <div class="project-card">
                                <div class="project-header">
                                    <h4>{{ $projet->nom }}</h4>
                                    <span class="project-badge">Actif</span>
                                </div>
                                <p class="project-desc">{{ Str::limit($projet->description ?? 'Aucune description', 46) }}</p>
                                <div class="project-progress-header">
                                    <span>Progression</span>
                                    <span>75%</span>
                                </div>
                                <div class="project-progress-bar">
                                    <div class="project-progress-fill" style="width:75%;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.task-checkbox').forEach(checkbox => {
                checkbox.addEventListener('click', function() {
                    this.classList.toggle('checked');
                    const taskTitle = this.closest('.task-item').querySelector('.task-title');
                    if (this.classList.contains('checked')) {
                        taskTitle.classList.add('completed');
                    } else {
                        taskTitle.classList.remove('completed');
                    }
                });
            });

            const filters = document.querySelectorAll('.priority-filter');
            filters.forEach(filter => {
                filter.addEventListener('click', function() {
                    filters.forEach(f => f.classList.remove('active'));
                    this.classList.add('active');

                    const label = this.textContent.trim().toLowerCase();
                    document.querySelectorAll('.task-item').forEach(task => {
                        if (label === 'toutes') {
                            task.style.display = 'flex';
                        } else if (label === 'haute') {
                            task.style.display = task.dataset.priority === 'haute' ? 'flex' : 'none';
                        } else if (label === 'moyenne') {
                            task.style.display = task.dataset.priority === 'moyenne' ? 'flex' : 'none';
                        } else if (label === 'basse') {
                            task.style.display = task.dataset.priority === 'basse' ? 'flex' : 'none';
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>