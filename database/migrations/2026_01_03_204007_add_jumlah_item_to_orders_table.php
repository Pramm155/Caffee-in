<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hapus tabel lama jika ada
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        
        //  tabel orders baru struktur lengkap
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan')->unique();
            $table->string('nama_pelanggan');
            $table->string('nomor_meja')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->integer('jumlah_item')->default(0);
            $table->text('catatan')->nullable();
            $table->timestamp('waktu_diproses')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->timestamps();
        });
        
        // Buat tabel order_items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->string('nama_menu');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};