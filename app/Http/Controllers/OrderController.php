<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Menyimpan pesanan baru (Public - semua orang bisa akses)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja' => 'nullable|string|max:20',
            'cart_items' => 'required|json'
        ]);

        $cartItems = json_decode($request->cart_items, true);
        
        if (empty($cartItems)) {
            return back()->with('error', 'Keranjang kosong!');
        }

        // Hitung total harga dan jumlah item
        $totalHarga = 0;
        $jumlahItem = 0;
        
        foreach ($cartItems as $item) {
            $totalHarga += $item['harga'] * $item['jumlah'];
            $jumlahItem += $item['jumlah'];
        }

        // Buat order
        $order = Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_meja' => $request->nomor_meja,
            'total_harga' => $totalHarga,
            'jumlah_item' => $jumlahItem,
            'status' => 'pending'
        ]);

        // Buat order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'nama_menu' => $item['nama_menu'],
                'jumlah' => $item['jumlah'],
                'harga_satuan' => $item['harga'],
                'subtotal' => $item['harga'] * $item['jumlah']
            ]);
        }

        // Redirect ke halaman konfirmasi
        return redirect()->route('orders.confirmation', $order->id)
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Menampilkan halaman konfirmasi pesanan (Public)
     */
    public function showConfirmation($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        
        return view('orders.confirmation', [
            'order' => $order,
            'title' => 'Konfirmasi Pesanan - Cafe KOPI IN'
        ]);
    }

    /**
     * Menampilkan riwayat pesanan (Hanya operator/admin)
     */
    public function history()
    {
        // Cek authentication
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login sebagai operator untuk mengakses halaman ini.');
        }
        
        // Cek authorization (hanya operator/admin)
        $user = Auth::user();
        if (!$user->isOperator() && !$user->isAdmin()) {
            return redirect()->route('home')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        // Ambil semua pesanan, urutkan dari yang terbaru
        $orders = Order::orderBy('created_at', 'desc')->get();
        
        return view('orders.history', [
            'orders' => $orders,
            'title' => 'Riwayat Pesanan - Cafe KOPI IN'
        ]);
    }

    /**
     * Update status pesanan (Hanya operator/admin)
     */
    public function updateStatus(Request $request, $id)
    {
        // Cek authentication
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }
        
        // Cek authorization
        $user = Auth::user();
        if (!$user->isOperator() && !$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki izin untuk mengubah status.'
            ], 403);
        }
        
        try {
            $request->validate([
                'status' => 'required|in:pending,diproses,selesai,dibatalkan'
            ]);
            
            $order = Order::findOrFail($id);
            
            // Update waktu jika status berubah ke selesai
            if ($request->status == 'selesai' && $order->status != 'selesai') {
                $order->waktu_selesai = now();
            }
            
            // Update waktu jika status berubah ke diproses
            if ($request->status == 'diproses' && $order->status != 'diproses') {
                $order->waktu_diproses = now();
            }
            
            $order->status = $request->status;
            $order->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Status pesanan berhasil diperbarui',
                'order' => $order
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Hapus pesanan (Hanya operator/admin)
     */
    public function destroy($id)
    {
        // Cek authentication
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }
        
        // Cek authorization
        $user = Auth::user();
        if (!$user->isOperator() && !$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki izin untuk menghapus pesanan.'
            ], 403);
        }
        
        try {
            $order = Order::findOrFail($id);
            
            // Hapus order items terlebih dahulu
            $order->orderItems()->delete();
            
            // Hapus order
            $order->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}