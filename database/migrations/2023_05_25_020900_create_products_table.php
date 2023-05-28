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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
//            $table->string('kategori');
//            $table->integer('harga_produk');
            $table->decimal('harga_produk', 10, 2);
            $table->integer('stock');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('Users')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
//            $table->foreignId('supplier_id')->constrained();
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
