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
        Schema::table('sliders', function (Blueprint $table) {
            $table->boolean('status')->default(false)->after('path');
            $table->date('release_start')->nullable()->after('status');
            $table->date('release_finish')->nullable()->after('release_start');
            $table->smallInteger('order')->default(0)->after("release_finish");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('release_start');
            $table->dropColumn('release_finish');
            $table->dropColumn('order');
        });
    }
};
