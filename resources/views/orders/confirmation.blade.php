@extends('layouts.app')

@section('title', 'Konfirmasi Pesanan - Cafe KOPI IN')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card Konfirmasi -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <!-- Header Success -->
                    <div class="text-center mb-5">
                        <div class="mb-4">
                            <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="bi bi-check-circle-fill text-white" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h1 class="fw-bold" style="color: var(--kopi-coklat-tua);">
                            Pesanan Berhasil Dibuat!
                        </h1>
                        <p class="lead text-muted">
                            Terima kasih telah memesan di Cafe KOPI IN
                        </p>
                    </div>
                    
                    <!-- Info Pesanan -->
                    <div class="row mb-5">
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 h-100" style="background-color: var(--kopi-krem);">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold mb-3" style="color: var(--kopi-coklat);">
                                        <i class="bi bi-info-circle me-2"></i>Detail Pesanan
                                    </h5>
                                    <div class="mb-2">
                                        <small class="text-muted">Nomor Pesanan</small>
                                        <h4 class="fw-bold" style="color: var(--kopi-coklat-tua);">
                                            {{ $order->nomor_pesanan }}
                                        </h4>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Tanggal & Waktu</small>
                                        <p class="fw-bold mb-0">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Nama Pelanggan</small>
                                        <p class="fw-bold mb-0">{{ $order->nama_pelanggan }}</p>
                                    </div>
                                    @if($order->nomor_meja)
                                    <div>
                                        <small class="text-muted">Nomor Meja</small>
                                        <p class="fw-bold mb-0">{{ $order->nomor_meja }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 h-100" style="background-color: var(--kopi-krem);">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold mb-3" style="color: var(--kopi-coklat);">
                                        <i class="bi bi-clock-history me-2"></i>Status Pesanan
                                    </h5>
                                    <div class="mb-4">
                                        @if($order->status == 'pending')
                                        <span class="status-badge status-pending">
                                            <i class="bi bi-hourglass me-1"></i> Menunggu Konfirmasi
                                        </span>
                                        @elseif($order->status == 'diproses')
                                        <span class="status-badge status-diproses">
                                            <i class="bi bi-gear me-1"></i> Sedang Diproses
                                        </span>
                                        @elseif($order->status == 'selesai')
                                        <span class="status-badge status-selesai">
                                            <i class="bi bi-check-circle me-1"></i> Selesai
                                        </span>
                                        @endif
                                    </div>
                                    <div>
                                        <small class="text-muted">Total Pembayaran</small>
                                        <h3 class="fw-bold" style="color: var(--kopi-coklat-tua);">
                                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Detail Items Pesanan -->
                    <div class="mb-5">
                        <h4 class="fw-bold mb-4" style="color: var(--kopi-coklat);">
                            <i class="bi bi-list-check me-2"></i>Detail Pesanan
                        </h4>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: var(--kopi-krem);">
                                    <tr>
                                        <th style="color: var(--kopi-coklat-tua);">Menu</th>
                                        <th class="text-center" style="color: var(--kopi-coklat-tua);">Jumlah</th>
                                        <th class="text-end" style="color: var(--kopi-coklat-tua);">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($item->menu->gambar_url)
                                                <img src="{{ $item->menu->gambar_url }}" 
                                                     alt="{{ $item->menu->nama_menu }}"
                                                     class="rounded me-3"
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                <div>
                                                    <h6 class="fw-bold mb-0">{{ $item->menu->nama_menu }}</h6>
                                                    <small class="text-muted">Rp {{ number_format($item->menu->harga, 0, ',', '.') }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="fw-bold">{{ $item->jumlah }}</span>
                                        </td>
                                        <td class="text-end align-middle fw-bold">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-end fw-bold">Total:</td>
                                        <td class="text-end fw-bold" style="color: var(--kopi-coklat);">
                                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Informasi Penting -->
                    <div class="alert alert-info border-0 mb-5" 
                         style="background-color: #f0f7ff; border-left: 4px solid var(--kopi-coklat);">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-info-circle-fill me-3" style="font-size: 1.5rem; color: var(--kopi-coklat);"></i>
                            <div>
                                <h5 class="mb-2" style="color: var(--kopi-coklat-tua);">Informasi Penting</h5>
                                <p class="mb-1">
                                    <i class="bi bi-arrow-right me-2"></i>
                                    Silakan menunggu pesanan Anda diproses oleh staff kami
                                </p>
                                <p class="mb-1">
                                    <i class="bi bi-arrow-right me-2"></i>
                                    Pembayaran dilakukan di kasir saat pesanan sudah siap
                                </p>
                                <p class="mb-0">
                                    <i class="bi bi-arrow-right me-2"></i>
                                    Tunjukkan nomor pesanan <strong>{{ $order->nomor_pesanan }}</strong> ke kasir
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="text-center">
                        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="btn btn-kopi px-5">
                                <i class="bi bi-house-door me-2"></i> Kembali ke Beranda
                            </a>
                            <a href="{{ route('orders.history') }}" class="btn btn-outline-kopi px-5">
                                <i class="bi bi-clock-history me-2"></i> Lihat Riwayat Pesanan
                            </a>
                            <button onclick="window.print()" class="btn btn-outline-secondary px-5">
                                <i class="bi bi-printer me-2"></i> Cetak Bukti
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    
    .table th {
        border-bottom: 2px solid var(--kopi-krem);
    }
    
    .table td {
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .btn-kopi, .btn-outline-kopi {
        padding: 12px 30px;
        font-weight: 500;
    }
    
    @media print {
        .navbar, footer, .btn, .text-center.mt-4 {
            display: none !important;
        }
        
        .card {
            border: none !important;
            box-shadow: none !important;
        }
        
        body {
            background: white !important;
        }
        
        .container {
            max-width: 100% !important;
        }
    }
    
    @media (max-width: 768px) {
        .btn-kopi, .btn-outline-kopi, .btn-outline-secondary {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .d-flex.flex-column.flex-md-row {
            gap: 10px !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-scroll ke atas halaman
        window.scrollTo(0, 0);
        
        // Clear cart dari localStorage
        localStorage.removeItem('kopi_in_cart');
        
        // Update cart count di navbar
        if (typeof updateCartCount === 'function') {
            updateCartCount();
        }
        
        // Tambah efek confetti (opsional)
        function showConfetti() {
            const confettiCount = 50;
            const colors = ['#8B4513', '#A0522D', '#F5DEB3', '#5D2906'];
            
            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'fixed';
                confetti.style.width = '10px';
                confetti.style.height = '10px';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.borderRadius = '50%';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-10px';
                confetti.style.zIndex = '9999';
                confetti.style.pointerEvents = 'none';
                
                document.body.appendChild(confetti);
                
                // Animation
                const animation = confetti.animate([
                    { transform: 'translateY(0) rotate(0deg)', opacity: 1 },
                    { transform: `translateY(${window.innerHeight}px) rotate(${Math.random() * 360}deg)`, opacity: 0 }
                ], {
                    duration: 1000 + Math.random() * 2000,
                    easing: 'cubic-bezier(0.215, 0.610, 0.355, 1)'
                });
                
                animation.onfinish = () => confetti.remove();
            }
        }
        
        // Jalankan confetti saat halaman dimuat
        setTimeout(showConfetti, 500);
    });
</script>
@endsection