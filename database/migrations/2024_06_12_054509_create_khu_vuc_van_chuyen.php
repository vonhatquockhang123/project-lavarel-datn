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
        Schema::create('khu_vuc_van_chuyen', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('don_hang_id');
            $table->string('ten_khu_vuc')->unique();
            $table->timestamps();

            $table->foreign('don_hang_id')->references('id')->on('don_hang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khu_vuc_van_chuyen');
    }
};
