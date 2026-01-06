<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pesanan',
        'nama_pelanggan', // tetap ada untuk guest orders
        'nomor_meja',
        'status',
        'total_harga',
        'jumlah_item',
        'catatan',
        'waktu_diproses',
        'waktu_selesai',
        'user_id' // tambahkan ini
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
        'jumlah_item' => 'integer',
        'waktu_diproses' => 'datetime',
        'waktu_selesai' => 'datetime'
    ];

    // Konstanta status
    const STATUS_PENDING = 'pending';
    const STATUS_DIPROSES = 'diproses';
    const STATUS_SELESAI = 'selesai';
    const STATUS_DIBATALKAN = 'dibatalkan';

    /**
     * Relasi dengan user (pembuat order)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan order items
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Scope untuk order berdasarkan user
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope untuk order pending
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope untuk order diproses
     */
    public function scopeDiproses($query)
    {
        return $query->where('status', self::STATUS_DIPROSES);
    }

    /**
     * Scope untuk order selesai
     */
    public function scopeSelesai($query)
    {
        return $query->where('status', self::STATUS_SELESAI);
    }

    /**
     * Dapatkan nama pelanggan (dari user atau kolom nama_pelanggan)
     */
    public function getNamaPelangganDisplay()
    {
        if ($this->user) {
            return $this->user->nama_lengkap ?: $this->user->name;
        }
        
        return $this->nama_pelanggan ?: 'Pelanggan';
    }

    /**
     * Update total harga dari order items
     */
    public function updateTotalHarga()
    {
        $total = $this->orderItems()->sum('subtotal');
        $this->total_harga = $total;
        $this->jumlah_item = $this->orderItems()->sum('jumlah');
        $this->save();
    }

    /**
     * Ubah status order
     */
    public function updateStatus($status, $save = true)
    {
        $this->status = $status;
        
        if ($status === self::STATUS_DIPROSES && empty($this->waktu_diproses)) {
            $this->waktu_diproses = now();
        }
        
        if ($status === self::STATUS_SELESAI && empty($this->waktu_selesai)) {
            $this->waktu_selesai = now();
        }
        
        if ($save) {
            $this->save();
        }
    }

    /**
     * Auto-generate nomor pesanan
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->nomor_pesanan)) {
                $order->nomor_pesanan = self::generateNomorPesanan();
            }
        });
    }

    public static function generateNomorPesanan()
    {
        $date = now()->format('Ymd');
        $lastOrder = self::whereDate('created_at', today())->count();
        $sequence = str_pad($lastOrder + 1, 4, '0', STR_PAD_LEFT);
        
        return 'INV' . $date . $sequence;
    }

    /**
     * Format status untuk display
     */
    public function getStatusLabel()
    {
        $labels = [
            self::STATUS_PENDING => '<span class="badge bg-warning">Pending</span>',
            self::STATUS_DIPROSES => '<span class="badge bg-info">Diproses</span>',
            self::STATUS_SELESAI => '<span class="badge bg-success">Selesai</span>',
            self::STATUS_DIBATALKAN => '<span class="badge bg-danger">Dibatalkan</span>',
        ];
        
        return $labels[$this->status] ?? '<span class="badge bg-secondary">Unknown</span>';
    }

    /**
     * Format total harga untuk display
     */
    public function getTotalHargaFormatted()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }
}