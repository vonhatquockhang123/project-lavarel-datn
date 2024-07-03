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
        Schema::create('combo', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ten_combo')->unique();
            $table->string('nha_xuat_ban_id');
            $table->integer('gia');
            $table->integer('so_luong');
            $table->string('hinh_anh')->default('default-image.jpg');
            $table->string('mo_ta', 1000)->nullable();
            $table->decimal('danh_gia', 3, 1)->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

        $table->foreign('nha_xuat_ban_id')->references('id')->on('nha_xuat_ban');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo');
    }
};
