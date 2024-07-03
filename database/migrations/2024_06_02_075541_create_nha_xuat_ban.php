<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nha_xuat_ban', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ten_nha_xuat_ban')->unique();
            $table->string('so_dien_thoai')->unique();
            $table->string('email')->unique();
            $table->string('dia_chi');
            $table->string('mo_ta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_xuat_ban');
    }
};
