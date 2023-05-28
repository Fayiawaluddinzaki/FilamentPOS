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
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
//            $table->foreignId('product_id')->constrained();
            $table->unsignedBigInteger('pembeli');
            $table->foreign('pembeli')->references('id')->on('users')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga_jual', 10, 2);
            $table->date('transaction_date');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
