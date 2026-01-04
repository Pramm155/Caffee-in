<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login operator
     */
    public function showLogin()
    {
        // Jika sudah login, redirect ke dashboard
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isOperator() || $user->isAdmin()) {
                return redirect()->route('dashboard');
            }
        }
        
        return view('auth.login', [
            'title' => 'Login Operator - Cafe KOPI IN'
        ]);
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Cek role user
            $user = Auth::user();
            
            // Hanya operator dan admin yang boleh login
            if ($user->isOperator() || $user->isAdmin()) {
                return redirect()->route('dashboard')
                    ->with('success', 'Login berhasil! Selamat datang ' . ($user->nama_lengkap ?? $user->name));
            } else {
                // Jika pelanggan mencoba login, logout dan beri pesan error
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Hanya operator dan admin yang dapat mengakses sistem ini.'
                ])->withInput();
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Menampilkan halaman dashboard operator
     */
    public function dashboard()
    {
        // Hanya operator/admin yang bisa akses
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();
        if (!$user->isOperator() && !$user->isAdmin()) {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Ambil data statistik
        $totalOrders = Order::count();
        $completedOrders = Order::where('status', 'selesai')
            ->whereDate('created_at', today())
            ->count();
        $processingOrders = Order::whereIn('status', ['pending', 'diproses'])
            ->whereDate('created_at', today())
            ->count();
        
        // Hitung revenue hari ini
        $revenue = Order::where('status', 'selesai')
            ->whereDate('created_at', today())
            ->sum('total_harga');
        
        // Ambil pesanan terbaru
        $recentOrders = Order::latest()->take(10)->get();

        return view('auth.dashboard', [
            'title' => 'Dashboard Operator - Cafe KOPI IN',
            'user' => $user,
            'totalOrders' => $totalOrders,
            'completedOrders' => $completedOrders,
            'processingOrders' => $processingOrders,
            'revenue' => $revenue,
            'recentOrders' => $recentOrders
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }

    // AuthController.php - Tambahkan method ini
    public function createFirstOperator()
    {
        // Cek apakah sudah ada operator
        if (User::where('role', 'operator')->exists()) {
            return "Operator sudah ada!<br>
                    Email: operator@kopiin.com<br>
                    Password: operator123<br><br>
                    <a href='/login'>Login disini</a>";
        }
        
        try {
            User::create([
                'name' => 'Operator Kopi IN',
                'email' => 'operator@kopiin.com',
                'password' => Hash::make('operator123'),
                'role' => 'operator',
                'nama_lengkap' => 'Admin Operator',
                'no_telepon' => '081234567890'
            ]);
            
            return "Operator berhasil dibuat!<br>
                    Email: operator@kopiin.com<br>
                    Password: operator123<br><br>
                    <a href='/login'>Login sekarang</a>";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage() . "<br>
                    Pastikan kolom 'role' sudah ada di tabel users.<br>
                    Jalankan migration: php artisan migrate";
        }
    }
}