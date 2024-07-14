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
        Schema::table('discount_coupons', function (Blueprint $table) {
            $table->integer('used_count')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discount_coupons', function (Blueprint $table) {
            $table->integer('used_count')->default(null)->change();
        });
    }
};
