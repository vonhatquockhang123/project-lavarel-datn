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
        Schema::create('tac_gia', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('sach_id')->nullable();
            $table->string('ten_tac_gia')->unique();
            $table->date('ngay_sinh')->nullable();
            $table->string('quoc_tich')->nullable();
            $table->string('dia_chi')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sach_id')->references('id')->on('sach');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tac_gia');
    }
};
