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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('row_1_text')->nullable();
            $table->string('row_1_color')->nullable();
            $table->string('row_1_css')->nullable();
            $table->string('row_2_text')->nullable();
            $table->string('row_2_color')->nullable();
            $table->string('row_2_css')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_target')->nullable();
            $table->string('button_color')->nullable();
            $table->string('button_css')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
