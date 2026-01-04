@extends('layouts.app')

@section('title', $menu->nama_menu . ' - Cafe KOPI IN')

@section('content')
<div class="container py-4">
   
    <!-- Product Detail -->
    <div class="row mb-5">
        <!-- Product Image -->
        <div class="col-lg-5 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="product-image-container d-flex align-items-center justify-content-center" 
                         style="height: 350px; width: 100%; border-radius: 10px; background-color: #f9f5f0; overflow: hidden;">
                        <img src="{{ $menu->gambar_url }}" 
                             alt="{{ $menu->nama_menu }}" 
                             class="img-fluid"
                             style="max-height: 100%; max-width: 100%; object-fit: contain;"
                             onerror="this.onerror=null; this.src='{{ asset('images/default-menu.png') }}'">
                    </div>
                    
                    <!-- Thumbnail Navigation (optional) -->
                    <div class="d-flex justify-content-center mt-3">
                        <div class="thumbnail-container d-flex gap-2">
                            <div class="thumbnail-item active" style="width: 60px; height: 60px; border-radius: 8px; overflow: hidden; border: 2px solid var(--kopi-coklat);">
                                <img src="{{ $menu->gambar_url }}" 
                                     alt="{{ $menu->nama_menu }}" 
                                     class="img-fluid w-100 h-100"
                                     style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Info -->
        <div class="col-lg-7 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <!-- Category Badge -->
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="badge" 
                                  style="background-color: var(--kopi-krem); color: var(--kopi-coklat-tua); padding: 8px 15px; font-size: 0.9rem;">
                                <i class="bi bi-tag me-1"></i> {{ ucfirst($menu->kategori) }}
                            </span>
                            
                            @if($menu->tersedia)
                            <span class="badge bg-success ms-2">
                                <i class="bi bi-check-circle me-1"></i> Tersedia
                            </span>
                            @else
                            <span class="badge bg-danger ms-2">
                                <i class="bi bi-x-circle me-1"></i> Habis
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Product Name -->
                    <h1 class="mb-3" style="color: var(--kopi-coklat-tua); font-size: 1.8rem;">
                        {{ $menu->nama_menu }}
                    </h1>
                    
                    <!-- Rating (optional) -->
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                            </div>
                            <span class="text-muted small">(4.5/5 • 128 ulasan)</span>
                        </div>
                    </div>
                    
                    <!-- Price -->
                    <div class="mb-4">
                        <h2 class="text-success fw-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h2>
                        <small class="text-muted">Harga sudah termasuk pajak</small>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-4">
                        <h5 class="mb-3" style="color: var(--kopi-coklat);">
                            <i class="bi bi-info-circle me-2"></i>Deskripsi Produk
                        </h5>
                        <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                            {{ $menu->deskripsi }}
                        </div>
                    </div>
                    
                    <!-- Quantity Selector -->
                    <div class="mb-4">
                        <h6 class="mb-2" style="color: var(--kopi-coklat);">
                            <i class="bi bi-calculator me-1"></i> Jumlah
                        </h6>
                        <div class="d-flex align-items-center">
                            <div class="quantity-selector d-flex align-items-center">
                                <button class="btn btn-outline-secondary" 
                                        onclick="decreaseQuantity()"
                                        style="border-radius: 5px 0 0 5px;">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="number" 
                                       id="product-quantity" 
                                       value="1" 
                                       min="1" 
                                       max="10"
                                       class="form-control text-center" 
                                       style="width: 70px; border-radius: 0; border-left: 0; border-right: 0;">
                                <button class="btn btn-outline-secondary" 
                                        onclick="increaseQuantity()"
                                        style="border-radius: 0 5px 5px 0;">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <span class="ms-3 text-muted small">Maks. 10 pesanan</span>
                        </div>
                    </div>
                    
                    <!-- Add to Cart Button -->
                    <div class="d-grid gap-2 mb-4">
                        @if($menu->tersedia)
                        <button class="btn btn-lg btn-kopi py-3" 
                                onclick="addToCartWithQuantity({{ $menu->id }}, '{{ addslashes($menu->nama_menu) }}', {{ $menu->harga }}, '{{ $menu->gambar_url }}')">
                            <i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang
                        </button>
                        
                        @else
                        <button class="btn btn-lg btn-secondary py-3" disabled>
                            <i class="bi bi-x-circle me-2"></i> Stok Habis
                        </button>
                        
                        <button class="btn btn-outline-secondary" disabled>
                            <i class="bi bi-bell me-2"></i> Notifikasi Saat Stok Tersedia
                        </button>
                        @endif
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="mt-4 pt-4 border-top">
                        <h6 class="mb-3" style="color: var(--kopi-coklat);">
                            <i class="bi bi-card-checklist me-2"></i> Informasi Tambahan
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                         style="width: 40px; height: 40px; background-color: var(--kopi-krem);">
                                        <i class="bi bi-clock" style="color: var(--kopi-coklat);"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Waktu Penyajian</small>
                                        <strong>5-10 Menit</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                         style="width: 40px; height: 40px; background-color: var(--kopi-krem);">
                                        <i class="bi bi-thermometer" style="color: var(--kopi-coklat);"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Sajian</small>
                                        <strong>
                                            @if(in_array($menu->kategori, ['kopi', 'non-kopi']))
                                            Panas/Dingin
                                            @elseif($menu->kategori == 'makanan')
                                            Hangat
                                            @else
                                            Dingin
                                            @endif
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                         style="width: 40px; height: 40px; background-color: var(--kopi-krem);">
                                        <i class="bi bi-shield-check" style="color: var(--kopi-coklat);"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Kualitas</small>
                                        <strong>Premium</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                         style="width: 40px; height: 40px; background-color: var(--kopi-krem);">
                                        <i class="bi bi-cup" style="color: var(--kopi-coklat);"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Ukuran</small>
                                        <strong>Standard (350ml)</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    @if($relatedMenus->count() > 0)
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="color: var(--kopi-coklat);">
                    <i class="bi bi-cup-hot me-2"></i>Menu Lainnya dalam Kategori {{ ucfirst($menu->kategori) }}
                </h3>
                <a href="{{ route('menu.index') }}?category={{ $menu->kategori }}" 
                   class="btn btn-sm btn-outline-kopi">
                    Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        
        @foreach($relatedMenus as $relatedMenu)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-img-top d-flex align-items-center justify-content-center" 
                     style="height: 180px; overflow: hidden; position: relative; background-color: #f9f5f0;">
                    <img src="{{ $relatedMenu->gambar_url }}" 
                         alt="{{ $relatedMenu->nama_menu }}" 
                         class="img-fluid"
                         style="max-height: 100%; max-width: 100%; object-fit: contain;"
                         onerror="this.onerror=null; this.src='{{ asset('images/default-menu.png') }}'">
                    
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-success">
                            Rp {{ number_format($relatedMenu->harga, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
                
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-2">{{ $relatedMenu->nama_menu }}</h6>
                    <p class="card-text text-muted small mb-3">
                        {{ Str::limit($relatedMenu->deskripsi, 60) }}
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('menu.show', $relatedMenu->id) }}" 
                           class="btn btn-sm btn-outline-kopi">
                            <i class="bi bi-eye me-1"></i> Detail
                        </a>
                        
                        @if($relatedMenu->tersedia)
                        <button class="btn btn-sm btn-kopi" 
                                onclick="addToCart({{ $relatedMenu->id }}, '{{ addslashes($relatedMenu->nama_menu) }}', {{ $relatedMenu->harga }}, '{{ $relatedMenu->gambar_url }}')">
                            <i class="bi bi-cart-plus"></i>
                        </button>
                        @else
                        <span class="badge bg-danger">Habis</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    
    <!-- Reviews Section (optional) -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 style="color: var(--kopi-coklat);" class="mb-4">
                        <i class="bi bi-chat-square-text me-2"></i>Ulasan Pelanggan
                    </h4>
                    
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="text-center p-4 rounded" style="background-color: var(--kopi-krem);">
                                <h2 class="mb-2" style="color: var(--kopi-coklat-tua);">4.5</h2>
                                <div class="mb-2">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                </div>
                                <p class="text-muted small mb-0">Berdasarkan 128 ulasan</p>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <!-- Sample Review -->
                            <div class="review-item mb-4 pb-4 border-bottom">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <strong>Budi Santoso</strong>
                                        <div class="text-warning small">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                    <small class="text-muted">2 hari yang lalu</small>
                                </div>
                                <p class="mb-0">"{{ $menu->nama_menu }} ini luar biasa! Rasa yang autentik dan penyajian yang menarik. Pasti akan pesan lagi!"</p>
                            </div>
                            
                            <div class="text-center">
                                <a href="#" class="btn btn-outline-kopi">
                                    <i class="bi bi-chat-left-text me-1"></i> Lihat Semua Ulasan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .breadcrumb {
        background-color: var(--kopi-krem);
        padding: 10px 15px;
        border-radius: 8px;
    }
    
    .breadcrumb-item.active {
        color: var(--kopi-coklat-tua);
        font-weight: 500;
    }
    
    .product-image-container {
        border: 2px solid var(--kopi-krem);
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
    }
    
    .thumbnail-item {
        transition: transform 0.3s;
        cursor: pointer;
    }
    
    .thumbnail-item:hover {
        transform: scale(1.05);
    }
    
    .thumbnail-item.active {
        border-color: var(--kopi-coklat) !important;
    }
    
    .quantity-selector input[type="number"] {
        -moz-appearance: textfield;
    }
    
    .quantity-selector input[type="number"]::-webkit-outer-spin-button,
    .quantity-selector input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    .review-item {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }
</style>

<script>
    // Quantity control
    function increaseQuantity() {
        const quantityInput = document.getElementById('product-quantity');
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < 10) {
            quantityInput.value = currentValue + 1;
        }
    }
    
    function decreaseQuantity() {
        const quantityInput = document.getElementById('product-quantity');
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
    
    // Add to cart with quantity
    function addToCartWithQuantity(menuId, namaMenu, harga, gambar) {
        const quantityInput = document.getElementById('product-quantity');
        const quantity = parseInt(quantityInput.value) || 1;
        
        addToCartMultiple(menuId, namaMenu, harga, gambar, quantity);
    }
    
    // Modified addToCart function to handle quantity
    function addToCartMultiple(menuId, namaMenu, harga, gambar, quantity) {
        const existingItem = cart.find(item => item.menu_id == menuId);
        
        if (existingItem) {
            existingItem.jumlah += quantity;
        } else {
            cart.push({
                menu_id: menuId,
                nama_menu: namaMenu,
                harga: harga,
                gambar: gambar,
                jumlah: quantity
            });
        }
        
        localStorage.setItem('kopi_in_cart', JSON.stringify(cart));
        updateCartCount();
        
        // Show notification
        if (typeof showProductAddedNotification === 'function') {
            showProductAddedNotification(`${namaMenu} (${quantity}x) ditambahkan ke keranjang!`);
        } else {
            showNotification(`${namaMenu} (${quantity}x) ditambahkan ke keranjang!`);
        }
        
        // Auto show cart if not visible
        if (!document.getElementById('cart-sidebar').classList.contains('show')) {
            toggleCart();
        } else {
            updateCartDisplay();
        }
    }
    
    // Favorites function (optional)
    function addToFavorites(menuId) {
        let favorites = JSON.parse(localStorage.getItem('kopi_in_favorites')) || [];
        
        if (!favorites.includes(menuId)) {
            favorites.push(menuId);
            localStorage.setItem('kopi_in_favorites', JSON.stringify(favorites));
            showNotification('Ditambahkan ke favorit!');
            
            // Update button appearance
            event.target.innerHTML = '<i class="bi bi-heart-fill"></i>';
            event.target.classList.add('text-danger');
            event.target.classList.remove('btn-outline-kopi');
            event.target.classList.add('btn-outline-danger');
            event.target.title = 'Di Favorit';
        } else {
            favorites = favorites.filter(id => id !== menuId);
            localStorage.setItem('kopi_in_favorites', JSON.stringify(favorites));
            showNotification('Dihapus dari favorit');
            
            // Update button appearance
            event.target.innerHTML = '<i class="bi bi-heart"></i>';
            event.target.classList.remove('text-danger');
            event.target.classList.remove('btn-outline-danger');
            event.target.classList.add('btn-outline-kopi');
            event.target.title = 'Tambahkan ke Favorit';
        }
    }
    
    // Check favorites on page load
    document.addEventListener('DOMContentLoaded', function() {
        const favorites = JSON.parse(localStorage.getItem('kopi_in_favorites')) || [];
        const menuId = {{ $menu->id }};
        const favoriteBtn = document.querySelector('button[onclick*="addToFavorites"]');
        
        if (favoriteBtn && favorites.includes(menuId)) {
            favoriteBtn.innerHTML = '<i class="bi bi-heart-fill"></i>';
            favoriteBtn.classList.add('text-danger');
            favoriteBtn.classList.remove('btn-outline-kopi');
            favoriteBtn.classList.add('btn-outline-danger');
            favoriteBtn.title = 'Di Favorit';
            
            // Update onclick function
            const originalOnclick = favoriteBtn.getAttribute('onclick');
            favoriteBtn.setAttribute('onclick', originalOnclick.replace('addToFavorites', 'removeFromFavorites'));
        }
    });
    
    // Notifikasi ketika produk ditambahkan ke keranjang
    function showProductAddedNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'alert alert-success position-fixed notification-toast';
        notification.style.cssText = `
            top: 20px;
            right: 20px;
            z-index: 1100;
            min-width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease-out;
        `;
        notification.innerHTML = `
            <i class="bi bi-check-circle-fill me-2"></i> 
            ${message}
            <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 3000);
    }
    
    // Add animation CSS
    const style = document.createElement('style');
    style.textContent = `
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
    `;
    document.head.appendChild(style);
</script>
@endsection