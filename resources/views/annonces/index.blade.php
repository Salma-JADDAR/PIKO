<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Piko · Marketplace aviaire - Annonces d'oiseaux</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        
        /* Masquer les scrollbars pour un rendu plus propre (optionnel) */
        *::-webkit-scrollbar {
            display: none;
        }
        * {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* ========== HEADER ========== */
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

        /* ========== MENU MOBILE ========== */
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

        /* ========== HERO SECTION ========== */
        .hero {
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
            background-image: url("{{ asset('images/mer.PNG') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
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
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            padding: 80px 32px 60px 32px;
            color: white;
            text-align: left;
            margin-left: 2%;
        }
        .hero-content h1 {
            font-size: clamp(32px, 6vw, 56px);
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -1px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .hero-content p {
            font-size: clamp(14px, 3vw, 18px);
            line-height: 1.5;
            margin-bottom: 32px;
            opacity: 0.95;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
        }

        /* ========== BARRE DE RECHERCHE ========== */
        .search-wrapper {
            position: relative;
            z-index: 10;
            margin-top: -50px;
            margin-bottom: 0;
            padding: 0 20px;
        }
        .search-card {
            background: white;
            border-radius: 60px;
            padding: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            max-width: 1000px;
            margin: 0 auto;
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.15);
        }
        .search-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 12px 20px;
            background: #f8faf8;
            border-radius: 50px;
            transition: all 0.2s;
            min-width: 150px;
        }
        .search-item:focus-within {
            background: white;
            box-shadow: 0 0 0 2px #2d6a4f;
        }
        .search-item label {
            font-size: 11px;
            font-weight: 600;
            color: #2d6a4f;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .search-item select, .search-item input {
            border: none;
            background: transparent;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            width: 100%;
            outline: none;
            cursor: pointer;
            color: #1a1a1a;
        }
        .search-btn {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            padding: 0 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 140px;
        }
        .search-btn:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(45, 106, 79, 0.4);
        }

        /* ========== CONTAINER ========== */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 50px 32px;
        }

        /* ========== FILTRE + RÉSULTATS HEADER ========== */
        .filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e8ecef;
        }
        
        .status-tabs {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .status-tab {
            padding: 8px 24px;
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
        .status-tab.active {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
        }
        .status-tab:hover:not(.active) {
            background: #e8f0e6;
            color: #2d6a4f;
        }

        .results-header {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .results-count {
            font-size: 14px;
            color: #6c757d;
            padding: 8px 16px;
            background: #f8faf8;
            border-radius: 40px;
        }
        .results-count span {
            font-weight: 700;
            color: #2d6a4f;
        }
        .sort-options select {
            padding: 8px 16px;
            border-radius: 40px;
            border: 1px solid #e8ecef;
            background: #f8faf8;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color: #4a5568;
            cursor: pointer;
            transition: all 0.3s;
        }
        .sort-options select:hover {
            border-color: #2d6a4f;
            background: white;
        }

        /* ========== GRILLE DES ANNONCES ========== */
        .annonces-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 48px;
        }
        
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
        
        .favorite-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .favorite-btn i {
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .favorite-btn:hover {
            transform: scale(1.1);
            background: white;
        }
        .favorite-btn.active i {
            color: #ff4757;
        }
        .favorite-btn:not(.active) i {
            color: #6c757d;
        }
        
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
        .card-badge.sold {
            background: #dc3545;
        }
        .card-badge.verified {
            background: #2d6a4f;
        }
        
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
        .verified-badge {
            font-size: 11px;
            color: #ffd966;
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

        /* ========== EMPTY STATE ========== */
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

        /* ========== ALERTS ========== */
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

        /* ========== MODAL ========== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: white;
            border-radius: 28px;
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        .modal-content i {
            font-size: 64px;
            color: #2d6a4f;
            margin-bottom: 20px;
        }
        .modal-content h3 {
            font-size: 24px;
            margin-bottom: 16px;
        }
        .modal-content p {
            color: #6c757d;
            margin-bottom: 24px;
        }
        .modal-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
        }
        .modal-btn {
            padding: 10px 24px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        .modal-btn-primary {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
        }
        .modal-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45,106,79,0.3);
        }
        .modal-btn-secondary {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .modal-btn-secondary:hover {
            background: #d4e4d0;
        }

        /* ========== FOOTER ========== */
        .footer {
            background: #0a1a0a;
            color: #a0b0a0;
            padding: 60px 32px 32px;
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

        /* ========== RESPONSIVE AMÉLIORÉ ========== */
        @media (max-width: 1024px) {
            .annonces-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 900px) {
            .nav-links, .auth-actions { display: none; }
            .mobile-menu-btn { display: block; }
            .nav-container { padding: 12px 20px; }
            .hero-content { margin-left: 0; padding: 60px 20px 40px 20px; }
            .search-card { flex-direction: column; border-radius: 30px; }
            .search-item { border-radius: 40px; }
            .search-btn { padding: 12px; min-width: auto; }
            .filter-bar { flex-direction: column; align-items: flex-start; }
            .status-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                width: 100%;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }
            .status-tabs::-webkit-scrollbar { display: none; }
            .status-tab { white-space: nowrap; }
            .results-header { justify-content: space-between; width: 100%; }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
        }

        @media (max-width: 768px) {
            .container { padding: 30px 20px; }
            .annonces-grid { grid-template-columns: 1fr; gap: 20px; }
            .annonce-card { min-height: 260px; }
            .card-content { padding: 16px; min-height: 260px; }
            .card-title { font-size: 16px; }
            .card-price { font-size: 20px; }
            .pagination { gap: 12px; }
            .page-link { padding: 8px 16px; font-size: 13px; }
            .page-info { padding: 6px 14px; font-size: 12px; }
            .hero-content h1 { font-size: 28px; }
            .hero-content p { font-size: 14px; }
            .search-wrapper { margin-top: -25px; }
            .modal-content { padding: 30px 20px; }
            .modal-buttons { flex-direction: column; gap: 12px; }
            .modal-btn { text-align: center; }
        }

        @media (max-width: 480px) {
            .logo h1 { font-size: 24px; }
            .hero { min-height: 60vh; }
            .hero-content { padding: 40px 16px; }
            .hero-content h1 { font-size: 24px; }
            .search-item { padding: 8px 16px; }
            .search-item label { font-size: 10px; }
            .search-item select, .search-item input { font-size: 13px; }
            .status-tab { padding: 6px 16px; font-size: 12px; }
            .results-count { font-size: 12px; padding: 6px 12px; }
            .sort-options select { padding: 6px 12px; font-size: 12px; }
            .card-footer { flex-wrap: wrap; gap: 8px; }
            .favorite-btn { width: 32px; height: 32px; }
            .favorite-btn i { font-size: 16px; }
            .alert { bottom: 20px; right: 20px; left: 20px; text-align: center; border-radius: 40px; }
            .footer { padding: 40px 20px 24px; }
            .pagination { gap: 8px; flex-wrap: wrap; }
            .page-link { padding: 6px 12px; font-size: 12px; gap: 5px; }
            .page-info { padding: 4px 10px; font-size: 11px; }
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
                <a href="{{ route('annonces.index') }}" class="active">Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}">Mes annonces</a>
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

    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1>Explorez <br> les annonces <br> aviaires</h1>
            <p>Une marketplace soigneusement sélectionnée, dédiée aux éleveurs certifiés et aux passionnés d'aviculture.</p>
        </div>
    </section>

    <div class="search-wrapper">
        <form action="{{ route('annonces.index') }}" method="GET" class="search-card">
            <div class="search-item">
                <label>ESPÈCE</label>
                <select name="espece">
                    <option value="">Toutes les espèces</option>
                    @foreach($especesList ?? [] as $espece)
                        <option value="{{ $espece->id }}" {{ request('espece') == $espece->id ? 'selected' : '' }}>
                            {{ $espece->nom_commun }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="search-item">
                <label>PRIX</label>
                <select name="prix">
                    <option value="">Tout budget</option>
                    <option value="0-100" {{ request('prix') == '0-100' ? 'selected' : '' }}>Moins de 100€</option>
                    <option value="100-500" {{ request('prix') == '100-500' ? 'selected' : '' }}>100€ - 500€</option>
                    <option value="500-1000" {{ request('prix') == '500-1000' ? 'selected' : '' }}>500€ - 1000€</option>
                    <option value="1000-2000" {{ request('prix') == '1000-2000' ? 'selected' : '' }}>1000€ - 2000€</option>
                    <option value="2000+" {{ request('prix') == '2000+' ? 'selected' : '' }}>2000€+</option>
                </select>
            </div>
            <div class="search-item">
                <label>LOCALISATION</label>
                <input type="text" name="ville" placeholder="Ville ou Code Postal" value="{{ request('ville') }}">
            </div>
            <button type="submit" class="search-btn">Rechercher</button>
        </form>
    </div>

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

    <div class="container">
        <div class="filter-bar">
            <div class="status-tabs">
                <a href="{{ route('annonces.index', array_merge(request()->except('status'), ['status' => null])) }}" class="status-tab {{ !request('status') ? 'active' : '' }}">Tous ({{ $totalCount ?? $annonces->total() }})</a>
                <a href="{{ route('annonces.index', array_merge(request()->except('status'), ['status' => 'publiee'])) }}" class="status-tab {{ request('status') == 'publiee' ? 'active' : '' }}">Publié ({{ $publishedCount ?? 0 }})</a>
                <a href="{{ route('annonces.index', array_merge(request()->except('status'), ['status' => 'vendue'])) }}" class="status-tab {{ request('status') == 'vendue' ? 'active' : '' }}">Vendu ({{ $soldCount ?? 0 }})</a>
            </div>

            <div class="results-header">
                <div class="results-count">
                    <span>{{ $annonces->total() }}</span> annonces
                </div>
                <div class="sort-options">
                    <form action="{{ route('annonces.index') }}" method="GET" id="sortForm">
                        @foreach(request()->except('sort') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <select name="sort" onchange="document.getElementById('sortForm').submit()">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Plus récentes</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                            <option value="views" {{ request('sort') == 'views' ? 'selected' : '' }}>Plus vues</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        @if($annonces->count() > 0)
            <div class="annonces-grid">
                @foreach($annonces as $annonce)
                    @php
                        $photo = $annonce->photos->where('est_principale', true)->first();
                        $imageUrl = $photo ? asset('storage/' . str_replace('storage/', '', $photo->chemin_stockage)) : asset('images/default.jpg');
                        $isVerified = $annonce->utilisateur && $annonce->utilisateur->role === 'verifie';
                        $isFavori = Auth::check() && $annonce->favoris()->where('user_id', Auth::id())->exists();
                    @endphp
                    <a href="{{ route('annonces.show', $annonce->id) }}" class="annonce-card" style="background-image: url('{{ $imageUrl }}');">
                        @if($annonce->etat == 'vendue')
                            <div class="card-badge sold">VENDU</div>
                        @elseif($isVerified)
                            <div class="card-badge verified"><i class="fas fa-check-circle"></i> Vérifié</div>
                        @endif
                        
                        @auth
                            <form action="{{ route('favoris.toggle', $annonce->id) }}" method="POST" style="position: absolute; top: 12px; right: 12px; z-index: 10;">
                                @csrf
                                @if($isFavori)
                                    @method('DELETE')
                                    <button type="submit" class="favorite-btn active">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @else
                                    <button type="submit" class="favorite-btn">
                                        <i class="far fa-heart"></i>
                                    </button>
                                @endif
                            </form>
                        @else
                            <button type="button" class="favorite-btn" onclick="showLoginModal(event)">
                                <i class="far fa-heart"></i>
                            </button>
                        @endauth
                        
                        <div class="card-content">
                            <h3 class="card-title">{{ $annonce->titre }}</h3>
                            <div class="card-price">{{ number_format($annonce->prix, 0, ',', ' ') }}€</div>
                            <div class="card-location">
                                <i class="fas fa-map-marker-alt"></i> {{ $annonce->utilisateur->ville ?? 'France' }}
                            </div>
                            <div class="card-footer">
                                <span class="card-views"><i class="fas fa-eye"></i> {{ $annonce->nb_vues ?? 0 }} vues</span>
                                @if($annonce->etat == 'publiee')
                                    <span class="verified-badge">Disponible</span>
                                @elseif($annonce->etat == 'vendue')
                                    <span class="verified-badge" style="color: #dc3545;">Vendu</span>
                                @endif
                            </div>
                        </div>
                    </a>
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
                <p>Essayez d'élargir votre recherche ou modifiez vos filtres.</p>
                <a href="{{ route('annonces.index') }}" class="btn-filter btn-filter-primary">Voir toutes les annonces</a>
            </div>
        @endif
    </div>

    <div class="modal" id="loginModal">
        <div class="modal-content">
            <i class="fas fa-heart"></i>
            <h3>Connexion requise</h3>
            <p>Vous devez être connecté pour ajouter des annonces à vos favoris.</p>
            <div class="modal-buttons">
                <a href="{{ route('login') }}" class="modal-btn modal-btn-primary">Se connecter</a>
                <a href="{{ route('register') }}" class="modal-btn modal-btn-secondary">S'inscrire</a>
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

        // Modal login
        function showLoginModal(event) {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('loginModal').classList.add('active');
        }

        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
            }
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
        }, 3000);
    </script>
</body>
</html>