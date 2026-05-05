<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Mon tableau de bord</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
        {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #e8ecef;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 32px;
        }

        .logo a {
            text-decoration: none;
        }
        .logo h1 {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
            flex: 1;
            justify-content: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
        }
        .nav-links a:hover, .nav-links a.active {
            color: #2d6a4f;
        }

        .auth-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }
        .btn-login {
            padding: 8px 24px;
            border: 1.5px solid #2d6a4f;
            border-radius: 40px;
            color: #2d6a4f;
            background: transparent;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: #2d6a4f;
            color: white;
            transform: translateY(-2px);
        }
        .btn-register {
            padding: 8px 24px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 40px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
        }

        /* User Menu */
        .user-menu {
            position: relative;
            cursor: pointer;
        }
        .user-avatar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: #e8f0e6;
            border-radius: 40px;
            transition: all 0.3s ease;
        }
        .user-avatar i {
            font-size: 16px;
            color: #2d6a4f;
        }
        .user-avatar span {
            font-size: 14px;
            font-weight: 500;
            color: #2d6a4f;
        }
        .user-avatar i:last-child {
            font-size: 12px;
            transition: transform 0.3s;
        }
        .user-menu:hover .user-avatar {
            background: #d4e4d0;
        }
        .user-menu:hover .user-avatar i:last-child {
            transform: rotate(180deg);
        }
        .user-dropdown {
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
        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .user-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            text-decoration: none;
            color: #4a5568;
            font-size: 13px;
            transition: all 0.2s;
        }
        .user-dropdown a:hover {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .user-dropdown a i {
            width: 18px;
            color: #86a788;
        }
        .user-dropdown hr {
            margin: 8px 0;
            border: none;
            border-top: 1px solid #eef2f0;
        }

        /* Mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #2d6a4f;
            cursor: pointer;
        }
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 350px;
            height: 100%;
            background: white;
            box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: right 0.3s ease;
            overflow-y: auto;
        }
        .mobile-menu.active { right: 0; }
        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eef2f0;
        }
        .mobile-menu-header .logo h1 { font-size: 24px; }
        .mobile-menu-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #2d6a4f;
            cursor: pointer;
        }
        .mobile-menu-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .mobile-nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: #4a5568;
            font-size: 15px;
            border-radius: 12px;
            transition: all 0.2s;
        }
        .mobile-nav-item:hover {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .mobile-nav-item i { width: 24px; color: #86a788; }
        .btn-mobile-primary {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white !important;
            justify-content: center;
        }
        .btn-mobile-primary i { color: white !important; }
        .mobile-menu hr { margin: 8px 0; border-top: 1px solid #eef2f0; }
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }
        .mobile-overlay.active { display: block; }

        /* Hero Section avec Welcome Dashboard intégré */
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
            background-image: url("{{ asset('images/mesaaa.PNG') }}");
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
        /* Welcome Header */
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
        .btn-create-dashboard {
            padding: 14px 32px;
            background: linear-gradient(135deg, #ffd966, #f59e0b);
            color: #1a1a1a;
            border: none;
            border-radius: 40px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .btn-create-dashboard:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #f59e0b, #ffd966);
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

        /* Filter Bar - MÊME DESIGN QUE LA BARRE DE RECHERCHE */
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

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 20px;
        }
        .page-header h1 {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #0f172a, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        /* Annonces Grid - UNE SEULE CARTE PAR ANNONCE */
        .annonces-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 48px;
        }
        
        /* Carte avec image en arrière-plan */
        .annonce-card {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-decoration: none;
            color: inherit;
            display: block;
            min-height: 280px;
        }
        .annonce-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        /* Overlay sombre */
        .annonce-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
            z-index: 1;
            border-radius: 20px;
        }
        
        /* Badge statut */
        .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            color: white;
            font-size: 10px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            z-index: 10;
        }
        .card-badge.brouillon { background: #f59e0b; }
        .card-badge.en_attente { background: #3b82f6; }
        .card-badge.publiee { background: #2d6a4f; }
        .card-badge.vendue { background: #dc3545; }
        .card-badge.archivee { background: #6c757d; }
        
        /* Boutons d'action */
        .card-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
            z-index: 10;
        }
        .card-action-btn {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            color: #475569;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-decoration: none;
        }
        .card-action-btn:hover {
            transform: scale(1.1);
        }
        .card-action-btn.edit:hover {
            background: #2d6a4f;
            color: white;
        }
        .card-action-btn.delete:hover {
            background: #dc2626;
            color: white;
        }
        
        /* Contenu de la carte */
        .card-content {
            position: relative;
            z-index: 5;
            padding: 20px;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
        }
        .card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 6px;
            color: white;
        }
        .card-price {
            font-size: 22px;
            font-weight: 800;
            color: #ffd966;
            margin-bottom: 6px;
        }
        .card-location {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        .card-views {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }
        .card-views i {
            margin-right: 4px;
        }

        /* Styles pour les boutons d'action dans le footer */
        .action-submit:hover {
            transform: scale(1.1);
            color: #f59e0b !important;
        }
        .action-sold:hover {
            transform: scale(1.1);
            color: #059669 !important;
        }

        /* ========== PAGINATION SIMPLIFIÉE ========== */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 48px;
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
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
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
            padding: 40px;
            text-align: center;
            max-width: 450px;
            width: 90%;
            animation: slideUp 0.3s ease;
        }
        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .modal-content i {
            font-size: 64px;
            color: #dc2626;
            margin-bottom: 20px;
        }
        .modal-content h3 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 12px;
        }
        .modal-content p {
            color: #6c757d;
            margin-bottom: 28px;
            line-height: 1.6;
        }
        .modal-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
        }
        .modal-btn {
            padding: 12px 28px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
            font-size: 14px;
        }
        .modal-btn-cancel {
            background: #f1f5f9;
            color: #475569;
        }
        .modal-btn-cancel:hover {
            background: #e2e8f0;
        }
        .modal-btn-confirm {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
        }
        .modal-btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220,38,38,0.3);
        }

        /* Footer */
        .footer {
            background: #0a1a0a;
            color: #a0b0a0;
            padding: 60px 32px 32px;
            margin-top: 60px;
        }
        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 60px;
        }
        .footer-logo h3 {
            font-size: 28px;
            color: white;
            margin-bottom: 20px;
        }
        .footer-logo p {
            font-size: 13px;
            line-height: 1.6;
        }
        .footer-col h4 {
            color: white;
            font-size: 16px;
            margin-bottom: 24px;
        }
        .footer-col a {
            display: block;
            color: #a0b0a0;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 14px;
            transition: color 0.2s;
        }
        .footer-col a:hover {
            color: #86a788;
        }
        .copyright {
            text-align: center;
            padding-top: 48px;
            margin-top: 48px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .nav-links, .auth-actions { display: none; }
            .mobile-menu-btn { display: block; }
            .nav-container { padding: 12px 20px; }
            .stats-grid-integrated { grid-template-columns: repeat(2, 1fr); }
            .annonces-grid { grid-template-columns: repeat(2, 1fr); }
            .container { padding: 0 20px 50px 20px; }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
            .dashboard-content { padding: 40px 30px; }
            .welcome-text h2 { font-size: 32px; }
            .filter-card { flex-direction: column; border-radius: 30px; }
            .filter-tabs { justify-content: center; }
            .pagination {
                gap: 12px;
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
            .annonces-grid { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .filter-tabs { width: 100%; overflow-x: auto; flex-wrap: nowrap; padding-bottom: 8px; }
            .filter-tab { white-space: nowrap; }
            .dashboard-content { padding: 24px; }
            .welcome-text h2 { font-size: 24px; }
            .stat-card-integrated { padding: 16px; }
            .stat-icon-integrated { width: 45px; height: 45px; }
            .stat-icon-integrated i { font-size: 20px; }
            .stat-info-integrated h3 { font-size: 24px; }
            .hero-dashboard { min-height: 60vh; }
            .filter-wrapper { margin-top: -30px; }
            .card-content { padding: 16px; }
            .card-title { font-size: 16px; }
            .card-price { font-size: 18px; }
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
    </style>
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <a href="{{ route('home') }}"><h1>Piko</h1></a>
            </div>
            <div class="nav-links">
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('annonces.index') }}">Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}" class="active">Mes annonces</a>
                    <a href="{{ route('favoris.index') }}">Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}">À propos</a>
            </div>
            <div class="auth-actions">
                @auth
                    <div class="user-menu">
                     <div class="user-avatar">
    <i class="fas fa-user-circle"></i>
    <span>{{ Auth::user()->prenom }}</span>
    @if(Auth::user()->role === 'verifie')
        <span class="verified-badge-header" style="background: #2d6a4f; color: white; padding: 2px 8px; border-radius: 20px; font-size: 10px; margin-left: 5px;">
            <i class="fas fa-check-circle"></i> Vérifié
        </span>
    @endif
    <i class="fas fa-chevron-down"></i>
</div>
                        <div class="user-dropdown">
                            <a href="{{ route('profile.show') }}"><i class="fas fa-user-cog"></i> Mon profil</a>
                            <a href="{{ route('mes-annonces') }}"><i class="fas fa-list"></i> Mes annonces</a>
                            <a href="{{ route('favoris.index') }}"><i class="fas fa-heart"></i> Mes favoris</a>
                            <hr>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-login">Connexion</a>
                    <a href="{{ route('register') }}" class="btn-register">Inscription</a>
                @endauth
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn"><i class="fas fa-bars"></i></button>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-header">
                <div class="logo"><h1>Piko</h1></div>
                <button class="mobile-menu-close" id="mobileMenuClose"><i class="fas fa-times"></i></button>
            </div>
            <div class="mobile-menu-content">
                <a href="{{ route('home') }}" class="mobile-nav-item"><i class="fas fa-home"></i> Accueil</a>
                <a href="{{ route('annonces.index') }}" class="mobile-nav-item"><i class="fas fa-store"></i> Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}" class="mobile-nav-item"><i class="fas fa-list"></i> Mes annonces</a>
                    <a href="{{ route('favoris.index') }}" class="mobile-nav-item"><i class="fas fa-heart"></i> Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}" class="mobile-nav-item"><i class="fas fa-info-circle"></i> À propos</a>
                <hr>
                @auth
                    <a href="{{ route('profile.show') }}" class="mobile-nav-item"><i class="fas fa-user-cog"></i> Mon profil</a>
                    <a href="{{ route('logout') }}" class="mobile-nav-item" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @else
                    <a href="{{ route('login') }}" class="mobile-nav-item"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                    <a href="{{ route('register') }}" class="mobile-nav-item btn-mobile-primary"><i class="fas fa-user-plus"></i> Inscription</a>
                @endauth
            </div>
        </div>
        <div class="mobile-overlay" id="mobileOverlay"></div>
    </header>

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

    <!-- Hero Section avec Welcome Dashboard intégré -->
    <section class="hero-dashboard">
        <div class="hero-bg"></div>
        <div class="dashboard-content">
            <div class="welcome-header">
                <div class="welcome-text">
                    <h2>Bonjour, {{ Auth::user()->prenom }} </h2>
                    <p>Gérez vos annonces et suivez leurs performances</p>
                </div>
                <a href="{{ route('annonces.create') }}" class="btn-create-dashboard">
                    <i class="fas fa-plus"></i> Nouvelle annonce
                </a>
            </div>

            <!-- Stats Cards Intégrées -->
            <div class="stats-grid-integrated">
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="stat-info-integrated">
                        <h3>{{ $totalAnnonces ?? $annonces->total() }}</h3>
                        <p>Total annonces</p>
                    </div>
                </div>
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info-integrated">
                        <h3>{{ $enAttenteCount ?? 0 }}</h3>
                        <p>En attente</p>
                    </div>
                </div>
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info-integrated">
                        <h3>{{ $publieeCount ?? 0 }}</h3>
                        <p>Publiées</p>
                    </div>
                </div>
                <div class="stat-card-integrated">
                    <div class="stat-icon-integrated">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stat-info-integrated">
                        <h3>{{ $totalVues ?? 0 }}</h3>
                        <p>Vues totales</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Bar - MÊME DESIGN QUE LA BARRE DE RECHERCHE -->
    <div class="filter-wrapper">
        <div class="filter-card">
            <div class="filter-tabs">
                <a href="{{ route('mes-annonces', array_merge(request()->except('status'), ['status' => null])) }}" class="filter-tab {{ !request('status') ? 'active' : '' }}">Toutes ({{ $totalAnnonces ?? 0 }})</a>
                <a href="{{ route('mes-annonces', array_merge(request()->except('status'), ['status' => 'brouillon'])) }}" class="filter-tab {{ request('status') == 'brouillon' ? 'active' : '' }}">Brouillons </a>
                <a href="{{ route('mes-annonces', array_merge(request()->except('status'), ['status' => 'en_attente'])) }}" class="filter-tab {{ request('status') == 'en_attente' ? 'active' : '' }}">En attente </a>
                <a href="{{ route('mes-annonces', array_merge(request()->except('status'), ['status' => 'publiee'])) }}" class="filter-tab {{ request('status') == 'publiee' ? 'active' : '' }}">Publiées </a>
                <a href="{{ route('mes-annonces', array_merge(request()->except('status'), ['status' => 'vendue'])) }}" class="filter-tab {{ request('status') == 'vendue' ? 'active' : '' }}">Vendues</a>
                <a href="{{ route('mes-annonces', array_merge(request()->except('status'), ['status' => 'archivee'])) }}" class="filter-tab {{ request('status') == 'archivee' ? 'active' : '' }}">Archivées </a>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Annonces Grid -->
        @if($annonces->count() > 0)
            <div class="annonces-grid">
                @foreach($annonces as $annonce)
                    @php
                        $photo = $annonce->photos->where('est_principale', true)->first();
                        $imageUrl = $photo ? asset('storage/' . $photo->chemin_stockage) : asset('images/default.jpg');
                        $statusLabel = [
                            'brouillon' => 'Brouillon',
                            'en_attente' => 'En attente',
                            'publiee' => 'Publiée',
                            'vendue' => 'Vendue',
                            'archivee' => 'Archivée'
                        ][$annonce->etat] ?? $annonce->etat;
                        
                        // Déterminer si l'annonce peut être modifiée
                        $canEdit = in_array($annonce->etat, ['brouillon', 'en_attente']);
                    @endphp
                    
                    <div class="annonce-card" data-id="{{ $annonce->id }}" style="background-image: url('{{ $imageUrl }}');">
                        <div class="card-badge {{ $annonce->etat }}">{{ $statusLabel }}</div>
                        
                        <div class="card-actions">
                            {{-- Bouton Modifier : seulement pour brouillon et en_attente --}}
                            @if($canEdit)
                                <a href="{{ route('annonces.edit', $annonce->id) }}" class="card-action-btn edit" title="Modifier l'annonce">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif
                            
                            {{-- Bouton Supprimer : toujours visible --}}
                            <button type="button" class="card-action-btn delete" onclick="openDeleteModal({{ $annonce->id }})" title="Supprimer l'annonce">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                        
                        <div class="card-content">
                            <h3 class="card-title">{{ $annonce->titre }}</h3>
                            <div class="card-price">{{ number_format($annonce->prix, 0, ',', ' ') }}€</div>
                            <div class="card-location">
                                <i class="fas fa-map-marker-alt"></i> {{ $annonce->utilisateur->ville ?? 'France' }}
                            </div>
                            <div class="card-footer">
                                <span class="card-views"><i class="fas fa-eye"></i> {{ $annonce->nb_vues ?? 0 }}</span>
                                
                                {{-- Bouton Soumettre : seulement pour brouillon --}}
                                @if($annonce->etat == 'brouillon')
                                    <form action="{{ route('annonces.submit', $annonce->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="action-submit" style="background: none; border: none; color: #ffd966; cursor: pointer;" title="Soumettre pour validation">
                                            <i class="fas fa-paper-plane"></i> Soumettre
                                        </button>
                                    </form>
                                
                                {{-- Bouton Marquer comme vendu : seulement pour publiée ET si réponses envoyées --}}
                                @elseif($annonce->etat == 'publiee')
                                    @php
                                        $aDesReponses = $annonce->contacts()->where('destinataire_id', Auth::id())->exists();
                                        $aRepondu = $annonce->contacts()->where('destinataire_id', Auth::id())->where('reponse_envoyee', true)->exists();
                                    @endphp
                                    
                                    @if($aDesReponses && !$aRepondu)
                                        <span style="color: #f59e0b;" title="Vous devez répondre aux acheteurs avant de vendre">
                                            <i class="fas fa-clock"></i> Répondez d'abord
                                        </span>
                                    @else
                                        <form action="{{ route('annonces.sold', $annonce->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="action-sold" style="background: none; border: none; color: #10b981; cursor: pointer;" title="Marquer comme vendue">
                                                <i class="fas fa-check-circle"></i> Vendre
                                            </button>
                                        </form>
                                    @endif
                                
                                {{-- En attente : icône horloge --}}
                                @elseif($annonce->etat == 'en_attente')
                                    <span style="color: #f59e0b;" title="En attente de validation">
                                        <i class="fas fa-clock"></i> En validation...
                                    </span>
                                
                                {{-- Vendue : badge vendu --}}
                                @elseif($annonce->etat == 'vendue')
                                    <span style="color: #dc3545;" title="Déjà vendue">
                                        <i class="fas fa-check-circle"></i> Vendu
                                    </span>
                                
                                {{-- Archivée : badge archivé --}}
                                @elseif($annonce->etat == 'archivee')
                                    <span style="color: #6c757d;" title="Annonce archivée">
                                        <i class="fas fa-archive"></i> Archivée
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION SIMPLIFIÉE : PRÉCÉDENT ET SUIVANT UNIQUEMENT -->
            <div class="pagination">
                @if ($annonces->onFirstPage())
                    <span class="page-link disabled">
                        <i class="fas fa-arrow-left"></i> Précédent
                    </span>
                @else
                    <a href="{{ $annonces->previousPageUrl() }}" class="page-link">
                        <i class="fas fa-arrow-left"></i> Précédent
                    </a>
                @endif

                <span class="page-info">
                    Page {{ $annonces->currentPage() }} sur {{ $annonces->lastPage() }}
                </span>

                @if ($annonces->hasMorePages())
                    <a href="{{ $annonces->nextPageUrl() }}" class="page-link">
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
                    <i class="fas fa-dove"></i>
                </div>
                <h3>Aucune annonce trouvée</h3>
                <p>Vous n'avez pas encore créé d'annonce.</p>
                <a href="{{ route('annonces.create') }}" class="btn-create-dashboard">Créer ma première annonce</a>
            </div>
        @endif
    </div>

    <!-- Modal Delete -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Supprimer l'annonce</h3>
            <p>Êtes-vous sûr de vouloir supprimer cette annonce ? Cette action est irréversible et supprimera définitivement toutes les photos associées.</p>
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-cancel" onclick="closeDeleteModal()">Annuler</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="modal-btn modal-btn-confirm">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <h3>PIKO</h3>
                <p>La destination n°1 pour les passionnés d'oiseaux en Europe. Nous connectons éleveurs responsables et familles aimantes.</p>
            </div>
            <div class="footer-col">
                <h4>Navigation</h4>
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('annonces.index') }}">Annonces</a>
                <a href="{{ route('about') }}">À propos</a>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <a href="#">Conditions générales</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">Mentions légales</a>
            </div>
            <div class="footer-col">
                <h4>Suivez-nous</h4>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
        </div>
        <div class="copyright">
            <p>© 2024 PIKO – Marketplace d'annonces aviaires. Conçu pour les passionnés d'oiseaux.</p>
        </div>
    </footer>

    <script>
        // Mobile menu
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileClose = document.getElementById('mobileMenuClose');
        const mobileOverlay = document.getElementById('mobileOverlay');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileBtn) mobileBtn.addEventListener('click', openMobileMenu);
        if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
        if (mobileOverlay) mobileOverlay.addEventListener('click', closeMobileMenu);

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

        // Delete Modal
        let deleteId = null;

        function openDeleteModal(id) {
            deleteId = id;
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = '/annonces/' + id;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
            deleteId = null;
        }

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Rendre les cartes cliquables
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.annonce-card');
            
            cards.forEach(card => {
                card.style.cursor = 'pointer';
                
                card.addEventListener('click', function(e) {
                    let target = e.target;
                    let isButton = false;
                    
                    while (target && target !== card) {
                        if (target.tagName === 'BUTTON' || 
                            target.tagName === 'A' || 
                            target.closest('.card-action-btn') ||
                            target.closest('form')) {
                            isButton = true;
                            break;
                        }
                        target = target.parentElement;
                    }
                    
                    if (!isButton) {
                        const annonceId = card.getAttribute('data-id');
                        if (annonceId) {
                            window.location.href = '/annonces/' + annonceId;
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>