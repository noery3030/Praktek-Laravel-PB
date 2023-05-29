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
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn');
            $table->string('judul');
            $table->year('tahun_cetak');
            $table->integer('stok');
            $table->integer('idpengarang')->unique();
            $table->integer('idpenerbit')->unique();
            $table->integer('idkategori')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
