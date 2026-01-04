<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_id',
        'nama_menu',
        'jumlah',
        'harga_satuan',
        'subtotal'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'harga_satuan' => 'decimal:2',
        'subtotal' => 'decimal:2'
    ];

    /**
     * Relasi dengan order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi dengan menu
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}