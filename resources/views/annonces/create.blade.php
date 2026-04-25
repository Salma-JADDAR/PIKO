{{-- resources/views/annonces/create.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Créer une annonce</title>
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

        /* Breadcrumb - Centré */
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

        /* Layout */
        .create-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 48px;
        }

        /* Left Column - Form */
        .form-column {
            background: white;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.05);
            border: 1px solid #f0f2f5;
        }

        .form-container {
            padding: 32px;
        }

        /* Form Header - Centré */
        .form-header {
            text-align: center;
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 1px solid #eef2f0;
        }
        .form-header h1 {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #0f172a, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        .form-header p {
            color: #64748b;
            font-size: 14px;
            max-width: 450px;
            margin: 0 auto;
        }

        /* Form Meta */
        .form-meta {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 28px;
            padding-bottom: 24px;
            border-bottom: 1px solid #eef2f0;
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

        /* Upload Zone */
        .upload-zone {
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fafcfa;
            margin-bottom: 16px;
        }
        .upload-zone:hover {
            border-color: #2d6a4f;
            background: #e8f0e6;
        }
        .upload-zone i {
            font-size: 48px;
            color: #86a788;
            margin-bottom: 12px;
        }
        .upload-zone p {
            margin-bottom: 6px;
            font-weight: 500;
            color: #334155;
        }
        .upload-zone small {
            font-size: 12px;
            color: #64748b;
        }
        .file-input {
            display: none;
        }

        /* Preview Grid */
        .preview-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
            margin-top: 20px;
        }
        .preview-card {
            aspect-ratio: 1;
            background: #f8fafc;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid #eef2f0;
            transition: all 0.3s;
            position: relative;
        }
        .preview-card.principal {
            border-color: #f59e0b;
            box-shadow: 0 0 0 2px rgba(245,158,11,0.2);
        }
        .preview-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .preview-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            opacity: 0;
            transition: opacity 0.2s;
        }
        .preview-card:hover .preview-overlay {
            opacity: 1;
        }
        .preview-icon {
            width: 34px;
            height: 34px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }
        .preview-icon.star {
            color: #f59e0b;
        }
        .preview-icon.star:hover {
            background: #f59e0b;
            color: white;
            transform: scale(1.1);
        }
        .preview-icon.trash {
            color: #dc2626;
        }
        .preview-icon.trash:hover {
            background: #dc2626;
            color: white;
            transform: scale(1.1);
        }
        .preview-badge {
            position: absolute;
            top: 6px;
            left: 6px;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(4px);
            color: white;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 20px;
            z-index: 2;
        }
        .preview-badge.principal-badge {
            background: #f59e0b;
        }
        .preview-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #94a3b8;
        }
        .preview-placeholder i {
            font-size: 24px;
            margin-bottom: 6px;
        }
        .preview-placeholder span {
            font-size: 10px;
        }

        .warning-text {
            font-size: 12px;
            color: #e67e22;
            margin-top: 8px;
        }
        .warning-text i {
            margin-right: 6px;
        }

        /* Photo Counter - Style amélioré */
        .photo-counter {
            margin-top: 15px;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        .photo-counter.error {
            background: #fee2e2;
            color: #dc2626;
            border-left: 3px solid #dc2626;
        }
        .photo-counter.warning {
            background: #fef3c7;
            color: #92400e;
            border-left: 3px solid #f59e0b;
        }
        .photo-counter.success {
            background: #e8f0e6;
            color: #2d6a4f;
            border-left: 3px solid #2d6a4f;
        }
        .photo-counter i {
            font-size: 16px;
        }

        /* Form Groups - Labels à gauche */
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 8px;
            text-align: left;
        }
        .form-group label i {
            color: #2d6a4f;
            margin-right: 6px;
        }
        .form-group label .required {
            color: #dc3545;
            margin-left: 4px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: all 0.3s;
            background: #fafcfa;
            text-align: left;
        }
        .form-group input:focus,
        .form-group select:focus,
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
        .char-counter {
            text-align: right;
            font-size: 11px;
            color: #94a3b8;
            margin-top: 6px;
        }
        .input-hint {
            font-size: 12px;
            color: #64748b;
            margin-top: 6px;
        }
        .input-hint i {
            margin-right: 4px;
        }
        .error-text {
            color: #dc3545;
            font-size: 12px;
            margin-top: 6px;
        }

        .price-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .price-input-wrapper span {
            position: absolute;
            left: 16px;
            font-weight: 600;
            color: #2d6a4f;
        }
        .price-input-wrapper input {
            padding-left: 36px;
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
        .detail-value select {
            border: none;
            background: transparent;
            font-weight: 700;
            color: #0f172a;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            font-size: 13px;
        }
        .price-input-inline {
            position: relative;
            display: inline-flex;
            align-items: center;
        }
        .price-input-inline span {
            position: absolute;
            left: 8px;
            font-weight: 600;
            color: #2d6a4f;
            font-size: 13px;
        }
        .price-input-inline input {
            width: 100px;
            padding: 4px 8px 4px 24px;
            border: none;
            background: transparent;
            font-weight: 700;
            color: #0f172a;
            text-align: right;
            font-size: 13px;
        }
        .price-input-inline input:focus {
            outline: none;
        }

        .required-notice {
            background: #fef3c7;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 12px;
            color: #92400e;
            margin-bottom: 24px;
            text-align: center;
        }
        .required-notice i {
            margin-right: 8px;
        }

        .form-actions {
            display: flex;
            justify-content:right;
            margin-top: 24px;
        }
        .btn-submit {
            padding: 10px 28px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border: none;
            border-radius: 40px;
            font-weight: 600;
            font-size: 13px;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(45,106,79,0.3);
        }

        /* Right Column - Info Card Améliorée avec image de fond */
        .info-card {
            background: linear-gradient(135deg, #0a1a0a 0%, #1a3a1a 100%);
            border-radius: 32px;
            padding: 32px;
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.2);
            position: sticky;
            top: 0px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.35;
            z-index: 0;
        }
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 40px -12px rgba(0,0,0,0.25);
        }
        .info-card > * {
            position: relative;
            z-index: 1;
        }
        .info-header {
            text-align: center;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .info-icon {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(8px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .info-icon i {
            font-size: 32px;
            color: #ffd966;
        }
        .info-header h3 {
            font-size: 20px;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        .info-header p {
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            line-height: 1.5;
        }
        .info-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }
        .stat-box {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(4px);
            border-radius: 16px;
            padding: 12px 8px;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.15);
        }
        .stat-box:hover {
            transform: translateY(-3px);
            background: rgba(255,255,255,0.2);
        }
        .stat-number {
            font-size: 22px;
            font-weight: 800;
            color: #ffd966;
        }
        .stat-label {
            font-size: 10px;
            color: rgba(255,255,255,0.7);
            margin-top: 4px;
        }
        .info-tips {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(4px);
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.15);
        }
        .info-tips h4 {
            font-size: 14px;
            font-weight: 700;
            color: #ffd966;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .info-tips h4 i {
            color: #ffd966;
        }
        .info-tips ul {
            list-style: none;
        }
        .info-tips li {
            font-size: 12px;
            color: rgba(255,255,255,0.8);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-tips li i {
            color: #86a788;
            font-size: 12px;
            width: 18px;
        }
        .info-tips li strong {
            color: #ffd966;
        }
        .info-security {
            background: rgba(0,0,0,0.3);
            backdrop-filter: blur(4px);
            border-radius: 16px;
            padding: 16px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.15);
        }
        .info-security i {
            font-size: 28px;
            color: #ffd966;
            margin-bottom: 8px;
            display: block;
        }
        .info-security p {
            font-size: 11px;
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            line-height: 1.4;
        }

        /* Alert Messages */
        .alert {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 12px 24px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 500;
            z-index: 2000;
            animation: slideIn 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
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
            .create-layout { grid-template-columns: 1fr; }
            .container { padding: 30px 20px 50px; }
            .info-card { position: static; margin-top: 30px; }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
            .details-grid-premium { grid-template-columns: 1fr; }
        }

        @media (max-width: 600px) {
            .preview-grid { gap: 8px; }
            .form-actions { flex-direction: column; align-items: stretch; }
            .btn-submit { justify-content: center; }
            .preview-placeholder i { font-size: 18px; }
            .preview-placeholder span { font-size: 8px; }
            .preview-icon { width: 28px; height: 28px; font-size: 12px; }
            .form-container { padding: 20px; }
            .form-meta { gap: 12px; }
            .meta-item { padding: 6px 12px; font-size: 12px; }
            .info-stats { grid-template-columns: repeat(3, 1fr); }
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

    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <span>/</span>
            <a href="{{ route('annonces.index') }}">Annonces</a>
            <span>/</span>
            <span>Créer une annonce</span>
        </div>

        <div class="create-layout">
            <!-- Left Column - Formulaire -->
            <div class="form-column">
                <div class="form-container">
                    <div class="form-header">
                        <h1>Créer une annonce</h1>
                        <p>Des annonces détaillées attirent les acheteurs les plus exigeants. Mettez en valeur l'origine unique de votre oiseau.</p>
                    </div>

                    <div class="form-meta">
                        <div class="meta-item"><i class="fas fa-check-circle"></i> Publication gratuite</div>
                        <div class="meta-item"><i class="fas fa-shield-alt"></i> Validation par nos experts</div>
                        <div class="meta-item"><i class="fas fa-chart-line"></i> Visibilité maximale</div>
                    </div>

                    <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data" id="annonceForm">
                        @csrf

                        <!-- Section Photos -->
                        <div class="form-group">
                            <label><i class="fas fa-camera"></i> Sanctuaire visuel <span class="required">*</span></label>
                            
                            <div class="upload-zone" id="uploadZone">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Cliquez ou glissez vos photos</p>
                                <small>JPEG, PNG jusqu'à 2MB · Max 5 photos</small>
                                <input type="file" name="photos[]" id="fileInput" class="file-input" multiple accept="image/jpeg,image/png,image/jpg">
                            </div>

                            <div class="warning-text">
                                <i class="fas fa-info-circle"></i> Veuillez inclure au moins une photographie claire de l'oiseau
                            </div>

                            <div class="preview-grid" id="previewGrid"></div>

                            <!-- Compteur de photos intelligent -->
                            <div id="photoCounter" class="photo-counter"></div>

                            @error('photos')
                                <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                            @error('photos.*')
                                <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Titre -->
                        <div class="form-group">
                            <label><i class="fas fa-heading"></i> Titre de l'annonce <span class="required">*</span></label>
                            <input type="text" name="titre" id="titre" maxlength="60" value="{{ old('titre') }}" placeholder="e.g. Majestic Emerald Green Macaw - Proven Breeder">
                            <div class="input-hint">
                                <i class="fas fa-lightbulb"></i> Soyez descriptif(ve) et mentionnez les traits principaux.
                            </div>
                            <div class="char-counter">
                                <span id="charCount">0</span> / 80 caractères
                            </div>
                            @error('titre') <div class="error-text">{{ $message }}</div> @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label><i class="fas fa-align-left"></i> Le récit (description) <span class="required">*</span></label>
                            <textarea name="description" placeholder="Racontez l'histoire de cet oiseau. Décrivez son tempérament, son régime alimentaire, ses vocalisations et sa lignée...">{{ old('description') }}</textarea>
                            <div class="input-hint">
                                <i class="fas fa-info-circle"></i> La description est obligatoire afin d'aider les acheteurs à comprendre l'historique de l'oiseau.
                            </div>
                            @error('description') <div class="error-text">{{ $message }}</div> @enderror
                        </div>

                        <!-- Details Grid Premium -->
                        <div class="details-grid-premium">
                            <div class="detail-card">
                                <span class="detail-label"><i class="fas fa-dove"></i> Espèce d'oiseau</span>
                                <div class="detail-value">
                                    <select name="espece_id">
                                        <option value="">Sélectionnez une espèce</option>
                                        @foreach($especes as $espece)
                                            <option value="{{ $espece->id }}" {{ old('espece_id') == $espece->id ? 'selected' : '' }}>
                                                {{ $espece->nom_commun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('espece_id') <div class="error-text">{{ $message }}</div> @enderror
                            </div>
                            <div class="detail-card">
                                <span class="detail-label"><i class="fas fa-euro-sign"></i> Investissement (Prix)</span>
                                <div class="detail-value">
                                    <div class="price-input-inline">
                                        <span>€</span>
                                        <input type="number" name="prix" step="0.01" min="0" value="{{ old('prix') }}" placeholder="0.00">
                                    </div>
                                </div>
                                @error('prix') <div class="error-text">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="required-notice">
                            <i class="fas fa-info-circle"></i> La description est obligatoire afin d'aider les acheteurs à comprendre l'historique de l'oiseau.
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Soumettre pour approbation
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column - Info Card Améliorée avec image de fond -->
            <div class="info-card">
                <div class="info-header">
                    <div class="info-icon">
                        <i class="fas fa-feather-alt"></i>
                    </div>
                    <h3>Guide de création</h3>
                    <p>Maximisez l'impact de votre annonce</p>
                </div>

                <div class="info-stats">
                    <div class="stat-box">
                        <div class="stat-number">+40%</div>
                        <div class="stat-label">de vues avec 5 photos</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">+60%</div>
                        <div class="stat-label">de contacts avec description</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">24h</div>
                        <div class="stat-label">validation moyenne</div>
                    </div>
                </div>

                <div class="info-tips">
                    <h4><i class="fas fa-star"></i> Conseils d'experts</h4>
                    <ul>
                        <li><i class="fas fa-camera"></i> <strong>5 photos minimum</strong> recommandées pour maximiser l'engagement</li>
                        <li><i class="fas fa-pen-fancy"></i> <strong>Description détaillée</strong> du caractère et des habitudes</li>
                        <li><i class="fas fa-chart-line"></i> <strong>Prix compétitif</strong> étudié par rapport au marché</li>
                        <li><i class="fas fa-tag"></i> <strong>Espèce correctement</strong> identifiée pour un meilleur ciblage</li>
                        <li><i class="fas fa-heart"></i> <strong>Soins spécifiques</strong> à mentionner pour rassurer l'acheteur</li>
                    </ul>
                </div>

                <div class="info-security">
                    <i class="fas fa-shield-alt"></i>
                    <p>Votre annonce sera vérifiée par notre équipe avant publication. Nous garantissons la qualité et la légitimité de chaque annonce.</p>
                </div>
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
        }, 3000);

        // Character counter
        const titreInput = document.getElementById('titre');
        const charCountSpan = document.getElementById('charCount');
        if (titreInput) {
            titreInput.addEventListener('input', function() {
                charCountSpan.textContent = this.value.length;
            });
            charCountSpan.textContent = titreInput.value.length;
        }

        // ========== GESTION DES PHOTOS AVEC COMPTEUR INTELLIGENT ==========
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = document.getElementById('fileInput');
        const previewGrid = document.getElementById('previewGrid');
        const photoCounter = document.getElementById('photoCounter');
        
        let selectedFiles = [];
        let primaryIndex = 0;

        // Fonction pour mettre à jour le compteur avec messages intelligents
        function updatePhotoCounter() {
            const count = selectedFiles.length;
            const remaining = 5 - count;
            
            // Supprimer toutes les classes existantes
            photoCounter.classList.remove('error', 'warning', 'success');
            
            if (count === 0) {
                photoCounter.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Aucune photo sélectionnée — Minimum 1 photo requise';
                photoCounter.classList.add('error');
            } else if (count === 1) {
                photoCounter.innerHTML = `<i class="fas fa-camera"></i>  ${count}/5 photo — Encore ${remaining} photo${remaining > 1 ? 's' : ''} à ajouter (recommandé)`;
                photoCounter.classList.add('warning');
            } else if (count === 2) {
                photoCounter.innerHTML = `<i class="fas fa-camera"></i>  ${count}/5 photos — Encore ${remaining} photos à ajouter (recommandé)`;
                photoCounter.classList.add('warning');
            } else if (count === 3) {
                photoCounter.innerHTML = `<i class="fas fa-camera"></i>  ${count}/5 photos — Encore ${remaining} photos, vous y êtes presque !`;
                photoCounter.classList.add('warning');
            } else if (count === 4) {
                photoCounter.innerHTML = `<i class="fas fa-camera"></i>  ${count}/5 photos — Plus qu'une seule photo pour le maximum !`;
                photoCounter.classList.add('warning');
            } else if (count === 5) {
                photoCounter.innerHTML = '<i class="fas fa-check-circle"></i> Parfait ! Vous avez atteint le maximum de 5 photos';
                photoCounter.classList.add('success');
            }
        }

        uploadZone.addEventListener('click', () => fileInput.click());

        uploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadZone.style.borderColor = '#2d6a4f';
            uploadZone.style.background = '#e8f0e6';
        });

        uploadZone.addEventListener('dragleave', () => {
            uploadZone.style.borderColor = '#cbd5e1';
            uploadZone.style.background = '#fafcfa';
        });

        uploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadZone.style.borderColor = '#cbd5e1';
            uploadZone.style.background = '#fafcfa';
            handleFiles(Array.from(e.dataTransfer.files));
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(Array.from(e.target.files));
        });

        function handleFiles(files) {
            const imageFiles = files.filter(f => f.type.startsWith('image/'));
            const newFiles = [...selectedFiles, ...imageFiles].slice(0, 5);
            
            if (newFiles.length !== selectedFiles.length + imageFiles.length && imageFiles.length > 0) {
                alert('Vous ne pouvez télécharger que 5 photos maximum.');
            }
            
            selectedFiles = newFiles;
            
            if (primaryIndex >= selectedFiles.length && selectedFiles.length > 0) {
                primaryIndex = 0;
            }
            
            updateFileInput();
            renderPreviews();
            updatePhotoCounter(); // Mettre à jour le compteur
        }

        function updateFileInput() {
            const dt = new DataTransfer();
            selectedFiles.forEach(f => dt.items.add(f));
            fileInput.files = dt.files;
        }

        function renderPreviews() {
            previewGrid.innerHTML = '';
            
            for (let i = 0; i < 5; i++) {
                const card = document.createElement('div');
                card.className = 'preview-card';
                if (i < selectedFiles.length) {
                    if (primaryIndex === i) {
                        card.classList.add('principal');
                    }
                    
                    const file = selectedFiles[i];
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        card.innerHTML = `
                            <div class="preview-image" style="background-image: url('${e.target.result}');">
                                ${primaryIndex === i ? '<div class="preview-badge principal-badge"><i class="fas fa-crown"></i> Principale</div>' : '<div class="preview-badge">Photo ' + (i + 1) + '</div>'}
                                <div class="preview-overlay">
                                    ${primaryIndex !== i ? `<div class="preview-icon star" data-index="${i}"><i class="fas fa-star"></i></div>` : ''}
                                    <div class="preview-icon trash" data-index="${i}"><i class="fas fa-trash-alt"></i></div>
                                </div>
                            </div>
                        `;
                        previewGrid.appendChild(card);
                        
                        const starBtn = card.querySelector('.star');
                        if (starBtn) {
                            starBtn.addEventListener('click', () => {
                                primaryIndex = i;
                                renderPreviews();
                            });
                        }
                        
                        const trashBtn = card.querySelector('.trash');
                        trashBtn.addEventListener('click', () => {
                            selectedFiles.splice(i, 1);
                            if (primaryIndex === i) {
                                primaryIndex = selectedFiles.length > 0 ? 0 : -1;
                            } else if (primaryIndex > i) {
                                primaryIndex--;
                            }
                            updateFileInput();
                            renderPreviews();
                            updatePhotoCounter(); // Mettre à jour le compteur après suppression
                        });
                    };
                    reader.readAsDataURL(file);
                } else {
                    card.innerHTML = `
                        <div class="preview-placeholder">
                            <i class="fas fa-plus-circle"></i>
                            <span>Photo ${i + 1}</span>
                        </div>
                    `;
                    previewGrid.appendChild(card);
                }
            }
        }

        // Validation avant soumission
        const form = document.getElementById('annonceForm');
        form.addEventListener('submit', function(e) {
            if (selectedFiles.length === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins une photo.');
                return false;
            }
            
            const principalInput = document.createElement('input');
            principalInput.type = 'hidden';
            principalInput.name = 'photo_principale_index';
            principalInput.value = primaryIndex;
            form.appendChild(principalInput);
            
            return true;
        });
    </script>
</body>
</html>