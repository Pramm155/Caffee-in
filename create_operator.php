<?php
// File: create_operator.php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== MEMBUAT OPERATOR PERTAMA ===\n\n";

// Cek apakah sudah ada operator
if (User::where('role', 'operator')->exists()) {
    echo "❌ Operator sudah ada!\n";
    echo "Silakan login dengan email: operator@kopiin.com\n";
    echo "Password: operator123\n\n";
    exit;
}

// Buat operator pertama
try {
    $operator = User::create([
        'name' => 'Operator Kopi IN',
        'email' => 'operator@kopiin.com',
        'password' => Hash::make('operator123'),
        'role' => 'operator',
        'nama_lengkap' => 'Admin Operator',
        'no_telepon' => '081234567890'
    ]);
    
    echo "✅ BERHASIL! Operator berhasil dibuat!\n\n";
    echo "📧 Email: operator@kopiin.com\n";
    echo "🔑 Password: operator123\n";
    echo "👤 Role: operator\n\n";
    echo "=== LOGIN DETAILS ===\n";
    echo "URL Login: http://localhost:8000/login\n";
    echo "Email: operator@kopiin.com\n";
    echo "Password: operator123\n\n";
    
} catch (\Exception $e) {
    echo "❌ ERROR: " . $e->getMessage() . "\n\n";
    echo "Mungkin tabel users belum memiliki kolom 'role'.\n";
    echo "Coba jalankan: php artisan migrate\n";
}