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
        Schema::create('discounts', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->enum('type', ['percentage', 'amount']);
            $table->decimal('value', 8, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('minimum_spend', 8, 2)->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::create('discount_coupons', function (Blueprint $table)
        {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('discount_id');
            $table->integer('usage_limit');
            $table->integer('used_count');
            $table->date('expiry_date');
            $table->timestamps();

            $table->foreign('discount_id')
                  ->on('discounts')
                  ->references('id')
                  ->cascadeOnDelete();
        });

        Schema::create('discount_products', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('discount_id')
                  ->on('discounts')
                  ->references('id')
                  ->cascadeOnDelete();

            $table->foreign('product_id')
                  ->on('products')
                  ->references('id')
                  ->cascadeOnDelete();
        });

        Schema::create('discount_categories', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('discount_id')
                  ->on('discounts')
                  ->references('id')
                  ->cascadeOnDelete();

            $table->foreign('category_id')
                  ->on('categories')
                  ->references('id')
                  ->cascadeOnDelete();
        });

        Schema::create('discount_brands', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('brand_id');

            $table->foreign('discount_id')
                  ->on('discounts')
                  ->references('id')
                  ->cascadeOnDelete();

            $table->foreign('brand_id')
                  ->on('brands')
                  ->references('id')
                  ->cascadeOnDelete();
        });

        Schema::create('discount_usage', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');

            $table->foreign('discount_id')
                  ->on('discounts')
                  ->references('id')
                  ->cascadeOnDelete();

            $table->foreign('user_id')
                  ->on('users')
                  ->references('id')
                  ->cascadeOnDelete();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discount_coupons');
        Schema::dropIfExists('discount_products');
        Schema::dropIfExists('discount_categories');
        Schema::dropIfExists('discount_brands');
        Schema::dropIfExists('discount_usage');
    }
};
