@extends('layouts.app')

@section('title', 'Riwayat Pesanan - Cafe KOPI IN')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold" style="color: #5D2906;">
                        <i class="bi bi-clock-history me-2"></i>Riwayat Pesanan
                    </h1>
                    <p class="text-muted mb-0">Lihat dan kelola semua pesanan</p>
                </div>
                <div>
                    @auth
                        @if(auth()->user()->isOperator() || auth()->user()->isAdmin())
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-kopi">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('home') }}" class="btn btn-outline-kopi">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                            </a>
                        @endif
                    @else
                        <a href="{{ route('home') }}" class="btn btn-outline-kopi">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    <!-- Authentication Alert (Jika bukan operator) -->
    @auth
        @if(!auth()->user()->isOperator() && !auth()->user()->isAdmin())
        <div class="alert alert-warning mb-4">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <strong>Perhatian:</strong> Anda login sebagai pelanggan. 
            Hanya operator yang dapat mengubah status atau menghapus pesanan.
        </div>
        @endif
    @endauth
    
    <!-- Daftar Pesanan -->
    @if($orders->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-cart-x" style="font-size: 4rem; color: #ccc;"></i>
        <h4 class="text-muted mt-3">Belum ada pesanan</h4>
        <p class="text-muted">Silakan buat pesanan terlebih dahulu</p>
        <a href="{{ route('menu.index') }}" class="btn btn-kopi mt-3">
            <i class="bi bi-menu-button-wide me-2"></i> Lihat Menu
        </a>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background-color: #F5E6D3;">
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Pesanan</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Meja</th>
                                    <th>Status</th>
                                    <th>Jumlah Item</th>
                                    <th class="text-end">Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $order)
                                <tr id="order-row-{{ $order->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-bold">{{ $order->nomor_pesanan }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $order->nama_pelanggan }}</td>
                                    <td>{{ $order->nomor_meja ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="status-badge status-{{ $order->status }}" 
                                                  id="status-{{ $order->id }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $order->jumlah_item }} item</td>
                                    <td class="text-end fw-bold">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('orders.confirmation', $order->id) }}" 
                                               class="btn btn-sm btn-outline-kopi" 
                                               title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>    
                                        </div>   
                                    </td>                                                         
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        min-width: 90px;
        display: inline-block;
        text-align: center;
    }
    
    .status-pending {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }
    
    .status-diproses {
        background: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }
    
    .status-selesai {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .status-dibatalkan {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .table th, .table td {
        vertical-align: middle;
    }
    
    .btn-kopi {
        background: #8B4513;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
    }
    
    .btn-kopi:hover {
        background: #A0522D;
        color: white;
    }
    
    .btn-outline-kopi {
        border: 2px solid #8B4513;
        color: #8B4513;
        background: transparent;
    }
    
    .btn-outline-kopi:hover {
        background: #8B4513;
        color: white;
    }
</style>
@endsection