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
            $table->string('title');
            $table->string('catName');
            $table->foreignId('catID')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('subDesc');
            $table->integer('price');
            $table->integer('descPrice');
            $table->longText('reviews')->nullable();
            $table->longText('specifications')->nullable();
            $table->longText('colors')->nullable();
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
