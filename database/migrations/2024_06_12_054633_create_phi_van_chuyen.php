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
        Schema::create('phi_van_chuyen', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('khu_vuc_van_chuyen_id');
            $table->decimal('phi_van_chuyen', 8, 2);
            $table->decimal('nguong_mien_phi_van_chuyen', 8, 2);
            $table->timestamps();

            $table->foreign('khu_vuc_van_chuyen_id')->references('id')->on('khu_vuc_van_chuyen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phi_van_chuyen');
    }
};
