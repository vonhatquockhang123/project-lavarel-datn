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
            Schema::create('sach', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string('loai_sach_id');
                $table->string('nha_xuat_ban_id');
                $table->string('ten_sach')->unique(); 
                $table->string('kich_co')->nullable();
                $table->string('can_nang')->nullable();
                $table->integer('so_trang')->nullable();
                $table->string('ngon_ngu')->nullable();
                $table->date('ngay_phat_hanh')->nullable();
                $table->integer('gia');
                $table->integer('gia_sach_dien_tu')->nullable();
                $table->integer('so_luong');
                $table->string('mo_ta', 1000)->nullable();
                $table->decimal('danh_gia', 3, 1)->nullable();
                $table->string('slug')->unique();
                $table->timestamps();
                $table->softDeletes();
    
                $table->foreign('loai_sach_id')->references('id')->on('loai_sach');
                $table->foreign('nha_xuat_ban_id')->references('id')->on('nha_xuat_ban');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sach');
    }
};
