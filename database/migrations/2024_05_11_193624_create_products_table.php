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
        Schema::create('product_types', function (Blueprint $table) {
            // Kıyafet Ayakkabı Standart
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('products_main', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('type_id');

            $table->string('name');
            $table->decimal('price', 8,2);
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreign('brand_id')->on('brands')->references('id')->cascadeOnDelete();
            $table->foreign('type_id')->on('product_types')->references('id')->cascadeOnDelete();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_product_id');
            $table->string('name')->nullable();
            $table->string('variant_name');
            $table->string('slug');
            $table->decimal('additional_price', 8,2)->nullable();
            $table->decimal('final_price', 8,2);
            $table->mediumText('extra_description')->nullable();
            $table->boolean('status')->default(0);
            $table->dateTime('publish_date')->nullable();
            $table->timestamps();

            $table->foreign('main_product_id')->on('products_main')->references('id')->cascadeOnDelete();
            $table->foreign('main_product_id','pfk')->on('products')->references('id')->cascadeOnDelete();
        });
        Schema::create('size_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('size');
            $table->integer("stock")->default(0);
            $table->timestamps();

            $table->foreign('product_id')->on('products')->references('id')->cascadeOnDelete();
        });
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('path');
            $table->boolean('is_featured')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->on('products')->references('id')->cascadeOnDelete();
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
        Schema::dropIfExists('products_main');
        Schema::dropIfExists('products');
        Schema::dropIfExists('size_stock');
        Schema::dropIfExists('product_images');
    }
};
