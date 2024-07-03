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
        Schema::create('trang_thai_don_hang', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('don_hang_id');
            $table->string('ten_trang_thai')->nullable();
            $table->year('cap_nhat_thoi_gian_trang_thai')->nullable();
            $table->timestamps();

            $table->foreign('don_hang_id')->references('id')->on('don_hang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trang_thai_don_hang');
    }
};
