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
        Schema::create('phieu_nhap_sach', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nha_xuat_ban_id');
            $table->string('admin_ten_dang_nhap');
            $table->integer('tong_tien');
            $table->string('ghi_chu')->nullable();
            $table->tinyInteger('trang_thai')->default(1);
            $table->timestamps();

            $table->foreign('nha_xuat_ban_id')->references('id')->on('nha_xuat_ban');
            $table->foreign('admin_ten_dang_nhap')->references('ten_dang_nhap')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_nhap_hang');
    }
};
