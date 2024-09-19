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
            $table->string('image')->default('https://placehold.co/600x400');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('description');
            $table->integer('rating');
            $table->integer('discount')->default(0);
            $table->string('category');
            $table->foreignIdFor(\App\Models\Collection::class)->nullable();
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
