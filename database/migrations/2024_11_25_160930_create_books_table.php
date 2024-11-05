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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50)->nullable();
            $table->string('isbn')->nullable();
            $table->string('isbn13')->nullable();
            $table->string('title', 50)->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->datetime('publish_date')->nullable();
            $table->foreignId('genre_id')->nullable()->constrained();
            $table->foreignId('language_id')->nullable()->constrained();
            $table->foreignId('publication_status_id')->nullable()->constrained();
            $table->foreignId('media_type_id')->nullable()->constrained();
            $table->foreignId('publisher_id')->nullable()->constrained();
            $table->foreignId('translator_id')->nullable()->constrained();
            $table->foreignId('editor_id')->nullable()->constrained();
            $table->foreignId('illustrator_id')->nullable()->constrained();
            $table->foreignId('author_id')->nullable()->constrained();
            $table->json('additional_authors')->nullable();
            $table->json('keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
