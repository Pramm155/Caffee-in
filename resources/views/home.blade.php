@extends('layouts.app')

@section('title', 'Cafe KOPI IN - Home')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center py-5 rounded position-relative overflow-hidden" 
                 style="background: linear-gradient(rgba(139, 69, 19, 0.85), rgba(93, 41, 6, 0.85)), 
                        url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
                        background-size: cover; 
                        background-position: center; 
                        border-radius: 15px;">
                
                <!-- Background Icons -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.1;">
                    <div style="position: absolute; top: 10%; left: 5%;">
                        <i class="bi bi-cup-hot" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; top: 20%; right: 10%;">
                        <i class="bi bi-cup-straw" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; top: 40%; left: 15%;">
                        <i class="bi bi-egg-fried" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; bottom: 30%; right: 20%;">
                        <i class="bi bi-cake2" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; bottom: 15%; left: 25%;">
                        <i class="bi bi-cup-hot" style="font-size: 1.5rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; top: 60%; right: 15%;">
                        <i class="bi bi-cup-straw" style="font-size: 1.5rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; bottom: 40%; left: 10%;">
                        <i class="bi bi-egg-fried" style="font-size: 1.5rem; color: white;"></i>
                    </div>
                    <div style="position: absolute; top: 25%; right: 25%;">
                        <i class="bi bi-cake2" style="font-size: 1.5rem; color: white;"></i>
                    </div>
                </div>
                
                <div class="position-relative z-1">
                    <h1 class="display-5 fw-bold text-white mb-3">Selamat Datang di Cafe KOPI IN</h1>
                    <p class="lead text-white mb-4">Rasakan kenikmatan kopi terbaik dengan suasana yang nyaman</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-cup-hot me-2"></i> Lihat Menu Lengkap
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Produk Terlaris -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-4" style="color: var(--kopi-coklat);">
                <i class="bi bi-star-fill me-2"></i>Produk Terlaris
            </h2>
        </div>
        
        <div class="row g-4">
            @foreach($bestSellers as $menu)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="menu-card h-100">
                    <div class="menu-img-container">
                        <a href="{{ route('menu.show', $menu->id) }}" class="text-decoration-none">
                            <img src="{{ $menu->gambar_url }}" 
                                 class="menu-img" 
                                 alt="{{ $menu->nama_menu }}"
                                 onerror="this.onerror=null; this.src='{{ asset('images/default-menu.png') }}'">
                        </a>
                        
                        <div class="price-tag">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </div>
                        
                        <div class="category-badge">
                            {{ ucfirst($menu->kategori) }}
                        </div>
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2" style="min-height: 48px;">
                            <a href="{{ route('menu.show', $menu->id) }}" 
                               class="product-link text-decoration-none">
                                {{ $menu->nama_menu }}
                            </a>
                        </h5>
                        <p class="card-text text-muted small mb-3 flex-grow-1" style="min-height: 40px;">
                            {{ Str::limit($menu->deskripsi, 80) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                            <a href="{{ route('menu.show', $menu->id) }}" 
                               class="btn btn-sm btn-outline-kopi px-3">
                                <i class="bi bi-eye me-1"></i> Detail
                            </a>
                            
                            @if($menu->tersedia)
                            <button class="btn btn-sm btn-kopi px-3" 
                                    onclick="addToCart({{ $menu->id }}, '{{ addslashes($menu->nama_menu) }}', {{ $menu->harga }}, '{{ $menu->gambar_url }}')">
                                <i class="bi bi-cart-plus me-1"></i> Tambah
                            </button>
                            @else
                            <span class="badge bg-danger px-3 py-2">
                                <i class="bi bi-x-circle me-1"></i> Habis
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if($bestSellers->isEmpty())
            <div class="col-12 text-center py-5">
                <i class="bi bi-cup" style="font-size: 4rem; color: #ccc;"></i>
                <h4 class="text-muted mt-3">Belum ada produk terlaris</h4>
                <p class="text-muted">Silakan lihat menu lengkap kami</p>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Kategori Menu -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-4" style="color: var(--kopi-coklat);">
                <i class="bi bi-grid-3x3-gap-fill me-2"></i>Kategori Menu
            </h2>
        </div>
        
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <a href="{{ route('menu.index') }}?category={{ $category }}" 
                   class="text-decoration-none h-100">
                    <div class="card text-center border-0 shadow-sm h-100" 
                         style="background-color: var(--kopi-krem); transition: all 0.3s ease;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center py-5">
                            <div class="mb-3">
                                @if($category == 'kopi')
                                <i class="bi bi-cup-hot-fill" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                                @elseif($category == 'non-kopi')
                                <i class="bi bi-cup-straw" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                                @elseif($category == 'makanan')
                                <i class="bi bi-egg-fried" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                                @elseif($category == 'dessert')
                                <!-- Icon dessert yang lebih spesifik -->
                                <i class="bi bi-ice-cream" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                                @else
                                <i class="bi bi-cup" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                                @endif
                            </div>
                            <h5 class="card-title fw-bold" style="color: var(--kopi-coklat-tua);">
                                {{ ucfirst($category) }}
                            </h5>
                            <p class="card-text text-muted small">
                                Lihat semua menu {{ $category }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- How to Order -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="p-4 rounded position-relative overflow-hidden" style="background-color: var(--kopi-krem);">
                
                <!-- Background Icons -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.05;">
                    <div style="position: absolute; top: 10%; left: 5%;">
                        <i class="bi bi-cup-hot" style="font-size: 3rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; top: 20%; right: 10%;">
                        <i class="bi bi-cart-plus" style="font-size: 3rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; top: 40%; left: 15%;">
                        <i class="bi bi-person-check" style="font-size: 3rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; bottom: 30%; right: 20%;">
                        <i class="bi bi-cash-coin" style="font-size: 3rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; bottom: 15%; left: 25%;">
                        <i class="bi bi-cup-straw" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; top: 60%; right: 15%;">
                        <i class="bi bi-egg-fried" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; bottom: 40%; left: 10%;">
                        <i class="bi bi-ice-cream" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                    </div>
                    <div style="position: absolute; top: 25%; right: 25%;">
                        <i class="bi bi-cake2" style="font-size: 2.5rem; color: var(--kopi-coklat);"></i>
                    </div>
                </div>
                
                <div class="position-relative z-1">
                    <h4 class="text-center mb-4" style="color: var(--kopi-coklat-tua);">
                        <i class="bi bi-info-circle me-2"></i>Cara Memesan
                    </h4>
                    
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="p-3">
                                <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px; transition: transform 0.3s ease;">
                                    <i class="bi bi-search" style="color: var(--kopi-coklat); font-size: 1.5rem;"></i>
                                </div>
                                <h6 style="color: var(--kopi-coklat-tua);">1. Pilih Menu</h6>
                                <small class="text-muted">Telusuri menu favorit Anda</small>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="p-3">
                                <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px; transition: transform 0.3s ease;">
                                    <i class="bi bi-cart-plus" style="color: var(--kopi-coklat); font-size: 1.5rem;"></i>
                                </div>
                                <h6 style="color: var(--kopi-coklat-tua);">2. Tambah ke Keranjang</h6>
                                <small class="text-muted">Klik tombol "Tambah"</small>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="p-3">
                                <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px; transition: transform 0.3s ease;">
                                    <i class="bi bi-person-check" style="color: var(--kopi-coklat); font-size: 1.5rem;"></i>
                                </div>
                                <h6 style="color: var(--kopi-coklat-tua);">3. Isi Data Diri</h6>
                                <small class="text-muted">Masukkan nama dan meja</small>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="p-3">
                                <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px; transition: transform 0.3s ease;">
                                    <i class="bi bi-cash-coin" style="color: var(--kopi-coklat); font-size: 1.5rem;"></i>
                                </div>
                                <h6 style="color: var(--kopi-coklat-tua);">4. Bayar di Kasir</h6>
                                <small class="text-muted">Ambil dan bayar di kasir</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product-link {
        color: var(--kopi-coklat-tua);
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .product-link:hover {
        color: var(--kopi-coklat);
        text-decoration: underline;
    }
    
    /* Container gambar dengan aspek rasio asli */
    .menu-img-container {
        height: auto;
        min-height: 180px;
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        background-color: #f9f5f0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .menu-img-container a {
        display: block;
        width: 100%;
        height: auto;
    }
    
    .menu-img-container a:hover .menu-img {
        transform: scale(1.05);
        transition: transform 0.5s ease;
    }
    
    .menu-img {
        width: 100%;
        height: auto;
        max-height: 200px;
        object-fit: contain;
        transition: transform 0.5s;
        display: block;
        padding: 15px;
        background-color: white;
        border-radius: 4px;
        margin: 10px auto;
        max-width: calc(100% - 20px);
    }
    
    /* Kartu menu yang konsisten */
    .menu-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .menu-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(139, 69, 19, 0.15);
    }
    
    .price-tag {
        position: absolute;
        top: 12px;
        right: 12px;
        background: var(--kopi-coklat);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.8rem;
        box-shadow: 0 3px 8px rgba(0,0,0,0.15);
        z-index: 10;
    }
    
    .category-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: var(--kopi-krem);
        color: var(--kopi-coklat-tua);
        padding: 4px 8px;
        border-radius: 8px;
        font-size: 0.7rem;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        z-index: 10;
    }
    
    .card-body {
        padding: 1rem 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .badge.bg-danger {
        font-weight: 500;
        font-size: 0.85rem;
        padding: 0.4rem 0.8rem;
    }
    
    /* Kategori cards hover effect */
    .card[style*="background-color: var(--kopi-krem)"]:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(139, 69, 19, 0.1);
    }
    
    .card[style*="background-color: var(--kopi-krem)"] .rounded-circle:hover {
        transform: scale(1.1);
    }
    
    /* How to Order icons hover effect */
    .col-lg-3 .rounded-circle:hover,
    .col-md-6 .rounded-circle:hover {
        transform: scale(1.1);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .menu-img {
            max-height: 180px;
            max-width: calc(100% - 16px);
            padding: 12px;
        }
        
        .card-body {
            padding: 0.9rem 1rem;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }
        
        /* Sembunyikan beberapa background icons di mobile */
        .position-absolute[style*="opacity: 0.1"],
        .position-absolute[style*="opacity: 0.05"] {
            display: none;
        }
    }
    
    @media (max-width: 576px) {
        .menu-img {
            max-height: 160px;
            max-width: calc(100% - 12px);
            padding: 10px;
        }
        
        .price-tag {
            font-size: 0.75rem;
            padding: 4px 8px;
        }
        
        .category-badge {
            font-size: 0.65rem;
            padding: 3px 6px;
        }
        
        .menu-img-container {
            min-height: 150px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preload images dan opacity transition
        const images = document.querySelectorAll('.menu-img');
        images.forEach(img => {
            if (img.complete) {
                img.style.opacity = '1';
            } else {
                img.style.opacity = '0';
                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                    this.style.transition = 'opacity 0.3s ease';
                });
                
                img.addEventListener('error', function() {
                    this.style.opacity = '1';
                });
            }
        });
        
        // Hover effects untuk kategori cards
        const categoryCards = document.querySelectorAll('.card[style*="background-color: var(--kopi-krem)"]');
        categoryCards.forEach(card => {
            card.style.cursor = 'pointer';
            card.style.transition = 'all 0.3s ease';
        });
        
        // Hover effects untuk how-to-order icons
        const orderIcons = document.querySelectorAll('.col-lg-3 .rounded-circle, .col-md-6 .rounded-circle');
        orderIcons.forEach(icon => {
            icon.style.cursor = 'pointer';
            icon.style.transition = 'transform 0.3s ease';
        });
        
        // Animasi subtle untuk background icons
        const backgroundIcons = document.querySelectorAll('.position-absolute i');
        backgroundIcons.forEach((icon, index) => {
            icon.style.transition = 'opacity 0.5s ease';
            
            // Subtle pulsing effect untuk beberapa icon
            if (index % 3 === 0) {
                setTimeout(() => {
                    icon.style.animation = 'pulse 3s infinite';
                }, index * 200);
            }
        });
    });
    
    // Tambah keyframes untuk pulse animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { opacity: 0.1; }
            50% { opacity: 0.15; }
            100% { opacity: 0.1; }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection