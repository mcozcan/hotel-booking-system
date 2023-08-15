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
        Schema::create('rezervasyons', function (Blueprint $table) {
            $table->id();
            $table->date('giris');
            $table->date('cikis');
            $table->integer('kisi_sayisi');
            $table->string('musteri_adi');
            $table->integer('musteri_id');
            $table->integer('rez_kod');
            $table->integer('total_fiyat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezervasyons');
    }
};
