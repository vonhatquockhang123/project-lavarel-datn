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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->string('ten_dang_nhap')->nullable()->unique()->primary();
            $table->string('mat_khau')->nullable();
            $table->string('ten_khach_hang')->nullable();
            $table->string('so_dien_thoai', 10);
            $table->string('email')->unique();
            $table->string('dia_chi')->nullable();
            $table->string('anh_dai_dien')->default('default-avatar.jpg');
            $table->tinyInteger('trang_thai')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hang');
    }
};
