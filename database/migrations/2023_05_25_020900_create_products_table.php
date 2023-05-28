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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->decimal('harga_produk', 10, 2);
            $table->integer('stock');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('Users')->onDelete('cascade');
//            $table->date('')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
