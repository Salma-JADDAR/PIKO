<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Marketplace aviaire premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        *::-webkit-scrollbar {
        display: none;
      }


{-ms-overflow-style: none;
      scrollbar-width: none;}
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7f5;
            color: #1a1a1a;
            scroll-behavior: smooth;
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

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 80vh;
            display: flex;
            align-items: center;
            overflow: visible;
        }
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('images/Cap.PNG') }}");
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
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -1px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .hero-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 32px;
            opacity: 0.95;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
        }

        /* Search Bar */
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

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 32px;
        }

        /* ============================================ */
        /* STYLE CENTRÉ POUR TOUS LES TITRES DE SECTIONS */
        /* ============================================ */
        .section-header-center {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-title-center {
            font-size: 36px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        .section-title-center::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 3px;
        }

        .section-subtitle-center {
            color: #6c757d;
            font-size: 16px;
            margin-top: 20px;
        }

        /* Annonces à la une */
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        .featured-card {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            text-decoration: none;
            color: inherit;
            display: block;
            min-height: 380px;
        }
        .featured-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }
        .featured-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
            z-index: 1;
        }
        .card-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            color: white;
            font-size: 11px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            z-index: 3;
        }
        .card-badge.featured-badge {
            background: linear-gradient(135deg, #e65100, #ff9800);
            color: white;
        }
        .card-body {
            position: relative;
            z-index: 2;
            padding: 20px;
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
        }
        .card-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.3;
            color: white;
        }
        .card-location {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 12px;
        }
        .card-price {
            font-size: 28px;
            font-weight: 800;
            color: white;
            margin-bottom: 12px;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        .card-tag {
            font-size: 11px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            padding: 4px 10px;
            border-radius: 20px;
            color: white;
        }
        .card-views {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* SECTION ANNONCES RÉCENTES */
        .recent-special {
            display: flex;
            gap: 30px;
            margin: 20px 0;
        }

        .recent-featured-card {
            flex: 1;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 24px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            min-height: 280px;
        }
        .recent-featured-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
            z-index: 1;
        }
        .recent-featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        .recent-featured-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #e65100, #ff9800);
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            z-index: 3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .recent-featured-content {
            position: relative;
            z-index: 2;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
            height: 100%;
            min-height: 280px;
        }
        .recent-featured-title {
            font-size: 22px;
            font-weight: 700;
            color: white;
            margin-bottom: 10px;
            line-height: 1.3;
        }
        .recent-featured-description {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.5;
            margin-bottom: 15px;
        }
        .recent-featured-price {
            font-size: 24px;
            font-weight: 800;
            color: white;
        }

        .recent-side-cards {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .recent-side-card {
            flex: 1;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 20px;
            padding: 25px 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            min-height: 130px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .recent-side-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
            border-radius: 20px;
            z-index: 1;
        }
        .recent-side-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .recent-side-card > * {
            position: relative;
            z-index: 2;
        }
        .side-card-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
        }
        .side-card-icon i {
            font-size: 24px;
            color: white;
        }
        .side-card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
            color: white;
        }
        .side-card-text {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.4;
            margin-bottom: 12px;
        }
        .side-card-link {
            color: #ffd966;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: gap 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .side-card-link:hover {
            gap: 10px;
        }
        .side-card-stats {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .side-card-stats span {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .side-card-stats i {
            color: #ffd966;
        }

        /* Steps */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 48px;
            text-align: center;
            margin-top: 40px;
        }
        .step-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #e8f0e6, #d4e4d0);
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 40px;
            color: #2d6a4f;
            transition: transform 0.3s;
        }
        .step-icon:hover { transform: scale(1.05); }
        .step-title { font-size: 22px; font-weight: 700; margin-bottom: 12px; }
        .step-desc { color: #6c757d; font-size: 14px; line-height: 1.6; }

        /* SECTION SÉCURITÉ HORIZONTALE */
        .horizontal-security-container {
            display: flex;
            gap: 30px;
            align-items: stretch;
        }

        .horizontal-security-left {
            flex: 1;
            width: 50%;
        }

        .image-frame-small {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 20px;
            padding: 8px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .security-small-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 14px;
            min-height: 180px;
            max-height: 220px;
        }

        .horizontal-security-right {
            flex: 1;
            width: 50%;
        }

        .security-text-content-small {
            background: #0a1a0a;
            border-radius: 20px;
            padding: 24px 28px;
            color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .security-main-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: -0.3px;
        }

        .security-desc {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            margin-bottom: 24px;
        }

        .security-points-center {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .security-point-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            padding: 12px 16px;
            border-radius: 16px;
            transition: all 0.3s ease;
            min-width: 100px;
        }

        .security-point-center:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
        }

        .security-point-center i {
            font-size: 24px;
            color: #ffd966;
        }

        .security-point-center strong {
            font-size: 13px;
            font-weight: 600;
        }

        .security-point-center span {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
        }

        .security-link-center {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #ffd966;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
            background: rgba(255, 217, 102, 0.1);
            padding: 8px 20px;
            border-radius: 30px;
            margin: 0 auto;
            width: fit-content;
        }

        .security-link-center:hover {
            gap: 12px;
            background: rgba(255, 217, 102, 0.2);
            color: #ffe08c;
        }

        /* Footer */
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
        .footer-logo h3 { font-size: 28px; color: white; margin-bottom: 20px; }
        .footer-logo p { font-size: 13px; line-height: 1.6; }
        .footer-col h4 { color: white; font-size: 16px; margin-bottom: 24px; }
        .footer-col a { display: block; color: #a0b0a0; text-decoration: none; font-size: 13px; margin-bottom: 14px; transition: color 0.2s; }
        .footer-col a:hover { color: #86a788; }
        .copyright { text-align: center; padding-top: 48px; margin-top: 48px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 12px; }

        /* Responsive */
        @media (max-width: 900px) {
            .featured-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .recent-special {
                flex-direction: column;
            }
            .recent-featured-card {
                min-height: 250px;
            }
            .recent-featured-content {
                min-height: 250px;
            }
            .recent-side-cards {
                flex-direction: row;
                gap: 20px;
            }
            .nav-links, .auth-actions { display: none; }
            .mobile-menu-btn { display: block; }
            .nav-container { padding: 12px 20px; }
            .hero-content { margin-left: 5%; padding: 60px 20px 40px 20px; }
            .hero-content h1 { font-size: 32px; }
            .search-card { flex-direction: column; border-radius: 30px; }
            .search-item { border-radius: 40px; }
            .search-btn { padding: 14px; }
            .steps-grid, .footer-content { grid-template-columns: 1fr; }
            .container { padding: 40px 20px; }
            
            .horizontal-security-container {
                flex-direction: column;
            }
            .horizontal-security-left,
            .horizontal-security-right {
                width: 100%;
            }
            .security-text-content-small {
                padding: 24px;
            }
            .security-points-center {
                flex-direction: column;
                align-items: stretch;
            }
            .security-point-center {
                flex-direction: row;
                justify-content: center;
                gap: 12px;
            }
            .security-small-image {
                min-height: 140px;
                max-height: 160px;
            }
            .section-title-center {
                font-size: 28px;
            }
        }

        @media (max-width: 600px) {
            .featured-grid {
                grid-template-columns: 1fr;
            }
            .recent-side-cards {
                flex-direction: column;
            }
            .featured-grid {
                margin-top: 20px;
            }
            .recent-special {
                margin-top: 20px;
            }
            .featured-title {
                font-size: 28px;
            }
            .recent-title {
                font-size: 28px;
            }
            .recent-featured-title {
                font-size: 20px;
            }
            .recent-featured-price {
                font-size: 22px;
            }
            
            .container {
                padding: 40px 20px;
            }
            .security-text-content-small {
                padding: 20px;
            }
            .security-main-title {
                font-size: 18px;
            }
            .security-point-center {
                padding: 10px 12px;
            }
            .security-point-center i {
                font-size: 20px;
            }
            .security-point-center strong {
                font-size: 12px;
            }
            .section-title-center {
                font-size: 24px;
            }
            .section-subtitle-center {
                font-size: 14px;
            }
            .security-small-image {
                min-height: 120px;
                max-height: 140px;
            }
        }

        @media (max-width: 480px) {
            .hero-content { margin-left: 0; padding: 50px 20px 30px 20px; }
            .hero-content h1 { font-size: 28px; }
            .hero-content p { font-size: 14px; }
            .search-wrapper {
                margin-top: -30px;
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
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('annonces.index') }}" class="{{ request()->routeIs('annonces.*') ? 'active' : '' }}">Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}" class="{{ request()->routeIs('mes-annonces') ? 'active' : '' }}">Mes annonces</a>
                    <a href="{{ route('favoris.index') }}" class="{{ request()->routeIs('favoris.*') ? 'active' : '' }}">Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}">À propos</a>
                @guest
                    <a href="#comment-ca-marche">Comment ça marche</a>
                @endguest
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
                @guest
                    <a href="#comment-ca-marche" class="mobile-nav-item"><i class="fas fa-question-circle"></i> Comment ça marche</a>
                @endguest
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1>Échangez <br> des oiseaux <br> en toute confiance</h1>
            <p>Découvrez une communauté passionnée et une marketplace <br>sécurisée dédiée aux passionnés d'oiseaux et aux éleveurs certifiés.</p>
        </div>
    </section>

    <!-- Search Bar -->
    <div class="search-wrapper">
        <form action="{{ route('annonces.index') }}" method="GET" class="search-card">
            <div class="search-item">
                <label>ESPÈCE</label>
                <select name="espece">
                    <option value="">Toutes les espèces</option>
                    @foreach($especes ?? [] as $espece)
                        <option value="{{ $espece->id }}">{{ $espece->nom_commun }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-item">
                <label>PRIX</label>
                <select name="prix">
                    <option value="">Tout budget</option>
                    <option value="0-100">Moins de 100€</option>
                    <option value="100-500">100€ - 500€</option>
                    <option value="500-1000">500€ - 1000€</option>
                    <option value="1000+">1000€+</option>
                </select>
            </div>
            <div class="search-item">
                <label>LOCALISATION</label>
                <input type="text" name="ville" placeholder="Ville ou Code Postal">
            </div>
            <button type="submit" class="search-btn">Rechercher</button>
        </form>
    </div>

    <!-- Annonces à la une - Titre centré -->
    <div class="container">
        <div class="section-header-center">
            <h2 class="section-title-center">Annonces à la une</h2>
            <p class="section-subtitle-center">Les plus beaux spécimens sélectionnés pour vous</p>
        </div>

        <div class="featured-grid">
            @forelse($annoncesUne ?? [] as $annonce)
                @php
                    $photo = $annonce->getPhotoPrincipale();
                    if ($photo) {
                        $imageUrl = asset('storage/' . $photo->chemin_stockage);
                        $imageUrl = str_replace('storage/storage/', 'storage/', $imageUrl);
                    } else {
                        $imageUrl = asset('images/default.jpg');
                    }
                @endphp
                <a href="{{ route('annonces.show', $annonce->id) }}" class="featured-card" style="background-image: url('{{ $imageUrl }}');">
                    @if($annonce->utilisateur && $annonce->utilisateur->estVerifie())
                        <div class="card-badge">
                            <i class="fas fa-check-circle"></i> Éleveur Vérifié
                        </div>
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ $annonce->titre }}</h3>
                        <div class="card-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $annonce->utilisateur->ville ?? 'France' }}
                        </div>
                        <div class="card-price">{{ number_format($annonce->prix, 0, ',', ' ') }}€</div>
                        <div class="card-footer">
                            @if($annonce->etat == 'vendue')
                                <span class="card-tag">VENDU</span>
                            @else
                                <span class="card-tag">NÉGOCIABLE</span>
                            @endif
                            <span class="card-views"><i class="fas fa-eye"></i> {{ $annonce->nb_vues ?? 0 }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <a href="#" class="featured-card" style="background-image: url('{{ asset('images/a1.png') }}');">
                    <div class="card-badge"><i class="fas fa-check-circle"></i> Éleveur Vérifié</div>
                    <div class="card-body">
                        <h3 class="card-title">Gris du Gabon</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Lyon, France</div>
                        <div class="card-price">850€</div>
                        <div class="card-footer">
                            <span class="card-tag">NÉGOCIABLE</span>
                            <span class="card-views"><i class="fas fa-eye"></i> 245</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="featured-card" style="background-image: url('{{ asset('images/a2.png') }}');">
                    <div class="card-badge"><i class="fas fa-check-circle"></i> Couple</div>
                    <div class="card-body">
                        <h3 class="card-title">Couple Inséparables</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Bordeaux, France</div>
                        <div class="card-price">120€</div>
                        <div class="card-footer">
                            <span class="card-tag">PROMO</span>
                            <span class="card-views"><i class="fas fa-eye"></i> 189</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="featured-card" style="background-image: url('{{ asset('images/a3.png') }}');">
                    <div class="card-badge featured-badge"><i class="fas fa-star"></i> À la une</div>
                    <div class="card-body">
                        <h3 class="card-title">Ara Bleu et Or</h3>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> Nice, France</div>
                        <div class="card-price">1,200€</div>
                        <div class="card-footer">
                            <span class="card-tag">RARE</span>
                            <span class="card-views"><i class="fas fa-eye"></i> 567</span>
                        </div>
                    </div>
                </a>
            @endforelse
        </div>
    </div>

    <!-- Annonces Récentes - Titre centré -->
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Annonces Récentes</h2>
            <p class="section-subtitle-center">Les dernières annonces publiées</p>
        </div>

        <div class="recent-special">
            @php
                $photo = $annonceRecente ? $annonceRecente->getPhotoPrincipale() : null;
                $bgImage = asset('images/default.jpg');
                if ($photo && $photo->chemin_stockage) {
                    $path = $photo->chemin_stockage;
                    $path = preg_replace('#^storage/?#', '', $path);
                    if (!str_starts_with($path, 'images/')) {
                        $path = 'images/' . $path;
                    }
                    $bgImage = asset('storage/' . $path);
                }
            @endphp
            
            <div class="recent-featured-card" style="background-image: url('{{ $bgImage }}');">
                <div class="recent-featured-badge">Nouveau</div>
                <div class="recent-featured-content">
                    <h3 class="recent-featured-title">{{ $annonceRecente->titre ?? 'Cacatoès à huppe jaune' }}</h3>
                    <p class="recent-featured-description">{{ Str::limit($annonceRecente->description ?? 'Rare spécimen élevé à la main, sociabilisé et en excellente santé.', 80) }}</p>
                    <div class="recent-featured-price">{{ number_format($annonceRecente->prix ?? 2400, 0, ',', ' ') }}€</div>
                </div>
            </div>

            <div class="recent-side-cards">
                <div class="recent-side-card" style="background-image: url('{{ asset('images/home.PNG') }}');">
                    <div class="side-card-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h4 class="side-card-title">Prêt pour un nouveau foyer</h4>
                    <p class="side-card-text">Plus de 50 oiseaux ont trouvé une famille cette semaine.</p>
                    <a href="{{ route('annonces.index') }}" class="side-card-link">Découvrir →</a>
                </div>

                <div class="recent-side-card" style="background-image: url('{{ asset('images/heart.PNG') }}');">
                    <div class="side-card-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4 class="side-card-title">Favoris de la semaine</h4>
                    <p class="side-card-text">Découvrez les espèces les plus recherchées en France.</p>
                    <div class="side-card-stats">
                        <span><i class="fas fa-dove"></i> Perruche</span>
                        <span><i class="fas fa-dove"></i> Canari</span>
                        <span><i class="fas fa-dove"></i> Perroquet</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Comment ça marche - Titre centré -->
    @guest
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Comment ça marche ?</h2>
            <p class="section-subtitle-center">PIKO simplifie la vente et l'achat d'oiseaux de compagnie en mettant l'accent sur la sécurité et le bien-être animal.</p>
        </div>
        <div class="steps-grid">
            <div>
                <div class="step-icon"><i class="fas fa-search"></i></div>
                <div class="step-title">Recherchez</div>
                <div class="step-desc">Filtrez par espèce, âge, prix et localisation pour trouver le compagnon idéal.</div>
            </div>
            <div>
                <div class="step-icon"><i class="fas fa-comments"></i></div>
                <div class="step-title">Discutez</div>
                <div class="step-desc">Communiquez directement avec les vendeurs et éleveurs via notre messagerie sécurisée.</div>
            </div>
            <div>
                <div class="step-icon"><i class="fas fa-heart"></i></div>
                <div class="step-title">Adoptez</div>
                <div class="step-desc">Concluez la transaction en toute confiance grâce à nos guides de sécurité.</div>
            </div>
        </div>
    </div>
    @endguest

    <!-- Section Sécurité & Confiance - Titre centré -->
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Sécurité & Confiance</h2>
            <p class="section-subtitle-center">Engagés pour votre sécurité et le bien-être des animaux</p>
        </div>

        <div class="horizontal-security-container">
            <!-- Partie Gauche - Image avec cadre (couleur des boutons) -->
            <div class="horizontal-security-left">
                <div class="image-frame-small">
                    <img src="{{ asset('images/securiter.png') }}" alt="Sécurité" class="security-small-image">
                </div>
            </div>

            <!-- Partie Droite - Texte centré (couleur du footer) -->
            <div class="horizontal-security-right">
                <div class="security-text-content-small">
                    <h3 class="security-main-title">VOTRE SÉCURITÉ EST NOTRE PRIORITÉ</h3>
                    <p class="security-desc">Nous mettons tout en œuvre pour garantir des échanges sûrs et responsables.</p>
                    
                    <div class="security-points-center">
                        <div class="security-point-center">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <strong>Vérification</strong>
                                <span>Des éleveurs</span>
                            </div>
                        </div>
                        
                        <div class="security-point-center">
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <strong>Lutte contre</strong>
                                <span>le trafic</span>
                            </div>
                        </div>
                        
                        <div class="security-point-center">
                            <i class="fas fa-heartbeat"></i>
                            <div>
                                <strong>Conseils</strong>
                                <span>Santé</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#" class="security-link-center">Lire notre charte →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                    closeMobileMenu();
                }
            });
        });
    </script>
</body>
</html>