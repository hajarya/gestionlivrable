<x-app-layout>
    <!-- Font Awesome pour les vraies icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Styles personnalisés -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --success: #48bb78;
            --warning: #ecc94b;
            --danger: #f56565;
            --info: #4299e1;
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

        body {
            background: #f1f5f9;
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

        /* Sidebar fixe */
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

        /* Scrollbar */
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

        /* Profil */
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

        /* Alstom logo */
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

        /* ===== STYLES AMÉLIORÉS POUR LE TABLEAU ===== */
        .table-container {
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(102, 126, 234, 0.1);
            overflow-x: auto;
            position: relative;
        }

        .table-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .table thead tr {
            background: transparent;
        }

        .table th {
            text-align: left;
            padding: 16px 12px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #4a5568;
            background: transparent;
            border-bottom: none;
        }

        .table th i {
            margin-right: 8px;
            color: var(--primary);
            font-size: 0.9rem;
        }

        .table tbody tr {
            background: white;
            border-radius: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            border: 1px solid transparent;
        }

        .table tbody tr:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -8px rgba(102, 126, 234, 0.3);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .table td {
            padding: 16px 12px;
            border-bottom: none;
            color: #2d3748;
            font-size: 0.95rem;
            background: white;
        }

        .table td:first-child {
            border-top-left-radius: 16px;
            border-bottom-left-radius: 16px;
        }

        .table td:last-child {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        /* Colonne Titre améliorée */
        .title-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .title-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        .title-content {
            flex: 1;
        }

        .title-main {
            font-weight: 600;
            color: #2d3748;
            display: block;
            margin-bottom: 3px;
        }

        .title-meta {
            font-size: 0.7rem;
            color: #a0aec0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .title-meta i {
            font-size: 0.6rem;
            color: #cbd5e0;
        }

        /* Badges de type */
        .type-badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f7fafc;
            color: #4a5568;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .type-badge i {
            font-size: 0.8rem;
        }

        .type-badge.cbc {
            background: linear-gradient(135deg, #e9d8fd, #d6bcfa);
            color: #553c9a;
            border-color: #9f7aea;
        }
        .type-badge.cbc i { color: #553c9a; }

        .type-badge.dtrf {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
            border-color: #fbbf24;
        }
        .type-badge.dtrf i { color: #92400e; }

        .type-badge.tender {
            background: linear-gradient(135deg, #bee3f8, #90cdf4);
            color: #1e4a6b;
            border-color: #4299e1;
        }
        .type-badge.tender i { color: #1e4a6b; }

        .type-badge.standard {
            background: linear-gradient(135deg, #c6f6d5, #9ae6b4);
            color: #22543d;
            border-color: #48bb78;
        }
        .type-badge.standard i { color: #22543d; }

        /* Consultant info amélioré */
        .consultant-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .consultant-avatar {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
        }

        .consultant-details {
            display: flex;
            flex-direction: column;
        }

        .consultant-name {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.95rem;
        }

        .consultant-role {
            font-size: 0.7rem;
            color: #a0aec0;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .consultant-role i {
            font-size: 0.6rem;
            color: #48bb78;
        }

        /* Badges de statut */
        .status-badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border: 1px solid rgba(255,255,255,0.3);
        }

        .status-badge i {
            font-size: 0.7rem;
        }

        .status-badge.not-start {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e0);
            color: #2d3748;
        }

        .status-badge.in-progress {
            background: linear-gradient(135deg, #bee3f8, #90cdf4);
            color: #1e4a6b;
        }

        .status-badge.fq-review {
            background: linear-gradient(135deg, #faf5ff, #e9d8fd);
            color: #6b46c1;
        }

        .status-badge.completed {
            background: linear-gradient(135deg, #c6f6d5, #9ae6b4);
            color: #22543d;
        }

        .status-badge.standby {
            background: linear-gradient(135deg, #feebc8, #fbd38d);
            color: #744210;
        }

        .status-badge.cancelled {
            background: linear-gradient(135deg, #fed7d7, #fbb6ce);
            color: #742a2a;
        }

        /* Date améliorée */
        .date-cell {
            display: flex;
            flex-direction: column;
        }

        .date-main {
            font-weight: 500;
            color: #2d3748;
            font-size: 0.9rem;
        }

        .date-meta {
            font-size: 0.7rem;
            color: #a0aec0;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 2px;
        }

        .date-meta i {
            font-size: 0.6rem;
            color: #f56565;
        }

        /* Actions améliorées - AJOUT DU BOUTON SUPPRIMER */
        .actions-cell {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #f7fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #718096;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }

        .btn-icon:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-2px);
            border-color: transparent;
            box-shadow: 0 5px 10px rgba(102, 126, 234, 0.3);
        }

        .btn-icon.delete-btn:hover {
            background: linear-gradient(135deg, #f56565, #c53030);
            box-shadow: 0 5px 10px rgba(229, 62, 62, 0.3);
        }

        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .btn-view:hover {
            transform: translateX(3px);
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-view i {
            font-size: 0.7rem;
        }

        /* Nouveau badge amélioré */
        .new-badge {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 3px 10px;
            border-radius: 30px;
            font-size: 0.65rem;
            margin-left: 8px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 2px 5px rgba(72, 187, 120, 0.3);
        }

        .new-badge i {
            font-size: 0.6rem;
        }

        /* Bouton créer */
        .btn-create {
            display: inline-flex;
            align-items: center;
            padding: 12px 28px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px -8px rgba(102, 126, 234, 0.4);
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-create:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 30px -10px rgba(102, 126, 234, 0.6);
        }

        .btn-create i {
            margin-right: 10px;
        }

        /* En-tête de page */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 2.2rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }

        .page-subtitle {
            color: #718096;
            margin-top: 5px;
            font-size: 1rem;
        }

        /* Filtres */
        .filters-container {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .filter-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            min-height: 48px;
        }

        .filter-icon {
            position: absolute;
            left: 15px;
            color: var(--gray);
            font-size: 0.9rem;
            z-index: 1;
            top: 50%;
            transform: translateY(-50%);
            line-height: 1;
            pointer-events: none;
        }

        .filter-select, .search-input {
            padding: 12px 20px 12px 45px;
            border-radius: 40px;
            border: 1px solid #e2e8f0;
            background: white;
            font-size: 0.95rem;
            color: #2d3748;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
            appearance: none;
            height: 48px;
            line-height: normal;
            width: 100%;
        }

        .filter-select:hover, .filter-select:focus, .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .search-wrapper {
            position: relative;
            flex: 1;
            min-width: 250px;
            min-height: 48px;
        }

        .search-input {
            width: 100%;
            cursor: text;
            height: 48px;
        }

        /* Stats rapides */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card-small {
            background: white;
            border-radius: var(--border-radius-md);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-card-small:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .stat-content {
            flex: 1;
        }

        .stat-value-small {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
        }

        .stat-label-small {
            color: #718096;
            font-size: 0.9rem;
            margin-top: 5px;
            font-weight: 500;
        }

        /* État vide */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, #f9fafc 0%, #f3f4f8 100%);
            border-radius: var(--border-radius-lg);
        }

        .empty-state i {
            font-size: 5rem;
            color: #cbd5e0;
            margin-bottom: 20px;
        }

        .empty-state p {
            color: #718096;
            margin-bottom: 20px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a, .pagination span {
            padding: 8px 14px;
            border-radius: 8px;
            background: white;
            color: #4a5568;
            text-decoration: none;
            border: 1px solid #e2e8f0;
        }

        .pagination .active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Header */
        .header-logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 40px;
            padding: 10px 35px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px -5px rgba(0,0,0,0.1);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .header-logo-container:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px -8px rgba(102, 126, 234, 0.4);
            border-color: var(--primary);
        }

        .header-logo {
            width: auto;
            height: 50px;
            max-width: 180px;
            object-fit: contain;
        }

        .user-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-name {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 20px;
            border-radius: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .user-name i {
            margin-right: 8px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 45px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            border: 2px solid white;
        }

        /* Modal de confirmation de suppression */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background: white;
            border-radius: 24px;
            padding: 30px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            transform: scale(0.8);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .modal-overlay.active .modal-container {
            transform: scale(1);
        }

        .modal-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fed7d7, #fbb6ce);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .modal-icon i {
            font-size: 2.5rem;
            color: #c53030;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .modal-message {
            color: #718096;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .modal-btn {
            padding: 12px 30px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .modal-btn.cancel {
            background: #e2e8f0;
            color: #4a5568;
        }

        .modal-btn.cancel:hover {
            background: #cbd5e0;
        }

        .modal-btn.confirm {
            background: linear-gradient(135deg, #f56565, #c53030);
            color: white;
        }

        .modal-btn.confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -5px #f56565;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex">
        <!-- Sidebar - Menu Latéral -->
        <aside class="bg-white/90 backdrop-blur-lg shadow-2xl sidebar-fixed">
            <div class="sidebar-content">
                <!-- En-tête avec titre seulement -->
                <div class="gradient-bg p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-5 rounded-full -ml-10 -mb-10"></div>
                    <div class="relative z-10">
                        <h1 class="text-2xl font-bold text-white tracking-tight">GestionLivrable</h1>
                        <p class="text-sm text-purple-200 font-medium mt-2">Espace Responsable</p>
                    </div>
                </div>

                <!-- Profil Utilisateur -->
                <div class="p-6">
                    <div class="profile-card">
                        <!-- Avatar et nom en haut -->
                        <div class="flex items-center space-x-4">
                            <div class="avatar">
                                {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-xl">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                <p class="text-sm text-gray-500">Responsable Projet</p>
                            </div>
                        </div>
                        
                        <!-- Logo ALSTOM -->
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

                <!-- Menu Principal -->
                <div class="px-4">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 px-3">MENU PRINCIPAL</p>
                    
                    <!-- Dashboard -->
                    <a href="{{ route('responsable.dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Dashboard</span>
                    </a>

                    <!-- Mes Livrables (actif) -->
                    <a href="{{ route('responsable.livrables') }}" class="sidebar-item active flex items-center space-x-3 p-3 mb-1 group">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Mes Livrables</span>
                        <span class="ml-auto bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs px-3 py-1.5 rounded-full font-semibold shadow-md">{{ count($livrables) }}</span>
                    </a>

                    <!-- Créer Livrable -->
                    <a href="{{ route('responsable.livrables.create') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Créer un Livrable</span>
                    </a>

                    
                    <!-- Statistiques -->
                    <a href="{{ route('responsable.statistiques') }}" class="sidebar-item flex items-center space-x-3 p-3 mb-1 text-gray-700 group">
                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-base">Statistiques</span>
                    </a>
                </div>

                <!-- Footer Sidebar avec déconnexion -->
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

        <!-- Main Content -->
        <main class="flex-1 ml-72">
            <!-- Header amélioré -->
            <header class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-10">
                <div class="px-8 py-4 flex justify-between items-center">
                    <!-- Breadcrumb -->
                    <div class="flex items-center space-x-3 text-sm">
                        <a href="{{ route('responsable.dashboard') }}" class="text-gray-600 hover:text-purple-600 transition font-medium">
                            <i class="fas fa-home mr-1"></i> Dashboard
                        </a>
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <span class="text-purple-600 font-semibold bg-purple-50 px-3 py-1 rounded-full">
                            <i class="fas fa-file-alt mr-1"></i> Mes Livrables
                        </span>
                    </div>

                    <!-- Logo SEGULA -->
                    <div class="header-logo-container">
                        <img src="{{ asset('images/logo-segula.png') }}" 
                             alt="Segula" 
                             class="header-logo"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/180x50/667eea/ffffff?text=SEGULA'">
                    </div>

                    <!-- Nom utilisateur -->
                    <div class="user-container">
                        <span class="user-name"><i class="fas fa-user-circle mr-2"></i>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->first_name,0,2)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenu de la page Mes Livrables -->
            <div class="p-8 space-y-8">
                <!-- En-tête de page -->
                <div class="page-header fade-in">
                    <div>
                        <h1 class="page-title">
                            <i class="fas fa-file-alt mr-3" style="color: #667eea;"></i> Mes Livrables
                        </h1>
                        <p class="page-subtitle">
                            <i class="fas fa-info-circle mr-2 text-purple-500"></i>
                            Gérez l'ensemble de vos livrables
                        </p>
                    </div>
                    <a href="{{ route('responsable.livrables.create') }}" class="btn-create">
                        <i class="fas fa-plus"></i>
                        Nouveau Livrable
                    </a>
                </div>

                <!-- Statistiques rapides -->
                @php
                    $total = count($livrables);
                    
                    $notStart = $livrables->filter(function($l) {
                        return in_array($l->status, ['Not start', 'Not started']);
                    })->count();
                    
                    $inProgress = $livrables->filter(function($l) {
                        return in_array($l->status, ['En cours', 'In progress']);
                    })->count();
                    
                    $fqReview = $livrables->filter(function($l) {
                        return in_array($l->status, ['Révision', 'FQ review']);
                    })->count();
                    
                    $completed = $livrables->filter(function($l) {
                        return in_array($l->status, ['Terminé', 'Completed']);
                    })->count();
                    
                    $standby = $livrables->filter(function($l) {
                        return in_array($l->status, ['En attente', 'Standby']);
                    })->count();
                    
                    $cancelled = $livrables->filter(function($l) {
                        return $l->status == 'Cancelled';
                    })->count();
                @endphp

                <div class="stats-grid fade-in delay-1">
                    <div class="stat-card-small">
                        <div class="stat-icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value-small">{{ $total }}</div>
                            <div class="stat-label-small">Total livrables</div>
                        </div>
                    </div>
                    <div class="stat-card-small">
                        <div class="stat-icon">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value-small">{{ $inProgress }}</div>
                            <div class="stat-label-small">In progress</div>
                        </div>
                    </div>
                    <div class="stat-card-small">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value-small">{{ $completed }}</div>
                            <div class="stat-label-small">Completed</div>
                        </div>
                    </div>
                    <div class="stat-card-small">
                        <div class="stat-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-value-small">{{ $cancelled }}</div>
                            <div class="stat-label-small">Cancelled</div>
                        </div>
                    </div>
                </div>

                <!-- Filtres -->
                <div class="filters-container fade-in delay-2">
                    <div class="filter-wrapper">
                        <i class="fas fa-filter filter-icon"></i>
                        <select class="filter-select" id="statusFilter">
                            <option value="">Tous les statuts</option>
                            <option value="Not start">Not start</option>
                            <option value="In progress">In progress</option>
                            <option value="FQ review">FQ review</option>
                            <option value="Completed">Completed</option>
                            <option value="Standby">Standby</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="filter-wrapper">
                        <i class="fas fa-tag filter-icon"></i>
                        <select class="filter-select" id="typeFilter">
                            <option value="">Tous les types</option>
                            <option value="CBC">CBC</option>
                            <option value="DTRF">DTRF</option>
                            <option value="TENDER">TENDER</option>
                            <option value="STANDARD">STANDARD</option>
                        </select>
                    </div>
                    <div class="search-wrapper">
                        <i class="fas fa-search filter-icon"></i>
                        <input type="text" class="search-input" placeholder="Rechercher un livrable ou consultant..." id="searchInput">
                    </div>
                </div>

                <!-- Tableau des livrables - AVEC BOUTON SUPPRIMER -->
                <div class="table-container fade-in delay-3">
                    <table class="table" id="livrablesTable">
                        <thead>
                            <tr>
                                <th><i class="fas fa-heading"></i>Titre</th>
                                <th><i class="fas fa-tag"></i>Type</th>
                                <th><i class="fas fa-user"></i>Consultant</th>
                                <th><i class="fas fa-circle"></i>Statut</th>
                                <th><i class="fas fa-calendar"></i>Date création</th>
                                <th><i class="fas fa-cog"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($livrables as $l)
                            @php
                                // Transformation des statuts anciens vers nouveaux
                                $displayStatus = match($l->status) {
                                    'En cours', 'In progress' => 'In progress',
                                    'Terminé', 'Completed' => 'Completed',
                                    'En attente', 'Standby' => 'Standby',
                                    'Révision', 'FQ review' => 'FQ review',
                                    'Not start', 'Not started' => 'Not start',
                                    'Cancelled' => 'Cancelled',
                                    default => 'Not start'
                                };
                                
                                $statusClass = match($displayStatus) {
                                    'Not start' => 'not-start',
                                    'In progress' => 'in-progress',
                                    'FQ review' => 'fq-review',
                                    'Completed' => 'completed',
                                    'Standby' => 'standby',
                                    'Cancelled' => 'cancelled',
                                    default => 'not-start'
                                };
                                
                                $statusIcon = match($displayStatus) {
                                    'Not start' => 'fa-circle',
                                    'In progress' => 'fa-spinner',
                                    'FQ review' => 'fa-clipboard-check',
                                    'Completed' => 'fa-check-circle',
                                    'Standby' => 'fa-pause-circle',
                                    'Cancelled' => 'fa-times-circle',
                                    default => 'fa-circle'
                                };
                            @endphp
                            <tr>
                                <td>
                                    <div class="title-cell">
                                        <div class="title-icon">
                                            <i class="fas {{ $l->type == 'CBC' ? 'fa-file-invoice' : ($l->type == 'DTRF' ? 'fa-file-signature' : ($l->type == 'TENDER' ? 'fa-file-contract' : 'fa-file-alt')) }}"></i>
                                        </div>
                                        <div class="title-content">
                                            <span class="title-main">{{ $l->titre }}</span>
                                            <div class="title-meta">
                                                <span><i class="far fa-clock"></i> ID: LIV-{{ str_pad($l->id, 4, '0', STR_PAD_LEFT) }}</span>
                                                @if($l->created_at->diffInDays(now()) < 7)
                                                    <span class="new-badge">
                                                        <i class="fas fa-star"></i> Nouveau
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $typeClass = match($l->type) {
                                            'CBC' => 'cbc',
                                            'DTRF' => 'dtrf',
                                            'TENDER' => 'tender',
                                            'STANDARD' => 'standard',
                                            default => ''
                                        };
                                        $typeIcon = match($l->type) {
                                            'CBC' => 'fa-file-invoice',
                                            'DTRF' => 'fa-file-signature',
                                            'TENDER' => 'fa-file-contract',
                                            'STANDARD' => 'fa-file-alt',
                                            default => 'fa-file'
                                        };
                                    @endphp
                                    <span class="type-badge {{ $typeClass }}">
                                        <i class="fas {{ $typeIcon }}"></i>
                                        {{ $l->type }}
                                    </span>
                                </td>
                                <td>
                                    <div class="consultant-info">
                                        <div class="consultant-avatar">
                                            {{ strtoupper(substr($l->consultant->first_name ?? 'NA',0,1)) }}
                                        </div>
                                        <div class="consultant-details">
                                            <span class="consultant-name">{{ $l->consultant ? $l->consultant->first_name . ' ' . $l->consultant->last_name : 'Non assigné' }}</span>
                                            <span class="consultant-role">
                                                <i class="fas fa-circle"></i>
                                                {{ $l->consultant ? 'Consultant' : 'Non assigné' }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge {{ $statusClass }}">
                                        <i class="fas {{ $statusIcon }}"></i>
                                        {{ $displayStatus }}
                                    </span>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <span class="date-main">{{ $l->created_at->format('d/m/Y') }}</span>
                                        <span class="date-meta">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $l->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('responsable.livrables.show', $l->id) }}" class="btn-icon" title="Voir les détails">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('responsable.livrables.edit', $l->id) }}" class="btn-icon" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Bouton Supprimer avec confirmation -->
                                        <button type="button" class="btn-icon delete-btn" title="Supprimer" onclick="openDeleteModal({{ $l->id }}, '{{ $l->titre }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <a href="{{ route('responsable.livrables.show', $l->id) }}" class="btn-view">
                                            Détails
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- Formulaire de suppression caché -->
                                    <form id="delete-form-{{ $l->id }}" method="POST" action="{{ route('responsable.livrables.destroy', $l->id) }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fas fa-folder-open"></i>
                                        <p>Aucun livrable trouvé</p>
                                        <a href="{{ route('responsable.livrables.create') }}" class="btn-create">
                                            <i class="fas fa-plus"></i>
                                            Créer un livrable
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Compteur de résultats -->
                <div id="resultCounter" class="text-sm text-gray-500 text-center fade-in delay-4" style="display: none;"></div>

                <!-- Pagination -->
                @if(method_exists($livrables, 'links') && $livrables->hasPages())
                <div class="pagination">
                    {{ $livrables->links() }}
                </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal-container">
            <div class="modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="modal-title">Confirmer la suppression</h3>
            <p class="modal-message" id="deleteModalMessage">
                Êtes-vous sûr de vouloir supprimer le livrable <strong id="deleteModalTitle"></strong> ?
                Cette action est irréversible.
            </p>
            <div class="modal-actions">
                <button class="modal-btn cancel" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i>
                    Annuler
                </button>
                <button class="modal-btn confirm" onclick="confirmDelete()">
                    <i class="fas fa-trash-alt"></i>
                    Supprimer
                </button>
            </div>
        </div>
    </div>

    <!-- Script pour la suppression et les filtres -->
    <script>
        // Variables globales pour la suppression
        let currentDeleteId = null;

        // Fonction pour ouvrir le modal de suppression
        function openDeleteModal(id, title) {
            currentDeleteId = id;
            document.getElementById('deleteModalTitle').textContent = title;
            document.getElementById('deleteModal').classList.add('active');
            document.body.style.overflow = 'hidden'; // Empêche le scroll
        }

        // Fonction pour fermer le modal de suppression
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            document.body.style.overflow = ''; // Réactive le scroll
            currentDeleteId = null;
        }

        // Fonction pour confirmer la suppression
        function confirmDelete() {
            if (currentDeleteId) {
                document.getElementById('delete-form-' + currentDeleteId).submit();
            }
        }

        // Fermer le modal avec la touche Echap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.getElementById('deleteModal').classList.contains('active')) {
                closeDeleteModal();
            }
        });

        // Fermer le modal en cliquant sur l'overlay
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Filtres
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('statusFilter');
            const typeFilter = document.getElementById('typeFilter');
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('livrablesTable');
            const rows = table.querySelectorAll('tbody tr');
            const counterDiv = document.getElementById('resultCounter');

            function filterTable() {
                const statusValue = statusFilter.value.toLowerCase();
                const typeValue = typeFilter.value.toLowerCase();
                const searchValue = searchInput.value.toLowerCase();

                let visibleCount = 0;

                rows.forEach(row => {
                    if (row.children.length === 1) return;
                    
                    const status = row.children[3]?.textContent.trim().toLowerCase() || '';
                    const type = row.children[1]?.textContent.trim().toLowerCase() || '';
                    const title = row.children[0]?.textContent.trim().toLowerCase() || '';
                    const consultant = row.children[2]?.textContent.trim().toLowerCase() || '';

                    const matchesStatus = !statusValue || status.includes(statusValue);
                    const matchesType = !typeValue || type.includes(typeValue);
                    const matchesSearch = !searchValue || 
                        title.includes(searchValue) || 
                        consultant.includes(searchValue);

                    if (matchesStatus && matchesType && matchesSearch) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (visibleCount > 0) {
                    counterDiv.style.display = 'block';
                    counterDiv.innerHTML = `<i class="fas fa-search mr-2"></i> ${visibleCount} livrable(s) affiché(s) sur ${rows.length}`;
                } else {
                    counterDiv.style.display = 'none';
                }
            }

            statusFilter.addEventListener('change', filterTable);
            typeFilter.addEventListener('change', filterTable);
            searchInput.addEventListener('input', filterTable);
            filterTable();
        });
    </script>
</x-app-layout>