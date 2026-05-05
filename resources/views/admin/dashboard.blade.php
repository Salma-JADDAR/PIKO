<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Administration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7f5;
            color: #1a1a1a;
            scroll-behavior: smooth;
        }
        
        *::-webkit-scrollbar {
            display: none;
        }

        /* Stats Grid Integrée */
        .stats-grid-integrated {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }
        .stat-card-integrated {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 28px 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255,255,255,0.15);
        }
        .stat-card-integrated:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-5px);
            border-color: rgba(255,255,255,0.3);
        }
        .stat-icon-integrated {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.15);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .stat-icon-integrated i {
            font-size: 28px;
            color: #ffd966;
        }
        .stat-info-integrated h3 {
            font-size: 36px;
            font-weight: 800;
            color: white;
            line-height: 1.2;
        }
        .stat-info-integrated p {
            font-size: 13px;
            color: rgba(255,255,255,0.7);
            font-weight: 500;
        }

        /* Filter Bar - Tabs */
        .filter-wrapper {
            position: relative;
            z-index: 10;
            margin-top: -50px;
            margin-bottom: 40px;
            padding: 0 20px;
        }
        .filter-card {
            background: white;
            border-radius: 60px;
            padding: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            max-width: 1000px;
            margin: 0 auto;
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.15);
            justify-content: center;
        }
        .filter-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            padding: 4px;
            justify-content: center;
        }
        .filter-tab {
            padding: 10px 28px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            background: transparent;
            border: none;
            color: #6c757d;
            text-decoration: none;
            display: inline-block;
        }
        .filter-tab.active {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            box-shadow: 0 4px 12px rgba(45,106,79,0.25);
        }
        .filter-tab:hover:not(.active) {
            background: #e8f0e6;
            color: #2d6a4f;
            transform: translateY(-1px);
        }

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 32px 60px 32px;
        }

        /* ========== TABLEAU MODERN ========== */
        .table-wrapper {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f0;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
        }

        .modern-table thead tr {
            background: #f8fafc;
            border-bottom: 1px solid #eef2f0;
        }

        .modern-table th {
            text-align: left;
            padding: 18px 20px;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            letter-spacing: 0.3px;
        }

        .modern-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.2s ease;
        }

        .modern-table tbody tr:hover {
            background: #fafcfc;
        }

        .modern-table tbody tr:last-child {
            border-bottom: none;
        }

        .modern-table td {
            padding: 16px 20px;
            vertical-align: middle;
        }

        /* Badge */
        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }
        .badge-success {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .badge-danger {
            background: #fee2e2;
            color: #dc2626;
        }
        .badge-info {
            background: #e0e7ff;
            color: #4f46e5;
        }
        .badge-warning {
            background: #fef3c7;
            color: #d97706;
        }

        /* Actions */
        .actions-cell {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-approve {
            background: linear-gradient(135deg, #e8f0e6, #d4e4d0);
            color: #2d6a4f;
            border: none;
            padding: 8px 16px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-approve:hover {
            background: linear-gradient(135deg, #2d6a4f, #1e4620);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
        }

        .btn-reject {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            padding: 8px 16px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-reject:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-edit {
            background: #e2e8f0;
            color: #475569;
            padding: 6px 14px;
            border-radius: 20px;
            border: none;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-edit:hover {
            background: #475569;
            color: white;
        }

        .btn-suspend {
            background: #fef3c7;
            color: #d97706;
            padding: 6px 14px;
            border-radius: 20px;
            border: none;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-suspend:hover {
            background: #d97706;
            color: white;
        }
        
        .btn-suspend.disabled, .btn-suspend:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #e2e8f0;
            color: #94a3b8;
        }

        /* ========== PAGINATION SIMPLIFIÉE ========== */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
        }

        .page-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            background: white;
            color: #2d6a4f;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            border-radius: 50px;
            transition: all 0.3s;
            border: 1px solid #e8ecef;
        }

        .page-link:hover {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(45, 106, 79, 0.3);
        }

        .page-link.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f1f5f9;
            color: #94a3b8;
        }

        .page-link.disabled:hover {
            transform: none;
            background: #f1f5f9;
            color: #94a3b8;
            box-shadow: none;
        }

        .page-info {
            padding: 8px 20px;
            background: #e8f0e6;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 600;
            color: #2d6a4f;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 28px;
        }
        .empty-icon {
            font-size: 64px;
            color: #c8dcc4;
            margin-bottom: 20px;
        }
        .empty-state h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .empty-state p {
            color: #6c757d;
            margin-bottom: 24px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(4px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }
        .modal.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .modal-content {
            background: white;
            border-radius: 32px;
            padding: 32px;
            max-width: 500px;
            width: 90%;
            animation: slideUp 0.3s ease;
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .modal-content h3 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .modal-content textarea, .modal-content select {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            font-family: 'Inter', sans-serif;
            margin: 16px 0;
            resize: vertical;
        }
        .modal-content textarea:focus, .modal-content select:focus {
            outline: none;
            border-color: #2d6a4f;
        }
        .modal-buttons {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .modal-btn {
            padding: 10px 24px;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-size: 13px;
        }
        .modal-btn-cancel {
            background: #f1f5f9;
            color: #475569;
        }
        .modal-btn-confirm {
            background: #dc2626;
            color: white;
        }
        .modal-btn-suspend {
            background: #d97706;
            color: white;
        }

        /* Alert Messages */
        .alert {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            z-index: 2000;
            animation: slideIn 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .alert-success {
            background: #2d6a4f;
            color: white;
        }
        .alert-danger {
            background: #dc3545;
            color: white;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .stats-grid-integrated { grid-template-columns: repeat(2, 1fr); }
            .container { padding: 0 20px 50px 20px; }
            .filter-card { flex-direction: column; border-radius: 30px; }
            .filter-tabs { justify-content: center; }
            .table-wrapper {
                overflow-x: auto;
            }
            .modern-table {
                min-width: 800px;
            }
            .pagination {
                gap: 12px;
                flex-wrap: wrap;
            }
            .page-link {
                padding: 10px 20px;
                font-size: 14px;
            }
            .page-info {
                padding: 6px 14px;
                font-size: 13px;
            }
        }

        @media (max-width: 600px) {
            .stats-grid-integrated { grid-template-columns: 1fr; gap: 16px; }
            .stat-card-integrated { padding: 16px; }
            .stat-icon-integrated { width: 45px; height: 45px; }
            .stat-icon-integrated i { font-size: 20px; }
            .stat-info-integrated h3 { font-size: 24px; }
            .hero-dashboard { min-height: 60vh; }
            .filter-wrapper { margin-top: -30px; }
            .actions-cell { flex-direction: column; }
            .pagination {
                gap: 10px;
                flex-wrap: wrap;
            }
            .page-link {
                padding: 8px 16px;
                font-size: 13px;
                gap: 6px;
            }
            .page-info {
                padding: 6px 12px;
                font-size: 12px;
            }
        }

        /* Hero Section */
        .hero-dashboard {
            position: relative;
            min-height: 80vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('images/admin.PNG') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            z-index: 0;
        }
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.7) 100%);
        }
        .dashboard-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 60px 40px;
            color: white;
        }
        .welcome-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 60px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }
        .welcome-text h2 {
            font-size: 42px;
            font-weight: 800;
            color: white;
            margin-bottom: 12px;
            letter-spacing: -1px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .welcome-text p {
            color: rgba(255,255,255,0.8);
            font-size: 16px;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
        }
        .admin-badge-header {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(8px);
            padding: 8px 20px;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 600;
        }
        .admin-badge-header i {
            color: #ffd966;
            margin-right: 8px;
        }
        /* User Dropdown for Admin Page */
        .admin-user-menu {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        .admin-user-avatar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: rgba(255,255,255,0.95);
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .admin-user-avatar i {
            font-size: 16px;
            color: #2d6a4f;
        }
        .admin-user-avatar span {
            font-size: 14px;
            font-weight: 500;
            color: #2d6a4f;
        }
        .admin-user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 12px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            min-width: 220px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 100;
        }
        .admin-user-menu:hover .admin-user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .admin-user-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            text-decoration: none;
            color: #4a5568;
            font-size: 13px;
            transition: all 0.2s;
        }
        .admin-user-dropdown a:hover {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .admin-user-dropdown a i {
            width: 18px;
            color: #86a788;
        }
        .admin-user-dropdown hr {
            margin: 8px 0;
            border: none;
            border-top: 1px solid #eef2f0;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success" id="alertMessage">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" id="alertMessage">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif
    <!-- User Dropdown for Admin Page -->
    <div class="admin-user-menu">
        <div class="admin-user-avatar">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->prenom }}</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="admin-user-dropdown">
            <hr>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
            <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
    <!-- Hero Section -->
    <section class="hero-dashboard">
        <div class="hero-bg"></div>
        <div class="dashboard-content">
            <div class="welcome-header">
                <div class="welcome-text">
                    <h2>Bonjour, {{ Auth::user()->prenom }}</h2>
                    <p>Tableau de bord administrateur · Gérez votre marketplace aviaire</p>
                </div>
                <div class="admin-badge-header">
                    <i class="fas fa-shield-alt"></i> Administrateur
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid-integrated">
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated"><i class="fas fa-clock"></i></div>
                    <div class="stat-info-integrated">
                        <h3>{{ $stats['total_pending'] ?? 0 }}</h3>
                        <p>En attente</p>
                    </div>
                </div>
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated"><i class="fas fa-dove"></i></div>
                    <div class="stat-info-integrated">
                        <h3>{{ $totalActiveSpecies ?? 0 }}</h3>
                        <p>Espèces actives</p>
                    </div>
                </div>
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated"><i class="fas fa-users"></i></div>
                    <div class="stat-info-integrated">
                        <h3>{{ $stats['total_users'] ?? 0 }}</h3>
                        <p>Utilisateurs</p>
                    </div>
                </div>
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-info-integrated">
                        <h3>{{ $stats['total_published'] ?? 0 }}</h3>
                        <p>Annonces publiées</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Bar - Tabs -->
    <div class="filter-wrapper">
        <div class="filter-card">
            <div class="filter-tabs">
                <button class="filter-tab active" data-tab="annonces"> Annonces en attente</button>
                <button class="filter-tab" data-tab="especes"> Gestion des espèces</button>
                <button class="filter-tab" data-tab="utilisateurs"> Utilisateurs</button>
                <button class="filter-tab" data-tab="suspended"> Comptes suspendus</button>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Tab 1: Annonces en attente -->
        <div id="tab-annonces" class="tab-content active">
            @if($pendingAds->count() > 0)
                <div class="table-wrapper">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Espèce</th>
                                <th>Prix</th>
                                <th>Soumis le</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingAds as $ad)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                        <div class="user-info">
                                            <span class="user-name">{{ $ad->utilisateur->prenom }} {{ $ad->utilisateur->nom }}</span>
                                            <span class="user-badge">
                                                @if($ad->utilisateur->role === 'verifie')
                                                    <i class="fas fa-check-circle"></i> Éleveur vérifié
                                                @else
                                                    <i class="fas fa-feather-alt"></i> Particulier
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                 </div>
                                <td>
                                    <div class="species-cell">
                                        <div class="species-icon">
                                            <i class="fas fa-dove"></i>
                                        </div>
                                        <span class="species-name">{{ $ad->espece->nom_commun }}</span>
                                    </div>
                                 </div>
                                <td>
                                    <span class="price-value">{{ number_format($ad->prix, 0, ',', ' ') }} €</span>
                                 </div>
                                <td>
                                    <div class="date-info">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ $ad->created_at->format('d/m/Y') }}</span>
                                        <small>{{ $ad->created_at->format('H:i') }}</small>
                                    </div>
                                 </div>
                                <td>
                                    <div class="actions-cell">
                                        <form action="{{ route('admin.annonces.approuver', $ad->id) }}" method="POST">
                                            @csrf
                                            <button class="btn-approve" title="Approuver l'annonce">
                                                <i class="fas fa-check-circle"></i> Approuver
                                            </button>
                                        </form>
                                        <button class="btn-reject" onclick="openRejectModal({{ $ad->id }})" title="Rejeter l'annonce">
                                            <i class="fas fa-times-circle"></i> Rejeter
                                        </button>
                                    </div>
                                    <form id="reject-form-{{ $ad->id }}" action="{{ route('admin.annonces.rejeter', $ad->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        <input type="text" name="raison" id="raison-{{ $ad->id }}">
                                    </form>
                                 </div>
                             </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- PAGINATION SIMPLIFIÉE POUR ANNONCES EN ATTENTE -->
                <div class="pagination">
                    @if ($pendingAds->onFirstPage())
                        <span class="page-link disabled">
                            <i class="fas fa-arrow-left"></i> Précédent
                        </span>
                    @else
                        <a href="{{ $pendingAds->previousPageUrl() }}" class="page-link">
                            <i class="fas fa-arrow-left"></i> Précédent
                        </a>
                    @endif

                    <span class="page-info">
                        Page {{ $pendingAds->currentPage() }} sur {{ $pendingAds->lastPage() }}
                    </span>

                    @if ($pendingAds->hasMorePages())
                        <a href="{{ $pendingAds->nextPageUrl() }}" class="page-link">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </a>
                    @else
                        <span class="page-link disabled">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </span>
                    @endif
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-check-circle" style="color: #2d6a4f;"></i>
                    </div>
                    <h3>Aucune annonce en attente</h3>
                    <p>Toutes les annonces ont été traitées </p>
                </div>
            @endif
        </div>

        <!-- Tab 2: Gestion des espèces -->
        <div id="tab-especes" class="tab-content" style="display: none;">
            <div style="margin-bottom: 20px; text-align: right;">
                <button class="btn-approve" onclick="openAddSpeciesModal()" style="padding: 10px 24px;">
                    <i class="fas fa-plus"></i> Ajouter une espèce
                </button>
            </div>

            <div class="table-wrapper">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Nom commun</th>
                            <th>Catégorie</th>
                            <th>Difficulté</th>
                            <th>Annonces actives</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allSpecies as $species)
                        <tr>
                            <td>
                                <div class="species-cell">
                                    <div class="species-icon" style="width: 28px; height: 28px;">
                                        <i class="fas fa-dove"></i>
                                    </div>
                                    <span class="species-name" style="font-weight: 600;">{{ $species->nom_commun }}</span>
                                </div>
                             </div>
                            <td>{{ $species->categorie ?? 'Non classée' }}</div>
                            <td>
                                @php
                                    $difficulte = $species->difficulte_elevage ?? 1;
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $difficulte)
                                        <i class="fas fa-star" style="color: #fbbf24; font-size: 12px;"></i>
                                    @else
                                        <i class="far fa-star" style="color: #cbd5e1; font-size: 12px;"></i>
                                    @endif
                                @endfor
                                <span style="margin-left: 6px; font-size: 11px; color: #64748b;">({{ $difficulte }}/5)</span>
                             </div>
                            <td>{{ $species->nb_annonces_actives ?? 0 }}</div>
                            <td>
                                @if($species->est_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                             </div>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-edit" onclick="openEditSpeciesModal({{ $species->id }}, '{{ $species->nom_commun }}', '{{ $species->categorie }}', {{ $species->difficulte_elevage ?? 1 }})" title="Modifier l'espèce">
                                        <i class="fas fa-edit"></i> Modifier
                                    </button>
                                    <form action="{{ route('admin.especes.toggle', $species->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button class="btn-approve" title="{{ $species->est_active ? 'Désactiver' : 'Activer' }}">
                                            @if($species->est_active)
                                                <i class="fas fa-ban"></i> Désactiver
                                            @else
                                                <i class="fas fa-check-circle"></i> Activer
                                            @endif
                                        </button>
                                    </form>
                                    @if($species->annonces()->count() == 0)
                                        <form action="{{ route('admin.especes.destroy', $species->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-reject" title="Supprimer l'espèce" onclick="return confirm('Supprimer cette espèce ?')">
                                                <i class="fas fa-trash-alt"></i> Supprimer
                                            </button>
                                        </form>
                                    @endif
                                </div>
                             </div>
                         </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION SIMPLIFIÉE POUR ESPÈCES -->
            <div class="pagination">
                @if ($allSpecies->onFirstPage())
                    <span class="page-link disabled">
                        <i class="fas fa-arrow-left"></i> Précédent
                    </span>
                @else
                    <a href="{{ $allSpecies->previousPageUrl() }}" class="page-link">
                        <i class="fas fa-arrow-left"></i> Précédent
                    </a>
                @endif

                <span class="page-info">
                    Page {{ $allSpecies->currentPage() }} sur {{ $allSpecies->lastPage() }}
                </span>

                @if ($allSpecies->hasMorePages())
                    <a href="{{ $allSpecies->nextPageUrl() }}" class="page-link">
                        Suivant <i class="fas fa-arrow-right"></i>
                    </a>
                @else
                    <span class="page-link disabled">
                        Suivant <i class="fas fa-arrow-right"></i>
                    </span>
                @endif
            </div>
        </div>

        <!-- Tab 3: Utilisateurs -->
        <div id="tab-utilisateurs" class="tab-content" style="display: none;">
            <div class="table-wrapper">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Score</th>
                            <th>Ville</th>
                            <th>Inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allUsers as $user)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="user-avatar" style="width: 36px; height: 36px;">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="user-info">
                                        <span class="user-name">{{ $user->prenom }} {{ $user->nom }}</span>
                                        @if($user->est_suspendu)
                                            <span class="badge badge-danger" style="font-size: 9px; margin-top: 4px;">🚫 Suspendu</span>
                                        @endif
                                    </div>
                                </div>
                             </div>
                            <td>{{ $user->email }}</div>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge badge-info"><i class="fas fa-crown"></i> Admin</span>
                                @elseif($user->role === 'verifie')
                                    <span class="badge badge-success"><i class="fas fa-check-circle"></i> Vérifié</span>
                                @else
                                    <span class="badge badge-warning"><i class="fas fa-user"></i> Standard</span>
                                @endif
                             </div>
                            <td>
                                @if($user->score_confiance < 40)
                                    <span class="badge badge-danger">{{ $user->score_confiance }} </span>
                                @elseif($user->score_confiance >= 70)
                                    <span class="badge badge-success">{{ $user->score_confiance }} </span>
                                @else
                                    <span class="badge badge-warning">{{ $user->score_confiance }}</span>
                                @endif
                             </div>
                            <td>{{ $user->ville ?? 'Non renseignée' }}</div>
                            <td>{{ $user->created_at->format('d/m/Y') }}</div>
                            <td>
                                <div class="actions-cell">
                                    @if($user->role !== 'admin')
                                        @if($user->est_suspendu)
                                            <button class="btn-suspend" disabled style="opacity:0.5; cursor:not-allowed;">
                                                <i class="fas fa-ban"></i> Suspendu
                                            </button>
                                        @else
                                            <button class="btn-suspend" onclick="openSuspendModal({{ $user->id }}, '{{ $user->prenom }} {{ $user->nom }}')">
                                                <i class="fas fa-ban"></i> Suspendre
                                            </button>
                                        @endif
                                    @endif
                                </div>
                             </div>
                         </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION SIMPLIFIÉE POUR UTILISATEURS -->
            <div class="pagination">
                @if ($allUsers->onFirstPage())
                    <span class="page-link disabled">
                        <i class="fas fa-arrow-left"></i> Précédent
                    </span>
                @else
                    <a href="{{ $allUsers->previousPageUrl() }}" class="page-link">
                        <i class="fas fa-arrow-left"></i> Précédent
                    </a>
                @endif

                <span class="page-info">
                    Page {{ $allUsers->currentPage() }} sur {{ $allUsers->lastPage() }}
                </span>

                @if ($allUsers->hasMorePages())
                    <a href="{{ $allUsers->nextPageUrl() }}" class="page-link">
                        Suivant <i class="fas fa-arrow-right"></i>
                    </a>
                @else
                    <span class="page-link disabled">
                        Suivant <i class="fas fa-arrow-right"></i>
                    </span>
                @endif
            </div>
        </div>

        <!-- Tab 4: Comptes suspendus -->
        <div id="tab-suspended" class="tab-content" style="display: none;">
            @if($suspendedUsers->count() > 0)
                <div class="table-wrapper">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Email</th>
                                <th>Score</th>
                                <th>Date suspension</th>
                                <th>Raison</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suspendedUsers as $user)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar" style="width: 36px; height: 36px;">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                        <div class="user-info">
                                            <span class="user-name">{{ $user->prenom }} {{ $user->nom }}</span>
                                            @if($user->est_suspendu)
                                                <span class="badge badge-danger" style="font-size: 9px; margin-top: 4px;">🚫 Suspendu</span>
                                            @endif
                                        </div>
                                    </div>
                                 </div>
                                <td>{{ $user->email }}</div>
                                <td>
                                    <span class="badge badge-danger">{{ $user->score_confiance }}</span>
                                 </div>
                                <td>
                                    @if($user->suspendu_le)
                                        {{ \Carbon\Carbon::parse($user->suspendu_le)->format('d/m/Y') }}
                                    @else
                                        --
                                    @endif
                                 </div>
                                <td>
                                    @if($user->raison_suspension)
                                        <span title="{{ $user->raison_suspension }}" style="cursor: help;">
                                            {{ Str::limit($user->raison_suspension, 40) }}
                                        </span>
                                    @else
                                        --
                                    @endif
                                 </div>
                                <td>
                                    <div class="actions-cell">
                                        <form action="{{ route('admin.utilisateurs.reactiver', $user->id) }}" method="POST">
                                            @csrf
                                            <button class="btn-approve" title="Réactiver le compte">
                                                <i class="fas fa-user-check"></i> Réactiver
                                            </button>
                                        </form>
                                    </div>
                                 </div>
                             </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- PAGINATION SIMPLIFIÉE POUR COMPTES SUSPENDUS -->
                <div class="pagination">
                    @if ($suspendedUsers->onFirstPage())
                        <span class="page-link disabled">
                            <i class="fas fa-arrow-left"></i> Précédent
                        </span>
                    @else
                        <a href="{{ $suspendedUsers->previousPageUrl() }}" class="page-link">
                            <i class="fas fa-arrow-left"></i> Précédent
                        </a>
                    @endif

                    <span class="page-info">
                        Page {{ $suspendedUsers->currentPage() }} sur {{ $suspendedUsers->lastPage() }}
                    </span>

                    @if ($suspendedUsers->hasMorePages())
                        <a href="{{ $suspendedUsers->nextPageUrl() }}" class="page-link">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </a>
                    @else
                        <span class="page-link disabled">
                            Suivant <i class="fas fa-arrow-right"></i>
                        </span>
                    @endif
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                    </div>
                    <h3>Aucun compte suspendu</h3>
                    <p>Tous les comptes sont actifs </p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Rejet -->
    <div class="modal" id="rejectModal">
        <div class="modal-content">
            <h3><i class="fas fa-exclamation-triangle" style="color:#dc2626;"></i> Rejeter l'annonce</h3>
            <p>Veuillez indiquer la raison du rejet (obligatoire) :</p>
            <textarea id="rejectReason" rows="4" placeholder="Ex: Photos non conformes, informations manquantes, espèce non reconnue..."></textarea>
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-cancel" onclick="closeRejectModal()">Annuler</button>
                <button class="modal-btn modal-btn-confirm" id="confirmRejectBtn">Rejeter l'annonce</button>
            </div>
        </div>
    </div>

    <!-- Modal Espèce -->
    <div class="modal" id="speciesModal">
        <div class="modal-content" style="max-width: 500px;">
            <h3 id="speciesModalTitle"><i class="fas fa-dove"></i> Ajouter une espèce</h3>
            <form id="speciesForm" method="POST" action="/admin/especes">
                @csrf
                <input type="hidden" name="_method" id="speciesMethod" value="POST">
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 6px;">Nom commun *</label>
                    <input type="text" name="nom_commun" id="speciesNom" required style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 12px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 6px;">Catégorie *</label>
                    <input type="text" name="categorie" id="speciesCategorie" required style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 12px;">
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="font-weight: 600; display: block; margin-bottom: 6px;">Difficulté d'élevage (1-5) *</label>
                    <select name="difficulte_elevage" id="speciesDifficulte" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 12px;">
                        <option value="1">1 - Débutant</option>
                        <option value="2">2 - Facile</option>
                        <option value="3">3 - Intermédiaire</option>
                        <option value="4">4 - Avancé</option>
                        <option value="5">5 - Expert</option>
                    </select>
                </div>
                <div class="modal-buttons">
                    <button type="button" class="modal-btn modal-btn-cancel" onclick="closeSpeciesModal()">Annuler</button>
                    <button type="submit" class="modal-btn modal-btn-confirm" style="background: #2d6a4f;">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Suspension -->
    <div class="modal" id="suspendModal">
        <div class="modal-content">
            <h3><i class="fas fa-ban" style="color:#d97706;"></i> Suspendre un utilisateur</h3>
            <p id="suspendUserName"></p>
            <div>
                <label style="font-weight: 600; display: block; margin-bottom: 8px;">Durée de suspension (jours)</label>
                <select id="suspendDuree">
                    <option value="1">1 jour</option>
                    <option value="3">3 jours</option>
                    <option value="7">7 jours</option>
                    <option value="14">14 jours</option>
                    <option value="30">30 jours</option>
                    <option value="90">90 jours</option>
                    <option value="365">1 an</option>
                </select>
            </div>
            <div>
                <label style="font-weight: 600; display: block; margin-bottom: 8px;">Raison de la suspension</label>
                <textarea id="suspendRaison" rows="3" placeholder="Ex: Annonces frauduleuses, comportement inapproprié..."></textarea>
            </div>
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-cancel" onclick="closeSuspendModal()">Annuler</button>
                <button class="modal-btn modal-btn-suspend" id="confirmSuspendBtn">Suspendre</button>
            </div>
        </div>
    </div>

    <script>
        // Tabs
        const tabs = document.querySelectorAll('.filter-tab');
        const contents = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.getAttribute('data-tab');
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.style.display = 'none');
                tab.classList.add('active');
                document.getElementById(`tab-${target}`).style.display = 'block';
            });
        });

        // Auto-hide alert
        setTimeout(function() {
            const alert = document.getElementById('alertMessage');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(function() {
                    if(alert) alert.remove();
                }, 300);
            }
        }, 4000);

        // Reject Modal
        let currentAdId = null;
        
        function openRejectModal(adId) {
            currentAdId = adId;
            document.getElementById('rejectModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeRejectModal() {
            document.getElementById('rejectModal').classList.remove('active');
            document.body.style.overflow = '';
            document.getElementById('rejectReason').value = '';
            currentAdId = null;
        }
        
        document.getElementById('confirmRejectBtn').addEventListener('click', () => {
            const raison = document.getElementById('rejectReason').value;
            if (!raison.trim()) {
                alert('Veuillez entrer une raison pour le rejet.');
                return;
            }
            const form = document.getElementById(`reject-form-${currentAdId}`);
            const raisonInput = document.getElementById(`raison-${currentAdId}`);
            if (form && raisonInput) {
                raisonInput.value = raison;
                form.submit();
            }
        });
        
        document.getElementById('rejectModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('rejectModal')) closeRejectModal();
        });

        // Ajouter une espèce
        function openAddSpeciesModal() {
            document.getElementById('speciesModalTitle').innerHTML = '<i class="fas fa-plus"></i> Ajouter une espèce';
            document.getElementById('speciesMethod').value = 'POST';
            document.getElementById('speciesNom').value = '';
            document.getElementById('speciesCategorie').value = '';
            document.getElementById('speciesDifficulte').value = '1';
            document.getElementById('speciesModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Modifier une espèce
        function openEditSpeciesModal(id, nom, categorie, difficulte) {
            document.getElementById('speciesModalTitle').innerHTML = '<i class="fas fa-edit"></i> Modifier l\'espèce';
            document.getElementById('speciesForm').action = '/admin/especes/' + id;
            document.getElementById('speciesMethod').value = 'PUT';
            document.getElementById('speciesNom').value = nom || '';
            document.getElementById('speciesCategorie').value = categorie || '';
            document.getElementById('speciesDifficulte').value = difficulte || 1;
            document.getElementById('speciesModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }    

        function closeSpeciesModal() {
            document.getElementById('speciesModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.getElementById('speciesModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('speciesModal')) closeSpeciesModal();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = localStorage.getItem('activeAdminTab');
            if (activeTab) {
                const tabButton = document.querySelector(`.filter-tab[data-tab="${activeTab}"]`);
                if (tabButton) {
                    tabButton.click();
                }
            }
            
            document.querySelectorAll('.filter-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabName = this.getAttribute('data-tab');
                    localStorage.setItem('activeAdminTab', tabName);
                });
            });
        });

        // Suspend Modal
        let currentUserId = null;
        let currentUserName = '';
        
        function openSuspendModal(userId, userName) {
            currentUserId = userId;
            currentUserName = userName;
            document.getElementById('suspendUserName').innerHTML = `<strong>${userName}</strong>`;
            document.getElementById('suspendModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeSuspendModal() {
            document.getElementById('suspendModal').classList.remove('active');
            document.body.style.overflow = '';
            document.getElementById('suspendRaison').value = '';
            currentUserId = null;
        }
        
        document.getElementById('confirmSuspendBtn').addEventListener('click', () => {
            const duree = document.getElementById('suspendDuree').value;
            const raison = document.getElementById('suspendRaison').value;
            if (!raison.trim()) {
                alert('Veuillez entrer une raison pour la suspension.');
                return;
            }
            
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/utilisateurs/${currentUserId}/suspendre`;
            form.style.display = 'none';
            
            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            form.appendChild(csrf);
            
            const dureeInput = document.createElement('input');
            dureeInput.type = 'hidden';
            dureeInput.name = 'duree_jours';
            dureeInput.value = duree;
            form.appendChild(dureeInput);
            
            const raisonInput = document.createElement('input');
            raisonInput.type = 'hidden';
            raisonInput.name = 'raison';
            raisonInput.value = raison;
            form.appendChild(raisonInput);
            
            document.body.appendChild(form);
            form.submit();
        });
        
        document.getElementById('suspendModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('suspendModal')) closeSuspendModal();
        });
    </script>
</body>
</html>