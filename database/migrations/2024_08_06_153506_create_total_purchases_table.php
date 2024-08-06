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
        Schema::create('total_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productID')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('productName');
            $table->integer('amt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_purchases');
    }
};
