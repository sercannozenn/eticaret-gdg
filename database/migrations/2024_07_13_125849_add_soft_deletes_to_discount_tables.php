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
        Schema::table('discounts', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('discount_products', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('discount_categories', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('discount_brands', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('discount_coupons', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('discount_products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('discount_categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('discount_brands', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('discount_coupons', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
