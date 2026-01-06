<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nama_lengkap',
        'no_telepon'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Cek apakah user adalah operator
     */
    public function isOperator()
    {
        return $this->role === 'operator';
    }

    /**
     * Cek apakah user adalah admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Cek apakah user adalah pelanggan
     */
    public function isPelanggan()
    {
        return $this->role === 'pelanggan' || empty($this->role);
    }

    /**
     * Scope untuk operator
     */
    public function scopeOperator($query)
    {
        return $query->where('role', 'operator');
    }

    /**
     * Scope untuk admin
     */
    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }

    /**
     * Scope untuk pelanggan
     */
    public function scopePelanggan($query)
    {
        return $query->where('role', 'pelanggan')->orWhereNull('role');
    }

    /**
     * Relasi one-to-many dengan Order
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Dapatkan nama lengkap (fallback ke name jika null)
     */
    public function getNamaLengkapAttribute($value)
    {
        return $value ?? $this->name;
    }

    /**
     * Format nomor telepon
     */
    public function getFormattedNoTelepon()
    {
        if (empty($this->no_telepon)) {
            return '-';
        }
        
        // Format: 0812-3456-7890
        $no = preg_replace('/[^0-9]/', '', $this->no_telepon);
        if (strlen($no) > 10) {
            return substr($no, 0, 4) . '-' . substr($no, 4, 4) . '-' . substr($no, 8);
        }
        
        return $this->no_telepon;
    }
}