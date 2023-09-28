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
            $table->string('image', 255);
            $table->string('name', 255);
            $table->unsignedBigInteger('rating_id');
            $table->unsignedBigInteger('color_id');
            $table->float('price')->default(0);
            $table->float('discount_price')->default(0);
            $table->string('size', 255);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('product_category_id');
            //Add Foreign key
            $table->foreign('rating_id')->references('id')->on('rating');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
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
