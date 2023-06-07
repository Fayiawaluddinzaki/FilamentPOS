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
        Schema::create('iuran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_palanggan');
            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar',10,2);
            $table->date('tanggal_bayar');
//            $table->intege('jumlah_minggu');
//            $table->date('periode_bayar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};
