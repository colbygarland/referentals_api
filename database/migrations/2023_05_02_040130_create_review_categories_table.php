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
        Schema::create('review_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('review_id');
            $table->integer('category_id');
            $table->integer('rating'); // 1 - 5 star rating is the idea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_categories');
    }
};
