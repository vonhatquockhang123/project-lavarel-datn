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
        Schema::create('admin', function (Blueprint $table) {
            $table->string('ten_dang_nhap')->primary();
            $table->string('mat_khau');
            $table->string('ten_admin');
            $table->string('so_dien_thoai', 10)->unique();
            $table->string('email')->unique();
            $table->string('dia_chi');
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
        Schema::dropIfExists('admin');
    }
};
