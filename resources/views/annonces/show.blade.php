<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · {{ $annonce->titre }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #1a1a1a;
            scroll-behavior: smooth;
        }

        /* Header Premium */
        .header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
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
            box-shadow: 0 4px 12px rgba(45,106,79,0.2);
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45,106,79,0.35);
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

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 40px 32px 60px;
        }

        /* Breadcrumb */
        .breadcrumb {
            text-align: center;
            margin-bottom: 32px;
            font-size: 14px;
            color: #64748b;
        }
        .breadcrumb a {
            color: #2d6a4f;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .breadcrumb a:hover {
            color: #1e4620;
        }
        .breadcrumb span {
            margin: 0 8px;
            color: #cbd5e1;
        }

        /* Detail Layout */
        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 48px;
        }

        /* Left Column */
        .detail-left {
            background: white;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            border: 1px solid #f0f2f5;
        }

        /* Image Gallery */
        .image-container {
            position: relative;
        }
        .main-image {
            width: 100%;
            height: 480px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: transform 0.5s ease;
        }
        .image-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #e65100, #ff9800);
            color: white;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
        }
        .image-badge.sold {
            background: #dc3545;
        }
        .image-badge.verified {
            background: #2d6a4f;
        }
        .thumbnail-gallery {
            display: flex;
            gap: 12px;
            padding: 20px;
            border-top: 1px solid #eef2f0;
            overflow-x: auto;
            justify-content: center;
        }
        .thumbnail {
            width: 85px;
            height: 85px;
            border-radius: 16px;
            background-size: cover;
            background-position: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            flex-shrink: 0;
        }
        .thumbnail:hover {
            transform: translateY(-3px);
            border-color: #2d6a4f;
        }
        .thumbnail.active {
            border-color: #2d6a4f;
            transform: scale(0.98);
        }

        /* Annonce Info */
        .annonce-info {
            padding: 32px;
        }
        .annonce-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
            text-align: center;
            background: linear-gradient(135deg, #0f172a, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .annonce-meta {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            margin-bottom: 28px;
            padding-bottom: 24px;
            border-bottom: 1px solid #eef2f0;
            justify-content: center;
            align-items: center;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #64748b;
            background: #f8fafc;
            padding: 8px 16px;
            border-radius: 40px;
        }
        .meta-item i {
            color: #2d6a4f;
            width: 18px;
        }

        /* Details Grid Premium */
        .details-grid-premium {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin: 28px 0;
            padding: 28px 0;
            border-top: 1px solid #eef2f0;
            border-bottom: 1px solid #eef2f0;
        }
        *::-webkit-scrollbar {
        display: none;
      }


{-ms-overflow-style: none;
      scrollbar-width: none;}
        .detail-card {
            background: #f8fafc;
            padding: 16px 20px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        .detail-card:hover {
            background: #e8f0e6;
            transform: translateX(5px);
        }
        .detail-label {
            font-size: 13px;
            font-weight: 500;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .detail-label i {
            color: #2d6a4f;
            font-size: 14px;
        }
        .detail-value {
            font-weight: 700;
            color: #0f172a;
        }

        /* Price Box Premium */
        .price-box-premium {
            background: linear-gradient(135deg, #e8f0e6, #d4e4d0);
            border-radius: 28px;
            padding: 28px;
            margin: 28px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .price-premium {
            font-size: 38px;
            font-weight: 800;
            color: #2d6a4f;
            letter-spacing: -1px;
        }
        .negotiable-premium {
            background: white;
            padding: 8px 20px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 600;
            color: #2d6a4f;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* Description Premium */
        .description-premium {
            color: #475569;
            line-height: 1.8;
            margin: 28px 0;
            font-size: 15px;
            text-align: center;
        }

        /* ============================================ */
        /* RIGHT COLUMN - SELLER CARD PREMIUM AMÉLIORÉ */
        /* ============================================ */
        .seller-card-premium {
            background: white;
            border-radius: 32px;
            padding: 28px;
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.05);
            position: sticky;
            top: 100px;
            transition: all 0.3s ease;
            border: 1px solid #f0f2f5;
        }
        .seller-card-premium:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 40px -12px rgba(0,0,0,0.1);
        }

        /* Profile Section */
        .seller-profile {
            display: flex;
            gap: 18px;
            margin-bottom: 28px;
            padding-bottom: 24px;
            border-bottom: 1px solid #eef2f0;
        }
        .seller-avatar-wrapper {
            position: relative;
        }
        .seller-avatar-premium {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 26px;
            font-weight: 700;
        }
        .seller-status {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .status-verified { background: #10b981; }
        .status-admin { background: #f59e0b; }
        .status-standard { background: #94a3b8; }

        .seller-info-premium h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #0f172a;
        }
        .seller-badges {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .badge-verified {
            background: #e8f0e6;
            color: #2d6a4f;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }
        .badge-admin {
            background: #fff3e0;
            color: #e65100;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }
        .badge-member {
            background: #f1f5f9;
            color: #64748b;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
        }
        .seller-rating-premium {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }
        .seller-rating-premium .stars {
            color: #fbbf24;
        }
        .seller-rating-premium span {
            color: #64748b;
        }

        /* Stats Grid */
        .seller-stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 16px 8px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            background: #e8f0e6;
            transform: translateY(-3px);
        }
        .stat-icon {
            font-size: 22px;
            color: #2d6a4f;
            margin-bottom: 8px;
        }
        .stat-number {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .stat-label {
            font-size: 11px;
            color: #64748b;
        }

        /* Contact Section */
        .contact-section {
            margin-bottom: 24px;
        }
        .btn-contact-premium {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 12px;
            position: relative;
        }
        .btn-contact-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45,106,79,0.3);
        }
        .btn-badge {
            position: absolute;
            right: 16px;
            background: rgba(255,255,255,0.2);
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 500;
        }
        .btn-favorite-premium {
            width: 100%;
            padding: 14px;
            background: transparent;
            border: 2px solid #2d6a4f;
            color: #2d6a4f;
            border-radius: 50px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-favorite-premium:hover {
            background: #2d6a4f;
            color: white;
            transform: translateY(-2px);
        }
        .btn-favorite-premium.active {
            background: #ff4757;
            border-color: #ff4757;
            color: white;
        }

        /* Trust Section */
        .trust-section {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .trust-badge {
            flex: 1;
            background: #f8fafc;
            padding: 10px 8px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 500;
            color: #475569;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.3s ease;
        }
        .trust-badge:hover {
            background: #e8f0e6;
            transform: translateY(-2px);
        }
        .trust-badge i {
            color: #2d6a4f;
            font-size: 14px;
        }

        /* Security Note */
        .security-note-premium {
            padding: 16px;
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-radius: 20px;
            font-size: 12px;
            color: #92400e;
            text-align: center;
            line-height: 1.5;
        }
        .security-note-premium i {
            color: #d97706;
            margin-right: 8px;
            font-size: 14px;
        }

        /* Modal Contact Premium */
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
        }
        .modal-container {
            background: white;
            border-radius: 32px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s ease;
        }
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .modal-header {
            padding: 28px 32px 16px;
            border-bottom: 1px solid #eef2f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal-header h2 {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
        }
        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #94a3b8;
            transition: all 0.3s;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-close:hover {
            color: #0f172a;
            background: #f1f5f9;
            transform: rotate(90deg);
        }
        .modal-body {
            padding: 28px 32px;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #2d6a4f;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid #e2e8f0;
            border-radius: 20px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: all 0.3s;
            background: #f8fafc;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
            background: white;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        .btn-send-premium {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-send-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45,106,79,0.3);
        }
        .modal-footer {
            padding: 20px 32px 28px;
            border-top: 1px solid #eef2f0;
            font-size: 12px;
            color: #64748b;
            text-align: center;
        }
        .modal-footer i {
            color: #fbbf24;
            margin-right: 6px;
        }

        /* Alert Messages */
        .alert {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            z-index: 2000;
            animation: slideIn 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
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

        /* Footer */
        .footer {
            background: #0a1a0a;
            color: #94a3b8;
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
            color: #94a3b8;
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
            .detail-layout { grid-template-columns: 1fr; }
            .container { padding: 30px 20px 50px; }
            .main-image { height: 350px; }
            .annonce-title { font-size: 28px; }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
            .details-grid-premium { grid-template-columns: 1fr; }
            .seller-stats-grid { grid-template-columns: repeat(3, 1fr); }
        }

        @media (max-width: 600px) {
            .annonce-title { font-size: 24px; }
            .price-premium { font-size: 28px; }
            .main-image { height: 280px; }
            .thumbnail { width: 65px; height: 65px; }
            .detail-card { padding: 12px 16px; }
            .price-box-premium { flex-direction: column; text-align: center; }
            .annonce-meta { gap: 12px; }
            .modal-header h2 { font-size: 20px; }
            .modal-body { padding: 20px; }
            .modal-header { padding: 20px; }
            .meta-item { padding: 6px 12px; font-size: 12px; }
            .seller-stats-grid { grid-template-columns: 1fr; gap: 8px; }
            .seller-profile { flex-direction: column; text-align: center; align-items: center; }
            .seller-badges { justify-content: center; }
            .trust-section { flex-direction: column; }
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

    <!-- Affichage des messages flash -->
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
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/</span>
            <a href="{{ route('annonces.index') }}">Annonces</a>
            <span>/</span>
            <span>{{ Str::limit($annonce->titre, 50) }}</span>
        </div>

        <div class="detail-layout">
            <!-- Left Column -->
            <div class="detail-left">
                <!-- Image Gallery -->
                <div class="image-container">
                    @php
                        $photos = $annonce->photos->sortByDesc('est_principale');
                        $mainPhoto = $photos->first();
                        $mainImageUrl = $mainPhoto ? asset('storage/' . str_replace('storage/', '', $mainPhoto->chemin_stockage)) : asset('images/default.jpg');
                    @endphp
                    <div class="main-image" style="background-image: url('{{ $mainImageUrl }}');">
                        @if($annonce->etat == 'vendue')
                            <div class="image-badge sold">VENDU</div>
                        @elseif($annonce->utilisateur && $annonce->utilisateur->role === 'verifie')
                            <div class="image-badge verified">✓ Éleveur Vérifié</div>
                        @endif
                    </div>
                    
                    @if($photos->count() > 1)
                    <div class="thumbnail-gallery">
                        @foreach($photos as $photo)
                            @php
                                $thumbUrl = asset('storage/' . str_replace('storage/', '', $photo->chemin_stockage));
                            @endphp
                            <div class="thumbnail" style="background-image: url('{{ $thumbUrl }}');" onclick="changeMainImage('{{ $thumbUrl }}', this)"></div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Annonce Info -->
                <div class="annonce-info">
                    <h1 class="annonce-title">{{ $annonce->titre }}</h1>
                    
                    <div class="annonce-meta">
                        <div class="meta-item"><i class="fas fa-dove"></i> {{ $annonce->espece->nom_commun ?? 'Espèce' }}</div>
                        <div class="meta-item"><i class="fas fa-calendar-alt"></i> {{ $annonce->created_at->diffForHumans() }}</div>
                        <div class="meta-item"><i class="fas fa-map-marker-alt"></i> {{ $annonce->utilisateur->ville ?? 'France' }}</div>
                        <div class="meta-item"><i class="fas fa-eye"></i> {{ $annonce->nb_vues ?? 0 }} vues</div>
                    </div>

                    <!-- Details Grid Premium -->
                    <div class="details-grid-premium">
                        <div class="detail-card">
                            <span class="detail-label"><i class="fas fa-tag"></i> Catégorie</span>
                            <span class="detail-value">{{ $annonce->espece->categorie ?? 'Non spécifié' }}</span>
                        </div>
                        <div class="detail-card">
                            <span class="detail-label"><i class="fas fa-chart-line"></i> Difficulté</span>
                            <span class="detail-value">
                                @php
                                    $difficulte = $annonce->espece->difficulte_elevage ?? 1;
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $difficulte)
                                        <i class="fas fa-star" style="color: #fbbf24; font-size: 12px;"></i>
                                    @else
                                        <i class="far fa-star" style="color: #cbd5e1; font-size: 12px;"></i>
                                    @endif
                                @endfor
                            </span>
                        </div>
                        <div class="detail-card">
                            <span class="detail-label"><i class="fas fa-chart-simple"></i> Niveau requis</span>
                            <span class="detail-value">
                                @php
                                    $niveau = $annonce->espece->difficulte_elevage ?? 1;
                                    if($niveau <= 2) echo 'Débutant';
                                    elseif($niveau <= 4) echo 'Intermédiaire';
                                    else echo 'Expert';
                                @endphp
                            </span>
                        </div>
                        <div class="detail-card">
                            <span class="detail-label"><i class="fas fa-store"></i> Annonces actives</span>
                            <span class="detail-value">{{ $annonce->espece->nb_annonces_actives ?? 0 }}</span>
                        </div>
                    </div>

                    <!-- Price Box Premium -->
                    <div class="price-box-premium">
                        <div class="price-premium">{{ number_format($annonce->prix, 0, ',', ' ') }} €</div>
                        <div class="negotiable-premium">Négociable</div>
                    </div>

                    <!-- Description Premium -->
                    <div class="description-premium">
                        <p>{{ $annonce->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Seller Card Premium Amélioré -->
            <div class="seller-card-premium">
                <!-- Profile Section -->
                <div class="seller-profile">
                    <div class="seller-avatar-wrapper">
                        <div class="seller-avatar-premium">
                            {{ strtoupper(substr($annonce->utilisateur->prenom ?? 'U', 0, 1)) }}{{ strtoupper(substr($annonce->utilisateur->nom ?? 'U', 0, 1)) }}
                        </div>
                        @php $userRole = $annonce->utilisateur->role ?? 'standard'; @endphp
                        <div class="seller-status 
                            @if($userRole == 'verifie') status-verified
                            @elseif($userRole == 'admin') status-admin
                            @else status-standard @endif">
                        </div>
                    </div>
                    <div class="seller-info-premium">
                        <h4>{{ $annonce->utilisateur->prenom ?? 'Utilisateur' }} {{ $annonce->utilisateur->nom ?? '' }}</h4>
                        <div class="seller-badges">
                            @if($userRole == 'verifie')
                                <span class="badge-verified"><i class="fas fa-check-circle"></i> Vérifié</span>
                            @elseif($userRole == 'admin')
                                <span class="badge-admin"><i class="fas fa-crown"></i> Admin</span>
                            @endif
                            <span class="badge-member"><i class="fas fa-calendar-alt"></i> Membre {{ $annonce->utilisateur->created_at->format('Y') }}</span>
                        </div>
                        <div class="seller-rating-premium">
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <span>4.8 (128 avis)</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="seller-stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-store"></i></div>
                        <div class="stat-number">{{ $annonce->utilisateur->annonces()->where('etat', 'publiee')->count() ?? 0 }}</div>
                        <div class="stat-label">Annonces actives</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                        <div class="stat-number">{{ $annonce->utilisateur->created_at->format('M Y') ?? '2024' }}</div>
                        <div class="stat-label">Membre depuis</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-heart"></i></div>
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>

<!-- Contact Section -->
<div class="contact-section">
    @auth
        {{-- Vérifier si l'utilisateur connecté est le propriétaire de l'annonce --}}
        @if(Auth::id() === $annonce->user_id)
            {{-- C'est MON annonce --}}
            <div style="text-align: center; padding: 20px; background: #e8f0e6; border-radius: 20px;">
                <i class="fas fa-store" style="font-size: 40px; color: #2d6a4f; margin-bottom: 10px; display: block;"></i>
                <strong style="color: #2d6a4f;">Cette annonce est à vous</strong>
                <p style="color: #64748b; font-size: 13px; margin-top: 8px;">Vous êtes le propriétaire de cette annonce.</p>
                
                @if($annonce->etat !== 'vendue' && $annonce->etat === 'publiee')
                    <form action="{{ route('annonces.sold', $annonce->id) }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <button type="submit" style="padding: 10px 20px; background: #dc2626; color: white; border: none; border-radius: 40px; cursor: pointer;">
                            <i class="fas fa-check-circle"></i> Marquer comme vendue
                        </button>
                    </form>
                @elseif($annonce->etat === 'vendue')
                    <div style="margin-top: 15px; padding: 8px 16px; background: #dc2626; color: white; border-radius: 40px; display: inline-block;">
                        <i class="fas fa-sold-out"></i> ANNONCE VENDUE
                    </div>
                @endif
            </div>
        @else
            {{-- C'est l'annonce d'un autre utilisateur --}}
            @if($annonce->etat !== 'vendue')
                <button class="btn-contact-premium" onclick="openContactModal()">
                    <i class="fas fa-envelope"></i> Contacter le vendeur
                </button>
            @else
                <button class="btn-contact-premium" disabled style="opacity: 0.5; cursor: not-allowed;">
                    <i class="fas fa-envelope"></i> Annonce vendue
                </button>
            @endif
            
            <form action="{{ route('favoris.toggle', $annonce->id) }}" method="POST">
                @csrf
                @if($estFavori)
                    @method('DELETE')
                    <button type="submit" class="btn-favorite-premium active">
                        <i class="fas fa-heart"></i> Retirer des favoris
                    </button>
                @else
                    <button type="submit" class="btn-favorite-premium">
                        <i class="far fa-heart"></i> Ajouter aux favoris
                    </button>
                @endif
            </form>
        @endif
    @else
        {{-- Utilisateur non connecté --}}
        <button class="btn-contact-premium" onclick="window.location.href='{{ route('login') }}'">
            <i class="fas fa-envelope"></i> Connectez-vous pour contacter
        </button>
        <button class="btn-favorite-premium" onclick="window.location.href='{{ route('login') }}'">
            <i class="far fa-heart"></i> Connectez-vous pour favoris
        </button>
    @endauth
</div>

                <!-- Trust Section -->
                <div class="trust-section">
                    <div class="trust-badge">
                        <i class="fas fa-shield-alt"></i> Paiement sécurisé
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-handshake"></i> Rencontre recommandée
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-file-alt"></i> Documents officiels
                    </div>
                </div>

                <!-- Security Note -->
                <div class="security-note-premium">
                    <i class="fas fa-lock"></i> <strong>Conseil de sécurité</strong><br>
                    Privilégiez toujours la rencontre en personne et ne payez jamais à l'avance sans avoir vu l'oiseau.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Contact Premium -->
    <div class="modal" id="contactModal">
        <div class="modal-container">
            <div class="modal-header">
                <h2>Contacter {{ $annonce->utilisateur->prenom ?? 'le vendeur' }}</h2>
                <button class="modal-close" onclick="closeContactModal()">&times;</button>
            </div>
            <form action="{{ route('contacts.store', $annonce->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Votre nom complet</label>
                        <input type="text" name="nom" value="{{ Auth::user()->prenom ?? '' }} {{ Auth::user()->nom ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Votre email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Votre message</label>
                        <textarea name="message" placeholder="Bonjour, je suis intéressé par votre annonce. Est-elle toujours disponible ?" required></textarea>
                    </div>
                    <button type="submit" class="btn-send-premium">
                        <i class="fas fa-paper-plane"></i> Envoyer le message
                    </button>
                </div>
                <div class="modal-footer">
                    <i class="fas fa-shield-alt"></i> En contactant le vendeur, vous acceptez nos conditions d'utilisation et reconnaissez que vos coordonnées seront partagées avec l'annonceur.
                </div>
            </form>
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

        // Change main image on thumbnail click
        function changeMainImage(imageUrl, element) {
            document.querySelector('.main-image').style.backgroundImage = 'url(' + imageUrl + ')';
            
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            element.classList.add('active');
        }

        // Modal Contact functions
        function openContactModal() {
            document.getElementById('contactModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal when clicking outside
        document.getElementById('contactModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeContactModal();
            }
        });

        // Auto-hide alert message after 3 seconds
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