<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateOperator extends Command
{
    protected $signature = 'operator:create';
    protected $description = 'Buat operator pertama untuk sistem';

    public function handle()
    {
        $this->info('=== MEMBUAT OPERATOR PERTAMA ===');

        // Cek apakah sudah ada operator
        if (User::where('role', 'operator')->exists()) {
            $this->error('❌ Operator sudah ada!');
            $this->line('Silakan login dengan:');
            $this->line('Email: operator@kopiin.com');
            $this->line('Password: operator123');
            return;
        }

        try {
            $operator = User::create([
                'name' => 'Operator Kopi IN',
                'email' => 'operator@kopiin.com',
                'password' => Hash::make('operator123'),
                'role' => 'operator',
                'nama_lengkap' => 'Admin Operator',
                'no_telepon' => '081234567890'
            ]);

            $this->info('✅ Operator berhasil dibuat!');
            $this->line('Email: operator@kopiin.com');
            $this->line('Password: operator123');
            $this->line('Role: operator');
            $this->newLine();
            $this->line('=== LOGIN DETAILS ===');
            $this->line('URL Login: http://localhost:8000/login');
            $this->line('Email: operator@kopiin.com');
            $this->line('Password: operator123');

        } catch (\Exception $e) {
            $this->error('❌ Error: ' . $e->getMessage());
            $this->line('Mungkin tabel users belum memiliki kolom "role".');
            $this->line('Coba jalankan: php artisan migrate');
        }
    }
}