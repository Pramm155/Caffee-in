// database/migrations/xxxx_add_role_to_users_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'operator', 'pelanggan'])->default('pelanggan');
            $table->string('nama_lengkap')->nullable();
            $table->string('no_telepon')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'nama_lengkap', 'no_telepon']);
        });
    }
};