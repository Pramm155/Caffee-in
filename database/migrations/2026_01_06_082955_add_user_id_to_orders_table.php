// database/migrations/xxxx_xx_xx_xxxxxx_add_user_id_to_orders_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Tambahkan kolom user_id
            $table->foreignId('user_id')
                ->nullable()
                ->after('id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

        });
    }
};