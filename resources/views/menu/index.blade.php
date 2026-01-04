@extends('layouts.app')

@section('title', 'Menu Cafe KOPI IN')

@section('content')
<div class="container">
    <!-- Header Menu -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold" style="color: var(--kopi-coklat-tua);">
                        <i class="bi bi-menu-button-wide me-2"></i>Menu Lengkap
                    </h1>
                    <p class="text-muted mb-0">Pilih menu favorit Anda berdasarkan kategori</p>
                </div>
                <div>
                    <a href="{{ route('home') }}" class="btn btn-outline-kopi">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filter Kategori -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body py-4 px-4">
                    <h5 class="card-title mb-3 fw-bold" style="color: var(--kopi-coklat);">
                        <i class="bi bi-filter me-2"></i>Filter Kategori
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-sm {{ !request('category') ? 'btn-kopi' : 'btn-outline-kopi' }}" 
                                onclick="filterMenu('')">
                            Semua Menu
                        </button>
                        @foreach($categories as $category)
                        <button class="btn btn-sm {{ request('category') == $category ? 'btn-kopi' : 'btn-outline-kopi' }}" 
                                onclick="filterMenu('{{ $category }}')">
                            {{ ucfirst($category) }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Menu Items -->
    <div class="row g-4" id="menu-container">
        @foreach($menus as $menu)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 menu-item" data-category="{{ $menu->kategori }}">
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
    </div>
    
    @if($menus->isEmpty())
    <div class="col-12 text-center py-5">
        <i class="bi bi-cup" style="font-size: 4rem; color: #ccc;"></i>
        <h4 class="text-muted mt-3">Tidak ada menu yang tersedia</h4>
        <p class="text-muted">Silakan pilih kategori lain</p>
    </div>
    @endif
    
    <!-- Info Pemesanan -->
    <div class="row mt-5 pt-4">
        <div class="col-12">
            <div class="alert alert-info border-0" style="background-color: #f0f7ff; border-left: 4px solid var(--kopi-coklat);">
                <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle-fill me-3" style="font-size: 1.5rem; color: var(--kopi-coklat);"></i>
                    <div>
                        <h5 class="mb-1 fw-bold" style="color: var(--kopi-coklat-tua);">Informasi Pemesanan</h5>
                        <p class="mb-0" style="color: #495057;">
                            Setelah menambahkan menu ke keranjang, klik ikon keranjang di navbar untuk 
                            menyelesaikan pemesanan. Pembayaran dilakukan langsung di kasir.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-outline-kopi {
        border: 1px solid var(--kopi-coklat);
        color: var(--kopi-coklat);
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .btn-outline-kopi:hover {
        background-color: var(--kopi-coklat);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(139, 69, 19, 0.2);
    }
    
    .btn-kopi {
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-kopi:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
    }
    
    .product-link {
        color: var(--kopi-coklat-tua);
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .product-link:hover {
        color: var(--kopi-coklat);
        text-decoration: underline;
    }
    
    .menu-img-container {
        height: auto; /* Hapus fixed height */
        min-height: 180px;
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .menu-img-container a {
        display: block;
        width: 100%;
        height: auto; /* Hapus fixed height */
    }
    
    .menu-img-container a:hover .menu-img {
        transform: scale(1.05);
        transition: transform 0.5s ease;
    }
    
    .menu-img {
        width: 100%;
        height: auto; /* Biarkan tinggi sesuai aspek rasio */
        max-height: 220px; /* Batas maksimal tinggi */
        object-fit: contain; /* Ubah dari cover ke contain */
        transition: transform 0.5s;
        display: block;
    }
    
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
    
    /* Background untuk container gambar agar tidak transparan */
    .menu-img-container {
        background-color: #f9f5f0; /* Warna background kopi */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Optional: Tambahkan efek frame pada gambar */
    .menu-img {
        padding: 8px;
        background-color: white;
        border-radius: 4px;
        margin: 10px auto;
        max-width: calc(100% - 20px); /* Beri sedikit ruang di samping */
    }
    
    /* Responsive untuk ukuran gambar */
    @media (max-width: 768px) {
        .menu-img {
            max-height: 200px;
            max-width: calc(100% - 16px);
        }
        
        .card-body {
            padding: 0.9rem 1rem;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }
    }
    
    @media (max-width: 576px) {
        .menu-img {
            max-height: 180px;
            max-width: calc(100% - 12px);
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
            min-height: 160px;
        }
    }
</style>

<script>
    // Filter menu by category
    function filterMenu(category) {
        const url = new URL(window.location.href);
        if (category) {
            url.searchParams.set('category', category);
        } else {
            url.searchParams.delete('category');
        }
        window.location.href = url.toString();
    }
    
    // Filter menu items based on URL parameter
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category');
        
        if (category) {
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                if (item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
        
        // Optional: Preload images untuk menghindari layout shift
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
            }
        });
    });
</script>
@endsection