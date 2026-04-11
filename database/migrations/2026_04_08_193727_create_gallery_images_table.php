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
        // Remove the single image column from galleries, it's now a container
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Migrate existing gallery rows that had images into gallery_images
        // (handled manually if needed)
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');

        Schema::table('galleries', function (Blueprint $table) {
            $table->string('image')->after('description')->default('');
        });
    }
};
