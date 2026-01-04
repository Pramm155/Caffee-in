@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container py-4">
    <!-- Header Dashboard dengan Gradient -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-header p-4 rounded-3" style="background: linear-gradient(135deg, #5D2906, #8B4513);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="fw-bold text-white">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard Operator
                        </h1>
                        <p class="text-light mb-0">Selamat datang, {{ $user->nama_lengkap ?? $user->name }}!</p>
                        <p class="text-light opacity-75 mb-0"><small>Terakhir login: {{ now()->format('d/m/Y H:i') }}</small></p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white bg-opacity-25 rounded-pill px-3 py-1">
                            <span class="text-white fw-medium">
                                <i class="bi bi-person-badge me-1"></i>{{ ucfirst($user->role) }}
                            </span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards dengan Ikon dan Animasi -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-receipt text-primary" style="font-size: 1.8rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Pesanan</h6>
                            <h2 class="mb-0 fw-bold">{{ $totalOrders }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-primary bg-opacity-25 text-primary">
                            <i class="bi bi-arrow-up me-1"></i> Semua Waktu
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-check-circle text-success" style="font-size: 1.8rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Selesai Hari Ini</h6>
                            <h2 class="mb-0 fw-bold">{{ $completedOrders }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success bg-opacity-25 text-success">
                            <i class="bi bi-calendar-check me-1"></i> {{ now()->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-clock-history text-warning" style="font-size: 1.8rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Dalam Proses</h6>
                            <h2 class="mb-0 fw-bold">{{ $processingOrders }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-warning bg-opacity-25 text-warning">
                            <i class="bi bi-hourglass-split me-1"></i> Perlu Tindakan
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-cash-coin text-info" style="font-size: 1.8rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Pendapatan</h6>
                            <h4 class="mb-0 fw-bold">Rp {{ number_format($revenue, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-info bg-opacity-25 text-info">
                            <i class="bi bi-graph-up me-1"></i> Hari Ini
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Links -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0" style="color: #5D2906;">
                            <i class="bi bi-lightning-charge me-2"></i>Akses Cepat
                        </h5>
                        <span class="badge bg-kopi">Dashboard</span>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <a href="{{ route('orders.history') }}" class="btn btn-outline-kopi w-100 text-start">
                                <i class="bi bi-clock-history me-2"></i> Riwayat Pesanan
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('menu.index') }}" class="btn btn-outline-kopi w-100 text-start">
                                <i class="bi bi-menu-button-wide me-2"></i> Kelola Menu
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('home') }}" class="btn btn-outline-kopi w-100 text-start">
                                <i class="bi bi-house-door me-2"></i> Beranda Utama
                            </a>
                        </div>
                        <div class="col-md-3">
                            <button onclick="window.location.reload()" class="btn btn-outline-kopi w-100 text-start">
                                <i class="bi bi-arrow-clockwise me-2"></i> Refresh Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pesanan Terbaru dengan CRUD -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-lg">
                <div class="card-header py-3" style="background: linear-gradient(to right, #F5E6D3, #f8eed8); border-left: 4px solid #8B4513;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-0" style="color: #5D2906;">
                                <i class="bi bi-list-check me-2"></i> Pesanan Terbaru
                                <span class="badge bg-kopi ms-2">{{ $recentOrders->count() }}</span>
                            </h5>
                            <p class="text-muted mb-0 small">Update real-time pesanan masuk</p>
                        </div>
                        <div>
                            <a href="{{ route('orders.history') }}" class="btn btn-kopi btn-sm">
                                <i class="bi bi-clock-history me-1"></i> Semua Pesanan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($recentOrders->isEmpty())
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-cart-x" style="font-size: 4rem; color: #e9ecef;"></i>
                            <h5 class="text-muted mt-3">Belum ada pesanan</h5>
                            <p class="text-muted">Tidak ada pesanan masuk saat ini</p>
                        </div>
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background-color: #f8f9fa;">
                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Nomor Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Waktu</th>
                                    <th class="text-center pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $index => $order)
                                <tr id="order-row-{{ $order->id }}" class="hover-highlight">
                                    <td class="ps-4 fw-bold">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-receipt me-2 text-kopi"></i>
                                            <span class="fw-bold">{{ $order->nomor_pesanan }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-circle me-2 text-muted"></i>
                                            <span>{{ $order->nama_pelanggan }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="status-badge status-{{ $order->status }}" 
                                                  id="status-{{ $order->id }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                            
                                            <!-- Dropdown untuk ganti status -->
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle py-0 px-2" 
                                                        type="button" 
                                                        data-bs-toggle="dropdown">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach(['pending', 'diproses', 'selesai', 'dibatalkan'] as $status)
                                                    <li>
                                                        <a class="dropdown-item status-change" 
                                                           href="#" 
                                                           data-order-id="{{ $order->id }}" 
                                                           data-status="{{ $status }}">
                                                            <span class="badge status-badge status-{{ $status }} me-2">{{ ucfirst($status) }}</span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-success">
                                        <i class="bi bi-currency- me-1"></i>
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <small>{{ $order->created_at->format('H:i') }}</small>
                                            <small class="text-muted">{{ $order->created_at->format('d/m') }}</small>
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('orders.confirmation', $order->id) }}" 
                                               class="btn btn-outline-kopi" 
                                               title="Detail"
                                               data-bs-toggle="tooltip">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            
                                            <button class="btn btn-outline-danger delete-order" 
                                                    data-order-id="{{ $order->id }}"
                                                    data-order-number="{{ $order->nomor_pesanan }}"
                                                    title="Hapus"
                                                    data-bs-toggle="tooltip">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                <div class="card-footer bg-transparent border-0 py-3">
                    <div class="text-center">
                        <a href="{{ route('orders.history') }}" class="btn btn-outline-kopi">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat Semua Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Dashboard */
    .dashboard-header {
        box-shadow: 0 4px 20px rgba(93, 41, 6, 0.2);
    }
    
    .hover-lift {
        transition: all 0.3s ease;
        border: 1px solid rgba(139, 69, 19, 0.1);
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 69, 19, 0.15);
        border-color: rgba(139, 69, 19, 0.2);
    }
    
    .hover-highlight:hover {
        background-color: rgba(245, 222, 179, 0.1);
    }
    
    .text-kopi {
        color: #8B4513 !important;
    }
    
    .bg-kopi {
        background-color: #8B4513 !important;
        color: white !important;
    }
    
    .btn-kopi {
        background: linear-gradient(135deg, #8B4513, #A0522D);
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 500;
    }
    
    .btn-kopi:hover {
        background: linear-gradient(135deg, #5D2906, #8B4513);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
    }
    
    .btn-outline-kopi {
        border: 2px solid #8B4513;
        color: #8B4513;
        background: transparent;
        padding: 6px 12px;
        border-radius: 6px;
        transition: all 0.3s;
    }
    
    .btn-outline-kopi:hover {
        background: #8B4513;
        color: white;
        transform: translateY(-1px);
    }
    
    /* Status Badges */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        min-width: 85px;
        display: inline-block;
        text-align: center;
        border: 1px solid transparent;
    }
    
    .status-pending {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        color: #856404;
        border-color: #ffeaa7;
    }
    
    .status-diproses {
        background: linear-gradient(135deg, #d1ecf1, #bee5eb);
        color: #0c5460;
        border-color: #bee5eb;
    }
    
    .status-selesai {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border-color: #c3e6cb;
    }
    
    .status-dibatalkan {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
        border-color: #f5c6cb;
    }
    
    /* Table Styling */
    .table th {
        font-weight: 600;
        color: #5D2906;
        border-bottom: 2px solid rgba(139, 69, 19, 0.1);
        padding: 12px 15px;
    }
    
    .table td {
        padding: 12px 15px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(139, 69, 19, 0.05);
    }
    
    .table tr:last-child td {
        border-bottom: none;
    }
    
    /* Card Styling */
    .card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(139, 69, 19, 0.1);
    }
    
    /* Empty State */
    .empty-state {
        padding: 40px 20px;
    }
    
    /* Badge Colors */
    .badge.bg-primary {
        background-color: rgba(13, 110, 253, 0.1) !important;
        color: #0d6efd !important;
    }
    
    .badge.bg-success {
        background-color: rgba(25, 135, 84, 0.1) !important;
        color: #198754 !important;
    }
    
    .badge.bg-warning {
        background-color: rgba(255, 193, 7, 0.1) !important;
        color: #ffc107 !important;
    }
    
    .badge.bg-info {
        background-color: rgba(13, 202, 240, 0.1) !important;
        color: #0dcaf0 !important;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-header {
            padding: 20px !important;
        }
        
        .btn-group {
            flex-direction: column;
            gap: 5px;
        }
        
        .btn-group .btn {
            border-radius: 6px !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Dashboard Operator Enhanced Loaded');
    
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    
    if (!csrfToken) {
        showNotification('Error: CSRF Token tidak ditemukan', 'error');
        return;
    }
    
    // ===== UPDATE STATUS =====
    document.addEventListener('click', function(e) {
        // Update Status
        if (e.target.closest('.status-change')) {
            e.preventDefault();
            const link = e.target.closest('.status-change');
            const orderId = link.dataset.orderId;
            const newStatus = link.dataset.status;
            
            if (confirm(`Ubah status pesanan menjadi "${newStatus}"?`)) {
                updateStatus(orderId, newStatus);
            }
        }
        
        // Delete Order
        if (e.target.closest('.delete-order')) {
            e.preventDefault();
            const button = e.target.closest('.delete-order');
            const orderId = button.dataset.orderId;
            const orderNumber = button.dataset.orderNumber;
            
            if (confirm(`Hapus pesanan ${orderNumber}? Aksi ini tidak dapat dibatalkan.`)) {
                deleteOrder(orderId, orderNumber);
            }
        }
    });
    
    // Function Update Status
    function updateStatus(orderId, newStatus) {
        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('status', newStatus);
        
        // Show loading
        const badge = document.getElementById(`status-${orderId}`);
        if (badge) {
            badge.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
        }
        
        fetch(`/orders/${orderId}/update-status`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update badge status
                if (badge) {
                    badge.className = `status-badge status-${newStatus}`;
                    badge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                }
                
                showNotification('Status berhasil diubah!', 'success');
            } else {
                showNotification('Gagal mengubah status: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan saat mengubah status', 'error');
        });
    }
    
    // Function Delete Order
    function deleteOrder(orderId, orderNumber) {
        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('_method', 'DELETE');
        
        fetch(`/orders/${orderId}`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove row from table
                const row = document.getElementById(`order-row-${orderId}`);
                if (row) {
                    row.style.backgroundColor = '#f8d7da';
                    setTimeout(() => {
                        row.remove();
                        showNotification(`Pesanan ${orderNumber} berhasil dihapus`, 'success');
                        
                        // Reload jika tabel kosong
                        if (document.querySelectorAll('tbody tr').length === 0) {
                            location.reload();
                        }
                    }, 300);
                }
            } else {
                showNotification('Gagal menghapus: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan saat menghapus pesanan', 'error');
        });
    }
    
    // Function Show Notification
    function showNotification(message, type = 'success') {
        // Remove existing notification
        const existingNotification = document.querySelector('.custom-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create new notification
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed custom-notification`;
        notification.style.cssText = `
            top: 20px;
            right: 20px;
            z-index: 1100;
            min-width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        `;
        
        const icon = type === 'success' ? 'bi-check-circle-fill' : 
                    type === 'error' ? 'bi-exclamation-triangle-fill' : 'bi-info-circle-fill';
        notification.innerHTML = `
            <i class="bi ${icon} me-2"></i> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 3000);
    }
    
    // Logout Confirmation
    const logoutForm = document.querySelector('form[action*="logout"]');
    if (logoutForm) {
        logoutForm.addEventListener('submit', function(e) {
            if (!confirm('Yakin ingin logout dari dashboard operator?')) {
                e.preventDefault();
            }
        });
    }
    
    // Auto refresh notification
    if ({{ $processingOrders }} > 0) {
        showNotification(`Ada ${processingOrders} pesanan perlu diproses!`, 'warning');
    }
});
</script>
@endsection