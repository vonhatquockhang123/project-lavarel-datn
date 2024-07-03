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
        Schema::create('sach_tac_gia', function (Blueprint $table) {
            $table->id();
            $table->string('tac_gia_id');
            $table->string('sach_id');
            $table->timestamps();

            $table->foreign('tac_gia_id')->references('id')->on('tac_gia');
            $table->foreign('sach_id')->references('id')->on('sach');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sach_tac_gia');
    }
};
