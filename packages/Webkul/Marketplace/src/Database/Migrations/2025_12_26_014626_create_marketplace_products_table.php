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
        Schema::create('marketplace_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marketplace_seller_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->boolean('is_approved')->default(0);
            $table->timestamps();

            $table->foreign('marketplace_seller_id')->references('id')->on('marketplace_sellers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketplace_products');
    }
};
