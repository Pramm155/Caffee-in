<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'harga',
        'kategori',
        'gambar',
        'tersedia'
    ];

    protected $appends = ['gambar_url'];

    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/images/menus/' . $this->gambar);
        }
        return asset('images/default-menu.png');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}