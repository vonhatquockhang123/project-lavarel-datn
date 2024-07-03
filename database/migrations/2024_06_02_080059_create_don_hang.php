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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('khach_hang_ten_dang_nhap')->nullable();
            $table->string('admin_ten_dang_nhap')->nullable();
            $table->string('ten_don_hang');
            $table->string('so_dien_thoai', 10);
            $table->string('dia_chi')->nullable();
            $table->integer('tong_tien');
            $table->string('khu_vuc_giao_hang')->nullable();
            $table->integer('phi_van_chuyen')->nullable();
            $table->integer('tong_tien_thanh_toan')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->tinyInteger('trang_thai')->default(1);
            $table->tinyInteger('phuong_thuc_thanh_toan')->default(0);
            $table->tinyInteger('trang_thai_thanh_toan')->default(0);
            $table->timestamps();

            $table->foreign('khach_hang_ten_dang_nhap')->references('ten_dang_nhap')->on('khach_hang');
            $table->foreign('admin_ten_dang_nhap')->references('ten_dang_nhap')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
