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
        Schema::create('rezervsorgus', function (Blueprint $table) {
            $table->id();
            $table->integer('musteri_id');
            $table->integer('kisi_sayisi');
            $table->integer('total_fiyat')->nullable();
            $table->date('giris');
            $table->date('cikis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezervsorgus');
    }
};
