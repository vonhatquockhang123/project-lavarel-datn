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
        Schema::create('chi_tiet_phieu_nhap_sach', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('phieu_nhap_sach_id');
            $table->string('sach_id')->nullable();
            $table->string('combo_id')->nullable();
            $table->integer('gia_nhap');
            $table->integer('gia_ban');
            $table->integer('so_luong');
            $table->timestamps();

            $table->foreign('phieu_nhap_sach_id')->references('id')->on('phieu_nhap_sach');
            $table->foreign('sach_id')->references('id')->on('sach')->nullable();
            $table->foreign('combo_id')->references('id')->on('combo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_nhap_hang');
    }
};
