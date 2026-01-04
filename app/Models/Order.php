<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pesanan',
        'nama_pelanggan',
        'nomor_meja',
        'status',
        'total_harga',
        'jumlah_item',
        'catatan',
        'waktu_diproses',
        'waktu_selesai'
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
        'jumlah_item' => 'integer',
        'waktu_diproses' => 'datetime',
        'waktu_selesai' => 'datetime'
    ];

    /**
     * Relasi dengan order items
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
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
}