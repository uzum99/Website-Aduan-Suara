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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_aduan')->unique();
            $table->foreignId('id_kategori')->constrained('kategori')->cascadeOnDelete();
            $table->foreignId('id_siswa')->constrained('siswa')->cascadeOnDelete();
            $table->string('subjek');
            $table->text('pesan');
            $table->string('lampiran');
            $table->enum('status', ['menunggu', 'proses', 'selesai'])->default('menunggu');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
