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
        Schema::create('danh_gia_sach', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('khach_hang_ten_dang_nhap');
            $table->string('sach_id')->nullable();
            $table->tinyInteger('danh_gia');
            $table->string('noi_dung')->nullable();
            $table->timestamps();

            $table->foreign('khach_hang_ten_dang_nhap')->references('ten_dang_nhap')->on('khach_hang');
            $table->foreign('sach_id')->references('id')->on('sach');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia');
    }
};
