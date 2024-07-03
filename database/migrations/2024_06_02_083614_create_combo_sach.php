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
        Schema::create('combo_sach', function (Blueprint $table) {
            $table->id();
            $table->string('sach_id');
            $table->string('combo_id');
            $table->timestamps();

            $table->foreign('sach_id')->references('id')->on('sach');
            $table->foreign('combo_id')->references('id')->on('combo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo_sach');
    }
};
