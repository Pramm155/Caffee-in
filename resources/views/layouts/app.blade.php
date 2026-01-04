<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Cafe KOPI IN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --kopi-coklat: #8B4513;
            --kopi-coklat-muda: #A0522D;
            --kopi-krem: #F5DEB3;
            --kopi-coklat-tua: #5D2906;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f5f0;
            padding-top: 0;
            margin-top: 0;
            position: relative;
            min-height: 100vh;
        }
        
        /* Background Pattern dengan Icons Kopi */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                /* Row 1 */
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                /* Row 2 */
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                /* Row 3 */
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='%235d2906' stroke-width='0.3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M18 8h1a4 4 0 0 1 0 8h-1'/%3E%3Cpath d='M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z'/%3E%3Cline x1='6' y1='1' x2='6' y2='4'/%3E%3Cline x1='10' y1='1' x2='10' y2='4'/%3E%3Cline x1='14' y1='1' x2='14' y2='4'/%3E%3C/svg%3E");
            background-position: 
                10% 10%, 50% 10%, 90% 10%,
                10% 50%, 50% 50%, 90% 50%,
                10% 50%, 50% 50%, 90% 50%,
                10% 90%, 50% 90%, 90% 90%,
                10% 90%, 50% 90%, 90% 90%;
            background-repeat: no-repeat;
            background-size: 40px 40px;
            opacity: 0.5;
            z-index: -1;
            pointer-events: none;
        }
        
        /* NAVBAR FULL COKLAT TUA */
        .navbar-kopi {
            background: var(--kopi-coklat-tua) !important;
            border-radius: 0 !important;
            margin-bottom: 0 !important;
            box-shadow: 0 4px 20px rgba(93, 41, 6, 0.3);
            padding: 15px 0;
            border-bottom: 3px solid var(--kopi-coklat);
            position: sticky;
            top: 0;
            z-index: 1030;
            width: 100%;
        }
        
        .navbar-kopi .container {
            max-width: 1200px;
            padding: 0 15px;
        }
        
        .navbar-brand-kopi {
            color: var(--kopi-krem) !important;
            font-weight: 700;
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-brand-kopi:hover {
            color: white !important;
        }
        
        .nav-link-kopi {
            color: rgba(245, 222, 179, 0.9) !important;
            transition: all 0.3s;
            font-weight: 500;
            padding: 8px 15px !important;
            border-radius: 8px;
        }
        
        .nav-link-kopi:hover {
            color: white !important;
            background-color: rgba(139, 69, 19, 0.3);
        }
        
        .nav-link-kopi.active {
            color: white !important;
            background-color: var(--kopi-coklat);
            font-weight: 600;
        }
        
        .navbar-toggler {
            border: 1px solid var(--kopi-krem);
            padding: 5px 10px;
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px rgba(245, 222, 179, 0.5);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28245, 222, 179, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* END NAVBAR STYLES */
        
        .btn-kopi {
            background: var(--kopi-coklat);
            color: white;
            border: none;
            transition: all 0.3s;
            padding: 10px 20px;
            font-weight: 500;
            border-radius: 8px;
        }
        
        .btn-kopi:hover {
            background: var(--kopi-coklat-muda);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }
        
        .btn-outline-kopi {
            border: 2px solid var(--kopi-coklat);
            color: var(--kopi-coklat);
            background: transparent;
            font-weight: 500;
            padding: 8px 20px;
            border-radius: 8px;
        }

        .btn-outline-kopi:hover {
            background: var(--kopi-coklat);
            color: white;
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid var(--kopi-coklat-tua);
        }
        
        .menu-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
            background: white;
            position: relative;
            z-index: 1;
        }
        
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(139, 69, 19, 0.15);
        }
        
        .menu-img-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .menu-card:hover .menu-img {
            transform: scale(1.1);
        }
        
        .price-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--kopi-coklat);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        .product-link {
            color: var(--kopi-coklat-tua);
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
        }

        .product-link:hover {
            color: var(--kopi-coklat);
            text-decoration: underline;
        }

        .menu-img-container a {
            display: block;
            height: 100%;
        }

        .menu-img-container a:hover .menu-img {
            transform: scale(1.05);
        }
        
        .category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--kopi-krem);
            color: var(--kopi-coklat-tua);
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        
        .cart-sidebar {
            position: fixed;
            right: -400px;
            top: 0;
            height: 100vh;
            width: 380px;
            background: white;
            box-shadow: -5px 0 25px rgba(0,0,0,0.1);
            z-index: 1050;
            padding: 20px;
            overflow-y: auto;
            transition: right 0.4s ease;
        }
        
        .cart-sidebar.show {
            right: 0;
        }
        
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }
        
        .cart-overlay.show {
            display: block;
        }
        
        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }
        
        .cart-item-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--kopi-krem);
        }
        
        .delete-btn-cart {
            color: #dc3545;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .delete-btn-cart:hover {
            color: #c82333;
        }
        
        .delete-btn-history {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .delete-btn-history:hover {
            background: #c82333;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-diproses {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .status-selesai {
            background: #d4edda;
            color: #155724;
        }
        
        footer {
            background: var(--kopi-coklat-tua);
            color: var(--kopi-krem);
            padding: 30px 0;
            margin-top: 50px;
            border-radius: 10px 10px 0 0;
            position: relative;
            z-index: 1;
        }
        
        /* Additional background icons in main content */
        .container {
            position: relative;
            z-index: 1;
        }
        
        /* Floating background icons */
        .floating-icon {
            position: fixed;
            opacity: 0.10;
            z-index: 3;
            pointer-events: none;
            font-size: 3rem;
            color: var(--kopi-coklat-tua);
            animation: float 20s infinite linear;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) rotate(5deg);
            }
            50% {
                transform: translateY(0) rotate(10deg);
            }
            75% {
                transform: translateY(20px) rotate(5deg);
            }
        }

        /* STICKY FOOTER  */
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
            padding-bottom: 50px;
        }

        footer {
            flex-shrink: 0;
            width: 100%;
            position: relative;
            margin-top: auto; 
        }

        .footer-content {
            min-height: 60px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .navbar-collapse {
                background: var(--kopi-coklat-tua);
                padding: 15px;
                border-radius: 0 0 10px 10px;
                margin-top: 10px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
            
            .nav-item {
                margin: 5px 0;
            }
            
            .btn-kopi {
                width: 100%;
                margin-top: 10px;
            }
            
            body::before {
                opacity: 0.03;
                background-size: 30px 30px;
            }
        }
        
        @media (max-width: 768px) {
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .navbar-brand-kopi {
                font-size: 1.3rem;
            }
            
            /* Hide floating icons on mobile */
            .floating-icon {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Background Icons -->
    <i class="bi bi-cup-hot floating-icon" style="top: 10%; left: 5%; animation-delay: 0s;"></i>
    <i class="bi bi-cup-straw floating-icon" style="top: 20%; right: 10%; animation-delay: 2s;"></i>
    <i class="bi bi-egg-fried floating-icon" style="bottom: 30%; left: 15%; animation-delay: 4s;"></i>
    <i class="bi bi-ice-cream floating-icon" style="top: 40%; right: 20%; animation-delay: 6s;"></i>
    <i class="bi bi-cake2 floating-icon" style="bottom: 20%; left: 80%; animation-delay: 8s;"></i>
    <i class="bi bi-cup floating-icon" style="top: 70%; right: 5%; animation-delay: 10s;"></i>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-kopi">
        <div class="container">
            <a class="navbar-brand navbar-brand-kopi" href="{{ route('home') }}">
                <i class="bi bi-cup-hot-fill me-2"></i>Cafe KOPI IN
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link nav-link-kopi {{ request()->is('/') ? 'active' : '' }}" 
                        href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link nav-link-kopi {{ request()->is('menu*') ? 'active' : '' }}" 
                        href="{{ route('menu.index') }}">
                            <i class="bi bi-menu-button-wide me-1"></i> Menu
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link nav-link-kopi {{ request()->is('orders/history') ? 'active' : '' }}" 
                        href="{{ route('orders.history') }}">
                            <i class="bi bi-clock-history me-1"></i> Riwayat
                        </a>
                    </li>
                    <li class="nav-item mx-2 position-relative">
                        <button class="btn btn-kopi" onclick="toggleCart()">
                            <i class="bi bi-cart3 me-1"></i> Keranjang
                            <span id="cart-count" class="cart-badge">0</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>

    <!-- Cart Sidebar -->
    <div id="cart-overlay" class="cart-overlay" onclick="toggleCart()"></div>
    <div id="cart-sidebar" class="cart-sidebar">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-kopi-coklat">
                <i class="bi bi-cart3 me-2"></i> Keranjang Belanja
            </h4>
            <button type="button" class="btn-close" onclick="toggleCart()"></button>
        </div>
        
        <div id="cart-items">
            <!-- Cart items will be loaded here -->
        </div>
        
        <div class="cart-total mt-4 mb-4">
            <div class="d-flex justify-content-between align-items-center p-3" 
                 style="background-color: var(--kopi-krem); border-radius: 10px;">
                <h5 class="mb-0 fw-bold">Total:</h5>
                <h4 class="mb-0 fw-bold" id="cart-total">Rp 0</h4>
            </div>
        </div>
        
        <form id="order-form" action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label fw-bold">
                    <i class="bi bi-person-fill me-1"></i> Nama Pelanggan
                </label>
                <input type="text" class="form-control" 
                       id="nama_pelanggan" name="nama_pelanggan" 
                       placeholder="Masukkan nama Anda" required>
            </div>
            
            <div class="mb-4">
                <label for="nomor_meja" class="form-label fw-bold">
                    <i class="bi bi-geo-alt-fill me-1"></i> Nomor Meja (Opsional)
                </label>
                <input type="text" class="form-control" 
                       id="nomor_meja" name="nomor_meja" 
                       placeholder="Contoh: A1, B2">
            </div>
            
            <button type="submit" class="btn btn-kopi w-100 mb-3" style="padding: 12px;">
                <i class="bi bi-check-circle-fill me-2"></i> Buat Pesanan
            </button>
        </form>
        
        <button class="btn btn-outline-danger w-100" onclick="clearCart()">
            <i class="bi bi-trash-fill me-2"></i> Kosongkan Keranjang
        </button>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-cup-hot-fill me-2"></i>Cafe KOPI IN
                    </h5>
                    <p class="mb-0">Sistem Pemesanan Online untuk Kenyamanan Anda</p>
                </div>
                
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <p class="mb-1">
                        <i class="bi bi-geo-alt me-2"></i> 
                        Jl. Godean 55293 Gamping Daerah Istimewa Yogyakarta
                    </p>
                    <p class="mb-1">
                        <i class="bi bi-telephone me-2"></i> 
                        +62 812-2755-1111
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-clock me-2"></i> 
                        08:00 - 22:00 WIB
                    </p>
                </div>
                
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold mb-3">Sistem</h5>
                    <p class="mb-0">
                        Pesan online, bayar di kasir. 
                        Nikmati kopi terbaik tanpa antrian panjang.
                    </p>
                </div>
            </div>
            <hr style="border-color: rgba(245, 222, 179, 0.3);">
            <div class="text-center mt-3">
                <p class="mb-0">&copy; {{ date('Y') }} Cafe KOPI IN - Sistem Pemesanan Online</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cart Management System
        let cart = JSON.parse(localStorage.getItem('kopi_in_cart')) || [];
        
        // Update cart count
        function updateCartCount() {
            const count = cart.reduce((sum, item) => sum + item.jumlah, 0);
            document.getElementById('cart-count').textContent = count;
        }
        
        // Update cart display
        function updateCartDisplay() {
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center py-5">
                        <i class="bi bi-cart-x" style="font-size: 3rem; color: #ccc;"></i>
                        <h5 class="text-muted mt-3">Keranjang kosong</h5>
                        <p class="text-muted">Tambahkan menu favorit Anda</p>
                    </div>
                `;
                cartTotal.textContent = 'Rp 0';
                return;
            }
            
            let html = '';
            let total = 0;
            
            cart.forEach((item, index) => {
                const subtotal = item.harga * item.jumlah;
                total += subtotal;
                
                html += `
                    <div class="cart-item">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img src="${item.gambar}" 
                                     alt="${item.nama_menu}" 
                                     class="cart-item-img">
                            </div>
                            <div class="col-6">
                                <h6 class="mb-1 fw-bold">${item.nama_menu}</h6>
                                <p class="text-muted mb-1">Rp ${item.harga.toLocaleString()}</p>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-sm btn-outline-secondary" 
                                            onclick="updateQuantity(${index}, -1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <span class="mx-2 fw-bold">${item.jumlah}</span>
                                    <button class="btn btn-sm btn-outline-secondary" 
                                            onclick="updateQuantity(${index}, 1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <p class="fw-bold text-success mb-1">Rp ${subtotal.toLocaleString()}</p>
                                <button class="btn btn-sm btn-outline-danger" 
                                        onclick="removeFromCart(${index})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            cartItems.innerHTML = html;
            cartTotal.textContent = 'Rp ' + total.toLocaleString();
        }
        
        function addToCart(menuId, namaMenu, harga, gambar) {
            const existingItem = cart.find(item => item.menu_id == menuId);
            
            if (existingItem) {
                existingItem.jumlah++;
            } else {
                cart.push({
                    menu_id: menuId,
                    nama_menu: namaMenu,
                    harga: harga,
                    gambar: gambar,
                    jumlah: 1
                });
            }
            
            localStorage.setItem('kopi_in_cart', JSON.stringify(cart));
            updateCartCount();
            
            // Show custom notification for product detail page
            if (typeof showProductAddedNotification === 'function') {
                showProductAddedNotification(namaMenu);
            } else {
                showNotification(`${namaMenu} ditambahkan ke keranjang!`);
            }
            
            // Auto show cart if not visible
            if (!document.getElementById('cart-sidebar').classList.contains('show')) {
                toggleCart();
            } else {
                updateCartDisplay();
            }
        }
        
        // Update quantity
        function updateQuantity(index, change) {
            cart[index].jumlah += change;
            
            if (cart[index].jumlah <= 0) {
                cart.splice(index, 1);
                showNotification('Item dihapus dari keranjang');
            } else {
                showNotification(`Jumlah ${cart[index].nama_menu}: ${cart[index].jumlah}`);
            }
            
            localStorage.setItem('kopi_in_cart', JSON.stringify(cart));
            updateCartCount();
            updateCartDisplay();
        }
        
        // Remove item from cart (DELETE DI KERANJANG)
        function removeFromCart(index) {
            const itemName = cart[index].nama_menu;
            if (confirm(`Hapus ${itemName} dari keranjang?`)) {
                cart.splice(index, 1);
                localStorage.setItem('kopi_in_cart', JSON.stringify(cart));
                updateCartCount();
                updateCartDisplay();
                showNotification(`${itemName} dihapus dari keranjang`);
            }
        }
        
        // Clear cart
        function clearCart() {
            if (cart.length === 0) {
                showNotification('Keranjang sudah kosong');
                return;
            }
            
            if (confirm('Yakin ingin mengosongkan keranjang?')) {
                cart = [];
                localStorage.removeItem('kopi_in_cart');
                updateCartCount();
                updateCartDisplay();
                showNotification('Keranjang berhasil dikosongkan');
            }
        }
        
        // Toggle cart sidebar
        function toggleCart() {
            const sidebar = document.getElementById('cart-sidebar');
            const overlay = document.getElementById('cart-overlay');
            
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            } else {
                updateCartDisplay();
                sidebar.classList.add('show');
                overlay.classList.add('show');
            }
        }
        
        // Show notification
        function showNotification(message) {
            // Remove existing notification
            const existingNotification = document.querySelector('.notification-toast');
            if (existingNotification) {
                existingNotification.remove();
            }
            
            // Create new notification
            const notification = document.createElement('div');
            notification.className = 'alert alert-success position-fixed notification-toast';
            notification.style.cssText = `
                top: 80px;
                right: 20px;
                z-index: 1100;
                min-width: 300px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            `;
            notification.innerHTML = `
                <i class="bi bi-check-circle-fill me-2"></i> ${message}
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 3000);
        }
        
        // Initialize cart on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
            updateCartDisplay();
            
            // Handle order form submission
            const orderForm = document.getElementById('order-form');
            if (orderForm) {
                orderForm.addEventListener('submit', function(e) {
                    if (cart.length === 0) {
                        e.preventDefault();
                        showNotification('Keranjang kosong! Tambahkan menu terlebih dahulu.');
                        toggleCart();
                        return;
                    }
                    
                    if (!document.getElementById('nama_pelanggan').value.trim()) {
                        e.preventDefault();
                        showNotification('Harap isi nama pelanggan!');
                        return;
                    }
                    
                    // Add cart items to form data
                    const cartInput = document.createElement('input');
                    cartInput.type = 'hidden';
                    cartInput.name = 'cart_items';
                    cartInput.value = JSON.stringify(cart);
                    this.appendChild(cartInput);
                    
                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Memproses...';
                    submitBtn.disabled = true;
                    
                    // Auto clear cart after successful order
                    localStorage.removeItem('kopi_in_cart');
                    cart = [];
                    updateCartCount();
                });
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>